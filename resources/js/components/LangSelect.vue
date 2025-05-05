<script setup lang="ts">
import { ref, onMounted, computed } from 'vue';
import { usePage, router } from '@inertiajs/vue3';
// Импорт axios больше не нужен

const isOpen = ref(false);

// Определяем доступные языки
const languages = [
    { code: 'uk', label: 'Укр' },
    { code: 'ru', label: 'Рус' },
    { code: 'en', label: 'Eng' }
];

// Получаем текущую локаль из Inertia shared данных или используем дефолтную
const currentLocale = computed(() => usePage().props.locale || 'uk');

// Выбираем язык по текущей локали
const selectedLang = computed(() => {
    const found = languages.find(lang => lang.code === currentLocale.value);
    return found || languages[0];
});

const toggleSelect = (event: Event) => {
    event.stopPropagation();
    isOpen.value = !isOpen.value;
};

const selectOption = (lang: typeof languages[0]) => {
    // Если выбранный язык отличается от текущего
    if (lang.code !== selectedLang.value.code) {
        console.log('Отправляем запрос на изменение языка на:', lang.code);

        // Используем Inertia.js для смены локали БЕЗ перезагрузки всей страницы
        router.post(`/locale/${lang.code}`, {}, {
            preserveState: false, // Не сохраняем старое состояние
            preserveScroll: true, // Сохраняем позицию прокрутки
            onSuccess: () => {
                // Вместо перезагрузки перезапрашиваем текущую страницу через visit
                // указывая only: [], чтобы получить все проперти заново
                router.visit(window.location.href, {
                    preserveScroll: true,
                    replace: true,
                    preserveState: false,
                    only: [] // Запрашиваем все свойства, чтобы получить актуальные переводы
                });
            }
        });
    }
    isOpen.value = false;
};




onMounted(() => {
    document.addEventListener('click', (event: Event) => {
        const target = event.target as HTMLElement;
        if (!target.closest('.field-select')) {
            isOpen.value = false;
        }
    });
});
</script>

<template>
    <label class="page-header__lang field-select">
        <div class="field-select__name"><span>мова</span></div>
        <div class="field-select__select-wrap">
            <div class="field-select__select" @click="toggleSelect">
                <span class="field-select__selected">{{ selectedLang.label }}</span>
            </div>
            <div class="field-select__options" :style="{ display: isOpen ? 'block' : 'none' }">
                <div
                    v-for="lang in languages"
                    :key="lang.code"
                    class="field-select__option"
                    :data-value="lang.code"
                    @click="selectOption(lang)"
                >
                    <span>{{ lang.label }}</span>
                </div>
            </div>
        </div>
    </label>
</template>

<style scoped lang="scss">
// Оставляем ваши стили без изменений
.page-header__region.field-select {
    display: none;
}

@media (min-width: 1200px) {
    .page-header__region.field-select {
        display: block;
    }
}

.page-header__region .field-select__select-wrap {
    width: 76px;
    height: 27px;
}

.page-header__region .field-select__select {
    width: 76px;
    // height: 15px;
    font-family: $font-family;
    color: var(--secondary-color);
    outline: 1px solid var(--light-text-color);
    border: none;
    border-radius: 5px;
    font-size: 12px;
    font-style: normal;
    font-weight: 700;
    line-height: 16px;
    padding: 0;
    padding-left: 10px;
    padding-right: 10px;
    padding-top: 6px;
    padding-bottom: 6px;
    cursor: pointer;
}

.page-header__lang.field-select {
    display: none;
}

@media (min-width: 1200px) {
    .page-header__lang.field-select {
        display: block;
    }
}


label.page-header__region.field-select {
    margin-bottom: 0;
}

label.page-header__lang.field-select {
    margin-bottom: 0;
}


/* Обертка для select */
.page-header__lang .field-select__select-wrap,
.page-header__region .field-select__select-wrap {
    position: relative; /* Позиционируем стрелку относительно родителя */
    width: 100%; /* Ширина select */
    display: inline-block; /* Делаем inline-block для правильного выравнивания */
}

/* Стили для select */
.page-header__lang .field-select__select {
    width: 65px; /* Занимает всю доступную ширину */
    font-family: -apple-system, BlinkMacSystemFont, Manrope, Ubuntu, "Droid Sans", "Helvetica Neue", Arial, sans-serif;
    color: var(--secondary-color);
    font-size: 12px;
    font-weight: 700;
    line-height: 16px;
    padding: 6px 30px 6px 10px; /* Паддинги для текста, слева и справа */
    background-color: transparent; /* Прозрачный фон */
    outline: 1px solid var(--light-text-color);
    border: none;
    border-radius: 5px; /* Радиус углов */
    -webkit-appearance: none; /* Для Webkit браузеров */
    -moz-appearance: none; /* Для Firefox */
    appearance: none; /* Для других браузеров */
    z-index: 2; /* Убедитесь, что select выше стрелки */
    cursor: pointer;
}

/* Псевдоэлемент для флага */
.page-header__region .field-select__select,
.page-header__lang .field-select__select {
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    // padding: 10px;
    // border: 1px solid #ccc;
    border-radius: 5px;
    background-color: white;
}

.page-header__region .field-select__selected,
.page-header__lang .field-select__selected  {
    color: var(--secondary-color);
    display: flex;
    align-items: center;
}

.page-header__region .field-select__selected .field-select__icon {
    width: 16px;
    height: 12px;
    margin-right: 8px;
}

.page-header__region .field-select__options,
.page-header__lang .field-select__options {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    // color: black;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 5px;
    z-index: 10;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.page-header__lang .field-select__options span {
    color: var(--light-text-color);
}

.page-header__region .field-select__options.open,
.page-header__lang .field-select__options open {
    display: block;  /* Показываем список, если класс open добавлен на .field-select__options */
}

.page-header__region .field-select__option,
.page-header__lang .field-select__option {
    padding: 10px;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.page-header__region .field-select__option:hover,
.page-header__lang .field-select__option:hover  {
    background-color: #f0f0f0;
}

.page-header__region .field-select__option .field-select__icon {
    width: 16px;
    height: 12px;
    margin-right: 8px;
}

.page-header__region .field-select__select.open .field-select__options,
.page-header__lang .field-select__select.open .field-select__options {
    display: block;
}


/* Псевдоэлемент для стрелки */
.page-header__lang .field-select__select-wrap::after,
.page-header__region .field-select__select-wrap::after {
    content: "";
    position: absolute;
    top: 50%; /* Центрируем по вертикали */
    right: 10px; /* Отступ справа для стрелки */
    width: 12px; /* Размер стрелки */
    height: 12px; /* Размер стрелки */
    background: url('../assets/icons/arrow-down-icon.svg') no-repeat center center; /* Фоновое изображение стрелки */
    background-size: contain; /* Масштабируем изображение стрелки */
    transform: translateY(-50%); /* Центрируем по вертикали */
    pointer-events: none; /* Стрелка не перехватывает клики */
    z-index: 1; /* Стрелка будет поверх, но ниже select */
}

/* Когда select в фокусе, стрелка поворачивается */
.page-header__lang .field-select__select:focus + .field-select__select-wrap::after {
    transform: rotate(180deg) translateY(-50%); /* Поворот стрелки при фокусе */
}

.page-header__lang .field-select__select-wrap.open::after {
    transform: rotate(180deg);
}

.page-header__lang .field-select__name, .page-header__region .field-select__name {
    position: relative;
    text-align: center;
    // margin-bottom: 0.8em;
}

.page-header__lang .field-select__name span,
.page-header__region .field-select__name span {
    position: absolute;
    padding: 2px 5px;
    top: -22px;
    left: 15px;
    color: var(--light-text-color);
    text-align: center;
    font-feature-settings: 'liga' off, 'clig' off;
    font-family: $font-family;
    font-size: 10px;
    font-style: normal;
    font-weight: 500;
    line-height: 16px;
    background: var(--arrow-slider-button-color);
}

.page-header__lang .field-select__name span::after,
.page-header__region .field-select__name span::after {
    content: '';
    position: absolute;
    top: 115%;
    left: 35%;
    // right: -5px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid var(--arrow-slider-button-color);
}
</style>
