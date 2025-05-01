<script setup lang="ts">
import useEmblaCarousel from 'embla-carousel-vue';
import type { EmblaOptionsType } from 'embla-carousel';
import Autoplay from 'embla-carousel-autoplay';

defineProps<{ partners: { id: number; image: string; title: string; link: string }[]; title?: string }>();

const OPTIONS: EmblaOptionsType = {
    align: 'start',
    loop: true,
    skipSnaps: false,
    dragFree: false,
    containScroll: 'trimSnaps'
};

const [emblaRef, emblaApi] = useEmblaCarousel(OPTIONS, [Autoplay()]);

const scrollPrev = () => emblaApi.value?.scrollPrev();
const scrollNext = () => emblaApi.value?.scrollNext();
</script>


<template>
    <div class="partner-banner">
        <h2 v-if="title" class="partner-banner__title">{{ title }}</h2>

        <div class="embla embla--five">
            <div class="embla__viewport" ref="emblaRef">
                <div class="embla__container">
                    <div
                        v-for="partner in partners"
                        :key="partner.id"
                        class="embla__slide"
                    >
                        <div class="embla__slide__number">
                            <a
                                class="card__img-wrap"
                                :href="partner.link"
                                :title="partner.title"
                            >
                                <img
                                    class="card__img"
                                    :src="partner.image"
                                    :alt="partner.title"
                                />
                            </a>
                        </div>
                    </div>
                </div>
            </div>

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
                        />
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
                        />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
.partner-banner {
    position: relative;
    padding: 0 1.8rem;
}

.embla--five {
    margin: 40px auto;
    position: relative;
}

.embla__viewport {
    overflow: hidden;
}

.embla__container {
    display: flex;
    gap: 2rem;
}

.embla__slide {
    flex: 0 0 20%;
    min-width: 0;
}

.embla__buttons {
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    pointer-events: none;
}

.embla__button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 3.6rem;
    height: 3.6rem;
    border-radius: 50%;
    background-color: #fff;
    border: 1px solid #E2E2E2;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    pointer-events: auto;
    z-index: 1;
}

.embla__button--prev {
    left: -1.8rem;
}

.embla__button--next {
    right: -1.8rem;
}

.embla__button:hover {
    background-color: #f5f5f5;
}

.embla__button__svg {
    width: 35%;
    height: 35%;
}

.embla__slide__number {
    border: 1px solid #E2E2E2;
    border-radius: 1.8rem;
    height: 114px;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card__img-wrap {
    display: block;
    margin: 0;
}

.card__img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

@media (max-width: 1399px) {
    .embla__slide {
        flex: 0 0 25%;
    }
}

@media (max-width: 1199px) {
    .embla__slide {
        flex: 0 0 33.333%;
    }
}

@media (max-width: 991px) {
    .embla__slide {
        flex: 0 0 50%;
    }
}

@media (max-width: 767px) {
    .embla__slide {
        flex: 0 0 100%;
    }
}
</style>
