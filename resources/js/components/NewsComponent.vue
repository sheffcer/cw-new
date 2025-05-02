<script setup lang="ts">
// Определение типа для новостей
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
    newsItems: NewsItem[];
}>();
</script>

<template>
    <div class="news-component">
        <div class="news-grid">
            <article
                v-for="item in newsItems"
                :key="item.id"
                class="news-card"
                :class="{ 'news-card--with-link': !!item.link }"
            >
                <div v-if="item.isNew" class="news-card__badge">Новинка!</div>

                <!-- Разные шаблоны для карточек с ссылкой и без -->
                <template v-if="item.link">
                    <a :href="item.link" class="news-card__link-wrapper">
                        <div class="news-card__image-container">
                            <picture>
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
                                <img :src="item.image.default" :alt="item.title" class="news-card__image">
                            </picture>
                        </div>
                        <div class="news-card__content">
                            <h2 class="news-card__title news-card__title--link">{{ item.title }}</h2>
                            <p class="news-card__description">{{ item.description }}</p>
                        </div>
                        <div class="news-card__footer">
                            <span class="news-card__date">{{ item.date }}</span>
                            <div class="news-card__read-more">Детальніше <span class="news-card__arrow">→</span></div>
                        </div>
                    </a>
                </template>

                <template v-else>
                    <div class="news-card__no-link-wrapper">
                        <div class="news-card__image-container">
                            <picture>
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
                                <img :src="item.image.default" :alt="item.title" class="news-card__image">
                            </picture>
                        </div>
                        <div class="news-card__content">
                            <h2 class="news-card__title">{{ item.title }}</h2>
                            <p class="news-card__description">{{ item.description }}</p>
                        </div>
                        <div class="news-card__footer">
                            <span class="news-card__date">{{ item.date }}</span>
                        </div>
                    </div>
                </template>
            </article>
        </div>

        <!-- Пагинация -->
        <div class="pagination">
            <button class="pagination__button pagination__button--active">1</button>
            <button class="pagination__button">2</button>
            <button class="pagination__button">3</button>
            <span class="pagination__dots">...</span>
            <button class="pagination__button">10</button>
        </div>
    </div>
</template>

<style scoped lang="scss">
.news-grid {
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    gap: 30px;

    @media (min-width: 768px) {
        grid-template-columns: repeat(2, 1fr);
    }

    @media (min-width: 992px) {
        grid-template-columns: repeat(3, 1fr);
    }
}

.news-card {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
    background: white;
    display: flex;
    flex-direction: column;
    height: 450px; // Фиксированная высота карточки

    // Применяем эффекты только для карточек с ссылками
    &--with-link {
        transition: box-shadow 0.3s ease;

        &:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .news-card__link-wrapper {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        &:hover .news-card__image {
            transform: scale(1.05);
        }

        &:hover .news-card__title--link {
            color: var(--secondary-color);
            text-decoration: underline;
        }

        &:hover .news-card__read-more {
            gap: 8px;
        }

        &:hover .news-card__arrow {
            transform: translateX(2px);
        }
    }

    &__link-wrapper {
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        height: 100%;
    }

    &__no-link-wrapper {
        display: flex;
        flex-direction: column;
        color: inherit;
        height: 100%;
    }

    &__badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background: var(--secondary-color);
        color: white;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
        z-index: 1;
    }

    &__image-container {
        height: 200px;
        overflow: hidden;
        flex-shrink: 0;
    }

    &__image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    &__content {
        padding: 20px 20px 0 20px;
        flex-grow: 1;
        overflow: hidden; // Скрываем переполнение
        display: flex;
        flex-direction: column;
    }

    &__title {
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 10px;
        color: $black;
        max-height: 47px; // Увеличиваем высоту для заголовка
        overflow: hidden;
        line-height: 1.3; // Обеспечиваем правильный интервал строк

        &--link {
            color: var(--secondary-color);
            //color: #0066cc; // Синий цвет для заголовков-ссылок
            transition: color 0.2s ease, text-decoration 0.2s ease;
            text-decoration: underline;
        }
    }

    &__description {
        color: rgba(0, 0, 0, 0.7);
        font-size: 14px;
        line-height: 1.5;
        margin-bottom: 10px;
        max-height: 63px; // Примерная высота для трех строк
        overflow: hidden;
    }

    &__footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #eee;
        padding: 15px 20px;
        flex-shrink: 0;
        margin-top: auto; // Привязываем футер к низу карточки
        background-color: white; // Убедимся, что футер имеет фон
    }

    // Для карточек без ссылки - просто выравниваем дату влево
    &:not(.news-card--with-link) &__footer {
        justify-content: flex-start;
    }

    &__date {
        color: var(--light-text-color);
        font-size: 12px;
    }

    &__read-more {
        color: var(--secondary-color);
        font-size: 14px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
        transition: gap 0.2s ease;
    }

    &__arrow {
        font-size: 16px;
        transition: transform 0.2s ease;
    }
}

// Отдельный класс-обертка для карточек без ссылок
.news-card:not(.news-card--with-link) {
    .news-card__no-link-wrapper {
        cursor: default;
    }
}

.pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
    gap: 5px;

    &__button {
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #ddd;
        border-radius: 50%;
        background: white;
        cursor: pointer;
        font-size: 14px;
        transition: all 0.2s ease;

        &:hover {
            background: #f5f5f5;
        }

        &--active {
            background: var(--secondary-color);
            color: white;
            border-color: var(--secondary-color);

            &:hover {
                background: var(--secondary-color);
            }
        }
    }

    &__dots {
        margin: 0 5px;
    }
}
</style>
