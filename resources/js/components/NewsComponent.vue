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

defineProps<{
  newsItems: NewsItem[];
}>();

function truncate(text: string, length: number): string {
  if (!text) return '';
  return text.length > length ? text.substring(0, length) + '...' : text;
}

function formatDate(dateString: string): string {
  if (!dateString) return '';
  const date = new Date(dateString);
  return date.toLocaleDateString();
}
</script>

<template>
  <div class="news-list">
<!--    <h1 class="news-list__title">Новости</h1>-->

    <div v-for="newsItem in newsItems" :key="newsItem.id" class="news-list__item">
      <!-- Добавляем изображение с учетом разных форматов -->
      <div v-if="newsItem.image" class="news-list__item-image">
        <Link :href="`/news/${newsItem.id}`">
          <picture>
            <source v-if="newsItem.image.desktop" media="(min-width: 1024px)" :srcset="newsItem.image.desktop">
            <source v-if="newsItem.image.tablet" media="(min-width: 768px)" :srcset="newsItem.image.tablet">
            <source v-if="newsItem.image.mobile" media="(max-width: 767px)" :srcset="newsItem.image.mobile">
            <img :src="newsItem.image.default" :alt="newsItem.title" class="news-list__item-image-src">
          </picture>
        </Link>
      </div>

      <div class="news-list__item-content">
        <h2 class="news-list__item-title">
          <Link :href="`/news/${newsItem.id}`" class="news-list__item-link">
            {{ newsItem.title }}
          </Link>
        </h2>

        <p class="news-list__item-text">{{ truncate(newsItem.content, 150) }}</p>

        <div class="news-list__item-date">
          {{ formatDate(newsItem.created_at) }}
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
.news-list__title {
  font-size: 1.5rem;
  font-weight: bold;
  margin-bottom: 1.5rem;
}

.news-list__item {
  margin-bottom: 1.5rem;
  padding: 1rem;
  border: 1px solid #e2e8f0;
  border-radius: 4px;
  display: flex;
  flex-direction: column;
}

@media (min-width: 768px) {
  .news-list__item {
    flex-direction: row;
    gap: 1rem;
  }
}

.news-list__item-image {
  margin-bottom: 1rem;
}

@media (min-width: 768px) {
  .news-list__item-image {
    width: 25%;
    margin-bottom: 0;
  }

  .news-list__item-content {
    width: 75%;
  }
}

.news-list__item-image-src {
  width: 100%;
  height: auto;
  max-height: 200px;
  object-fit: cover;
  border-radius: 4px;
}

.news-list__item-title {
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 0.5rem;
}

.news-list__item-link {
  color: #3182ce;
}

.news-list__item-link:hover {
  text-decoration: underline;
}

.news-list__item-text {
  margin-bottom: 0.5rem;
}

.news-list__item-date {
  font-size: 0.875rem;
  color: #666;
}
</style>
