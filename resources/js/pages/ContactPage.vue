<script setup>

    import { ref, onMounted, watch } from 'vue';
    import axios from 'axios';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Textput from '../components/textput.vue'


    const informations = ref([]);

    const getInformations = async() => {
        try {
            const response = await axios.get('http://resumewolff.test/api/curriculum');
            informations.value = response.data.informations;
        } catch (error) {
            console.error(error);
        }
    };

    onMounted(getInformations);

</script>

<template>
    <LayoutPage title="Des questions ? Contactez moi" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <div class="flex flex-col lg:flex-row justify-around items-center lg:gap-8" v-for="information in informations" :key="information.id">
                <Card title="Téléphone" url_image="https://trueman.bslthemes.com/wp-content/uploads/2021/11/icon-5w.svg" :withLink="false" class="w-full h-auto text-[#919ca1]">
                    <template #other>
                        <div class="flex text-sm">
                            <h5 class="uppercase font-semibold tracking-wide mr-2 text-[#dedee0]">Mobile:</h5>
                            <p>{{ information.phone }}</p>
                        </div>
                    </template>
                </Card>
                <Card title="Messagerie" url_image="https://trueman.bslthemes.com/wp-content/uploads/2021/11/icon-6w.svg" :withLink="false" class="w-full h-auto text-[#919ca1]">
                    <template #other>
                        <div class="flex text-sm">
                            <h5 class="uppercase font-semibold tracking-wide mr-2 text-[#dedee0]">e-mail:</h5>
                            <p>{{ information.email }}</p>
                        </div>
                    </template>
                </Card>
            </div>

            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Contact direct</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>
            <Card :withLink="false" class="transition-height duration-300 ease-in-out h-auto p-8">
                <template #other>
                    <form class="flex flex-col justify-around h-full text-xs lg:text-sm">
                        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 my-2">
                            <Textput modelValue="Nom"/>
                            <Textput modelValue="Prenom"/>
                        </div>
                        <Textput modelValue="Adresse e-mail" class="my-2"/>
                        <textarea name="message" id="message" placeholder="message" class="text-[#dedee0] block w-full h-[100px] rounded-md bg-gray-100 shadow-inset dark:bg-[#02162b] p-5 my-2"></textarea>
                        <div class="flex flex-col lg:flex-row items-center my-2">
                            <div class="w-full lg:w-1/3 h-[40px] px-[25px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-110 duration-110 transition-all cursor-pointer">
                                Envoyer
                                <i class="fas fa-arrow-down mt-[-2px] ml-3"></i>
                            </div>
                            <span class="text-xs text-[#919ca1] text-center mt-3 lg:mt-0 lg:ml-10">* J'assure la confidentialité de vos données personnelles</span>
                        </div>
                    </form>
                </template>
            </Card>
        </template>
    </LayoutPage>
</template>