<script setup>

    import { ref, onMounted } from 'vue';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import simpleCard from '../components/simpleCard.vue';
    import card from '../components/card.vue';
    import carousel from '../components/carousel.vue';
    import scrollbar from '../smoothScrollbar.js';

    const cards = ref({
        1: {
            count: 1,
            text: "Experience de code",
        },
        2: {
            count: 5,
            text: "Projets",
        },
        3: {
            count: 3,
            text: "Compétences aquis"
        },
    });

    const props = defineProps({
        data: Object,
    })

    const informations = ref([]);
    const topPosition = ref(0);
    //const url = window.APP_CONFIG.APP_URL;
    const url = 'http://garagev.parrot.gregory-wolff.com';
    const testimonies = ref([
        {
            author: 'Driss BASSOR',
            business: 'L.N.S Service Informatique',
            job: 'Gérant',
            picture: 'lns-logo.webp',
            testimony: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        },
        {
            author: 'Grégory WOLFF',
            business: 'COLDEC SARL',
            job: 'Gérant',
            picture: 'lns-logo.webp',
        }
    ]);

    const updateTopPosition = () => {
        topPosition.value = scrollbar.scrollTop;
    };

    onMounted(() => {
        informations.value = props.data.informations[0];
        cards.value[2].count = props.data.countProjects;
        cards.value[3].count = props.data.countSkills;
        updateTopPosition();
        scrollbar.addListener(updateTopPosition)
    })

</script>

<template>
    <LayoutPage title="Bienvenue sur mon CV en ligne !" textButton="Me contacter" link="contact">
        <template #content>
            <div class="lg:flex lg:justify-between gap-4 w-full">
                <simpleCard v-for="(data, index) in cards" :key="index"  :data="data" class="w-full"/>
            </div>
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Description</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>
            <card :withLink="false" class="h-auto italic">
                <template #other>
                    <p>{{ informations.description }}</p>
                </template>
            </card>


            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Quelques images</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>

            <Transition name="slide-fade">
                <carousel v-if="topPosition > 250" :items="data.projects" :withIndicator="true" :autoPlay="true" height="400" class="h-auto">
                    <template #default="{ item }" class="flex items-center">
                        <img :src="item.image" :alt="item.alt" class="absolute top-[80px] max-h-[300px]">
                    </template>
                </carousel>
            </Transition>

            <h5 class="my-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Recommandations</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">03</span>
            </h5>

            <Transition name="slide-fade">
                <carousel v-if="topPosition > 700" :items="testimonies" :withIndicator="false" :autoPlay="false" height="400" class="my-10">
                    <template #default="{ item }">
                        <div class="flex flex-col items-center absolute top-[100px] dark:text-[#dedee0]">
                            <h4 class="font-bold text-xl">{{ item.author }}</h4>
                            <h4 class="font-bold">{{ item.job }}</h4>
                            <div class="flex gap-4">
                                <img :src="url + '/' + item.picture" alt="logo" class="rounded-full h-10 w-10">
                                <p>{{ item.business }}</p>
                            </div>
                            <p class="text-sm text-center m-8">{{ item.testimony }}</p>
                        </div>
                    </template>
                </carousel>
            </Transition>
        </template>
    </LayoutPage>
</template>

<style scoped>

    .slide-fade-leave-active,
    .slide-fade-enter-active {
        transition: all .3s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        opacity: 0;
        transform: translateX(-100%);
        max-height: 0px;
    }

    .slide-fade-leave-from,
    .slide-fade-enter-to {
        max-height: 500px;
        opacity: 0;
    }

</style>