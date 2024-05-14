<script setup>

    import { RouterLink } from 'vue-router';
    import { ref } from 'vue';
    import { useDark, useToggle } from "@vueuse/core";

    const isDark = useDark();
    const toogleDark = useToggle(isDark);
    const isOpen = ref(false);

    const elementLink = ref({
        1: {
            name: "Acceuil",
            link: 'home'
        },
        2: {
            name: "Experiences",
            link: 'skill'
        },
        3: {
            name: "Formations",
            link: 'skill'
        },
        4: {
            name: "Compétences",
            link: 'skill'
        },
        5: {
            name: "Projets",
            link: 'skill'
        },
        6: {
            name: "Technologies",
            link: 'skill'
        },
    });

    const switchMode = () => {
        const switchButton = document.getElementById('switchButton');
        switchButton.classList.toggle('after:left-[50%]', !isDark.value);
        switchButton.classList.toggle('after:left-[1px]', isDark.value);
        toogleDark();
    };

</script>

<template>
    <teleport to='#scrollId'>
        <nav class="bg-[#fcfcfe] dark:bg-[#00283a] w-[98%] h-[80px] m-auto fixed top-[1rem] left-0 right-0 shadow-lg z-20 flex flex-row-reverse" :class="[ isOpen ? 'rounded-t-lg' : 'rounded-lg']">
            <!-- mobile button -->
            <div class="flex justify-center items-center lg:hidden">
                <button x-cloak @click="isOpen = !isOpen" type="button" class="text-[#fcfcfe] dark:text-[#7a7a7a] hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400">
                    <i v-if="isOpen" class="fa-solid fa-xmark w-8 h-8 m-4 text-3xl"></i>
                    <i v-else class="fa-solid fa-bars w-8 h-8 m-4 text-3xl"></i>
                </button>
            </div>

            <!-- Desktop solution-->
            <div class="w-full hidden lg:flex justify-center items-center">
                <ul class="text-sm text-[#919ca1] tracking-wider flex justify-center">
                    <li class="h-[80px] relative list-none flex justify-center items-center text-[11px]" v-for="(element, key) in elementLink" :key="key">
                        <RouterLink :to="{ name : element.link }" class="whitespace-nowrap h-full w-full px-[20px] leading-[80px] text-[#00283a] hover:text-[#70ba65] uppercase tracking-[2px] font-bold dark:text-[#dedee0] dark:hover:text-[#70ba65]"
                                    active-class="after:contents-[''] after:w-full after:bottom-0 after:left-0 after:absolute after:rounded-[10px] after:h-[4px] after:bg-[#70ba65]"
                        >
                            {{ element.name }}
                        </RouterLink>
                    </li>
                </ul>
                <div class="ml-[50px] flex justify-center items-center">
                    <i class="far fa-sun text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                    <label 
                        id="switchButton"
                        for="switch"
                        @click="switchMode()" 
                        class="bg-[#f4f5f7] rounded-[2em] p-[2px] w-[45px] h-[23px] relative cursor-pointer after:contents-[''] shadow-inner dark:bg-[#02162b] after:w-[45%] after:h-[90%] after:rounded-full after:border-[3px] after:border-[#70ba65] after:left-[50%] after:block after:absolute after:bg-[#f4f5f7] dark:after:bg-[#00283a]"
                    ></label>
                    <i class="far fa-moon text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                </div>
                <div class="ml-[30px] h-[40px] px-[25px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-300 duration-110 transition-all cursor-pointer">
                    Télécharger CV 
                    <i class="fas fa-arrow-down mt-[-2px] ml-3"></i>
                </div>
            </div>

            <!-- mobile solution-->
            <div class="w-full flex justify-center items-center lg:hidden">
                <div class="ml-[30px] h-[40px] px-[25px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-300 duration-110 transition-all cursor-pointer">
                    Télécharger CV 
                    <i class="fas fa-arrow-down mt-[-2px] ml-3"></i>
                </div>
                <ul class="text-sm text-[#919ca1] tracking-wider absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out top-20 rounded-b-lg bg-[#fcfcfe] dark:bg-[#00283a]" :class="[isOpen ? 'translate-y-0 opacity-100 duration-500' : 'opacity-0 -translate-y-full top-0 duration-500']">
                    <li class="h-[80px] relative list-none flex justify-center items-center text-[11px]" v-for="(element, key) in elementLink" :key="key">
                        <RouterLink :to="{ name : element.link }" class="whitespace-nowrap h-full w-full px-[20px] leading-[80px] text-center text-[#00283a] hover:text-[#70ba65] uppercase tracking-[2px] font-bold dark:text-[#dedee0] dark:hover:text-[#70ba65]"
                                    active-class="font-extrabold text-[#70ba65] dark:text-[#70ba65]"
                        >
                            {{ element.name }}
                        </RouterLink>
                    </li>
                    <div class="m-4 flex justify-center items-center">
                        <i class="far fa-sun text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                        <label 
                            id="switchButton"
                            for="switch"
                            @click="switchMode()" 
                            class="bg-[#f4f5f7] rounded-[2em] p-[2px] w-[45px] h-[23px] relative cursor-pointer after:contents-[''] shadow-inner dark:bg-[#02162b] after:w-[45%] after:h-[90%] after:rounded-full after:border-[3px] after:border-[#70ba65] after:left-[50%] after:block after:absolute after:bg-[#f4f5f7] dark:after:bg-[#00283a]"
                        ></label>
                        <i class="far fa-moon text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                    </div>
                </ul>
            </div>
        </nav>
    </teleport>
</template>