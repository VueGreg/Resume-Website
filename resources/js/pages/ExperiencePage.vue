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
    const showOn = ref('info');
    const showAllStates = ref({});
    const descriptions = ref([]);

    const getExperience = (slug) => {
        props.data.experiences.forEach(element => {
            if (element.slug === slug) {
                experience.value = element
            }
        });
        console.log(experience.value);
        splitText(experience.value.description);
    }

    const changeFormatDate = (dateString) => {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long' }
        return date.toLocaleDateString('fr-FR', options);
    }

    const splitText = (text) => {
        descriptions.value = text.split(/[\.\?!]\s+/);
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
                        <div class="flex justify-between items-center my-10">
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
                        <p v-for="description in descriptions" class="text-sm">{{ description }}.</p>
                    </div>
                </template>
            </Card>

            <h5 v-if="experience.projects > 0" class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Projets réalisés</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>

            <div v-for="project in experience.projects" :key="project.id">
                <Card :withLink="false" :class="['h-auto p-0', isShown(project.id) ? 'max-height-expanded' : 'max-height-collapsed']">
                    <template #other class="relative">
                        <div @click.prevent="toggleShowAll(project.id)" class="cursor-pointer">
                            <div class="flex items-center justify-center">
                                <img v-if="!isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg h-[70px] w-[140px] absolute left-3">
                                <h5 class="text-center text-xl font-semibold my-8">{{ project.name }}</h5>
                            </div>
                            <i class="fa-solid fa-circle-arrow-down absolute left-[95%] top-[40%] text-xl cursor-pointer transition-transform duration-500" 
                                :class="isShown(project.id) ? 'rotate-180 top-[38px]' : ''"
                                ></i>
                            <img v-if="isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg">
                        </div>
                        <div class="flex flex-col p-10" name="slide" v-if="isShown(project.id)">
                            <div class="flex justify-around items-center text-center text-sm font-semibold uppercase">
                                <h6 @click.prevent="showOn = 'info'" 
                                    class="h-[40px] flex items-center m-4 pr-8 cursor-pointer border-r" 
                                    :class="showOn == 'info' ? 'underline text-[#70ba65]' : ''"
                                    >Informations</h6>

                                <h6 @click.prevent="showOn = 'description'" 
                                    class="h-[40px] flex items-center m-4 pr-8 cursor-pointer uppercase border-r" 
                                    :class="showOn == 'description' ? 'underline text-[#70ba65]' : ''"
                                    >Description</h6>

                                <h6 @click.prevent="showOn = 'competences'" 
                                class="h-[40px] flex items-center m-4 pr-8 cursor-pointer uppercase border-r" 
                                    :class="showOn == 'competences' ? 'underline text-[#70ba65]' : ''"
                                    >Compétences travaillées</h6>

                                <h6 @click.prevent="showOn = 'technology'" 
                                    class="h-[40px] flex items-center m-4 cursor-pointer uppercase" 
                                    :class="showOn == 'technology' ? 'underline text-[#70ba65]' : ''"
                                    >Technologies utilisées</h6>
                            </div>

                            <div class="h-auto">
                            <Transition name="slide-fade">
                                <div v-if="showOn == 'competences'">
                                    <ul class="flex flex-wrap m-8 gap-4 justify-center">
                                        <li class="rounded-full border px-4 py-2 text-xs" v-for="skill in project.skills" :key="skill.id">{{ skill.name }}</li>
                                    </ul>
                                </div>
                                <div v-else-if="showOn == 'description'">
                                    <div class="flex m-8 gap-4 justify-center">
                                        <p class="px-4 py-2 text-sm">{{ project.description }}</p>
                                    </div>
                                </div>
                                <div v-else-if="showOn == 'technology'">
                                    <ul class="flex m-8 gap-4 justify-center">
                                        <li class="rounded-full border px-4 py-2 text-xs" v-for="technology in project.technologies" :key="technology.id">{{ technology.name }}</li>
                                    </ul>
                                </div>
                                <div v-else-if="showOn == 'info'">
                                    <ul class="flex flex-col m-4 gap-4 justify-center">
                                        <li class="flex justify-around mb-[10px] w-full">
                                            <div>GitHub</div>
                                            <a :href="project.website" target="_blank" class="font-bold text-[#919ca1]">{{ project.github }}</a>
                                        </li>
                                        <li class="flex justify-around mb-[10px] w-full">
                                            <div>URL:</div>
                                            <a :href="project.website" target="_blank" class="font-bold text-[#919ca1]">{{ project.website }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </Transition>
                            </div>
                            <div class="flex justify-center gap-2">
                                <div @click.prevent="showOn = 'info'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'info' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'description'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'description' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'competences'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'competences' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'technology'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'technology' ? 'bg-slate-400' : 'bg-slate-600'"></div>
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
        max-height: 100px;
        overflow: hidden;
        transition: max-height .8s ease;
    }

    .max-height-expanded {
        max-height: 2000px;
        transition: max-height 0.8s ease;
    }

</style>