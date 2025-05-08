<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

interface Image {
  default: string;
  mobile?: string;
  tablet?: string;
  desktop?: string;
}

interface NewsItem {
  id: number;
  title: string;
  content: string;
  image?: Image;
  created_at: string;
}

interface RelatedNews {
  id: number;
  title: string;
  content: string;
  image?: Image;
  link: string;
}

defineProps<{
  newsItem: NewsItem;
  relatedNews: RelatedNews[];
}>();

function formatDate(dateString: string): string {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString();
}

function truncate(text: string, length: number): string {
  if (!text) return '';
  return text.length > length ? text.substring(0, length) + '...' : text;
}
</script>

<template>
  <div class="news-detail">
    <h1 class="news-detail__title">{{ newsItem.title }}</h1>

    <!-- Добавляем изображение с учетом разных форматов -->
    <div v-if="newsItem.image" class="news-detail__image">
      <picture>
        <source v-if="newsItem.image.desktop" media="(min-width: 1024px)" :srcset="newsItem.image.desktop">
        <source v-if="newsItem.image.tablet" media="(min-width: 768px)" :srcset="newsItem.image.tablet">
        <source v-if="newsItem.image.mobile" media="(max-width: 767px)" :srcset="newsItem.image.mobile">
        <img :src="newsItem.image.default" :alt="newsItem.title" class="news-detail__image-src">
      </picture>
    </div>

    <div class="news-detail__content">
      <p>{{ newsItem.content }}</p>
    </div>

    <div class="news-detail__date">
      Опубликовано: {{ formatDate(newsItem.created_at) }}
    </div>

    <!-- Секция со связанными новостями -->
    <div v-if="relatedNews && relatedNews.length > 0" class="news-detail__related">
      <h2 class="news-detail__related-title">Похожие новости</h2>

      <div class="news-detail__related-list">
        <div v-for="news in relatedNews" :key="news.id" class="news-detail__related-item">
          <Link :href="news.link" class="news-detail__related-link">
            <!-- Изображение для связанной новости -->
            <div v-if="news.image" class="news-detail__related-image">
              <img :src="news.image.default" :alt="news.title" class="news-detail__related-image-src">
            </div>
            <h3 class="news-detail__related-item-title">{{ news.title }}</h3>
          </Link>
          <p class="news-detail__related-item-text">{{ truncate(news.content, 100) }}</p>
        </div>
      </div>
    </div>

    <div class="news-detail__back">
      <Link href="/news" class="news-detail__back-link">
        Назад к списку новостей
      </Link>
    </div>
  </div>
</template>

<style scoped lang="scss">
.news-detail {
    $block-name:                &; // #{$block-name}__element
    @include container();

    &__title {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 1rem;
    }

    &__image {
        margin-bottom: 1rem;
    }

    &__image-src {
        max-width: 100%;
        height: auto;
        border-radius: 4px;
    }

    &__content {
        margin-bottom: 1.5rem;
    }

    &__date {
        font-size: 0.875rem;
        color: #666;
        margin-bottom: 2rem;
    }

    &__related {
        margin-top: 2rem;
    }

    &__related-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    &__related-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1rem;
    }

    &__related-item {
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        padding: 1rem;
    }

    &__related-image {
        margin-bottom: 0.5rem;
    }

    &__related-image-src {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 4px;
    }

    &__related-link {
        color: #3182ce;
    }

    &__related-link:hover {
        text-decoration: underline;
    }

    &__related-item-title {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    &__related-item-text {
        font-size: 0.875rem;
        color: #4a5568;
    }

    &__back {
        margin-top: 1.5rem;
    }

    &__back-link {
        color: #3182ce;
    }

    &__back-link:hover {
        text-decoration: underline;
    }
}

</style>
