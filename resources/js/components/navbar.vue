<script setup>

    import { RouterLink } from 'vue-router';
    import { ref } from 'vue';
    import { useDark, useToggle } from "@vueuse/core";

    const isDark = useDark({
        disableTransition: false,
    });
    const toggleDark = useToggle(isDark);
    const isOpen = ref(false);

    const elementLink = ref({
        1: { name: "Accueil", link: 'home' },
        2: { name: "Curriculum", link: 'curriculum' },
        3: { name: "Projets", link: 'project' },
        4: { name: "Contact", link: 'contact' },
        5: { name: "Connection", link: 'connexion' }
    });

    const switchMode = () => {
        toggleDark();
    };

</script>

<template>
    <teleport to='#scrollId'>
        <nav class="bg-[#fcfcfe] dark:bg-[#00283a] lg:w-[98%] h-[80px] m-auto fixed top-0 lg:top-[1rem] left-0 right-0 shadow-lg z-30 flex flex-row-reverse" :class="[ isOpen ? 'rounded-t-lg' : 'lg:rounded-lg rounded-b-lg']">
            <!-- mobile button -->
            <div class="flex justify-center items-center cursor-pointer lg:hidden">
                <button x-cloak @click.prevent="isOpen = !isOpen" type="button" class="text-[#fcfcfe] dark:text-[#7a7a7a] hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400">
                    <i v-if="isOpen" key="1" class="fa-solid fa-xmark w-8 h-8 m-4 text-3xl"></i>
                    <i v-else key="2" class="fa-solid fa-bars w-8 h-8 m-4 text-3xl"></i>
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
                        class="bg-[#f4f5f7] rounded-[2em] p-[2px] w-[45px] h-[23px] relative cursor-pointer 
                                    shadow-inner dark:bg-[#02162b]"
                        >
                        <span class="absolute block w-[45%] h-[90%] rounded-full border-[3px] border-[#70ba65] bg-[#f4f5f7] dark:bg-[#00283a]"
                              :class="{ 'animation-light': isDark, 'animation-dark': !isDark }"
                        ></span>
                    </label>
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
                <Transition name="down" mode="out-in">
                    <ul v-if="isOpen" style="height: 80vh;" class="flex flex-col justify-around text-sm text-[#919ca1] tracking-wider absolute inset-x-0 z-20 w-full px-6 py-4 top-20 rounded-b-lg bg-[#fcfcfe] dark:bg-[#00283a]">
                        <li class="h-[80px] relative list-none flex justify-center items-center text-[11px]" v-for="(element, key) in elementLink" :key="key">
                            <RouterLink @click.prevent="isOpen = !isOpen" :to="{ name : element.link }" class="whitespace-nowrap h-full w-full px-[20px] leading-[80px] text-center text-[#00283a] hover:text-[#70ba65] uppercase tracking-[2px] font-bold dark:text-[#dedee0] dark:hover:text-[#70ba65]"
                                        active-class="font-extrabold text-[#70ba65] dark:text-[#70ba65]"
                            >
                                {{ element.name }}
                            </RouterLink>
                        </li>
                        <div class="flex justify-center items-center">
                            <i class="far fa-sun text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                            <label 
                                id="switchButton"
                                for="switch"
                                @click="switchMode()" 
                                class="bg-[#f4f5f7] rounded-[2em] p-[2px] w-[45px] h-[23px] relative cursor-pointer
                                            shadow-inner dark:bg-[#02162b]"
                                >
                                <span class="absolute block w-[45%] h-[90%] rounded-full top-[1px] border-[3px] border-[#70ba65] bg-[#f4f5f7] dark:bg-[#00283a]"
                                      :class="{ 'animation-light': isDark, 'animation-dark': !isDark }"
                                ></span>
                            </label>
                            <i class="far fa-moon text-[#7a7a7a] text-[11px] mx-[7px] dark:text-[#dedee0]"></i>
                        </div>
                    </ul>
                </Transition>
            </div>
        </nav>
    </teleport>
</template>


<style scoped>
    .down-enter-active, .down-leave-active {
        transition: all 0.5s ease-in-out;
    }
    .down-enter-from, .down-leave-to {
        opacity: 0;
        transform: translateY(-100%);
    }
    .down-enter-to, .down-leave-from {
        transform: translateY(0);
    }

    .animation-light {
        left: 23px;
        -webkit-transtition: left .5s ease-in-out;
        transition: left .5s ease-in-out;
    }

    .animation-dark {
        left: 1px;
        -webkit-transtition: left .5s ease-in-out;
        transition: left .5s ease-in-out;
    }
</style>