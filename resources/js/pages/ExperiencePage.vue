<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { useRoute } from 'vue-router';
    import { ref, onMounted } from 'vue';
    import scrollbar from '../smoothScrollbar';

    const props = defineProps({
        data: Object,
    })

    const route = useRoute();
    const experience = ref([]);
    const showOn = ref('informations');
    const showAllStates = ref({});
    const descriptions = ref([]);

    const tabs = ref({
        1: {name: 'informations'},
        2: {name: 'description'},
        3: {name: 'Compétences travaillées'},
        4: {name: 'Technologies utilisées'},
    })

    const getExperience = (slug) => {
        props.data.experiences.forEach(element => {
            if (element.slug === slug) {
                experience.value = element
            }
        });
    }

    const changeFormatDate = (dateString) => {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long' }
        return date.toLocaleDateString('fr-FR', options);
    }

    const splitText = (text) => {
        return text.split(/[\.\?!]\s+/);
    }

    const toggleShowAll = (id) => {
        showAllStates.value[id] = !showAllStates.value[id];
    };

    const isShown = (id) => {
        return !!showAllStates.value[id];
    }

    onMounted(() => {
        getExperience(route.params.slug);
        const scrollContent = document.querySelector('.scroll-content');
        scrollContent.style.transform = 'translate3d(0px, 0px, 0px)';
        scrollbar.scrollTop = 0;
    })

</script>

<template>
    <LayoutPage :title="experience.job" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <Card :withLink="false" class="h-auto">
                <template #other>
                    <div>
                        <h2 class="py-4 text-3xl font-bold">{{ experience.title }}</h2>
                        <h5 class="flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                            <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                        </h5>
                        <div class="flex flex-col lg:flex-row items-start justify-center lg:justify-between lg:items-center my-10 gap-8 lg-gap-1">
                            <div>
                                <span class="font-bold">Période:</span>
                                <p class="text-sm">De {{ changeFormatDate(experience.start_date) }} à {{ changeFormatDate(experience.end_date) }}</p>
                            </div>
                            <div v-if="experience.business">
                                <span class="font-bold">Entreprise:</span>
                                <a :href="experience.business.website" target="_blank" class="flex items-center gap-2 cursor-pointer">
                                    <img v-if="experience.business.image" :src="experience.business.image" :alt="experience.business.alt" class="h-[30px]">
                                    <p class="text-sm" :class="!experience.business.image ? 'underline' : ''">{{ experience.business.name }}</p>
                                </a>
                            </div>
                            <div v-if="experience.business">
                                <span class="font-bold">Adresse:</span>
                                <p class="text-sm">{{ experience.business.adress }}</p> 
                                <p class="text-sm">{{ experience.business.city }} ({{ experience.business.country }})</p>
                            </div>
                        </div>
                        <p v-if="experience.description" v-for="description in splitText(experience.description)" class="text-sm">{{ description }}.</p>
                    </div>
                </template>
            </Card>

            <h5 v-if="experience.projects > 0" class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Projets réalisés</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>

            <div v-for="project in experience.projects" :key="project.id">
                <Card :withLink="false" :class="['h-auto', isShown(project.id) ? 'max-height-expanded' : 'max-height-collapsed']" style="padding: 0;">
                    <template #other class="relative">
                        <div @click.prevent="toggleShowAll(project.id)" class="cursor-pointer">
                            <div class="flex flex-col lg:flex-row items-center justify-center">
                                <img v-if="!isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg hidden lg:block h-[70px] w-[140px] absolute left-3">
                                <h5 class="text-center text-sm text-wrap w-2/3 lg:w-full lg:text-xl font-semibold my-8">{{ project.name }}</h5>
                            </div>
                            <i class="fa-solid fa-circle-arrow-down absolute left-[90%] lg:left-[95%] top-[35px] text-xl cursor-pointer transition-transform duration-500" 
                                :class="isShown(project.id) ? 'rotate-180' : ''"
                                ></i>
                            <img v-if="isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg">
                        </div>
                        <div class="flex flex-col p-10" name="slide" v-if="isShown(project.id)">
                            <div class="hidden lg:flex flex-col lg:flex-row justify-around items-center text-center text-sm font-semibold uppercase">
                                <h6 @click.prevent="showOn = tab.name" 
                                    class="h-[40px] flex items-center m-4 lg:pr-8 cursor-pointer lg:border-r none-border" 
                                    :class="showOn == tab.name ? 'underline text-[#70ba65]' : ''"
                                    v-for="(tab, index) in tabs"
                                    :key="index"
                                    >{{ tab.name }}</h6>
                            </div>

                            <div class="text-center text-sm font-semibold uppercase flex justify-center lg:hidden">
                                <select v-model="showOn" class="dark:bg-[#00283a] uppercase text-center underline text-[#70ba65] border-b border-b-[#70ba65] py-1">
                                    <option v-for="(tab, index) in tabs" :key="index">{{ tab.name }}</option>
                                </select> 
                            </div>

                            <div class="h-auto">
                            <Transition name="slide-fade">
                                <div v-if="showOn == 'Compétences travaillées'">
                                    <ul class="flex flex-wrap my-8 lg:m-8 gap-4 justify-center text-center">
                                        <li class="rounded-full border px-4 py-2 text-xs" v-for="skill in project.skills" :key="skill.id">{{ skill.name }}</li>
                                    </ul>
                                </div>
                                <div v-else-if="showOn == 'description'">
                                    <div class="flex flex-col my-8 lg:m-8 gap-4 justify-center">
                                        <p v-for="text in splitText(project.description)" class="text-sm">{{ text }}</p>
                                    </div>
                                </div>
                                <div v-else-if="showOn == 'Technologies utilisées'">
                                    <ul class="flex flex-col lg:flex-row m-8 gap-4 justify-center text-center">
                                        <li class="rounded-full border px-4 py-2 text-xs" v-for="technology in project.technologies" :key="technology.id">{{ technology.name }}</li>
                                    </ul>
                                </div>
                                <div v-else-if="showOn == 'informations'">
                                    <ul class="flex flex-col my-4 lg:m-8 gap-4 justify-center text-center">
                                        <li class="flex flex-col lg:flex-row justify-around mb-[10px] w-full">
                                            <div class="lg:text-left my-2 lg:m-0">GitHub</div>
                                            <a :href="project.website" target="_blank" class="font-bold text-[#919ca1]">{{ project.github }}</a>
                                        </li>
                                        <li class="flex flex-col lg:flex-row justify-around mb-[10px] w-full">
                                            <div  class="lg:text-left my-2 lg:m-0">URL:</div>
                                            <a :href="project.website" target="_blank" class="font-bold text-[#919ca1]">{{ project.website }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </Transition>
                            </div>
                            <div class="flex justify-center gap-2">
                                <div @click.prevent="showOn = 'informations'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'informations' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'description'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'description' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'Compétences travaillées'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'Compétences travaillées' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'Technologies utilisées'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'Technologies utilisées' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                            </div>
                        </div>
                    </template>
                </Card>
            </div>

        </template>
    </LayoutPage>
</template>

<style scoped>

    .slide-fade-leave-active,
    .slide-fade-enter-active {
        transition: all .8s cubic-bezier(1, 0.5, 0.8, 1);
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

    .max-height-collapsed {
        max-height: 150px;
        transition: max-height .8s ease;
    }

    .max-height-expanded {
        max-height: 3000px;
        transition: max-height 0.8s ease;
    }

    .none-border:last-child {
        border: none;
        padding: 0;
    }

</style>