<script setup lang="ts">
import { ref, onMounted, onBeforeUnmount } from 'vue';
import EmblaCarousel, { EmblaCarouselType } from 'embla-carousel';

// Стани для посилання на viewport і інстансу Embla
const viewportRef = ref<HTMLElement | null>(null);
let embla: EmblaCarouselType | null = null;

// Ініціалізуємо слайдер
const initializeEmbla = () => {
    if (viewportRef.value) {
        embla = EmblaCarousel(viewportRef.value, {
            loop: false, // Вимкнено loop
            align: 'start', // Слайди вирівнюються на початок
            dragFree: false, // Фіксована прокрутка
        });
    }
};

// Кнопка "Previous" для переходу до попереднього слайда
const prevSlide = () => {
    if (embla) embla.scrollPrev();
};

// Кнопка "Next" для переходу до наступного слайда
const nextSlide = () => {
    if (embla) embla.scrollNext();
};

// Перереєстрація при зміні ширини екрана
const handleResize = () => {
    if (embla) {
        embla.reInit();
    }
};

// Ініціалізація слайдера
onMounted(() => {
    initializeEmbla();
    window.addEventListener('resize', handleResize); // Слухач подій resize
});

// Звільнення ресурсів
onBeforeUnmount(() => {
    window.removeEventListener('resize', handleResize);
    if (embla) embla.destroy();
});

</script>


<template>
    <div class="catalog-group">
        <div class="embla embla--third">
            <div class="embla__viewport">
                <div class="embla__container">
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/supplies.png" alt="">
                            <div class="embla__slide__title">Витратні матеріали</div>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/accessory.png" alt="">
                            <div class="embla__slide__title">Аксессуари</div>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/smart-home.png" alt="">
                            <div class="embla__slide__title">Розумний дім</div>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/decoration.png" alt="">
                            <div class="embla__slide__title">Декор</div>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/supplies.png" alt="">
                            <div class="embla__slide__title">Витратні матеріали</div>
                        </div>
                    </div>
                    <div class="embla__slide">
                        <div class="embla__slide__number">
                            <img  class="embla__slide__img" src="assets/images/accessory.png" alt="">
                            <div class="embla__slide__title">Аксессуари</div>
                        </div>
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
                            ></path>
                        </svg>
                    </button>

                    <button class="embla__button embla__button--next" type="button">
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                                fill="currentColor"
                                d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                            ></path>
                        </svg>
                    </button>
                </div>

                <div class="embla__dots"></div>
            </div>
        </div>
    </div>

</template>

<style scoped lang="scss">

.embla--third {
    margin: auto;
    margin-top: 30px;
    margin-bottom: 30px;
    /* Глобальні змінні */
    --slide-height: 19rem; /* Висота слайдів */
    --slide-spacing: 1rem; /* Відстань між слайдами для мобільних */
    --slide-spacing-sm: 1rem; /* Відстань між слайдами для планшетів */
    --slide-spacing-lg: 2rem; /* Відстань між слайдами для великих екранів */
    --visible-slides: 2; /* Кількість слайдів, які видно на мобільних */
    --visible-slides-sm: 3; /* Кількість слайдів, які видно на планшетах */
    --visible-slides-lg: 4; /* Кількість слайдів, які видно на великих екранах */
}

.embla--third .embla__viewport {
    overflow: hidden;
    width: 100%;
}

.embla--third .embla__container {
    display: flex;
    margin-left: calc(var(--slide-spacing) * -1); /* Компенсація з лівого краю через відступи */
    width: calc(100% + var(--slide-spacing)); /* Враховує ширину та відстань між слайдами */
    backface-visibility: hidden;
    touch-action: pan-y pinch-zoom;
    will-change: transform;
}

.embla--third .embla__slide {
    position: relative;
    flex: 0 0 calc(100% / var(--visible-slides)); /* Ширина залежить від кількості видимих слайдів */
    min-width: calc(100% / var(--visible-slides)); /* Мінімальна ширина кожного слайда */
    padding-left: var(--slide-spacing); /* Відстань між слайдами */
    box-sizing: border-box; /* Правильний розрахунок відступів і ширини */
}

@media (min-width: 768px) {
    .embla--third {
        --slide-spacing: var(--slide-spacing-sm); /* Відстань між слайдами для планшетів */
        --visible-slides: var(--visible-slides-sm); /* На планшетах видно 3 слайди */
    }

    .embla--third .embla__container {
        margin-left: calc(var(--slide-spacing) * -1); /* Компенсація відступів */
        width: calc(100% + var(--slide-spacing)); /* Контейнер адаптується під відступи */
    }

    .embla--third .embla__slide {
        flex: 0 0 calc(100% / var(--visible-slides)); /* Ширина залежить від кількості видимих слайдів */
        min-width: calc(100% / var(--visible-slides));
        padding-left: var(--slide-spacing); /* Відповідний відступ */
    }
}

@media (min-width: 1200px) {
    .embla--third {
        --slide-spacing: var(--slide-spacing-lg); /* Відстань між слайдами для великих екранів */
        --visible-slides: var(--visible-slides-lg); /* На великих екранах видно 4 слайди */
    }

    .embla--third .embla__container {
        margin-left: calc(var(--slide-spacing) * -1); /* Компенсація відступів */
        width: calc(100% + var(--slide-spacing)); /* Контейнер адаптується під відступи */
    }

    .embla--third .embla__slide {
        flex: 0 0 calc(100% / var(--visible-slides)); /* Ширина залежить від кількості видимих слайдів */
        min-width: calc(100% / var(--visible-slides));
        padding-left: var(--slide-spacing); /* Відповідний відступ */
    }
}


.embla--third .embla__slide__number {
    border-radius: 1.8rem;
    font-size: 16px;
    font-family: $font-family;
    font-weight: 700;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-evenly;
    user-select: none;
    background: #4FD284;
}

.embla--third .embla__slide__title {
    padding-bottom: 12px;
    padding-top: 12px;
    background-color: var(--secondary-green-color);
    filter: blur(0.25px);
    border-radius: 0 0 15px 15px;
    width: 100%;
    color: $white;
    font-family: $font-family;
    font-size: 16px;
    line-height: 22px;
    font-weight: 700;
}

.embla--third .embla__slide__img {
    object-fit: cover;
    display: block;
    flex-shrink: 0;
}

.embla--third .embla__controls {
    display: grid;
    grid-template-columns: auto 1fr;
    justify-content: space-between;
    gap: 1.2rem;
    display: none;
}

.embla--third .embla__buttons {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.6rem;
    align-items: center;
}

.embla--third .embla__button {
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
    box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 3.6rem;
    height: 3.6rem;
    z-index: 1;
    border-radius: 50%;
    color: var(--text-body);
    display: flex;
    align-items: center;
    justify-content: center;
}

.embla__button:disabled {
    color: var(--detail-high-contrast);
}

.embla--third .embla__button__svg {
    width: 35%;
    height: 35%;
}

.embla--third .embla__dots {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    align-items: center;
    margin-right: calc((2.6rem - 1.4rem) / 2 * -1);
}

.embla--third .embla__dot {
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

.embla--third .embla__dot:after {
    box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 1.4rem;
    height: 1.4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    content: '';
}

.embla--third .embla__dot--selected:after {
    box-shadow: inset 0 0 0 0.2rem var(--text-body);
}
</style>
