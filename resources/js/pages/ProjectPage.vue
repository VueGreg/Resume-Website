<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { ref, computed, onMounted } from 'vue';
    import scrollbar from '../smoothScrollbar';

    const projects = ref([]);
    const allTypes = ref([]);
    const selectedType = ref(null);
    const showOn = ref('informations');
    const showAllStates = ref({});

    const props = defineProps({
        data: Object,
    })

    const tabs = ref({
        1: {name: 'informations'},
        2: {name: 'description'},
        3: {name: 'Compétences travaillées'},
        4: {name: 'Technologies utilisées'},
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

    const splitText = (text) => {
        return text.split(/[\.\?!]\s+/);
    }

    onMounted(() => {
        projects.value = props.data.projects;
        allTypes.value = props.data.types;
        scrollbar.scrollTop = 0;
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
                                <div @click.prevent="showOn = 'info'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'info' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'description'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'description' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'competences'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'competences' ? 'bg-slate-400' : 'bg-slate-600'"></div>
                                <div @click.prevent="showOn = 'technology'" class="h-[5px] w-[25px] cursor-pointer" :class="showOn == 'technology' ? 'bg-slate-400' : 'bg-slate-600'"></div>
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

    .slide-fade-leave-active,
    .slide-fade-enter-active {
        transition: all 1s cubic-bezier(1, 0.5, 0.8, 1);
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