<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import NewsComponent from '@/components/NewsComponent.vue';
import { useTranslation } from '@/composables/useTranslation';

const { t, locale } = useTranslation();


// Определение типа для новостей
interface NewsItem {
    id: number;
    title: string;
    description: string;
    created_at: string;
    isNew: boolean;
    image: {
        default: string;
        mobile?: string;
        tablet?: string;
        desktop?: string;
    };
    link?: string;
}

// Получаем данные новостей с сервера
const props = defineProps<{
    newsItems: NewsItem[];
}>();

</script>

<template>
    <Head>
        <title>Новини ColorWay</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta head-key="description" name="description" content="Останні новини та оновлення від компанії ColorWay" />
        <meta name="language" content="uk">
        <meta http-equiv="content-language" content="uk">
    </Head>

    <div class="main-content__inner">
        <h1 class="news-page__title">{{ t('news') }}
        </h1>
        <NewsComponent :news-items="newsItems" />
    </div>
</template>

<style scoped lang="scss">
.news-page__title {
    margin-bottom: 30px;
    color: var(--secondary-color);
    font-family: $font-family--secondary;
    font-size: 36px;
    font-weight: 700;
}
</style>
