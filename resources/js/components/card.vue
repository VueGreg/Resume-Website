<script setup>

    import { ref } from 'vue';

    const props = defineProps({
        data: String
    });

    const shortText = ref(props.data.description.substring(0, 50));

</script>

<template>   
    <div class="max-w-2xl px-8 py-4 bg-gray-300 rounded-lg mx-auto my-5 shadow-xl">
        <div class="flex items-center justify-between">
            <span class="text-sm font-light text-gray-600">De {{ data.start_date }} à {{ data.end_date }}</span>
        </div>

        <div class="mt-2">
            <h2 class="text-xl font-bold text-gray-700">{{ data.title }}</h2>
            <p class="mt-2 text-gray-600">{{ shortText }}...</p>
        </div>

        <div class="flex items-center justify-between mt-4">
            <a href="#" class="text-blue-600 hover:underline" tabindex="0" role="link">En savoir plus</a>
        </div>
    </div> 
</template>