<script setup>

    import { ref, onMounted, watch } from 'vue';
    import { useRouter, RouterLink } from 'vue-router';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Carousel from '../components/carousel.vue';

    const resumes = ref([]);
    const skillsPart1 = ref([]);
    const skillsPart2 = ref([]);
    const router = useRouter();
    const dateRef = ref(123);
    const resumesExp = ref([]);
    const skills = ref([]);

    const props = defineProps({
        data: Object,
    })

    const goToSkills = () => {
        router.push({ name: 'skills' , params: { data: props.data }})
    }

    const changeFormatDate = (dateString) => {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long' }
        return date.toLocaleDateString('fr-FR', options);
    }

    const getExperience = () => {
        resumesExp.value = [];

        props.data.experiences.forEach(experience => {
            const date = new Date(experience.start_date)
            const year = date.getYear();
            if (year >= dateRef.value) {
                resumesExp.value.push(experience);
            }
        });
    }

    const getSkills = () => {
        const uniqueSkillsMap = new Map();

        resumesExp.value[0].projects.forEach(project => {
            project.skills.forEach(skill => {
                if (!uniqueSkillsMap.has(skill.id)) {
                    uniqueSkillsMap.set(skill.id, { ...skill, projects_count: 0 });
                }
                uniqueSkillsMap.get(skill.id).projects_count++;
            });
        });

        const skillsFromProps = props.data.skills;
        uniqueSkillsMap.forEach(uniqueSkill => {
            const matchingSkill = skillsFromProps.find(skill => skill.id === uniqueSkill.id);
            if (matchingSkill) {
                uniqueSkill.projects_count = matchingSkill.projects_count;
            }
        });

        skills.value = Array.from(uniqueSkillsMap.values());
    };

    watch(() => dateRef.value, () => getExperience());

    onMounted(() => {
        resumes.value = props.data;
        getExperience();
        getSkills();
        skillsPart1.value = skills.value.slice(0, Math.ceil(skills.value.length / 2));
        skillsPart2.value = skills.value.slice(Math.ceil(skills.value.length / 2), skills.value.length);
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
                                        :style="{ width: (item.projects_count * 100 / resumes.countProjects).toFixed(0) + '%' }">
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
                                    :style="{ width: (item.projects_count * 100 / resumes.countProjects).toFixed(0) + '%' }"
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
                                <div v-if="technology.category.id == category.id" class="flex flex-col justify-center w-full h-full my-4">
                                    <div class="text-[#00283a] dark:text-white mx-2 flex items-center gap-2">
                                        <img class="h-[40px] w-[40px] object-cover object-center" :src="technology.image" :alt="technology.alt">
                                        <span>{{ technology.name }}</span>
                                    </div>
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

            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Expériences</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>

            <!-- Experiences content -->
            <TransitionGroup name="list" tag="div" class="flex flex-wrap flex-col lg:flex-row justify-between items-center w-full lg:gap-8">
                <div class="w-full lg:w-[48%] m-auto" v-for="experience in resumesExp" :key="experience.id">
                    <RouterLink :to="`/experience/${experience.slug}`">
                    <Card :withLink="false" class="h-auto" :class="experience.isTraining == true ? 'trapeze' : ''">
                        <template #other>
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col">
                                    <h2 class="text-xl font-bold tracking-wide">{{ experience.job }}</h2>
                                    <h5 class="text-sm">Du {{ changeFormatDate(experience.start_date) }} au {{ changeFormatDate(experience.end_date) }}</h5>
                                    <h5 class="text-sm">Chez <b>{{ experience.business.name }}</b></h5>
                                </div>
                                <p class="text-xs">{{ experience.description.substring(0, 50) }}...</p>
                                <a class="text-[#70ba65] uppercase text-[11px] font-bold tracking-wide group" href="#">
                                    <span class="mr-2">En savoir plus</span>
                                    <i class="fas fa-arrow-right group-hover:ml-1 group-hover:text-sm transition-all duration-300 ease-in-out"></i>
                                </a>
                            </div>
                        </template>
                    </Card>
                    </RouterLink>
                </div>
            </TransitionGroup>
            <div class="text-center" v-if="dateRef == 123">
                <div @click.prevent="dateRef = 0" class="border-[2px] border-[#00283a] dark:border-[#fcfcfe] bg-transparent text-[#00283a] dark:text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] w-full lg:w-auto uppercase text-[9px] sm:text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center cursor-pointer">
                    Voir les experiences avant ma reconvertion
                    <i class="fa-solid fa-eye mt-[-2px] ml-3"></i>
                </div>
            </div>
            <div class="text-center" v-else>
                <div @click.prevent="dateRef = 123" class="border-[2px] border-[#00283a] dark:border-[#fcfcfe] bg-transparent text-[#00283a] dark:text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] w-auto uppercase text-[9px] sm:text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center cursor-pointer">
                    Cacher avant reconvertion
                    <i class="fa-solid fa-eye-slash mt-[-2px] ml-3"></i>
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

    .list-enter-active,
    .list-leave-active {
        transition: all .8s ease-in-out;
    }
    .list-enter-from,
    .list-leave-to {
        opacity: 0;
        transform: translateY(-100%);
    }

    .trapeze::after {
        content: 'Formation';
        position: absolute;
        color: #00151f;
        text-align: center;
        padding: 0.4rem;
        font-size: 0.7rem;
        width: 100px;
        height: 30px;
        top: 5%;
        right: -6%;
        background-color: yellow;
        clip-path: polygon(30% 0%, 70% 0%, 100% 100%, 0% 100%);
        transform: rotate(45deg);
        box-shadow: 10px 10px 3px rgba(0, 0, 0, 0.5);
    }

</style>