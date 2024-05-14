<script setup>

    import { onMounted } from 'vue';
    import useProfil from './services/_profil.js';

    const { updateText, displayedText } = useProfil();
    const texts = ['Développeur Web','Dev web mobile', 'Passionné', 'Créatif'];

    onMounted(() => {
        updateText('write', texts);
    });

</script>


<template>
<div class="relative -translate-y-[410px] z-10 w-1/3 -top-[25rem]">
    <div class="px-[40px] py-[20px] bg-[#fcfcfe] dark:bg-[#00283a] flex flex-col justify-start w-full h-[calc(100vh)] rounded-[10px] shadow-md">
        <div class="text-center">
            <div class="relative inline-block mb-[20px] text-center">
                <img class="border-[3px] border-[#00283a] shadow-md w-[200px] h-[200px] rounded-full object-cover object-top mb-10" src="http://resumewolff.test/images/Moi-removebg-preview.png" alt="">
                <h5 class="text-[18px] py-1 font-extrabold text-[#dedee0]">Grégory WOLFF</h5>
                <span id="autotext" class="text-[11px] uppercase tracking-wide font-bold pr-[1px] text-[#919ca1] border-r-2 border-transparent transition-colors duration-500 animate-blink">
                    Je suis {{ displayedText }}
                </span>
            </div>
        </div>
        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>
        <div class="social flex justify-center">
            <a class="text-[#dedee0] mx-[10px]" href="https://linkedin.com" target="_blank" title="Linkedin">
                <i class="fab fa-linkedin"></i>
            </a>
            <a class="text-[#dedee0] mx-[10px]" href="https://github.com/" target="_blank" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>
        <ul>
            <li class="flex justify-between mb-[10px]">
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#dedee0]">Pays:</div>
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#919ca1]">France</div>
            </li>
            <li class="flex justify-between mb-[10px]">
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#dedee0]">Ville:</div>
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#919ca1]">Zoufftgen</div>
            </li>
            <li class="flex justify-between mb-[10px]">
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#dedee0]">Age:</div>
                <div class="uppercase text-[11px] font-bold tracking-wide text-[#919ca1]">36 ans</div>
            </li>
        </ul>
        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>
        <div class="text-center">
            <div class="h-[45px] px-[35px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-300 duration-110 transition-all cursor-pointer">
                Me contacter
                <i class="fas fa-envelope mt-[-2px] ml-3"></i>
            </div>
        </div>
    </div>
</div>
</template>

<style>
    @keyframes blink {
    0% {
        border-color: transparent;
    }
    50% {
        border-color: white;
    }
    100% {
        border-color: transparent;
    }
    }

    .animate-blink {
    animation: blink 1s infinite;
    }
</style>