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
    const motivations = ref('');
    const isMobile = ref(false);
    //const url = window.APP_CONFIG.APP_URL;
    const url = 'http://garagev.parrot.gregory-wolff.com';
    const testimonies = ref([
        {
            author: 'Driss BASSOR',
            business: 'L.N.S Service Informatique',
            job: 'Gérant',
            picture: 'lns-logo.webp',
            testimony: 'Grégory possède une bonne formation en développement web. Il a également acquis des compétences pratiques avec des frameworks populaires comme Vue.js et des outils de versionnement comme Git. Grégory est une personne très motivée et autonome. Il a montré une grande capacité d\'apprentissage et une curiosité constante pour les nouvelles technologies. Sa capacité à travailler en équipe, à communiquer efficacement et à gérer son temps de manière efficiente en fait un atout précieux. Son enthousiasme et son engagement envers son travail sont contagieux, je le recommande sans hésiter'
        },
    ]);

    const updateTopPosition = () => {
        topPosition.value = scrollbar.scrollTop;
    };

    const splitText = (text) => {
        motivations.value = text.split(/[\.\?!]\s+/);
    }

    onMounted(() => {
        informations.value = props.data.informations[0];
        cards.value[2].count = props.data.countProjects;
        cards.value[3].count = props.data.countSkills;
        splitText(informations.value.motivations);
        updateTopPosition();
        scrollbar.addListener(updateTopPosition);
        window.innerWidth < 600 ? isMobile.value = true : isMobile.value = false;
    })

</script>

<template>
    <LayoutPage title="Bienvenue sur mon CV en ligne !" textButton="Me contacter" link="contact">
        <template #content>
            <div class="lg:flex lg:justify-between gap-4 w-full">
                <simpleCard v-for="(data, index) in cards" :key="index"  :data="data" class="w-full"/>
            </div>

            <!-- DESCRIPTION -->
            <article>
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
            </article>


            <!-- IMAGES -->
            <article v-if="!isMobile">
                <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                    <span>Quelques images</span>
                    <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                    <span class="text-[#919ca1] text-[11px]">02</span>
                </h5>
                <Transition name="slide-fade">
                    <carousel v-if="topPosition > 250" :items="data.projects" :withIndicator="true" :autoPlay="true" height="60" class="h-auto p-0">
                        <template #default="{ item }" class="flex items-center h-auto">
                            <img :src="item.image" :alt="item.alt" class="absolute top-[30%] lg:top-[25%] max-h-[40vh]">
                        </template>
                    </carousel>
                </Transition>
            </article>

            <!-- MOTIVATIONS -->
            <article>
                <h5 class="my-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                    <span>Mes motivations</span>
                    <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                    <span class="text-[#919ca1] text-[11px]">03</span>
                </h5>
                <Transition name="slide-fade">
                    <card :withLink="false" class="h-auto" v-if="topPosition > 900">
                        <template #other>
                            <p v-for="motivation in motivations" class="text-sm p-2">{{ motivation }}.</p>
                        </template>
                    </card>
                </Transition>
            </article>

            <!-- RECOMMANDATIONS -->
            <article>
                <h5 class="my-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                    <span>Recommandations</span>
                    <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                    <span class="text-[#919ca1] text-[11px]">04</span>
                </h5>
                <Transition name="slide-fade">
                    <carousel v-if="topPosition > 1400" :items="testimonies" :withIndicator="true" :autoPlay="false" height="55" class="my-10">
                        <template #default="{ item }">
                            <div class="flex flex-col items-center absolute top-[15%] lg:top-[18%] dark:text-[#dedee0]">
                                <h4 class="font-bold lg:text-xl">{{ item.author }}</h4>
                                <h4 class="font-bold">{{ item.job }}</h4>
                                <div class="flex gap-4">
                                    <img :src="url + '/' + item.picture" alt="logo" class="rounded-full h-10 w-10">
                                    <p>{{ item.business }}</p>
                                </div>
                                <p class="text-xs lg:text-sm text-center my-12 lg:m-8">{{ item.testimony }}</p>
                            </div>
                        </template>
                    </carousel>
                </Transition>
            </article>

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