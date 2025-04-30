<script setup lang="ts">
import { ref, onMounted } from 'vue';
import noUiSlider from 'nouislider';
import 'nouislider/dist/nouislider.css';
// import '@blocks/field-range/field-range.scss'

// Створення ref для слайдера
const sliderRef = ref<HTMLDivElement | null>(null);

// Ініціалізація слайдера
onMounted(() => {
    if (sliderRef.value) {
        const slider = noUiSlider.create(sliderRef.value, {
            start: [20, 80], // Стартові значення
            connect: true,    // Підключення слайдерів
            range: {
                min: 0,
                max: 100
            }
        });

        // Вказуємо тип для значень і ручки слайдера
        slider.on('update', (values: string[], handle: number) => {
            console.log('Slider values:', values);
            console.log('Current handle:', handle);
        });
    }
});
</script>

<template>
    <div ref="sliderRef" class="field-range"></div>
</template>

<style scoped>
.field-range {
    margin: 20px 0;
    background: deeppink;
}

/* Стилі слайдера */
.field-range .noUi-target {
    //background: #f0f0f0;
    background: deeppink;
    border-radius: 6px;
    border: 1px solid #ccc;
    height: 8px;
}

/* Колір заповнення між ручками */
.field-range .noUi-connect {
    background: #42b983; /* Наприклад, зелений як у Vue */
}

/* Стилі ручки */
.field-range .noUi-handle {
    background: white;
    border: 2px solid #42b983;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    top: -6px;
    cursor: grab;
    box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
}

/* Зміна стилю під час перетягування */
.field-range .noUi-handle:active {
    cursor: grabbing;
}

</style>
