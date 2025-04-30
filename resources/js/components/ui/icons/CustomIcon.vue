<script setup lang="ts">
import { defineProps, ref, watchEffect } from 'vue';

// Пропси компонента
const props = defineProps<{
    icon: string; // Назва іконки (наприклад, supplies-icon.svg)
    size?: string; // Розмір іконки
}>();

// Реактивний шлях до іконки
const iconPath = ref<string>('');

// Завантажуємо динамічно шлях до іконки
// watchEffect(() => {
//     iconPath.value = props.icon
//         ? new URL(`/resources/assets/icons/${props.icon}`, import.meta.url).href
//         : '';
// });

watchEffect(() => {
    iconPath.value = props.icon
        ? `/assets/icons/${props.icon}` // ← прямий доступ через public
        : '';
});
</script>

<template>
    <div>
        <!-- Якщо шлях до іконки коректний -->
        <img
            v-if="iconPath"
            :src="iconPath"
            :width="props.size || 30"
            :height="props.size || 30"
            :alt="props.icon"
        />
        <!-- Якщо іконка не знайдена -->
        <span v-else>Icon not available</span>
    </div>
</template>
