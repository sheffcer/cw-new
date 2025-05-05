<script setup lang="ts">
import { useTranslation } from '@/composables/useTranslation';

const { t, locale } = useTranslation();

defineProps<{
    className: string
}>()

</script>

<template>
<!--    <label class="page-header__search field-text">-->
    <label :class="[className, 'field-text']">
            <span class="field-text__input-wrap">
              <input class="field-text__input" type="search" :placeholder="t('search.placeholder')"
              >
<!--              <button class="btn btn&#45;&#45;search"><span>Пошук</span> <img src="assets/icons/search-icon.svg" alt=""></button>-->
            </span>
        <button class="btn btn--search"><span>Пошук</span> <img src="assets/icons/search-icon.svg" alt=""></button>
    </label>
</template>

<style scoped lang="scss">
.page-header__search {
    width: 100%;
    position: relative;
}

.off-canvas__search {
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
    cursor: pointer;
    border-radius: 20px;
}

.btn--search span {
    display: none;
}

.off-canvas__search .btn--search span {
    display: none;
}

.off-canvas__search .btn--search img {
    position: relative;
    left: 3px;
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
    .off-canvas__search .btn--search span {
        display: none;
    }
}


.page-header__search .field-text__input-wrap {
    display: block;
    width: 100%;
    position: relative;
}

.page-header__search .field-text__input {
    box-sizing: border-box;
    width: 100%;
    display: block;
    //padding-left: 0;
    //pading-right: 0;
    padding-left: 16px;
    padding-top: 9px;
    padding-bottom: 9px;
    border-radius: 10px;
    border: none;
    outline: 1px solid var(--secondary-color);
    // border: 1px solid var(--secondary-color);
}

.off-canvas__search {
    box-sizing: border-box;
}

.page-header__search .field-text__input:active,
.off-canvas__search .field-text__input:active {
    outline: 0;
    box-shadow: 0 0 0 2px var(--secondary-color);
    // box-shadow: 0 0 0 2px rgba(2.193, 116.8138, 217.107, .7);
}

 .page-header__search .field-text__input:focus,
 .off-canvas__search .field-text__input:focus {
     outline: 0;
     box-shadow: 0 0 0 2px var(--secondary-color);
 }

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


</style>
