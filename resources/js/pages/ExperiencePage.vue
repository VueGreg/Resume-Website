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

    const getExperience = (slug) => {
        props.data.experiences.forEach(element => {
            if (element.slug === slug) {
                experience.value = element
            }
        });
    }

    onMounted(() => {
        getExperience(route.params.slug);
    })

</script>

<template>
    <LayoutPage :title="experience.title" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <Card :withLink="false">
                <template #other>
                    <div>
                        <h1>{{ experience.title }}</h1>
                    </div>
                </template>
            </Card>
        </template>
    </LayoutPage>
</template>