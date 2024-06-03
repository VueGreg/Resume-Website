<script setup>

    import { ref, onMounted } from 'vue';
    import LayoutPage from '../Layout/LayoutPage.vue';
    import simpleCard from '../components/simpleCard.vue';
    import axios from 'axios';

    const datas = ref({
        1: {
            count: 1,
            text: "Experience de code",
        },
        2: {
            count: 5,
            text: "Projets terminés",
        },
        3: {
            count: 3,
            text: "Projets en cours"
        },
    });

    const informations = ref([]);

    const getInformations = async() => {
        try {
            const response = await axios.get('http://resumewolff.test/api/curriculum');
            informations.value = response.data.informations[0];
        } catch (error) {
            console.error(error);
        }
    } 

    onMounted(() => {
        getInformations()
    })

</script>

<template>
    <LayoutPage title="Bienvenue sur mon CV en ligne !" textButton="Me contacter" link="contact">
        <template #content>
            <div class="lg:flex lg:justify-between gap-4 w-full">
                <simpleCard v-for="(data, index) in datas" :key="index"  :data="data" class="w-full"/>
            </div>
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Description</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">01</span>
            </h5>
            <div class="description shadow-lg mb-10 block relative bg-[#fcfcfe] dark:bg-[#00283a] text-[#00283a] dark:text-[#dedee0] p-10 rounded-[10px] italic text-base
                    before:contents-[''] before:absolute before:left-[30px] before:-top-2 before:h-2 before:w-[calc(100%-60px)] before:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                    >
                <p>{{ informations.description }}</p>
            </div>
            <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
                <span>Quelques images</span>
                <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
                <span class="text-[#919ca1] text-[11px]">02</span>
            </h5>
        </template>
    </LayoutPage>
</template>