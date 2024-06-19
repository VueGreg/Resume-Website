<script setup>

    import { ref, onMounted, onUnmounted, watch } from 'vue';

    const props = defineProps({
        items: {
            type: Array,
            required: true,
        },
        withIndicator: {
            type: Boolean,
            default: true,
        },
        autoPlay: {
            type: Boolean,
            default: false,
        },
        autoPlayInterval: {
            type: Number,
            default: 8000,
        },
        height : {
            type: String,
            default: 160,
        }
    });

    const sliderNumber = ref(0);
    const activeIndex = ref(0);
    let intervalId = null;

    const nextSlide = () => {
        sliderNumber.value = (sliderNumber.value + 1) % props.items.length;
    };

    const prevSlide = () => {
        sliderNumber.value = (sliderNumber.value - 1 + props.items.length) % props.items.length;
    };

    const startAutoPlay = () => {
        if (props.autoPlay) {
            intervalId = setInterval(nextSlide, props.autoPlayInterval);
        }
    };

    const stopAutoPlay = () => {
        if (intervalId) {
            clearInterval(intervalId);
        }
    };

    onMounted(() => {
        startAutoPlay();
    });

    onUnmounted(() => {
        stopAutoPlay();
    });

    watch(() => props.autoPlay, (newVal) => {
        if (newVal) {
            startAutoPlay();
        } else {
            stopAutoPlay();
        }
    });

    watch(() => sliderNumber.value, (newValue) => {
        activeIndex.value =  newValue
    })

</script>

<template>
    <div id="default-carousel" class="relative w-full" :class="'h-[' + height + 'px]'">
        <div class="relative h-40 overflow-hidden rounded-lg" :class="'h-[' + height + 'px]'">
            <TransitionGroup name="list" tag="div">
            <div v-for="(item, index) in items" :key="index" :id="'carousel-item-' + index" v-show="index === sliderNumber" class="absolute top-10 w-full h-full flex items-center justify-center">
                <div class="absolute h-full m-auto -translate-x-1/2 -translate-y-1/2 top-[25%] left-1/2 rounded-lg shadow-lg p-10 bg-[#fcfcfe] dark:bg-[#00283a] flex justify-center items-center"
                    :class="autoPlay == true ? 'w-full' : 'w-[80%]'"
                    >
                    <slot :item="item" :activeIndex="activeIndex"></slot>
                </div>
            </div>
            </TransitionGroup>
        </div>

        <!-- Slider indicators -->
        <div v-if="withIndicator" class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
            <button v-for="(item, index) in items" :key="index" type="button" class="w-3 h-3 rounded-full" :class="index === sliderNumber ? 'bg-slate-300' : 'bg-slate-600'" @click="sliderNumber = index; updateSlides()"></button>
        </div>

        <!-- Slider controls -->
        <button 
            @click.prevent="prevSlide" 
            type="button" 
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            v-if="!autoPlay"
            >
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>

        <button 
            @click.prevent="nextSlide" 
            type="button" 
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            v-if="!autoPlay"
            >
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
</template>

<style scoped>

    .list-enter-active,
    .list-leave-active {
        transition: all 2s ease-in-out;
    }
    .list-enter-from {
        opacity: 0;
        transform: translateX(100%);
    }
    .list-enter-to {
        opacity: 1;
        transform: translateX(0);
    }
    .list-leave-from {
        opacity: 1;
        transform: translateX(0);
    }
    .list-leave-to {
        opacity: 0;
        transform: translateX(-100%);
    }

</style>