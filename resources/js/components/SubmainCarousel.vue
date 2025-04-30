<script setup lang="ts">
import { onMounted, ref, onUnmounted } from 'vue'
import EmblaCarousel from 'embla-carousel'

interface SlideData {
    desktop: string
    tablet: string
    default: string
    alt: string
}

const props = defineProps<{
    slides: SlideData[]
}>()

const emblaNode = ref<HTMLElement | null>(null)
const rootNode = ref<HTMLElement | null>(null)
// const dotsNode = ref<HTMLElement | null>(null)
let embla: EmblaCarousel | null = null

// Функція для отримання налаштувань слайдера
const getEmblaOptions = () => {
    return window.innerWidth >= 992
        ? {
            loop: false,
            speed: 10,
            slidesToScroll: 1,
            axis: 'y',
            dragFree: true
        }
        : {
            loop: false,
            speed: 10,
            axis: 'x',
            slidesToScroll: 2,
            containScroll: true
        }
}



// Функція для ініціалізації слайдера
const initializeEmbla = () => {
    if (!emblaNode.value) return

    // Знищуємо стару ініціалізацію, якщо вона є
    if (embla) {
        embla.destroy()
    }

    // Ініціалізація слайдера з новими налаштуваннями
    embla = EmblaCarousel(emblaNode.value, getEmblaOptions())
}

// Оновлення слайдера
const updateSlider = () => {
    if (!rootNode.value) return

    // Додаємо або прибираємо класи в залежності від прокрутки
    rootNode.value.classList.toggle('embla--vertical', window.innerWidth >= 992)
    rootNode.value.classList.toggle('embla--horizontal', window.innerWidth < 992)

    // Ініціалізуємо слайдер заново з актуальними налаштуваннями
    initializeEmbla()
}

// Створюємо debounce функцію для оптимізації ресайзу
const debounce = (fn: Function, ms = 300) => {
    let timeoutId: ReturnType<typeof setTimeout>
    return function (this: any, ...args: any[]) {
        clearTimeout(timeoutId)
        timeoutId = setTimeout(() => fn.apply(this, args), ms)
    }
}

const debouncedUpdateSlider = debounce(updateSlider)

onMounted(() => {
    // Початкова ініціалізація
    updateSlider()

    // Додаємо слухач події resize
    window.addEventListener('resize', debouncedUpdateSlider)
})

onUnmounted(() => {
    // Прибираємо слухач події при знищенні компонента
    window.removeEventListener('resize', debouncedUpdateSlider)

    // Знищуємо екземпляр слайдера
    if (embla) {
        embla.destroy()
    }
})
</script>


<template>
    <div class="embla embla--second" ref="rootNode">
        <div class="embla__viewport" ref="emblaNode">
            <div class="embla__container">
                <div v-for="(slide, index) in slides"
                     :key="index"
                     class="embla__slide">
                    <picture class="main-slider__img">
                        <source media="(min-width: 992px)"
                                :srcset="slide.desktop"
                                sizes="100vw">
                        <source media="(min-width: 768px)"
                                :srcset="slide.tablet"
                                sizes="100vw">
                        <img :src="slide.default" :alt="slide.alt">
                    </picture>
                </div>
            </div>
        </div>
<!--        <div class="embla__dots" ref="dotsNode"></div>-->
    </div>
</template>


<style scoped lang="scss">
// Базовые стили для изображений
.main-slider__img {
    width: 100%;
    height: 100%;
    display: block;

    img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
}

// Основные стили Embla
.embla {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.embla__viewport {
    overflow: hidden;
    width: 100%;
}

.embla__container {
    display: flex;
    width: 100%;
}

.embla__slide {
    position: relative;
    flex: 0 0 100%;
    width: 100%;
}

// Стили для точек навигации
.embla__dots {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 5px;
    margin-top: 15px;
}

.embla__dot {
    width: 20px;
    height: 8px;
    border-radius: 20px;
    background-color: #E2E2E2;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;

    &.is-selected {
        width: 42px;
        background-color: #22BC3E;
    }

    &:hover {
        background-color: #22BC3E;
        opacity: 0.5;
    }
}

// Стили для кнопок навигации
.embla__nav {
    display: flex;
    justify-content: space-between;
    margin: 15px 0;
}

.embla__prev,
.embla__next {
    cursor: pointer;
    border: none;
    width: 8px;
    height: 14px;
    background-color: transparent;
    background-repeat: no-repeat;
    background-position: center;
}

.embla__prev {
    background-image: url(../assets/icons/left-arrow.svg);
}

.embla__next {
    background-image: url(../assets/icons/right-arrow.svg);
}

// Специальные стили для второго слайдера
.embla--second {
    display: none; // Скрыт по умолчанию на мобильных

    .embla__dots {
        display: none;
    }
}

// Медиа-запросы
@media (min-width: 768px) {
    .embla--second {
        @include col(md, 12, 12, 24px);
        display: block;
        width: 100%;
        padding-left: 0;
        padding-right: 0;
        margin-left: -15px;
        margin-right: -15px;

        .embla__viewport {
            width: 100%;
            overflow: hidden;
        }

        .embla__container {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-around;
            width: 100%;
            //padding: 0 15px; // Додаємо падінги
        }

        .embla__slide {
            min-width: calc(50% - 15px);
            flex: 0 0 calc(50% - 15px);

            &:first-child {
                padding-left: 0; // Прибираємо падінг для першого
            }

            &:last-child {
                padding-right: 0; // Прибираємо падінг для останнього
            }

            img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        }
    }
}


@media (min-width: 992px) {
    .embla--second {
        @include col(lg, 4, 12, 24px);
        margin-left: 0;
        margin-right: 0;

        .embla__viewport {
            height: auto;
            overflow-y: visible;
        }

        .embla__container {
            flex-direction: column;
            gap: 15px;
        }

        .embla__slide {
            flex: 0 0 auto;
            width: 100%;
            margin: 0;
            padding-bottom: 0!important;

            &:first-child {
                padding-left: 15px; // Повертаємо звичайний падінг для десктопа
            }

            &:last-child {
                padding-right: 15px; // Повертаємо звичайний падінг для десктопа
            }

        }
    }
}



// Вертикальный/горизонтальный режимы
.embla--vertical .embla__container {
    flex-direction: column;
}

.embla--horizontal .embla__container {
    flex-direction: row;
}

</style>
