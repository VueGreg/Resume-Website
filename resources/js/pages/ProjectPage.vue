<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import { ref, onMounted } from 'vue';

    const projects = ref([]);

    const getProjects = async() => {
        try {
            const response = await axios.get('http://resumewolff.test/api/curriculum');
            projects.value = response.data.projects;
        } catch (error) {
            console.error(error);
        }
    };

    onMounted(getProjects);

</script>

<template>

    <LayoutPage title="Retrouvez l'ensemble de mes projets" textButton="Revenir à l'accueil">
        <template #content>
            <div>
                <Card :withLink="false" title="Choisissez le type de projets" class="h-auto">
                    <template #other>
                        <div class="flex justify-around">
                            <div class="text-center">
                                <div class="h-[45px] px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer">
                                    Tout
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="h-[45px] px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer">
                                    Front-end
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="h-[45px] px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer">
                                    Back-end
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="h-[45px] px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer">
                                    Full-stack
                                </div>
                            </div>
                            <div class="text-center">
                                <div class="h-[45px] px-[35px] whitespace-nowrap border border-[#70ba65] text-[#70ba65] dark:text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:text-[#fcfcfe] hover:scale-300 duration-110 transition-all cursor-pointer">
                                    Autres
                                </div>
                            </div>
                        </div>
                    </template>
                </Card>
            </div>
            <div v-for="project in projects" :key="project.id">
                <Card :withLink="false" :title="project.name">
                    <template #other>
                        <h2>{{project.github}}</h2>
                    </template>
                </Card>
            </div>
        </template>
    </LayoutPage>

</template>