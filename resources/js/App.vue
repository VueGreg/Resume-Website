<script setup>

    import { watch, ref } from 'vue';
    import { RouterView, useRoute } from 'vue-router';
    import navbar from './components/navbar.vue';

    const route = useRoute();
    const isVisible = ref(true);

    watch(() => route.name, () => {
        route.name != "home" ? isVisible.value = false : isVisible.value = true;
    })

</script>

<template>
    <navbar/>
</template>