import axios from "axios";
import { ref } from "vue";

const datas = ref([]);
const errors = ref(null);
const isLoading = ref(true);
const apiToken = window.APP_CONFIG.API_TOKEN;

export default function useProfil() {

    const getResume = async() => {

        isLoading.value = true;
        try {
            const response = await axios.get('http://resumewolff.test/api/curriculum', {
                headers: {
                    'Authorization': `Bearer ${apiToken}`
                }
            });

            datas.value = response.data;
            isLoading.value = false
        } catch (error) {
            errors.value = error;
        }
    
    }

    const resetIsLoading = () => {
        isLoading = !isLoading;
    }

    return {
        getResume,
        datas,
        errors,
        isLoading,
        resetIsLoading,
    }


}