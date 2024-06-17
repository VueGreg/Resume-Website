import { ref, reactive } from 'vue';
import axios from 'axios';

export default function useContact () {

    const errors = reactive({});
    const mailResponse = ref();
    const modalVisible = ref(false);
    const waiting = ref(false);

    function delay(ms) {
        return new Promise(resolve => setTimeout(resolve, ms));
    }

    const postMail = async(data) => {
        waiting.value = true

        await delay(1000);

        try {
            const response = await axios.post('/mail', data);
            mailResponse.value = response.data;
            errors.name = '';
            errors.surname = '';
            errors.mail = '';
            errors.message = '';

            modalVisible.value = true;

        } catch (error) {;
            if (error.response.status === 422) {
                Object.assign(errors, error.response.data.errors);
            } else console.error(error);
        } finally {
            waiting.value = false;
        }
    }

    return {
        postMail,
        errors,
        mailResponse,
        modalVisible,
        waiting,
    }

}