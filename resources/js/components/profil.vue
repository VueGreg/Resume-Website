<script setup>

    import { onMounted, ref } from 'vue';
    import useProfil from './services/_profil.js';
    import { useRouter } from 'vue-router';

    const { updateText, displayedText } = useProfil();
    const texts = ['Développeur Web','Dev web mobile', 'Passionné', 'Créatif'];
    const router = useRouter();

    const props = defineProps({
        data: Object,
    })

    const goToContact = () => {
        router.push({ name: 'contact'});
    }

    const getAge = () => {
        const dateNow = new Date()
        const calc = props.data.birthday.slice(0, 4)
        props.data.age = dateNow.getFullYear() - calc;
    }

    onMounted(() => {
        updateText('write', texts);
        getAge();
    });

</script>


<template>
<div class="relative -translate-y-[410px] z-10 -top-[5rem] lg:-top-[25rem] h-[88vh]">
    <div class="px-[40px] py-[20px] bg-[#fcfcfe] dark:bg-[#00283a] h-full flex flex-col justify-start w-full rounded-[10px] shadow-md">
        <div class="text-center">
            <div class="relative mb-[20px] text-center flex flex-col justify-center items-center">
                <img class="border-[3px] border-[#fcfcfe] dark:border-[#00283a] shadow-md w-[110px] lg:w-[200px] h-[110px] lg:h-[200px] rounded-full object-cover object-top mb-10" src="http://resumewolff.test/images/Moi-removebg-preview.png" alt="">
                <h5 class="text-[18px] py-1 font-extrabold text-[#00283A] dark:text-[#dedee0]">Grégory WOLFF</h5>
                <span id="autotext" class="text-[11px] mt-2 uppercase tracking-wide font-extrabold pr-[1px] text-[#919ca1] border-r-2 border-transparent transition-colors duration-500 animate-blink">
                    Je suis {{ displayedText }}
                </span>
            </div>
        </div>

        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>

        <div class="social flex justify-center text-[#00283A] dark:text-[#dedee0]">
            <a class="mx-[10px]" :href="data.linkedin" target="_blank" title="Linkedin">
                <i class="fab fa-linkedin"></i>
            </a>
            <a class="mx-[10px]" :href="data.github" target="_blank" title="GitHub">
                <i class="fab fa-github"></i>
            </a>
        </div>

        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>

        <ul class="text-[#00283A] dark:text-[#dedee0] font-extrabold text-[11px] uppercase tracking-wide">
            <li class="flex justify-between mb-[10px]">
                <div>Ville:</div>
                <div class="font-bold text-[#919ca1]">{{ data.country }}</div>
            </li>
            <li class="flex justify-between mb-[10px]">
                <div>Pays:</div>
                <div class="font-bold text-[#919ca1]">{{ data.city }}</div>
            </li>
            <li class="flex justify-between mb-[10px]">
                <div>Age:</div>
                <div class="font-bold text-[#919ca1]">{{ data.age }} ans</div>
            </li>
        </ul>
        <div class="divider h-[1px] border-dotted border-b-[2px] border-b-[#224454] my-[40px]"></div>
        <div class="text-center">
            <div @click.prevent="goToContact" class="h-[45px] px-[35px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-300 duration-110 transition-all cursor-pointer">
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