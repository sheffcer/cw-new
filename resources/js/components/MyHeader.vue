<script setup lang="ts">
// import FieldRange from '@/components/ui/field-range/FieldRange.vue';
import MainDropDown from "@/components/ui/my-dropdown-menu/MainDropDown.vue";
import AppSearch from "@/components/AppSearch.vue";
import RegionSelect from "@/components/RegionSelect.vue";
import LangSelect from "@/components/LangSelect.vue";
import { Link } from '@inertiajs/vue3';

const emit = defineEmits<{
    toggleSidebar: []
}>()

</script>

<template>
    <header class="page-header" role="banner">
        <div class="page-header__burger burger" @click="emit('toggleSidebar')"
        ><span></span></div>
        <Link href="main" :preload="true" class="page-header__logo logo">
            <picture class="page-header__img">
                <source media="(max-width: 767px)" srcset="assets/icons/logo-mobile.svg">
                <source media="(min-width: 768px)" srcset="assets/icons/logo.svg">
                <img src="assets/icons/logo.svg" alt="">
            </picture>
        </Link>

<!--        <a href="main.html" class="page-header__logo logo">-->
<!--            <picture class="page-header__img">-->
<!--                <source media="(max-width: 767px)" srcset="assets/icons/logo-mobile.svg">-->
<!--                <source media="(min-width: 768px)" srcset="assets/icons/logo.svg">-->
<!--                <img src="assets/icons/logo.svg" alt="">-->
<!--            </picture>-->
<!--        </a>-->
        <div class="page-header__catalog dropdown">
            <MainDropDown/>
        </div>
        <AppSearch class-name="page-header__search" />

        <div class="page-header__toggler field-toggler">
            <div class="field-toggler__input-wrap">
                <label class="field-toggler__name">
                    <input class="field-toggler__input" type="checkbox">
                    <span class="field-toggler__name-text"></span>
                </label>
            </div>
        </div>
        <RegionSelect/>
        <LangSelect/>

        <div class="page-header__login">
            <img src="assets/icons/login.svg" alt="" class="user-blcok__img">
        </div>
        <div class="page-header__cart cart">
            <img src="assets/icons/cart.svg" alt="" class="cart__img">
            <span class="page-header__cart-count">12</span>
        </div>
    </header>
</template>

<style scoped  lang="scss">
.page-header {
    position: relative;
    margin-top: 10px;
    // outline: 1px dotted plum;
    @include container;
    outline: none!important;
    display: flex;
    // width: 1296px;
    height: 60px;
    gap: 10px;
    // justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-shrink: 0;

    @media (min-width: 1400px) {
        width: 1296px;
    }

}

.page-header__burger.burger {
    //width: 48px;
    //height: 48px;
    padding: 10px 14px 10px 14px;
    outline: 1px solid var(--secondary-color);
    border-radius: 4px;
}

.page-header__burger.burger>span {
    width: 21px;
    height: 2px;
}

.page-header__burger.burger>span:before {
    top: -7px;
    height: 2px;
}

.page-header__burger.burger>span:after {
    top: 7px;
    height: 2px;
}

.page-header__catalog.dropdown  {
    display: none;
}

@media (min-width: $screen-lg) {
    .page-header__catalog.dropdown  {
        display: block;
    }
}

.page-header__catalog .btn {
    background-color: var(--secondary-color);
    min-width: 130px;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 9px 15px;
    gap: 10px;
    flex-shrink: 0;
    border-radius: 10px;
    border: none;
}

.page-header__catalog span {
    color: $white;
    font-family: $font-family--secondary;
    font-size: 14px;
    font-weight: 700;
}

.page-header__lang-inner {
    width: 146px;
    display: flex;
    justify-content: space-around;
}

.page-header__search {
    width: 100%;
    position: relative;
}

.page-header__search .btn--search {
    position: absolute;
    right: 5px;
    top: 50%;
    width: 30px;
    height: 30px;
    // display: flex;
    align-items: center;
    gap: 10px;
    transform: translateY(-50%);
    background-color: var(--secondary-color);
    color: $white;
    font-family: $font-family--secondary;
    font-size: 12px;
    font-style: normal;
    font-weight: 400;
    line-height: 16px;
    border: none;
    padding: 0;
    // padding: 0.5em 1em;
    // padding-left: 16px;
    // padding-right: 16px;
    // padding-top: 5px;
    // padding-bottom: 5px;
    cursor: pointer;
    border-radius: 20px;
}

.btn--search span {
    display: none;
}

@media (min-width: 768px) {
    .page-header__search .btn--search {
        right: 10px;
        display: flex;
        width: auto;
        padding-left: 16px;
        padding-right: 16px;
        padding-top: 5px;
        padding-bottom: 5px;
    }
}

@media (min-width: 768px) {
    .btn--search span {
        display: block;
    }
}


.page-header__search .field-text__input-wrap {

}

.page-header__search .field-text__input {
    padding-left: 16px;
    padding-top: 9px;
    padding-bottom: 9px;
    border-radius: 10px;
    border: none;
    outline: 1px solid var(--secondary-color);
    // border: 1px solid var(--secondary-color);
}

.page-header__search .field-text__input:active {
    outline: 0;
    box-shadow: 0 0 0 2px var(--secondary-color);
    // box-shadow: 0 0 0 2px rgba(2.193, 116.8138, 217.107, .7);
}

// .page-header__search .field-text__input:focus {
//     outline: 0;
//     border: none;
//     box-shadow: 0 0 0 2px var(--secondary-color);
// }

.page-header__search .field-text__input::placeholder{
    font-family: $font-family;
    color: var(--light-text-color);
    font-size: 10px;
    font-style: normal;
    font-weight: 400;
    line-height: 16px;
}

@media (min-width: 768px) {
    .page-header__search .field-text__input::placeholder{
        font-size: 12px;
    }
}

.page-header__search.field-text {
    margin-bottom: 0;
}

.page-header__img img {
    width: auto;
    height: auto;
    display: block; /* Убирает пробелы под изображением */
}

.page-header__logo .logo{
    width: auto;
}

@media (max-width: 767px) {
    .page-header__logo.logo {
        min-width: 37px;
    }
}


@media (min-width: 768px) {
    .page-header__logo.logo {
        min-width: 170px;
    }
}

.page-header__toggler.field-toggler {
    display: none;
    margin-bottom: 0;
    cursor: pointer;
}

@media (min-width: 1200px) {
    .page-header__toggler.field-toggler {
        display: block;
    }
}

.page-header__toggler .field-toggler {
    cursor: pointer;
}


.page-header__toggler .field-toggler__name-text:after {
    top: -5px;
    background-image: url('../assets/icons/toggler-light-icon.svg');
    background-repeat: no-repeat;
    background-position-x: 50%;
    background-position-y: 50%;
}

.page-header__toggler .field-toggler__name-text:before {
    top: -5px;
}

.page-header__toggler .field-toggler__name-text:before {
    width: 45px;
    height: 24px;
    border-radius: 12px;
    background: var(--toggler-light-gray-color);
    border: none;
}

.page-header__toggler .field-toggler__name-text:after {
    width: 21px;
    height: 21px;
    border-radius: 50%;
    background-color: $white;
    border: none;
}

.page-header__toggler .field-toggler__input:checked + .field-toggler__name-text::after {
    left: 5px; /* Изменение позиции после активации чекбокса */
    background-image: url('../assets/icons/toggler-dark-icon.svg');
    background-repeat: no-repeat;
}

.page-header__toggler {
    @at-root input:checked ~ &:after {
        transform: translate(px-to-em(34), -50%);
    }
}




.page-header__login {
    display: none;
}

@media (min-width: 768px) {
    .page-header__login {
        display: block;
    }
}


.page-header__login img {
    max-width: none;
}

.page-header__cart img {
    max-width: none;
}

.page-header__login {
    cursor: pointer;
}

.page-header__cart {
    position: relative;
    cursor: pointer;
}

.page-header__cart .page-header__cart-count {
    position: absolute;
    top: 1px;
    right: 0;
    width: 20px;
    height: 20px;
    background-color: var(--secondary-color);
    color: $white;
    font-family: $font-family--secondary;
    font-size: 12px;
    line-height: 16px;
    font-weight: 700;
    line-height: 20px;
    text-align: center;
    border-radius: 50%;
}
</style>
