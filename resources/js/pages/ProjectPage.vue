<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { ref, computed, onMounted } from 'vue';

    const projects = ref([]);
    const allTypes = ref([]);
    const selectedType = ref(null);

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
                    <Card :withLink="false" :title="project.name">
                        <template #other>
                            <h2>{{project.github}}</h2>
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