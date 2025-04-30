<script setup lang="ts">
import MainDropDown from '@/components/ui/my-dropdown-menu/MainDropDown.vue';
import   CatalogCarousel from '@/components/CatalogCarousel.vue';
import   MainCarousel from '@/components/MainCarousel.vue';
import SubmainCarousel from '@/components/SubmainCarousel.vue'
import CatalogGroupCarousel from '@/components/CatalogGroupCarousel.vue'
import NewProducts from '@/components/NewProducts.vue';



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



</script>

<template>
    <div class="main-content__inner">
<!--        <h1 class="text-2xl font-bold">Welcome Home</h1>-->
        <CatalogCarousel/>
        <div class="slider__inner">
            <MainCarousel :slides="mainSliderData"/>
            <SubmainCarousel :slides="submainSliderData" />
        </div>
        <CatalogGroupCarousel/>
        <NewProducts :title="'Новинки'" :products="products" />

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
