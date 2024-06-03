<script setup>

    import { ref, onMounted, computed } from 'vue';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Textput from '../components/textput.vue';

    const skills = ref([]);
    const search = ref('');

    const props = defineProps({
        data: Object,
    })

    onMounted(() => {
        skills.value = props.data.skills
    });

    const filteredSkills = computed(() => {
        if (!search.value) return skills.value;
        return skills.value.filter(skill =>
            skill.name.toLowerCase().includes(search.value.toLowerCase())
        );
    })

</script>

<template>

    <LayoutPage title="Liste de mes compétences" textButton="Revenir à la page d'accueil" link="home">
        <template #content>
            <Card title="Rechercher une compétence" :withLink="false" class="h-auto">
                <template #other>
                    <span class="flex justify-between items-center gap-2">
                        <Textput modelValue="Rechercher" v-model="search"/>
                        <div @click.prevent="filteredSkills" class="flex justify-center items-center h-10 rounded-xl bg-[#70ba65] p-5">
                            <i class="fa-solid fa-magnifying-glass p-2 cursor-pointer"></i>
                        </div>
                    </span>
                </template>
            </Card>
            <div class="flex flex-wrap justify-between items-center w-full">
                <div class="w-[48%]" v-for="skill in filteredSkills" :key="skill.id">
                    <Card :title="skill.name" :url_image="skill.image" :alt_image="skill.alt" :withLink="false" class="h-auto"/>
                </div>
            </div>
        </template>

    </LayoutPage>

</template>