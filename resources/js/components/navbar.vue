<script setup>

    import { RouterLink } from 'vue-router';

</script>

<template>
    <nav class="h-full w-1/4 bg-gray-950 z-10 relative">
        <h2 class="text-white pl-32 font-display font-bold text-3xl p-10">Bienvenue !</h2>
        <ul class="space-y-1 flex flex-col justify-center w-full h-full absolute top-10">
            <li>
                <RouterLink :to="{ name: 'home' }" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Acceuil
                </RouterLink>
            </li>

            <li>
                <RouterLink :to="{ name: 'skill' }" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Expériences
                </RouterLink>
            </li>

            <li>
                <a href="#" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Formations
                </a>
            </li>

            <li>
                <a href="#" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Compétences
                </a>
            </li>

            <li>
                <a href="#" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Projets
                </a>
            </li>

            <li>
                <a href="#" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Technologies
                </a>
            </li>

            <li>
                <a href="#" class="block text-lg rounded-lg px-4 py-2 font-medium text-gray-200 hover:text-gray-700 pl-32 font-display">
                Connexion
                </a>
            </li>
        </ul>
    </nav>
</template>