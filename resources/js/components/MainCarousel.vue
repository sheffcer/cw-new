<script setup lang="ts">
import useEmblaCarousel from 'embla-carousel-vue'
import Autoplay from 'embla-carousel-autoplay'
import { onMounted, ref } from 'vue'

// Инициализация карусели с автопрокруткой
const [emblaRef, emblaApi] = useEmblaCarousel(
    { loop: true },
    [Autoplay({ delay: 4000 })]
)

interface SlideImage {
    mobile: string;
    tablet: string;
    desktop: string;
    default: string;
    alt?: string;
}

// Додаємо defineProps
const props = defineProps<{
    slides: SlideImage[]
}>()


// Состояние точек навигации
const dots = ref<number[]>([])
const selectedIndex = ref(0)

// Методы навигации
const scrollTo = (index: number) => {
    emblaApi.value?.scrollTo(index)
}

const scrollPrev = () => emblaApi.value?.scrollPrev()
const scrollNext = () => emblaApi.value?.scrollNext()

// Обновление точек навигации
const updateDots = () => {
    if (!emblaApi.value) return

    try {
        const scrollSnaps = emblaApi.value.scrollSnapList()
        if (Array.isArray(scrollSnaps)) {
            dots.value = scrollSnaps
            selectedIndex.value = emblaApi.value.selectedScrollSnap()
        }
    } catch (error) {
        console.error('Ошибка при обновлении точек:', error)
    }
}


onMounted(() => {
    if (!emblaApi.value) return

    updateDots()
    emblaApi.value.on('select', updateDots)
})

</script>

<template>
    <div class="embla embla--first">
        <div class="embla__viewport" ref="emblaRef">
            <div class="embla__container">
                <div
                    v-for="(slide, index) in slides"
                    :key="index"
                    class="embla__slide"
                >
                    <picture class="main-slider__img">
                        <source
                            media="(max-width: 767px)"
                            :srcset="slide.mobile"
                        >
                        <source
                            media="(min-width: 768px) and (max-width: 991px)"
                            :srcset="slide.tablet"
                        >
                        <source
                            media="(min-width: 992px)"
                            :srcset="slide.desktop"
                        >
                        <img
                            :src="slide.default"
                            :alt="slide.alt || ''"
                        >
                    </picture>
                </div>
            </div>
            <div class="embla__nav">
                <button class="embla__prev" @click="scrollPrev"></button>
                <div class="embla__dots">
                    <button
                        v-for="(dot, index) in dots"
                        :key="index"
                        class="embla__dot"
                        :class="{ 'is-selected': index === selectedIndex }"
                        @click="scrollTo(index)"
                    ></button>
                </div>
                <button class="embla__next" @click="scrollNext"></button>
            </div>
        </div>
    </div>
</template>


<style scoped lang="scss">
.embla {
    overflow: hidden;
}

.embla__container {
    display: flex;
}

.embla__slide {
    flex: 0 0 100%;
    min-width: 0;
}

.embla {
    overflow: hidden;
    width: 100%;
}

.embla__slide {
    width: 100%;
    flex-shrink: 0;
    text-align: center;
}


//*****//

/* Класс для вертикального слайдера */
.embla--vertical .embla__viewport {
    display: flex;
    flex-direction: column; /* Вертикальная прокрутка */
    height: 100%;
    overflow: hidden;
}

.embla--vertical .embla__slide {
    width: 100%; /* Слайды должны занимать всю ширину */
    height: 100%; /* Слайды должны занимать всю высоту */
}

/* Класс для горизонтального слайдера */
.embla--horizontal .embla__viewport {
    display: flex;
    flex-direction: row; /* Горизонтальная прокрутка */
    height: 100%;
    overflow: hidden;
}

.embla--horizontal .embla__slide {
    width: 100%; /* Слайды должны занимать всю ширину */
    height: 100%; /* Слайды должны занимать всю высоту */
}


.embla--first {
    @include col(lg, 12, 12, 30px);
}


@media (min-width: 768px) {
    .embla--second {
        display: block;
    }
}

@media (min-width: 992px) {

    .embla--first {
        @include col(lg, 8, 12, 24px);
    }

    .embla--first {
        padding-left: 0;
        padding-right: 0;
    }
}


@media (min-width: $screen-xxl) {

    .embla--first .embla__viewport {
        display: block;
        height: 100%;
        // overflow-y: scroll; /* Вертикальная прокрутка */
    }
}

.embla__dots {
    display: flex;
    justify-content: center;
    align-items: center;
    // margin-top: 20px;
}

.embla__dot {
    width: 20px;
    height: 8px;
    margin: 0 5px;
    border-radius: 20px;
    background-color: #E2E2E2;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s;
}

.embla__dot.is-selected {
    width: 42px;
    background-color: #22BC3E;
}

.embla__dot:hover {
    background-color: #22BC3E;
    opacity: 0.5;
}

.embla__nav {
    margin-top: 15px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
}

.embla__prev {
    cursor: pointer;
    border: none;
    width: 8px;
    height: 14px;
    background-color: #fff;
    background-image: url(../assets/icons/left-arrow.svg);
    background-repeat: no-repeat;
    background-position: center center;
}

.embla__next {
    cursor: pointer;
    border: none;
    width: 8px;
    height: 14px;
    background-color: #fff;
    background-image: url(../assets/icons/right-arrow.svg);
    background-repeat: no-repeat;
    background-position: center center;
}

</style>
