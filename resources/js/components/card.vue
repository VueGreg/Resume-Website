<script setup>

    import { ref } from 'vue';

    const props = defineProps({
        url_image: String,
        alt_image: String,
        title: String,
        text: {
            required: false,
            type: String,
            default: '',
        },
        withLink: {
            default: true,
            type: Boolean,
        }
    });

    const shortText = ref(props.text.substring(0, 50));

</script>

<template>   
    <div class="p-[40px] bg-[#fcfcfe] dark:bg-[#00283a] rounded-lg shadow-lg mb-10 relative text-[#00283a] dark:text-[#dedee0] h-[300px] flex flex-col justify-between
                before:contents-[''] before:absolute before:left-8 before:-top-2 before:h-2 before:w-[calc(100%-60px)] before:bg[#f4f5f7] before:dark:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                >
        <div v-if="props.url_image" class="w-12 h-12 mb-5 relative">
            <div class="icon">
                <img class="w-full absolute top-0 left-0 right-0" :src="props.url_image" :alt="props.alt_image">
            </div>
        </div>
        <h6 v-if="props.title" class="mb-5 font-extrabold text-[1rem]">{{ props.title }}</h6>
        <p v-if="props.text" class="text-[#919ca1] text-[14px] font-normal">{{ shortText }}...</p>
        <a v-if="props.withLink" class="text-[#70ba65] uppercase text-[11px] font-bold tracking-wide group" href="#">
            <span class="mr-2">En savoir plus</span>
            <i class="fas fa-arrow-right group-hover:ml-1 group-hover:text-sm transition-all duration-300 ease-in-out"></i>
        </a>

        <slot name="other"></slot>
    </div> 
</template>