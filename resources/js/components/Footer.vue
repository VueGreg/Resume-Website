<script setup>

    import card from './card.vue';
    import { RouterLink } from 'vue-router';

</script>

<template>
    <card :withLink="false">
        <template #other>
            <div class="flex flex-col lg:flex-row lg:justify-between gap-10 lg:gap-0 text-[0.6rem] uppercase font-semibold tracking-wide text-[#919ca1]">
                <div class="flex flex-col justify-center text-center lg:text-left">
                    <span><i class="fa-regular fa-copyright"></i>2024 Réalisé par grégory WOLFF</span>
                </div>
                <ul class="flex gap-4 tracking-widest underline decoration-3 text-[#70ba65]">
                    <li><RouterLink :to="{ name: 'legal' }">Mentions légales</RouterLink></li>
                    <li><RouterLink to="#">Télécharger le CV en .pdf</RouterLink></li>
                    <li><RouterLink :to="{ name: 'contact' }">Contacter</RouterLink></li>
                </ul>
            </div>
        </template>
    </card>
</template>