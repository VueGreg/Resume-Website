<script setup>

    import { watch, ref, onMounted } from 'vue';
    import { useRoute } from 'vue-router';
    import profil from './components/profil.vue';
    import navbar from './components/navbar.vue';

    const route = useRoute();
    const isVisible = ref(true);

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

            if (image && content) {
                image.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop * -1.2}, 0, 1)`;
                content.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop/4}, 0, 1)`;
                profil.style.transform = `matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, ${scrollTop*-1}, 0, 1)`;
            }

            if (scrollTop < 0) {
                profil.classList.replace('-top-[25rem]', '-top-[30rem]');
            }else {
                profil.classList.replace('-top-[30rem]', '-top-[25rem]');
            }

            if(scrollTop < -160) {
                profil.classList.remove('transition-transform', 'ease-in' ,'duration-100')
            }else profil.classList.add('transition-transform' ,'ease-in', 'duration-100')
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

    onMounted(observeStyleChanges);

</script>

<template>
    <navbar/>
    <div class="ml-[40px] mr-[40px] ">
        <div class="h-[560px] w-full relative overflow-hidden rounded-b-[20px] z-10">
            <img id="image" class="-z-1 absolute w-full h-full bg-cover bg-bottom object-cover" src="https://trueman.bslthemes.com/wp-content/uploads/2021/11/slide-1-scaled-1920x1080.jpg" alt="">
        </div>
    </div>
    <div class="w-3/5 m-auto flex justify-between h-full">
        <profil id="profil"/>
        <RouterView id="content" class="-top-[400px]"/>
    </div>
</template>

<style>

    #image {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 68.2, 0, 1);
    }

    #content {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
    }

    #profil {
        transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
    }

</style>