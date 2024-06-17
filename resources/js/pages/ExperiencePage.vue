<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { useRoute } from 'vue-router';
    import { ref, onMounted } from 'vue';

    const props = defineProps({
        data: Object,
    })

    const route = useRoute();
    const experience = ref([]);
    const showOn = ref('info');
    const showAllStates = ref({});

    console.log(props.data)

    const getExperience = (slug) => {
        props.data.experiences.forEach(element => {
            if (element.slug === slug) {
                experience.value = element
            }
        });
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
    })

</script>

<template>
    <LayoutPage :title="experience.job" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <Card :withLink="false" class="h-auto">
                <template #other>
                    <div>
                        <h2 class="py-4 text-3xl font-bold">{{ experience.title }}</h2>
                        <p>{{ experience.description }}</p>
                    </div>
                </template>
            </Card>

            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Projets réalisés</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>

            <div v-for="project in experience.projects" :key="project.id">
                <Card :withLink="false" class="h-auto p-1">
                    <template #other class="relative">
                        <div class="flex items-center justify-center">
                            <img v-if="!isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg h-[70px] w-[140px] absolute left-3">
                            <h5 class="text-center text-xl font-semibold my-8">{{ project.name }}</h5>
                        </div>
                        <i @click.prevent="toggleShowAll(project.id)" 
                            class="fa-solid fa-circle-arrow-down absolute left-[95%] top-[40%] text-xl cursor-pointer transition-transform" 
                            :class="isShown(project.id) ? 'rotate-180 top-[5%]' : ''"
                            ></i>
                        <img v-if="isShown(project.id)" :src="project.image" :alt="project.alt" class="rounded-lg">

                        <div class="flex flex-col p-10" name="slide" v-if="isShown(project.id)">
                            <div class="flex justify-around">
                                <h6 @click.prevent="showOn = 'info'" 
                                    class="font-semibold m-4 pr-8 cursor-pointer uppercase border-r" 
                                    :class="showOn == 'info' ? 'underline text-[#70ba65]' : ''"
                                    >Informations</h6>

                                <h6 @click.prevent="showOn = 'competences'" 
                                class="font-semibold m-4 pr-8 cursor-pointer uppercase border-r" 
                                    :class="showOn == 'competences' ? 'underline text-[#70ba65]' : ''"
                                    >Compétences travaillées</h6>

                                <h6 @click.prevent="showOn = 'technology'" 
                                    class="font-semibold m-4 cursor-pointer uppercase" 
                                    :class="showOn == 'technology' ? 'underline text-[#70ba65]' : ''"
                                    >Technologies utilisées</h6>

                            </div>
                            <div class="h-[150px]">
                            <Transition name="slide">
                                <div v-if="showOn == 'competences'">
                                    <ul class="flex m-4 gap-4 justify-center">
                                        <li class="rounded-full border px-4 py-2 text-xs" v-for="skill in project.skills" :key="skill.id">{{ skill.name }}</li>
                                    </ul>
                                </div>
                                <div v-else-if="showOn == 'technology'">
                                    <ul class="flex m-4 gap-4 justify-center">
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
                                <div @click.prevent="showOn = 'info'" class="h-[5px] w-[25px] bg-slate-600 cursor-pointer" :class="showOn == 'info' ? 'bg-slate-400' : ''"></div>
                                <div @click.prevent="showOn = 'competences'" class="h-[5px] w-[25px] bg-slate-600 cursor-pointer" :class="showOn == 'competences' ? 'bg-slate-400' : ''"></div>
                                <div @click.prevent="showOn = 'technology'" class="h-[5px] w-[25px] bg-slate-600 cursor-pointer" :class="showOn == 'technology' ? 'bg-slate-400' : ''"></div>
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
        transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        opacity: 0;
    }

</style>