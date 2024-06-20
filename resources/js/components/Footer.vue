<script setup>

    import card from './card.vue';
    import { RouterLink } from 'vue-router';
    import useNavbar from './services/_navbar';

    const { getPDF, errors } = useNavbar();

    const getResume = () => {
        getPDF();
    }

</script>

<template>
    <card :withLink="false">
        <template #other>
            <div class="flex flex-col lg:flex-row lg:justify-between gap-10 lg:gap-0 text-[0.6rem] uppercase font-semibold tracking-[0.1rem] text-[#919ca1]">
                <div class="flex flex-col justify-center text-center lg:text-left">
                    <span><i class="fa-regular fa-copyright"></i>2024 Réalisé par grégory WOLFF</span>
                </div>
                <ul class="flex justify-center lg:justify-normal items-center gap-4 underline decoration-3 text-[#70ba65]">
                    <li><RouterLink :to="{ name: 'legal' }">Mentions légales</RouterLink></li>
                    <li @click.prevent="getResume" class="cursor-pointer">Télécharger le CV en .pdf</li>
                    <li><RouterLink :to="{ name: 'contact' }">Contacter</RouterLink></li>
                </ul>
            </div>
        </template>
    </card>
</template>