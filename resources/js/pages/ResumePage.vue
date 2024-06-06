<script setup>

    import { ref, onMounted } from 'vue';
    import { useRouter, RouterLink } from 'vue-router';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Carousel from '../components/carousel.vue';

    const resumes = ref([]);
    const skillsPart1 = ref([]);
    const skillsPart2 = ref([]);
    const router = useRouter();

    const props = defineProps({
        data: Object,
    })

    const getWidth = (projectsCount) => {
        return (projectsCount * 100 / resumes.value.countProjects) + '%';
    };

    const progressBarStyle = (itemId, activeIndex, itemCount) => {
      const shouldExpand = activeIndex + (resumes.value.skills.length / 2) + 1 === itemId || activeIndex + 1 === itemId;
      const width = shouldExpand ? getWidth(itemCount) : '0%';
      return {
        width
      };
    };

    const goToSkills = () => {
        router.push({ name: 'skills' , params: { data: props.data }})
    }

    onMounted(() => {
        resumes.value = props.data;

        const skills = props.data.skills;
        skillsPart1.value = skills.slice(0, Math.ceil(skills.length /2));
        skillsPart2.value = skills.slice(Math.ceil(skills.length /2), skills.length);
    });

</script>

<template>
    
    <LayoutPage title="Découvrez mon Curriculum" textButton="Revenir à la page d'accueil" link="home">
        <template #content>

            <!-- skills content -->
            <div class="flex flex-col justify-center">
                <div class="flex flex-col lg:flex-row gap-8 mb-8 w-full m-auto">
                    <Carousel :items="skillsPart1" 
                                :withIndicator="false" 
                                :autoPlay="true" 
                                :autoPlayInterval="7000"
                                class="before:contents-[''] before:absolute before:left-8 before:-top-2 before:h-2 before:w-[calc(100%-60px)] before:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                                >
                        <template #default="{ item, activeIndex }">
                            <div class="flex flex-col justify-center w-full h-full">
                                <div class="text-[#00283a] dark:text-white m-2">{{ item.name }}</div>
                                <div class="text-slate-400 m-2 text-xs">
                                    compétence utilisée dans {{ (item.projects_count * 100 / resumes.countProjects).toFixed(0) }}% des projets
                                </div>
                                <div class="progress m-2 rounded-lg bg-[#F4F5F7] shadow-inset dark:bg-[#02162b] h-2 w-full">
                                    <div class="progress-bar h-2 bg-[#70ba65] rounded-lg relative"
                                        :style="progressBarStyle(item.id, activeIndex, item.projects_count)">
                                    </div>
                                </div>
                            </div>
                        </template>
                    </Carousel>

                    <Carousel :items="skillsPart2" 
                                :withIndicator="false" 
                                :autoPlay="true" 
                                :autoPlayInterval="8100"
                                class="before:contents-[''] before:absolute before:left-8 before:-top-2 before:h-2 before:w-[calc(100%-60px)] before:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                                >
                        <template #default="{ item, activeIndex }">
                            <div class="flex flex-col justify-center w-full h-full">
                                <div class="text-[#00283a] dark:text-white m-2">{{ item.name }}</div>
                                <div class="text-slate-400 m-2 text-xs">
                                    compétence utilisée dans {{ (item.projects_count * 100 / resumes.countProjects).toFixed(0) }}% des projets
                                </div>
                                <div class="progress m-2 rounded-lg bg-[#F4F5F7] shadow-inset dark:bg-[#02162b] h-2 w-full">
                                    <div class="progress-bar h-2 bg-[#70ba65] rounded-lg relative"
                                        :style="progressBarStyle(item.id, activeIndex, item.projects_count)"
                                        >
                                    </div>
                                </div>
                            </div>
                        </template>
                    </Carousel>
                </div>
                <div class="text-center">
                    <div @click.prevent="goToSkills()" class="border-[2px] border-[#00283a] dark:border-[#fcfcfe] bg-transparent text-[#00283a] dark:text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] w-2/3 sm:w-1/3 uppercase text-[9px] sm:text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center cursor-pointer">
                        Voir toutes les compétences
                        <i class="fa-solid fa-eye mt-[-2px] ml-3"></i>
                    </div>
                </div>
            </div>

            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Technologies</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>

            <!-- Technologies content -->
            <div class="flex flex-wrap flex-col lg:flex-row justify-between w-full lg:gap-8">
                <div v-for="category in resumes.categories" :key="category.id" class="w-full lg:w-[48%] m-auto lg:m-0">
                    <Card :title="category.name" :withLink="false" class="h-auto">
                        <template #other>
                            <div v-for="technology in resumes.technologies">
                                <div v-if="technology.category.id == category.id" class="flex flex-col justify-center w-full h-full">
                                    <div class="text-[#00283a] dark:text-white m-2">{{ technology.name }}</div>
                                    <div class="text-slate-400 m-2 text-xs">
                                        Technologie utilisée dans {{ (technology.projects_count * 100 / resumes.countProjects).toFixed(0) }}% des projets
                                    </div>
                                    <div class="progress m-2 rounded-lg bg-[#F4F5F7] shadow-inset dark:bg-[#02162b] h-2 w-full">
                                        <div class="progress-bar h-2 bg-[#70ba65] rounded-lg relative"
                                            :style="{ width: (technology.projects_count * 100 / resumes.countProjects).toFixed(0) + '%' }"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </Card>
                </div>
            </div>

            <!-- Experiences content -->
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Expériences</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>
            <div class="flex flex-wrap flex-col lg:flex-row justify-between items-center w-full lg:gap-8">
                <div class="w-full lg:w-[48%] m-auto" v-for="experience in resumes.experiences" :key="experience.id">
                    <RouterLink :to="`/experience/${experience.slug}`">
                    <Card :title="experience.title" :url_image="experience.image" :alt_image="experience.alt" :text="experience.description">
                        <template #other>
                            <p>Du {{ experience.start_date }} au {{ experience.end_date }}</p>
                            <h5>Chez {{ experience.business.name }}</h5>
                        </template>
                    </Card>
                    </RouterLink>
                </div>
            </div>
        </template>
    </LayoutPage>
</template>

<style scoped>

    .progress-bar,
    .progress {
        transition: width 2s ease;
    }

</style>