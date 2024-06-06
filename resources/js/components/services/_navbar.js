import axios from "axios";
import { ref } from "vue";

export default function useNavbar () {

    const apiToken = window.APP_CONFIG.API_TOKEN;
    const errors = ref();

    const getPDF = async() => {

        await axios({
            url: 'http://resumewolff.test/download-cv',
            method: 'GET',
            responseType: 'blob',
            headers: {
                'Authorization': `Bearer ${apiToken}`
            }
        })

        .then(response => {
            const url = window.URL.createObjectURL(new Blob([response.data], { type: 'application/pdf' }));
            const a = document.createElement('a');
            a.href = url;
            a.download = 'CV_WOLFF_GREGORY';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
        })

        .catch(error => {
            errors.value = error;
        });
    }

    return {
        getPDF,
        errors,
    }
}