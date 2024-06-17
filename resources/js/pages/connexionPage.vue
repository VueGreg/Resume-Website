<script setup>

    import LayoutPage from '../Layout/LayoutPage.vue';
    import Card from '../components/card.vue';
    import Textput from '../components/textput.vue';

</script>

<template>
    <LayoutPage title="Connexion au tableau de bord" textButton="Revenir à l'accueil" link="home">
        <template #content>
            <Card :withLink="false" class="h-auto">
                <template #other>
                    <div class="flex flex-col items-center w-full gap-8">
                    <h2 class="text-3xl">Connexion</h2>
                    <p class="text-center text-sm">Le tableau de bord est en cours de réalisation, revenez prochainement pour une démonstration...<br> A très vite  <i class="fa-solid fa-face-laugh text-yellow-400"></i></p>
                    <form class="w-full">
                        <div class="flex flex-col gap-8 lg:w-1/2 lg:m-auto">
                            <Textput modelValue="e-mail" type="email"/>
                            <Textput modelValue="password" type="password"/>
                            <div class="flex flex-col lg:flex-row items-center my-2">
                            <div class="w-full lg:w-3/4 lg:m-auto h-[40px] px-[25px] whitespace-nowrap bg-[#70ba65] text-[#fcfcfe] uppercase text-[11px] font-bold rounded-full inline-flex justify-center items-center hover:bg-[#70ba65]/80 hover:scale-110 duration-110 transition-all cursor-pointer">
                                Se connecter
                                <i class="fa-solid fa-share mt-[-2px] ml-3"></i>
                            </div>
                        </div>
                        </div>
                    </form>
                    </div>
                </template>
            </Card>
        </template>
    </LayoutPage>
</template>