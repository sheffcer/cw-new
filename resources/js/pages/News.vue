<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';
import NewsComponent from '@/components/NewsComponent.vue';

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

// Данные новостей
// Массив новостей с ссылками для всех элементов
const newsItems = ref<NewsItem[]>([
    {
        id: 1,
        title: 'Мініатюрні деталі які якісно доповнять ваш користувацький досвід',
        description: 'Адаптер перехідник Colorway Type-C до USB-A – це мініатюрний адаптер, який дає можливість заряджати смартфони та планшети',
        date: '10.10.2024',
        isNew: true,
        image: {
            default: 'assets/images/news-01.jpg',
            mobile: 'assets/images/news-01-mobile.jpg',
            tablet: 'assets/images/news-01-tablet.jpg',
            desktop: 'assets/images/news-01-desktop.jpg'
        },
    },
    {
        id: 2,
        title: 'Нова лінійка портативних акумуляторів з підтримкою швидкої зарядки',
        description: 'Зустрічайте нову лінійку портативних акумуляторів Colorway з підтримкою технологій Quick Charge та Power Delivery',
        date: '05.10.2024',
        isNew: true,
        image: {
            default: 'assets/images/news-02.jpg',
            mobile: 'assets/images/news-02-mobile.jpg',
            tablet: 'assets/images/news-02-tablet.jpg',
            desktop: 'assets/images/news-02-desktop.jpg'
        },
        link: '/news/2'
    },
    {
        id: 3,
        title: 'Бездротові навушники ColorWay: новий рівень комфорту та якості звуку',
        description: 'Представляємо нову модель бездротових навушників ColorWay з активним шумопоглинанням та підтримкою Bluetooth 5.3',
        date: '28.09.2024',
        isNew: true,
        image: {
            default: 'assets/images/news-03.jpg',
            mobile: 'assets/images/news-03-mobile.jpg',
            tablet: 'assets/images/news-03-tablet.jpg',
            desktop: 'assets/images/news-02-desktop.jpg'
        },

    },
    {
        id: 4,
        title: 'Інноваційні рішення для очищення техніки від ColorWay',
        description: 'Нова серія професійних засобів для очищення екранів, клавіатур та інших поверхонь електронних пристроїв',
        date: '20.09.2024',
        isNew: false,
        image: {
            default: 'assets/images/news-04.jpg',
            mobile: 'assets/images/news-04-mobile.jpg',
            tablet: 'assets/images/news-04-tablet.jpg',
            desktop: 'assets/images/news-04-desktop.jpg'
        },
        link: '/news/4'
    },
    {
        id: 5,
        title: 'Нові аксесуари ColorWay для смартфонів: захист та стиль',
        description: 'Представляємо нову колекцію захисних чохлів, скла та аксесуарів для смартфонів від ColorWay',
        date: '15.09.2024',
        isNew: false,
        image: {
            default: 'assets/images/news-01.jpg', // тут можна замінити на реальне зображення
            mobile: 'assets/images/news-01-mobile.jpg',
            tablet: 'assets/images/news-01-tablet.jpg',
            desktop: 'assets/images/news-01-desktop.jpg'
        },
        link: '/news/5'
    },
    {
        id: 6,
        title: 'Екологічні ініціативи ColorWay: зелені технології для майбутнього',
        description: 'ColorWay запускає нову програму з переробки використаних картриджів та батарей для збереження довкілля',
        date: '10.09.2024',
        isNew: false,
        image: {
            default: 'assets/images/news-02.jpg', // тут можна замінити на реальне зображення
            mobile: 'assets/images/news-02-mobile.jpg',
            tablet: 'assets/images/news-02-tablet.jpg',
            desktop: 'assets/images/news-02-desktop.jpg'
        },
        link: '/news/6'
    },
    {
        id: 7,
        title: 'ColorWay відкриває новий сервісний центр у Києві',
        description: 'Відтепер клієнти з Києва можуть отримати швидку та якісну технічну підтримку в новому сервісному центрі',
        date: '05.09.2024',
        isNew: false,
        image: {
            default: 'assets/images/news-03.jpg', // тут можна замінити на реальне зображення
            mobile: 'assets/images/news-03-mobile.jpg',
            tablet: 'assets/images/news-03-tablet.jpg',
            desktop: 'assets/images/news-03-desktop.jpg'
        },
        link: '/news/7'
    },
    {
        id: 8,
        title: 'ColorWay на міжнародній виставці електроніки в Берліні',
        description: 'ColorWay представила свої новинки на найбільшій європейській виставці електроніки та здобула високі оцінки експертів',
        date: '01.09.2024',
        isNew: false,
        image: {
            default: 'assets/images/news-04.jpg', // тут можна замінити на реальне зображення
            mobile: 'assets/images/news-04-mobile.jpg',
            tablet: 'assets/images/news-04-tablet.jpg',
            desktop: 'assets/images/news-04-desktop.jpg'
        },
        link: '/news/8'
    }
]);

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
        <h1 class="news-page__title">Новини ColorWay</h1>
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
