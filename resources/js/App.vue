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
    <section class="w-3/5 mx-auto bg-white shadow-2xl scrollbar scrollbar-track-sky-500">
        <header>
            <Transition name="fadeHeight">
                <div v-if="isVisible" class="flex justify-center items-center bg-left transition-height" style="background-image: linear-gradient(rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0.4)), url('http://resumewolff.test/images/christopher-gower-m_HRfLhgABo-unsplash.jpg');">
                    <div class="w-1/2 z-10 [text-shadow:_0_1px_0_rgb(0_0_0_/_40%)]">
                        <h3 class="text-md font-display px-10 text-red-600 my-10">Bonjour je m'appelle</h3>
                        <h1 class="text-7xl font-display font-semibold px-10">WOLFF</h1>
                        <h1 class="text-7xl font-display font-semibold px-10">GREGORY</h1>
                        <div class="bg-red-600 w-1/4 h-2 m-10"></div>
                        <h3 class="text-lg font-display px-10 my-10 text-gray-900">Développeur Web / Web mobile</h3>
                    </div>
                    <img class="scale-x-[-1]" src="../../public/images/Messenger_creation_2459b9ac-69bc-49e4-a15d-3d4925afa9a3-removebg-preview.png" alt="">
                </div>
            </Transition>
            <ul class="bg-slate-800 h-12 flex">
                <RouterLink to="#" class="bg-red-800 w-1/2 h-full text-white flex justify-center items-center font-display"><li>Contacter par mail</li></RouterLink>
                <RouterLink to="#" class="w-1/2 h-full text-white flex justify-center items-center font-display"><li >Télécharger le CV en pdf.</li></RouterLink>
            </ul>
        </header>
        <RouterView/>
    </section>
</template>

<style>

    .fadeHeight-enter-active,
    .fadeHeight-leave-active {
        transition: all 0.2s;
        max-height: auto;
    }
    .fadeHeight-enter,
    .fadeHeight-leave-to {
        opacity: 0;
        max-height: 0px;
    }

</style>