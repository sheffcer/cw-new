<script setup lang="ts">
import { onMounted, ref } from 'vue';

import AppSearch from "@/components/AppSearch.vue";
import AppUserBlock from "@/components/AppUserBlock.vue";
import AppSidebarMenu from './AppSidebarMenu.vue';
import RegionSelect from "@/components/RegionSelect.vue";
import LangSelect from "@/components/LangSelect.vue";


// Делаем проп опциональным с дефолтным значением
const props = defineProps<{
    isOpen: boolean, // робимо обов'язковим, щоб точно знати що значення передається
}>()

const emit = defineEmits<{
    toggle: [] // визначаємо подію toggle
}>()

const menuItems = [
    {
        title: 'Про ColorWay',
        items: [
            { text: 'Про Компанію', link: '#' },
            { text: 'Новини', link: '#' },
            { text: 'Нагороди', link: '#' },
            { text: 'Публікації', link: '#' },
            { text: 'Вакансії', link: '#' }
        ]
    },
    {
        title: 'Підтримка',
        items: [
            { text: 'Техпіддтримка', link: '#' },
            { text: 'Гарантія', link: '#' },
            { text: 'Зворотній зв\'язок', link: '#' },
            { text: 'Інструкції', link: '#' },
            { text: 'Зворотній зв\'язок', link: '#' },
            { text: 'Статті', link: '#' },
            { text: 'B2B', link: '#' },
            { text: 'ICC профілі', link: '#' }
        ]
    },
    {
        title: 'Контакти',
        items: [
            {
                text: 'Гуртові продаж',
                phone: '+38 (097) 846-06-91',
                isPhone: true
            },
            {
                text: 'Техпідтримка',
                phone: '+38 (097) 228-4603',
                isPhone: true
            },
            {
                text: 'Роздрібний продаж',
                phone: '+38 (095) 270-50-86',
                isPhone: true
            }
        ]
    }
]


// Переменные для обработки свайпов
const xDown = ref<number | null>(null);
const yDown = ref<number | null>(null);

// Функция переключения сайдбара
const offCanvasToggle = () => {
    isOpen.value = !isOpen.value;
};

// Обработчики свайпов
const handleTouchStart = (evt: TouchEvent) => {
    xDown.value = evt.touches[0].clientX;
    yDown.value = evt.touches[0].clientY;
};

const handleTouchMove = (evt: TouchEvent) => {
    if (!xDown.value || !yDown.value) {
        return;
    }

    const xUp = evt.touches[0].clientX;
    const yUp = evt.touches[0].clientY;

    const xDiff = xDown.value - xUp;
    const yDiff = yDown.value - yUp;

    if (Math.abs(xDiff) + Math.abs(yDiff) > 100) {
        if (Math.abs(xDiff) > Math.abs(yDiff)) {
            if (xDiff > 0) {
                isOpen.value = false; // свайп влево
            } else {
                isOpen.value = true; // свайп вправо
            }
        }
        xDown.value = null;
        yDown.value = null;
    }
};

// Обработчик кликов
const handleClick = (event: MouseEvent) => {
    const target = event.target as HTMLElement;
    if (target.dataset.toggle === 'off-canvas') {
        event.preventDefault();
        offCanvasToggle();
    }
    if (target.dataset.toggleNative === 'off-canvas') {
        offCanvasToggle();
    }
};

onMounted(() => {
    document.addEventListener('click', handleClick);
    document.addEventListener('touchstart', handleTouchStart);
    document.addEventListener('touchmove', handleTouchMove);
});
</script>

<template>
    <aside
        class="off-canvas__aside"
        :class="{ 'off-canvas--open': isOpen }"
        role="complementary"
        aria-label="Список компонентов"
    >
        <div class="off-canvas__block">
            <div class="off-canvas__header">
                <a href="/main" class="logo">
                    <img src="assets/icons/logo.svg" alt="logo">
                </a>
                <div class="burger burger--close"
                     @click="emit('toggle')"
                ><span></span></div>
            </div>
            <div class="off-canvas__dropdown dropdown">
                <a
                    id="dropdown-demo-1"
                    href="#"
                    class="btn btn--off-canvas dropdown__toggler"
                    data-toggle="dropdown"
                    role="button"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <img src="assets/icons/catalog-icon.svg" alt="">
                    <span>Каталог</span>
                </a>
            </div>

            <AppSearch class-name="off-canvas__search" />
            <!-- Остальные блоки контента -->
            <AppUserBlock/>
            <AppSidebarMenu :menu-items="menuItems" />

            <div class="off-canvas__media-toggler">
                <div class="media-toggler">
                    <hr>
                    <div class="media-toggler__wrap">
                        <RegionSelect/>
                        <LangSelect/>
                        <div class="page-header__toggler field-toggler">
                            <div class="field-toggler__input-wrap">
                                <label class="field-toggler__name">
                                    <input class="field-toggler__input" type="checkbox">
                                    <span class="field-toggler__name-text"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>

            <div class="off-canvas__text">
                <p class="off-canvas__text--parag">Є питання ? <a class="off-canvas__text--link">Зв'яжіться з нами</a></p>
                <p class="off-canvas__text--parag">Пн-Пт <span class="off-canvas__text--span">9:00 - 16:00</span></p>
            </div>
        </div>
    </aside>
</template>
<style scoped lang="scss">
$gray-darkest:                hsl(0, 0%, 10%);

$opacity:                     0.7 !default;
$transition-time:             0.3s !default;
$toggler-part-height:         3px !default;

// Переменная ширины этого блока
//
$off-canvas-width:            320px !default;

.off-canvas {

    $block-name:                &;

    position: relative;
    overflow: hidden;

    &__aside {
        //max-height: 30vh;
        overflow-y: auto;
        backface-visibility: hidden;
        color: $gray-darkest;
        background-color: #fff;
        // color: #fff;
        transition: transform $transition-time ease;

        .js & {
            position: fixed;
            z-index: 2;
            width: $off-canvas-width;
            height: 100%;
            max-height: none;
            transform: translateX(($off-canvas-width * -1));
        }

        a {
            // color: #fff;
            // color: var(--primary-color);

            &:hover,
            &:focus {
                color: #fff;
            }
        }
    }

    &__block {
        padding: 20px;
        padding-top: 10px;
    }

    &__page-content {
        backface-visibility: hidden;
        transition: transform $transition-time ease;
    }

    &__header {
        display: flex;
        margin-bottom: 21px;
        justify-content: space-between;
        align-items: flex-start;
    }

    &__text {
        margin-top: 40px;
        margin-bottom: 40px;
    }

    &__text__para {
        color: var(--light-text-color);
        font-feature-settings: 'liga' off, 'clig' off;
        font-family: $font-family--secondary;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 16px;
    }

    &__text--link {
        color: var(--secondary-color);
        text-decoration: none;
        cursor: pointer;
    }

    &__text--link:hover {
        color: var(--secondary-color)!important;
    }

    &__text--span {
        color: var(--light-text-color)!important;
        font-family: $font-family;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 16px
    }

    & .btn--off-canvas {
        background-color: var(--secondary-color);
        min-width: 130px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 9px 15px;
        gap: 10px;
        flex-shrink: 0;
        border-radius: 10px;
        border: none;
    }

    &__dropdown {
        width: 100%;
        border: none;
        // outline: 1px dashed palevioletred;
    }

    & .burger--close {
        width: 24px;
        height: 24px;
    }

    &__search {
        margin-top: 20px;
        width: 100%;
        position: relative;
    }

    &__search .field-text__input {
        padding-left: 16px;
        padding-top: 9px;
        padding-bottom: 9px;
        border-radius: 10px;
        border: none;
        outline: 1px solid var(--secondary-color);
    }

    &__search .btn--search {
        position: absolute;
        right: 5px;
        top: 50%;
        width: 30px;
        height: 30px;
        align-items: center;
        gap: 10px;
        transform: translateY(-50%);
        background-color: var(--secondary-color);
        color: #fff;
        font-family: $font-family--secondary;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
        border: none;
        padding: 0;
        cursor: pointer;
        border-radius: 20px;
    }

    &__search .btn--search span {
        display: none;
    }

    & a span {
        color: #fff;
        font-family: $font-family--secondary;
        font-size: 14px;
        font-weight: 700;
    }

    &__overlay {
        position: absolute;
        z-index: -1;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
    }

}

.media-toggler {
    $block-name: &;

    margin-top: 20px;

    &__wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px 0;
        padding-top: 15px;
    }

    & label {
        display: block!important;
    }

    & .field-toggler {
        display: block!important;
        margin-top: 30px;
    }

    & .field-select__name {
        position: relative;
        text-align: center;
        margin-bottom: 0.8em;
    }

    & .field-select__name span {
        position: relative;
        padding: 2px 5px;
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

    & .field-select__name span::after {
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

}

.page-header__toggler .field-toggler {
    cursor: pointer;
}


.page-header__toggler .field-toggler__name-text:after {
    top: -5px;
    background-image: url('../assets/icons/toggler-light-icon.svg');
    background-repeat: no-repeat;
    background-position-x: 50%;
    background-position-y: 50%;
}

.page-header__toggler .field-toggler__name-text:before {
    top: -5px;
}

.page-header__toggler .field-toggler__name-text:before {
    width: 45px;
    height: 24px;
    border-radius: 12px;
    background: var(--toggler-light-gray-color);
    border: none;
}

.page-header__toggler .field-toggler__name-text:after {
    width: 21px;
    height: 21px;
    border-radius: 50%;
    background-color: $white;
    border: none;
}

.page-header__toggler .field-toggler__input:checked + .field-toggler__name-text::after {
    left: 5px; /* Изменение позиции после активации чекбокса */
    background-image: url('../assets/icons/toggler-dark-icon.svg');
    background-repeat: no-repeat;
}

.page-header__toggler {
    @at-root input:checked ~ &:after {
        transform: translate(px-to-em(34), -50%);
    }
}

</style>
