<script setup lang="ts">
// import MainDropDown from '@/components/ui/my-dropdown-menu/MainDropDown.vue';

import { Head } from '@inertiajs/vue3';
import CatalogCarousel from '@/components/CatalogCarousel.vue';
import MainCarousel from '@/components/MainCarousel.vue';
import SubmainCarousel from '@/components/SubmainCarousel.vue';
import CatalogGroupCarousel from '@/components/CatalogGroupCarousel.vue';
import NewProducts from '@/components/NewProducts.vue';
import VideoCarousel from '@/components/VideoCarousel.vue';
import PartnerBannersCarousel from '@/components/PartnerBannersCarousel.vue';
import NewsBlock from '@/components/NewsBlock.vue';
import { usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const page = usePage();

onMounted(() => {
    console.log('Page data:', page);
    // console.log('test123');
});



defineOptions({
  name: 'HomePage'
});


const mainSliderData = [
    {
        mobile: 'assets/images/main-slider-01-mobile.jpg',
        tablet: 'assets/images/main-slider-01-tablet.jpg',
        desktop: 'assets/images/main-slider-01-desktop.jpg',
        default: 'assets/images/main-slider-01.jpg',
        alt: 'Слайд 1'
    },
    {
        mobile: 'assets/images/main-slider-01-mobile.jpg',
        tablet: 'assets/images/main-slider-01-tablet.jpg',
        desktop: 'assets/images/main-slider-01-desktop.jpg',
        default: 'assets/images/main-slider-01.jpg',
        alt: 'Слайд 2'
    },
    {
        mobile: 'assets/images/main-slider-01-mobile.jpg',
        tablet: 'assets/images/main-slider-01-tablet.jpg',
        desktop: 'assets/images/main-slider-01-desktop.jpg',
        default: 'assets/images/main-slider-01.jpg',
        alt: 'Слайд 3'
    }
]

const submainSliderData = [
    {
        desktop: 'assets/images/sub-slider-01-desktop.jpg',
        tablet: 'assets/images/sub-slider-01-tablet.jpg',
        default: 'assets/images/sub-slider-01.jpg',
        alt: 'Подслайд 1'
    },
    {
        desktop: 'assets/images/sub-slider-02-desktop.jpg',
        tablet: 'assets/images/sub-slider-02-tablet.jpg',
        default: 'assets/images/sub-slider-02.jpg',
        alt: 'Подслайд 2'
    }
]

const products = [
    {
        code: 'CW-TWS1BE',
        title: 'Навушники ColorWay Slim TWS-1 Earbuds Long Life Бежеві',
        price: '899 ₴',
        imageUrl: 'assets/images/CW-TWS1BE.jpg',
    },
    {
        code: 'CW-PB800LPA8BK',
        title:
            'УМБ ColorWay Power Bank 80 000 mAh LCD/Lamp (USB QC3.0 + USB-C Power Delivery 22.5W) Black',
        price: '2 899 ₴',
        imageUrl: 'assets/images/CW-PB800LPA8BK-PDD.jpg',
    },
    {
        code: 'CW-TWS3BK',
        title: 'Навушники ColorWay TWS-3 Earbuds чорні',
        price: '859 ₴',
        imageUrl: 'assets/images/CW-TWS3BK.jpg',
    },
    {
        code: 'CW-CHS047PD',
        title:
            'Сетевое зарядное устройство ColorWay Power Delivery GaN (USB-A + 3USB TYPE-C) (100W) чёрное',
        price: '2 099 ₴',
        oldPrice: '1 784 ₴',
        discount: '-15%',
        imageUrl: 'assets/images/CW-CHS047PD-BK.jpg',
    },
    {
        code: 'CW-CHE44W',
        title: 'Мережевий фільтр-подовжувач ColorWay 4 розетки/4USB',
        price: '699 ₴',
        imageUrl: 'assets/images/CW-CHE44W.jpg',
    },
    {
        code: 'CW-CHS049PD-WT',
        title: 'Мережевий зарядний пристрій ColorWay GaN Mini 65W PD Port PPS USB-C білий',
        price: '999 ₴',
        imageUrl: 'assets/images/CW-CHS049PD-WT.jpg',
    },
];

const videosData = [
    { id: 1, src: 'https://www.youtube.com/embed/dm3USaTW8u4?rel=0', title: 'ColorWay Slim Headphones TWS-2 Earbuds Black (CW-TWS2BK)' },
    { id: 2, src: 'https://www.youtube.com/embed/wM2JUPI8zUI?rel=0', title: 'Power Bank ColorWay 30 000 mAh High-power 2 (USB QC3.0 + USB-C PD 22.5W) Black' },
    { id: 3, src: 'https://www.youtube.com/embed/q5kSoBi5dMg?rel=0', title: 'ColorWay Slim Headphones 3.5 mm Wired Earphone Blast 1 Black' },
    { id: 4, src: 'https://www.youtube.com/embed/RDw-Myq2mcI?rel=0', title: 'ColorWay microfiber car wash and polish glove, double-sided (CW-2417)' },
    { id: 5, src: 'https://www.youtube.com/embed/JntBux3lDh4?rel=0', title: 'ColorWay LCD and TFT Cleaning Wipes 40pcs (CW-1074)' },
    { id: 6, src: 'https://www.youtube.com/embed/uZ-rXNRg3Mo?rel=0', title: 'ColorWay synthetic suede car wipe in tube 43x32cm/66x43cm' },
    { id: 7, src: 'https://www.youtube.com/embed/iw8dUGxhUFI?rel=0', title: 'Power socket СolorWay 5 power sockets/3M black (CW-PSEA53BK)' },
    { id: 8, src: 'https://www.youtube.com/embed/dmi1IE4D5I0?rel=0', title: 'Power Bank ColorWay 20 000 mAh(USB QC3.0 + USB-C PD 20W)' }
];

const partnersBanners = [
    {
        id: 1,
        image: 'assets/images/brain.png',
        title: 'Брейн',
        link: '/partners/brain'
    },
    {
        id: 2,
        image: 'assets/images/zhuk.png',
        title: 'ЖЖУК',
        link: '/partners/zhuk'
    },
    {
        id: 3,
        image: 'assets/images/rozetka.png',
        title: 'Розетка',
        link: '/partners/rozetka'
    },
    {
        id: 4,
        image: 'assets/images/vodafone.png',
        title: 'Водафон',
        link: '/partners/vodafone'
    },
    {
        id: 5,
        image: 'assets/images/foxtrot.png',
        title: 'Фокстрот',
        link: '/partners/foxtrot'
    },
    {
        id: 6,
        image: 'assets/images/auchan.png',
        title: 'Ашан',
        link: '/partners/auchan'
    },
    {
        id: 7,
        image: 'assets/images/epicentr.png',
        title: 'Епіцентр',
        link: '/partners/epicentr'
    },
    {
        id: 8,
        image: 'assets/images/microtron.png',
        title: 'Мікротрон',
        link: '/partners/microtron'
    }
];

const newsData = [
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
        link: '/news/1'
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
        }
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
        link: '/news/3'
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
        }
    }
];


</script>

<template>
    <Head title="">
        <title>Main Index</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta head-key="description" name="index page colorway" content="This is the default description Colorway" />
        <meta name="language" content="uk">
        <meta http-equiv="content-language" content="uk">
        <meta property="og:url" content="https://colorway.com/uk_UA">
        <link rel="alternate" href="https://colorway.com/uk_UA/uk_UA" hreflang="uk-UA">
        <link rel="alternate" href="https://colorway.com/ru_UA/uk_UA" hreflang="ru-UA">
        <link rel="alternate" href="https://colorway.com/en_UA/uk_UA" hreflang="en-UA">
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />"
        <meta name="ROBOTS" content="INDEX, FOLLOW">
    </Head>
    <div class="main-content__inner">
<!--        <h1 class="text-2xl font-bold">Welcome Home</h1>-->
        <CatalogCarousel/>
        <div class="slider__inner">
            <MainCarousel :slides="mainSliderData"/>
            <SubmainCarousel :slides="submainSliderData" />
        </div>
        <CatalogGroupCarousel/>
        <NewProducts :title="'Новинки'" :products="products" />
        <VideoCarousel
            :videos="videosData"
            :autoplay="true"
            :delay="5000"
        />
<!--        <PartnerBannersCarousel-->
<!--            :partners="partnersBanners"-->
<!--            :title="'Наші Партнери'"-->
<!--         />-->

        <NewsBlock
            :news="newsData"
            title="Новини"
            showAllLink="/news"
        />


    </div>
</template>

<style scoped>
.menu__item img {
    width: auto;
}

.slider__inner {
    flex-wrap: wrap;
    margin-top: 20px;
    margin-bottom: 20px;
}
@media (min-width: 993px) {
    .slider__inner {
        flex-wrap: nowrap;
    }
}

</style>
