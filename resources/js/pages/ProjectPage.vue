<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { ref, computed, onMounted } from 'vue';

    const projects = ref([]);
    const allTypes = ref([]);
    const selectedType = ref(null);
    const showOn = ref('info');
    const showAllStates = ref({});

    const props = defineProps({
        data: Object,
    })

    const filterProject = (type) => {
        selectedType.value = type;
    };

    const resetFilter = () => {
        selectedType.value = null;
    };

    const filteredProjects = computed(() => {
        if (!selectedType.value) {
            return projects.value;
        }
        return projects.value.filter(project => project.type.name === selectedType.value);
    });

    const toggleShowAll = (id) => {
        showAllStates.value[id] = !showAllStates.value[id];
    };

    const isShown = (id) => {
        return !!showAllStates.value[id];
    }

    onMounted(() => {
        projects.value = props.data.projects
        allTypes.value = props.data.types
    })

</script>

<template>

    <LayoutPage title="Retrouvez l'ensemble de mes projets" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <div>
                <Card :withLink="false" title="Choisissez le type de projets" class="h-auto text-center lg:text-left">
                    <template #other>
                        <div class="flex flex-col lg:flex-row justify-around gap-2 mt-4">
                            <div class="text-center">
                                <div    @click.prevent="resetFilter()" 
                                        class="h-[45px] w-2/3 lg:w-auto px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer"
                                        :class="selectedType === null ? 'bg-[#70ba65] text-[#fcfcfe]' : ''"
                                        >
                                    Tout
                                </div>
                            </div>
                            <div v-for="(type, index) in allTypes" :key="index" class="text-center">
                                <div    @click.prevent="filterProject(type.name)" 
                                        class="h-[45px] w-2/3 lg:w-auto px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer"
                                        :class="selectedType === type.name ? 'bg-[#70ba65] text-[#fcfcfe]' : ''"
                                        >
                                    {{ type.name }}
                                </div>
                            </div>
                        </div>
                    </template>
                </Card>
            </div>
            <TransitionGroup name="list" tag="div">
                <div v-for="project in filteredProjects" :key="project.id">
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
            </TransitionGroup>
        </template>
    </LayoutPage>

</template>

<style scoped>

    .list-enter-active,
    .list-leave-active {
        transition: all .5s ease-in-out;
    }
    .list-enter-from,
    .list-leave-to {
        opacity: 0;
        transform: translateX(100%);
    }

</style>