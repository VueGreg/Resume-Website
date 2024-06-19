<script setup>

    import { ref, onMounted, onUnmounted } from 'vue';

    const props = defineProps({
        data: Object,
    });

    const count = ref(0);

    onMounted(() => {
        const interval = setInterval(() => {
            if (count.value < props.data.count) {
                count.value += 1;
            }
        }, 100);

        onUnmounted(() => {
            clearInterval(interval);
        });
    });

</script>


<template>

    <div class="text-center rounded-[10px] p-[55px] shadow-lg bg-[#fcfcfe] dark:bg-[#00283a] mb-[40px] relative
                before:contents-[''] before:absolute before:left-8 before:-top-2 before:h-2 before:w-[calc(100%-64px)] before:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                >
        <div class="text-3xl font-black text-[#00283a] dark:text-[#dedee0] leading-5">
            <span>{{ count }}</span>
            <span class="text-[#70ba65] text-base ml-[3px] relative -top-1"> +</span>
        </div>
        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-gray-300 dark:border-b-[#224454] w-full my-5"></div>
        <div class="uppercase text-xs font-bold tracking-wide text-[#00283a] dark:text-[#dedee0]">
            <span>{{ data.text }}</span>
        </div>
    </div>

</template>