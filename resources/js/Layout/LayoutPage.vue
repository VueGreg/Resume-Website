<script setup>
    
    import { useRouter } from 'vue-router';
    import { onMounted, onUnmounted, ref } from 'vue';
    import Footer from '../components/Footer.vue';
    import scrollbar from '../smoothScrollbar';

    defineProps({
        title: String,
        link: String,
        textButton: String,
    })

    const router = useRouter();

    const goTo = (route) => {
        router.push({ name: route })
    }

    const isMobile = ref(window.innerWidth <= 1024);

    const handleResize = () => {
        isMobile.value = window.innerWidth <= 1024;
    };

    const topPosition = ref(0);

    const updateTopPosition = () => {
        topPosition.value = scrollbar.scrollTop;
    };

    onMounted(() => {
        window.addEventListener('resize', handleResize);
        updateTopPosition();
        scrollbar.addListener(updateTopPosition)
    });

    onUnmounted(() => {
        window.removeEventListener('resize', handleResize);
    });

</script>

<template>

    <div class="relative -translate-y-[410px] lg:pl-10 m-auto transition-all duration-1000">
        <Teleport to="body" v-if="isMobile">
            <div id="title" class="title absolute first-letter w-[90%] top-[18%] lg:-top-[80vh] left-[calc((100%-90%)/2)] flex flex-col justify-center items-center text-center lg:text-left lg:items-start lg:static">
                <h1 class="lg:mr-[20px] mb-[30px] font-black text-[32px] lg:text-[64px] text-[#fcfcfe] drop-shadow-md">
                    {{ title }}
                </h1>
                <div class="text-left">
                    <div @click.prevent="goTo(link)" 
                        class="border-[2px] border-[#fcfcfe] bg-transparent text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] uppercase text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center cursor-pointer">
                        {{ textButton }}
                        <i class="fas fa-play mt-[-2px] ml-3"></i>
                    </div>
                </div>
            </div>
        </Teleport>

        <div v-else>
            <div class="title absolute first-letter top-[18%] lg:-top-[80vh] flex flex-col justify-center items-center text-center lg:text-left lg:items-start lg:static">
                <h1 class="lg:mr-[20px] mb-[30px] font-black text-[32px] lg:text-[64px] text-[#fcfcfe] drop-shadow-md">
                    {{ title }}
                </h1>
                <div class="text-left">
                    <div @click.prevent="goTo(link)" 
                        class="border-[2px] border-[#fcfcfe] bg-transparent text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] uppercase text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center cursor-pointer">
                        {{ textButton }}
                        <i class="fas fa-play mt-[-2px] ml-3"></i>
                    </div>
                </div>
            </div>
        </div>

        <slot name="content"></slot>


        <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#00283a] dark:text-[#dedee0] text-xl font-bold">
            <span></span>
            <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] m-2"></span>
            <span class="text-[#919ca1] text-[11px]"></span>
        </h5>
        
        <Transition name="slide-fade">
            <Footer v-if="topPosition > 1000" class="h-auto">
            </Footer>
        </Transition>
        
    </div>

</template>

<style scoped>

    .slide-fade-leave-active,
    .slide-fade-enter-active {
        transition: all .3s cubic-bezier(1, 0.5, 0.8, 1);
    }

    .slide-fade-enter-from,
    .slide-fade-leave-to {
        opacity: 0;
        transform: translateX(-100%);
        max-height: 0px;
    }

    .slide-fade-leave-from,
    .slide-fade-enter-to {
        max-height: 500px;
        opacity: 0;
    }

</style>