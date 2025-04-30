<script setup lang="ts">
import useEmblaCarousel from 'embla-carousel-vue'
import { onMounted } from 'vue';
import Autoplay from 'embla-carousel-autoplay';

// Константы для селекторов карусели
const CAROUSEL_SELECTORS = {
    ROOT: '.embla--zero',
    VIEWPORT: '.embla__viewport',
    PREV_BUTTON: '.embla__button--prev',
    NEXT_BUTTON: '.embla__button--next',
    DOTS: '.embla__dots'
} as const;

// Опции карусели
const CAROUSEL_OPTIONS = {
    align: 'start',
    slidesToScroll: 1,
    slide: 1,
    loop: true
} as const;

const [emblaRef, emblaApi] = useEmblaCarousel(
    CAROUSEL_OPTIONS,
    [
        Autoplay({
            delay: 4000,
            stopOnInteraction: true
        })
    ]
);

onMounted(() => {
    const prevBtn = document.querySelector(CAROUSEL_SELECTORS.PREV_BUTTON);
    const nextBtn = document.querySelector(CAROUSEL_SELECTORS.NEXT_BUTTON);

    if (prevBtn && nextBtn && emblaApi) {
        prevBtn.addEventListener('click', () => emblaApi.value?.scrollPrev());
        nextBtn.addEventListener('click', () => emblaApi.value?.scrollNext());
    }
});

interface CatalogItem {
    image: string;
    title: string;
    link?: string;
}

const catalogItems: CatalogItem[] = [
    { image: 'case.png', title: 'Чохли', link: '/case' },
    { image: 'cartridge.png', title: 'Лазерні картриджі', link: '/cartridge' },
    { image: 'paper.png', title: 'Фотопапір', link: '/paper' },
    { image: 'charge.png', title: 'Зарядні пристро', link: '/charge' },
    { image: 'headphones.png', title: 'Навушники', link: '/headphones' },
    { image: 'powerbank.png', title: 'Повербанки', link: '/powerbank' },
    { image: 'battery.png', title: 'Батарейки', link: '/battery' },
    { image: 'bag.png', title: 'Сумки та рюкзаки', link: '/bag' },
    { image: 'spare.png', title: 'ЗІП для друку', link: '/spare' },
    { image: 'ink.png', title: 'Чорнило', link: '/ink' },
    { image: 'glass.png', title: 'Захисне скло', link: '/glass' },
    { image: 'cleaner.png', title: 'Чистилки', link: '/cleaner' },
    { image: 'decoration.png', title: 'Декор', link: '/decoration' },
    { image: 'paper.png', title: 'Фотопапір', link: '/paper' },
    { image: 'ink.png', title: 'Чорнило', link: '/ink' },
    { image: 'glass.png', title: 'Захисне скло', link: '/glass' },
    { image: 'cleaner.png', title: 'Чистилки', link: '/cleaner' }
];
</script>


<template>
    <div class="catalog-embla">
        <div class="embla embla--zero">
            <div class="embla__viewport" ref="emblaRef">
                <div class="embla__container">
                    <div v-for="(item, index) in catalogItems" :key=index

                         class="embla__slide"
                    >
                        <a class="embla__slide__link" :href="item.link">
                            <div class="embla__slide__number">
                                <img class="embla__slide__img" :src="`assets/images/${item.image}`" :alt="item.title">
                            </div>
                            <div class="embla__slide__title">{{ item.title }}</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="embla__controls">
                <div class="embla__buttons">
                    <button class="embla__button embla__button--prev" type="button">
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                                fill="currentColor"
                                d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                            />
                        </svg>
                    </button>
                    <button class="embla__button embla__button--next" type="button">
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                                fill="currentColor"
                                d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                            />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped lang="scss">
// Start zero new-product slider

.catalog-embla {
    position: relative;
}

.embla--zero  {
    // outline: 1px dotted red;
    // max-width: 70rem;
    margin: auto;
    height: 128px;
    // background-color: rgb(12, 12, 12);
    // --slide-height: 19rem;
    --slide-height: 90px;
    --slide-spacing: 10px;
    // --slide-spacing: 1rem;
    --slide-size: 25%;
    --slide-size-sm: 25%;
    --slide-spacing-sm: 10px;
    // --slide-spacing-sm: 1.6rem;
    --slide-size-md: 14%;
    --slide-spacing-lg: 10px;
    // --slide-spacing-lg: 2rem;
    --slide-spacing-xl: 10px;
    // --slide-spacing-xl: 1rem;
    --slide-size-lg: calc(100% / 10);
    --slide-size-xl: calc(100% / 13);
}

.embla--zero .embla__container {
    backface-visibility: hidden;
    display: flex;
    touch-action: pan-y pinch-zoom;
    margin-left: calc(var(--slide-spacing) * -1);
}

@media (min-width: 768px) {
    .embla--zero .embla__container {
        margin-left: calc(var(--slide-spacing-sm) * -1);
    }
}

@media (min-width: 1200px) {
    .embla--zero .embla__container {
        margin-left: calc(var(--slide-spacing-xl) * -1);
    }
}

.embla--zero .embla__slide {
    min-width: 0;
    flex: 0 0 var(--slide-size-sm);
    padding-left: var(--slide-spacing);
    // background: #4FD284;
}

@media (min-width: 768px) {
    .embla--zero .embla__slide {
        flex: 0 0 var(--slide-size-md);
        padding-left: var(--slide-spacing-sm);
    }
}

@media (min-width: 992px) {
    .embla--zero .embla__slide {
        flex: 0 0 var(--slide-size-lg);
        padding-left: var(--slide-spacing-lg);
    }
}

@media (min-width: 1400px) {
    .embla--zero .embla__slide {
        flex: 0 0 var(--slide-size-xl);
        padding-left: var(--slide-spacing-lg);
    }
}

.embla--zero .embla__slide__number {
    // box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    // border: 1px solid #E2E2E2;
    position: relative;
    margin: 1px;
    border-radius: 1.8rem;
    font-size: 4rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    height: var(--slide-height);
    user-select: none;
    background: var(--slider-green-bg-color);
}

.embla--zero .embla__slide--selected .embla__slide__number {
    outline: 1px solid var(--secondary-color);
}

.embla--zero .embla__slide__close {
    display: none;
    position: absolute;
    width: 20px;
    height: 20px;
    top: 7%;
    left: 7%;
    background: var(--secondary-color);
    border: none;
    border-radius: 3px;
}

// .embla__slide__close svg {
//   fill: $white;
// }

.embla--zero .embla__slide--selected .embla__slide__close {
    display: block;
}

.embla--zero .embla__slide--selected .embla__slide__title {
    color: var(--secondary-color)!important;
}

.embla--zero .embla__controls {
    display: grid;
    grid-template-columns: auto 1fr;
    justify-content: space-between;
    gap: 1.2rem;
    margin-top: 1.8rem;
}

.embla--zero .embla__buttons {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.6rem;
    align-items: center;
}

.embla--zero .embla__button {
    position: absolute;
    -webkit-tap-highlight-color: rgba(var(--text-high-contrast-rgb-value), 0.5);
    -webkit-appearance: none;
    appearance: none;
    background-color: var(--arrow-slider-button-color);;
    // background-color: transparent;
    touch-action: manipulation;
    display: inline-flex;
    text-decoration: none;
    cursor: pointer;
    border: 0;
    padding: 0;
    margin: 0;
    box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 14px;
    height: 90px;
    z-index: 1;
    // border-radius: 50%;
    color: var(--text-body);
    display: flex;
    align-items: center;
    justify-content: center;
}

.embla--zero .embla__button--prev {
    top: 0;
    left: -30px;
}

.embla--zero .embla__button--next {
    top: 0;
    right: -30px;
}

.embla__button:disabled {
    color: var(--detail-high-contrast);
}

.embla--zero .embla__button__svg {
    width: 80%;
    height: 80%;
    // color: var(--arrow-slider-color);
}

.embla--zero .embla__dots {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    align-items: center;
    margin-right: calc((2.6rem - 1.4rem) / 2 * -1);
}

.embla--zero .embla__dot {
    -webkit-tap-highlight-color: rgba(var(--text-high-contrast-rgb-value), 0.5);
    -webkit-appearance: none;
    appearance: none;
    background-color: transparent;
    touch-action: manipulation;
    display: inline-flex;
    text-decoration: none;
    cursor: pointer;
    border: 0;
    padding: 0;
    margin: 0;
    width: 2.6rem;
    height: 2.6rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.embla--zero .embla__dot:after {
    box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 1.4rem;
    height: 1.4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    content: '';
}

.embla--zero .embla__dot--selected:after {
    box-shadow: inset 0 0 0 0.2rem var(--text-body);
}

.embla--zero .embla__slide__title {
    font-family: $font-family;
    font-size: 10px;
    font-weight: 700;
    line-height: 14px;
    color: $black;
}

.embla--zero .embla__slide__link {
    text-decoration: none;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 123px;
}

.embla--zero .embla__slide__img  {
    width: auto;
}


// }

// End zero new-product slider
</style>
