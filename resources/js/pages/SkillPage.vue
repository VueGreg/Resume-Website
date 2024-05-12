<script setup>

    import axios from 'axios';
    import { ref, computed } from 'vue';
    import Card from '../components/card.vue'

    const experiences = ref()

    const getExperiences = async() => {
        try {
            const response = await axios.get('http://resumewolff.test/api/experiences');
            experiences.value = response.data.data;
            console.log(experiences.value)
        } catch (error) {
            console.error('Error fetching experiences:', error);
        }
    };

    getExperiences();

</script>

<template>
    
    <div class="p-10">
        <h1>Mes expériences</h1>

        <div v-for="experience in experiences" :key="experience.id">
            <Card :data="experience"/>
        </div>
    </div>

</template>