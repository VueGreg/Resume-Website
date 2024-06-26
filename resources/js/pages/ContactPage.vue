<script setup>

    import { ref, onMounted, reactive } from 'vue';
    import { RouterLink } from 'vue-router';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Textput from '../components/textput.vue';
    import Modal from '../components/Modal.vue';
    import useContact from './services/_contact';
    import scrollbar from '../smoothScrollbar';

    const informations = ref([]);
    const { postMail, mailResponse, modalVisible, waiting, errors } = useContact();


    const props = defineProps({
        data: Object,
    })

    const mailing = reactive({
        name: '',
        surname: '',
        mail: '',
        message: 'Message',
        confirm: false,
    });

    const sendMail = () => {
        postMail(mailing)
    }

    onMounted(() => {
        informations.value = props.data.informations;
        scrollbar.scrollTop = 0;
    });

</script>

<template>
    <LayoutPage title="Des questions ? Contactez moi" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <Modal :show="modalVisible" @close="modalVisible = !modalVisible" maxWidth="2xl">
                <template #default>
                    <div class="flex flex-col justify-center items-center h-[30vh] gap-8">
                        <i class="fa-regular fa-circle-check text-[5rem] text-[#70ba65]"></i>
                        <h3 class="font-bold text-2xl">{{ mailResponse ? mailResponse.message : '' }}</h3>
                        <div class="text-center">
                            <RouterLink :to="{ name: 'home' }">
                            <div class="h-[45px] px-[35px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-300 duration-110 transition-all cursor-pointer">
                                Revenir à l'accueil
                                <i class="fa-solid fa-house mt-[-2px] ml-3"></i>
                            </div>
                            </RouterLink>
                        </div>
                    </div>
                </template>
            </Modal>
            <div class="flex flex-col lg:flex-row justify-around items-center lg:gap-8" v-for="information in informations" :key="information.id">
                <Card :withLink="false" class="w-full h-auto dark:text-[#919ca1] text-[#00283a]">
                    <template #other>
                        <a :href="`tel:${information.phone.replace(/\s+/g, '')}`" target="_blank">
                            <i class="fa-solid fa-mobile-screen text-[3rem]"></i>
                            <h3 class="text-xl font-bold my-4">Téléphone</h3>
                            <div class="flex text-sm">
                                <h5 class="uppercase font-semibold tracking-wide mr-2 dark:text-[#dedee0] text-[#919ca1]">Mobile:</h5>
                                <p>{{ information.phone }}</p>
                            </div>
                        </a>
                    </template>
                </Card>
                <Card :withLink="false" class="w-full h-auto dark:text-[#919ca1] text-[#00283a]">
                    <template #other>
                        <a :href="`mailto:${information.email}`" target="_blank">
                            <i class="fa-regular fa-comments text-[3rem]"></i>
                            <h3 class="text-xl font-bold my-4">Messagerie</h3>
                            <div class="flex text-sm">
                                <h5 class="uppercase font-semibold tracking-wide mr-2 dark:text-[#dedee0] text-[#919ca1]">e-mail:</h5>
                                <p>{{ information.email }}</p>
                            </div>
                        </a>
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
                    <form class="flex flex-col justify-around h-full text-xs lg:text-sm lg:gap-4">
                        <div class="flex flex-col lg:flex-row gap-4 lg:gap-8 my-2">
                            <div class="flex flex-col w-full">
                                <Textput modelValue="Nom" v-model="mailing.name"/>
                                <p v-if="errors.name" class="m-2 text-red-500">{{ errors.name[0] }}</p>
                            </div>
                            <div class="flex flex-col w-full">
                                <Textput modelValue="Prénom" v-model="mailing.surname"/>
                                <p v-if="errors.surname" class="m-2 text-red-500">{{ errors.surname[0] }}</p>
                            </div>
                        </div>
                        <Textput modelValue="Adresse e-mail" class="my-2" v-model="mailing.mail" type="email"/>
                        <p v-if="errors.mail" class="m-2 text-red-500">{{ errors.mail[0] }}</p>
                        <textarea v-model="mailing.message" name="message" id="message" placeholder="message" class="dark:text-[#dedee0] block w-full h-[100px] rounded-md bg-gray-100 shadow-inset dark:bg-[#02162b] p-5 my-2"></textarea>
                        <p v-if="errors.message" class="m-2 text-red-500">{{ errors.message[0] }}</p>
                        <div class="flex justify-start items-center gap-4 px-2">
                            <input class="my-2 h-4" v-model="mailing.confirm" type="checkbox"/>
                            <span class="text-xs text-[#919ca1]">J'accepte les <RouterLink :to="{ name: 'legal' }" class="underline">mentions légales</RouterLink></span>
                            <p v-if="errors.confirm" class="m-2 text-red-500">{{ errors.confirm[0] }}</p>
                        </div>
                        <div class="flex flex-col lg:flex-row items-center my-2">
                            <div @click.prevent="sendMail" class="w-full lg:w-1/3 h-[40px] px-[25px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-110 duration-110 transition-all cursor-pointer">
                                Envoyer
                                <i v-if="waiting" class="fa-solid fa-arrows-rotate mt-[-2px] ml-3 spin text-xl font-light"></i>
                                <i v-else class="fa-solid fa-share-from-square mt-[-2px] ml-3"></i>
                            </div>
                        </div>
                    </form>
                </template>
            </Card>
        </template>
    </LayoutPage>
</template>

<style scoped>

    .spin {
        animation: spin 0.7s linear infinite;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

</style>