<script setup>

    import { watch, ref, onMounted } from 'vue';
    import { RouterView, useRoute } from 'vue-router';
    import profil from './components/profil.vue';
    import navbar from './components/navbar.vue';
    import useAxios from './axios';
    import Modal from './components/Modal.vue';

    const route = useRoute();
    const isVisible = ref(true);
    const { datas, errors, getResume, isLoading, resetIsLoading } = useAxios();

    const handleScroll = () => {
        const appElement = document.querySelector('.scroll-content');
        const transformValue = window.getComputedStyle(appElement).transform;
        const match = transformValue.match(/matrix\(([^)]+)\)/);

        if (match) {
            const values = match[1].split(',').map(value => parseFloat(value.trim()));
            const scrollTop = parseFloat(values[5]);

            const image = document.getElementById('image');
            const content = document.getElementById('content');
            const profil = document.getElementById('profil');
            const title = document.getElementById('title');

            if (title) {
                title.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop}, 0, 1)`;
            }

            if (image && content) {
                image.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop * -1.2}, 0, 1)`;
                if (window.innerWidth > 1024) {
                    profil.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop*-1}, 0, 1)`;
                    content.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop/5}, 0, 1)`;
                }
            }

            if (scrollTop < 0) {
                profil.classList.replace('lg:-top-[25rem]', 'lg:-top-[30rem]');
            }else {
                profil.classList.replace('lg:-top-[30rem]', 'lg:-top-[25rem]');
            }
        }
    };

    watch(() => route.name, () => {
        isVisible.value = route.name === "home";
    })

    const handleStyleChange = () => {
        handleScroll();
    };

    const observeStyleChanges = () => {
        const scrollContentElement = document.querySelector('.scroll-content');
        const observer = new MutationObserver(handleStyleChange);
        observer.observe(scrollContentElement, { attributes: true, attributeFilter: ['style'] });
    };

    onMounted(() => {
        getResume();
        observeStyleChanges();
    });

</script>

<template>
    <navbar/>
    <div class="lg:ml-[40px] lg:mr-[40px] transition-all duration-1000">
        <div class="h-[440px] lg:h-[560px] w-full relative overflow-hidden rounded-b-[20px] -z-20">
            <Transition name="fade">
                <img v-if="route.name === 'curriculum'" key="curriculum-image"
                     class="absolute w-full h-full bg-cover bg-bottom object-cover -z-20"
                     src="https://trueman.bslthemes.com/wp-content/uploads/2021/11/slide-3-scaled-1920x1279.jpg"
                     alt=""
                     id="image"
                />
                <img v-else key="default-image"
                     class="absolute w-full h-full bg-cover bg-bottom object-cover -z-20"
                     src="https://trueman.bslthemes.com/wp-content/uploads/2021/11/slide-1-scaled-1920x1080.jpg"
                     alt=""
                     id="image"
                />
            </Transition>
        </div>
    </div>
    <div v-if="isLoading" @close="resetIsLoading">
        <Modal :show="isLoading">
            <template #default>
                <div class="h-[10vh] flex justify-center items-center">
                    <h1 class="font-bold text-2xl">Chargement en cours...</h1>
                </div>
            </template>
        </Modal>
    </div>
    <div v-else class="w-[80%] lg:w-4/5 2xl:w-3/5 m-auto lg:flex lg:justify-between h-full z-10">
        <profil id="profil" class="lg:w-1/3 z-10" :data="datas.informations[0]"/>

        <div class="transition-container lg:w-2/3 relative z-50 top-0 lg:-top-[400px]">
            <RouterView v-slot="{ Component, route }" id="content" class="w-full">
                <Transition :name="route.meta.transition || 'slide'">
                    <component :is="Component" :key="route.path" :data="datas"/>
                </Transition>
            </RouterView>
        </div>
    </div>
</template>

<style>

    #image {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 68.2, 0, 1);
        z-index: -20;
    }

    #content {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        position: relative;
        z-index: 10;
    }

    #profil {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
        transition: top 0.3s ease;
        z-index: 10;
    }

    /* Transition for image */
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.8s ease;
    }
    .fade-enter, .fade-leave-to {
        opacity: 0;
    }


    /* Slide Transition */
    .slide-enter-active, .slide-leave-active {
        transition: all 0.8s ease;
        position: absolute;
        width: 100%;
        height: 100%;
        z-index: 10;
    }

    .slide-enter {
        transform: translateX(100%);
        opacity: 0;
    }

    .slide-leave-to {
        transform: translateX(-100%);
        opacity: 0;
    }

    .transition-container {
        position: relative;
        overflow: hidden;
        width: 100%;
        height: 100%;
        z-index: 10;
    }

</style>