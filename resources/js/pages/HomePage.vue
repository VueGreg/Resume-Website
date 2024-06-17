<script setup>

    import { ref, onMounted, watch } from 'vue';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import simpleCard from '../components/simpleCard.vue';
    import card from '../components/card.vue';

    const cards = ref({
        1: {
            count: 1,
            text: "Experience de code",
        },
        2: {
            count: 5,
            text: "Projets",
        },
        3: {
            count: 3,
            text: "Compétences aquis"
        },
    });

    const props = defineProps({
        data: Object,
    })

    const informations = ref([]);

    onMounted(() => {
        informations.value = props.data.informations[0];
        cards.value[2].count = props.data.countProjects;
        cards.value[3].count = props.data.countSkills;
    })

</script>

<template>
    <LayoutPage title="Bienvenue sur mon CV en ligne !" textButton="Me contacter" link="contact">
        <template #content>
            <div class="lg:flex lg:justify-between gap-4 w-full">
                <simpleCard v-for="(data, index) in cards" :key="index"  :data="data" class="w-full"/>
            </div>
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Description</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>
            <card :withLink="false" class="h-auto italic">
                <template #other>
                    <p>{{ informations.description }}</p>
                </template>
            </card>
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Quelques images</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>
        </template>
    </LayoutPage>
</template>