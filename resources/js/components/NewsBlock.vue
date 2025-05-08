<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
// Определение интерфейса для новостей
interface NewsItem {
    id: number;
    title: string;
    description: string;
    date: string;
    isNew: boolean;
    image: {
        default: string;
        mobile?: string;
        tablet?: string;
        desktop?: string;
    };
    link?: string;
}

defineProps<{
    news: NewsItem[];
    title?: string;
    showAllLink?: string;
}>();
</script>

<template>
    <div class="news">
        <div class="news__header">
            <h2 class="news__title">{{ title || 'Новини' }}</h2>
<!--            <a class="news__all" :href="showAllLink || 'news'">Більше новин</a>-->
            <Link class="news__all" href="news" :preload="true">
                Більше новин
            </Link>
        </div>
        <div class="news__inner">
            <article
                v-for="item in news"
                :key="item.id"
                class="card"
                :class="{ 'card--mod': item.link }"
            >
                <div v-if="item.isNew" class="card__new">Новинка!</div>
                <div class="card__inner">
                    <component :is="item.link ? 'a' : 'span'"
                        class="card__img-wrap"
                        :href="item.link"
                    >
                        <picture class="card__img">
                            <source
                                v-if="item.image.mobile"
                                media="(max-width: 767px)"
                                :srcset="item.image.mobile"
                            >
                            <source
                                v-if="item.image.tablet"
                                media="(min-width: 768px) and (max-width: 991px)"
                                :srcset="item.image.tablet"
                            >
                            <source
                                v-if="item.image.desktop"
                                media="(min-width: 992px)"
                                :srcset="item.image.desktop"
                            >
                            <img :src="item.image.default" :alt="item.title">
                        </picture>
                    </component>
                    <h3 class="card__title">
                        <Link v-if="item.link" :href="item.link" :preload="true">
                            {{ item.title }}
                        </Link>
<!--                        <a v-if="item.link" :href="item.link">{{ item.title }}</a>-->
                        <template v-else>{{ item.title }}</template>
                    </h3>
                    <p class="card__descr">{{ item.description }}</p>
                    <p class="card__date">{{ item.date }}</p>
                </div>
            </article>
        </div>
    </div>
</template>

<style scoped lang="scss">
.news {
    $block-name:                &;  // #{$block-name}__element
    margin-top: 20px;

    &__header {
        display: flex;
        justify-content: space-around;
        flex-direction: row;
        align-items: center;
    }

    &__inner {
        margin-top: 20px;
        display: flex;
        flex-wrap: nowrap;
        overflow: hidden;
        margin-left: 0;
        margin-right: 0;
        gap: 15px; // Добавляем промежуток между карточками вместо padding

        .card {
            position: relative;
            flex: 0 0 calc(25% - 12px); // 4 карточки в ряд с отступом
            padding: 0; // Отключаем любые отступы внутри карточки
            margin-bottom: 15px;

            @media (max-width: 767px) {
                flex: 0 0 calc(50% - 8px); // 2 карточки в ряд на мобильных
            }

            @media (min-width: 768px) and (max-width: 991px) {
                flex: 0 0 calc(33.33% - 10px); // 3 карточки в ряд на планшетах
            }
        }
    }

    &__inner .card__title {
        padding-left: 5px;
        margin: 0 0 10px;
        color: $black;
        font-family: $font-family;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        width: 100%; // Убедимся, что заголовок занимает всю ширину
        box-sizing: border-box; // Важно для правильного расчета ширины с padding
    }

    &__inner .card__descr {
        margin: 0;
        margin-bottom: 20px;
        padding-left: 5px;
        color: $black;
        font-family: $font-family;
        overflow: hidden;
        text-overflow: ellipsis;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 100%; // Убедимся, что описание занимает всю ширину
        box-sizing: border-box; // Важно для правильного расчета ширины с padding
    }

    &__inner .card__date {
        padding-left: 5px;
        color: var(--light-text-color);
        font-family: $font-family;
        text-overflow: ellipsis;
        font-family: Manrope;
        font-size: 12px;
        font-style: normal;
        font-weight: 400;
        line-height: normal;
        width: 100%; // Убедимся, что дата занимает всю ширину
        box-sizing: border-box; // Важно для правильного расчета ширины с padding
    }

    &__inner .card__img-wrap {
        display: block;
        max-width: 100%;
    }

    &__inner .card__img {
        display: block;
        width: 100%;
    }

    &__inner .card__img img {
        display: block;
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    &__inner .card__inner {
        padding: 0;
        display: flex;
        flex-direction: column;
        width: 100%; // Гарантируем, что внутренний контейнер занимает 100% ширины
    }

    &__title {
        margin: 0;
        flex-grow: 1;
        color: var(--secondary-color);
        font-family: $font-family--secondary;
        font-size: 36px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
    }

    &__all {
        position: relative;
        text-align: right;
        color: $black;
        font-family: $font-family--secondary;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-decoration: none;
        display: inline-flex;
        height: 52px;
        padding: 0 20px;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
        border-radius: 25px;
        border: 1px solid $black;
    }

    &__all::after {
        content: '';
        position: absolute;
        display: block;
        top: 18px;
        right: 0;
        width: 13px;
        height: 15px;
        background: url('../assets/icons/all-arrow-icon.svg') no-repeat;
    }
}

.card {
    &__new {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 1;
        background: var(--secondary-color);
        color: white;
        font-size: 12px;
        padding: 4px 8px;
        border-radius: 4px;
    }

    &__inner {
        display: flex;
        flex-direction: column;
    }
}

// Добавляем глобальный box-sizing для всех элементов в компоненте
* {
  box-sizing: border-box;
}
</style>
