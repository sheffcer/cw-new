<script setup lang="ts">
import { ref, onMounted } from 'vue';
// Імпорт Embla та плагіна автоплею
import EmblaCarousel, { EmblaCarouselType } from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

// Передаємо список відео через props
const props = defineProps<{
    videos: { id: number; src: string; title: string }[];
}>();

// Embla інстанс
const emblaInstance = ref<EmblaCarouselType | null>(null);
const viewport = ref<HTMLElement | null>(null); // viewport для Embla

// Методи для переміщення слайдів
const scrollPrev = () => {
    if (!emblaInstance.value) {
        console.warn('Embla instance is not initialized');
        return;
    }
    emblaInstance.value.scrollPrev();
};

const scrollNext = () => {
    if (!emblaInstance.value) {
        console.warn('Embla instance is not initialized');
        return;
    }
    emblaInstance.value.scrollNext();
};

// Ініціалізація Embla
onMounted(() => {
    if (viewport.value) {
        emblaInstance.value = EmblaCarousel(viewport.value, {}, [Autoplay()]);
    } else {
        console.error('Embla viewport not found');
    }
});
</script>

<template>
    <div class="top-video">
        <!-- Заголовок секції -->
        <button class="top-video__title">Огляди товарів</button>

        <!-- Embla карусель -->
        <div class="top-video__inner">
            <div class="embla embla--fourth">
                <div class="embla__viewport" ref="viewport">
                    <div class="embla__container">
                        <!-- Вивід слайд-шоу -->
                        <div
                            v-for="video in videos"
                            :key="video.id"
                            class="embla__slide"
                        >
                            <div class="embla__slide__number">
                                <iframe
                                    :src="video.src"
                                    :title="video.title"
                                    width="176"
                                    height="362"
                                    sandbox="allow-scripts allow-same-origin allow-presentation"
                                    allow="autoplay; encrypted-media"
                                    frameborder="0"
                                    allowfullscreen
                                ></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Кнопки управління -->
            <div class="embla__controls">
                <div class="embla__buttons">
                    <button
                        class="embla__button embla__button--prev"
                        type="button"
                        @click="scrollPrev"
                    >
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                                fill="currentColor"
                                d="M355.66 11.354c13.793-13.805 36.208-13.805 50.001 0 13.785 13.804 13.785 36.238 0 50.034L201.22 266l204.442 204.61c13.785 13.805 13.785 36.239 0 50.044-13.793 13.796-36.208 13.796-50.002 0a5994246.277 5994246.277 0 0 0-229.332-229.454 35.065 35.065 0 0 1-10.326-25.126c0-9.2 3.393-18.26 10.326-25.2C172.192 194.973 332.731 34.31 355.66 11.354Z"
                            ></path>
                        </svg>
                    </button>

                    <button
                        class="embla__button embla__button--next"
                        type="button"
                        @click="scrollNext"
                    >
                        <svg class="embla__button__svg" viewBox="0 0 532 532">
                            <path
                                fill="currentColor"
                                d="M176.34 520.646c-13.793 13.805-36.208 13.805-50.001 0-13.785-13.804-13.785-36.238 0-50.034L330.78 266 126.34 61.391c-13.785-13.805-13.785-36.239 0-50.044 13.793-13.796 36.208-13.796 50.002 0 22.928 22.947 206.395 206.507 229.332 229.454a35.065 35.065 0 0 1 10.326 25.126c0 9.2-3.393 18.26-10.326 25.2-45.865 45.901-206.404 206.564-229.332 229.52Z"
                            ></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss">
.top-video {
    padding: 16px;
}

.top-video__inner {
    position: relative;
    overflow: hidden;
}

.embla__viewport {
    overflow: hidden;
    width: 100%;
}

.embla__container {
    display: flex;
    transition: transform 0.3s ease;
    will-change: transform;
}

.embla__slide {
    flex: 0 0 auto; /* Фіксована ширина та висота слайдів */
    margin-right: 16px;
    width: 176px;
    height: 362px;
}

.embla__slide__number {
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f0f0f0;
}

.embla__button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: transparent;
    color: var(--text-body);
    border: 0;
    padding: 0;
    margin: 0;
    box-shadow: inset 0 0 0 .1rem var(--detail-medium-contrast);
    width: 2.6rem;
    height: 2.6rem;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 10;
}


.embla__button--prev {
    left: 10px;
}

.embla__button--next {
    right: 10px;
}

.embla--fourth .embla__button--prev {
    position: absolute;
    top: 40%;
    left: 0;
}

.embla--fourth .embla__button--next {
    position: absolute;
    top: 40%;
    right: 0;
}
.top-video {
    display: block;
    position: relative;
}

.embla__button__svg {
    width: 35%;
    height: 35%;
}

.top-video__title {
    position: relative;
    top: 35px;
    left: 50%;
    transform: translate(-50%);
    padding-left: 85px;
    padding-right: 85px;
    padding-left: 85px;
    padding-right: 85px;
    padding-top: 15px;
    padding-bottom: 15px;
    border-radius: 50px;
    border: 8px solid #fff;
    color: var(--secondary-color);
    text-align: center;
    font-family: -apple-system, BlinkMacSystemFont, Tahoma, Ubuntu, "Droid Sans", "Helvetica Neue", Arial, sans-serif;
    font-size: 22px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    background: var(--background-video-color);
    z-index: 100;
}

/* Зміна кольору фону при наведенні на слайд */
// Start fourth new-product slider

.embla--fourth  {
    padding-top: 68px;
    padding-bottom: 40px;
    margin: auto;
    --slide-height: 19rem;
    --slide-spacing: 1rem;
    --slide-size: 100%;
    --slide-spacing-sm: 1.6rem;
    --slide-size-sm: 50%;
    --slide-spacing-lg: 2rem;
    --slide-size-lg: calc(100% / 4);
}

.embla--fourth .embla__container {
    backface-visibility: hidden;
    display: flex;
    touch-action: pan-y pinch-zoom;
    margin-left: calc(var(--slide-spacing) * -1);
}

.embla--fourth .embla__viewport {
    position: relative;
}





@media (min-width: 768px) {
    .embla--fourth .embla__container {
        margin-left: calc(var(--slide-spacing-sm) * -1);
    }
}

@media (min-width: 1200px) {
    .embla--fourth .embla__container {
        margin-left: calc(var(--slide-spacing-lg) * -1);
    }
}

.embla--fourth .embla__slide {
    min-width: 0;
    flex: 0 0 200px;
    height: 362px;
    // flex: 0 0 var(--slide-size);
    padding-left: var(--slide-spacing);
    // background: #4FD284;
}

@media (min-width: 768px) {
    .embla--fourth .embla__slide {
        flex: 0 0 200px;
        // flex: 0 0 var(--slide-size-sm);
        padding-left: var(--slide-spacing-sm);
    }
}

@media (min-width: 1200px) {
    .embla--fourth .embla__slide {
        flex: 0 0 200px;
        // flex: 0 0 var(--slide-size-lg);
        padding-left: var(--slide-spacing-lg);
    }
}

.embla--fourth .embla__slide__number {
    // box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 176px;
    height: 362px;
    border: 1px solid #E2E2E2;
    border-radius: 1.8rem;
    font-size: 4rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    // height: var(--slide-height);
    user-select: none;
    // background: #4FD284;
}

.embla--fourth .embla__slide__number iframe {
    border-radius: 10px;
}

.embla--fourth .embla__controls {
    display: grid;
    grid-template-columns: auto 1fr;
    justify-content: space-between;
    gap: 1.2rem;
    // margin-top: 1.8rem;
}

.embla--fourth .embla__buttons {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 0.6rem;
    align-items: center;
}



// hidden dots in video's slider
.embla--fourth .embla__dots {
    // visibility: hidden;
    display: none;
    // display: flex;
    flex-wrap: wrap;
    justify-content: flex-end;
    align-items: center;
    margin-right: calc((2.6rem - 1.4rem) / 2 * -1);
}

.embla--fourth .embla__dot {
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
.embla--fourth .embla__dot:after {
    box-shadow: inset 0 0 0 0.2rem var(--detail-medium-contrast);
    width: 1.4rem;
    height: 1.4rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    content: '';
}
.embla--fourth .embla__dot--selected:after {
    box-shadow: inset 0 0 0 0.2rem var(--text-body);
}

// End fourth new-product slider

</style>
