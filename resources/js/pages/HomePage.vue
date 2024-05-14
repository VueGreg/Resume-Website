<script setup>

    import { ref } from 'vue';
    import simpleCard from '../components/simpleCard.vue';

    const datas = ref({
        1: {
            count: 1,
            text: "Experience de code",
        },
        2: {
            count: 5,
            text: "Projets terminés",
        },
        3: {
            count: 3,
            text: "Projets en cours"
        },
    })

</script>

<template>
    <div class="relative -translate-y-[410px] z-10 w-2/3 pl-10">
        <h1 class="mr-[20px] mb-[30px] font-black text-[64px] text-[#fcfcfe] drop-shadow-md">
            Bienvenue sur <br> mon CV en ligne !
        </h1>
        <div class="text-left">
            <div class="border-[2px] border-[#fcfcfe] bg-transparent text-[#fcfcfe] drop-shadow-3xl shadow-lg whitespace-nowrap h-[45px] uppercase text-[11px] font-bold tracking-wide rounded-[30px] inline-flex px-[35px] mb-20 justify-center items-center">
                Me contacter
                <i class="fas fa-play mt-[-2px] ml-3"></i>
            </div>
        </div>
        <div class="flex justify-between w-full">
            <simpleCard v-for="(data, index) in datas" :key="index"  :data="data"/>
        </div>
        <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#dedee0] text-xl font-bold">
            <span>Description</span>
            <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-[#224454] m-2"></span>
            <span class="text-[#919ca1] text-[11px]">01</span>
        </h5>
        <div class="description shadow-lg mb-10 block relative bg-[#00283a] text-[#dedee0] p-10 rounded-[10px] italic text-[16px]
                before:contents-[''] before:absolute before:left-[30px] before:-top-2 before:h-2 before:w-[calc(100%-60px)] before:bg-[#00283a] before:rounded-t-[5px] before:opacity-[0.3]"
                >
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ab laborum obcaecati placeat distinctio quasi similique, repellat officiis fugit ullam exercitationem ipsa doloribus dolorum expedita et quae sint. Ipsum, ducimus laudantium?</p>
        </div>
        <h5 class="mb-10 flex justify-center items-center whitespace-nowrap text-[#dedee0] text-xl font-bold">
            <span>Quelques images</span>
            <span class="h-[1px] w-full border-dotted border-b-[2px] border-b-[#224454] m-2"></span>
            <span class="text-[#919ca1] text-[11px]">02</span>
        </h5>
    </div>
</template>