import axios from "axios";
import { ref } from "vue";

const datas = ref([]);
const errors = ref(null);
const isLoading = ref(true);

export default function useProfil() {

    const getResume = async() => {

        isLoading.value = true;
        try {
            const response = await axios.get('http://resumewolff.test/api/curriculum');
            datas.value = response.data;
            isLoading.value = false
        } catch (error) {
            errors.value = error;
        }
    
    }

    return {
        getResume,
        datas,
        errors,
        isLoading,
    }


}