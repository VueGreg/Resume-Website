<script setup>

    import { onMounted, ref } from 'vue';

    defineProps({
        modelValue: String,
    });

    defineEmits(['update:modelValue']);

    const input = ref(null);

    onMounted(() => {
        if (input.value.hasAttribute('autofocus')) {
            input.value.focus();
        }
    });

    defineExpose({ focus: () => input.value.focus() });

</script>

<template>

    <input  type="text"
            ref="input"
            :placeholder="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="text-[#dedee0] block w-full h-10 rounded-md bg-gray-100 shadow-inset dark:bg-[#02162b] p-5"
    >

</template>