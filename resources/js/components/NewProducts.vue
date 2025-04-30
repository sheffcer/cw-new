<script lang="ts" setup>
// import { PropType } from "vue";

// Пропс для прийому списку товарів
interface Product {
    code: string;
    title: string;
    price: string;
    imageUrl: string;
    oldPrice?: string;
    discount?: string;
}

defineProps<{
    products: Product[]; // Масив товарів
    title: string;       // Заголовок блоку
}>();
</script>

<template>
    <div class="new-product">
        <h2 class="new-product__title">{{ title }}</h2>
        <div class="new-product__inner">
            <article
                v-for="product in products"
                :key="product.code"
                class="card"
                :class="{ 'card--mod': !!product.discount }"
            >
                <div class="card__new">Новинка!</div>
                <div class="card__inner">
                    <a v-if="product.imageUrl" class="card__img-wrap" href="#">
                        <img class="card__img" :src="product.imageUrl" :alt="product.title" />
                    </a>
                    <h3 class="card__title">
                        <a href="#">{{ product.title }}</a>
                    </h3>
                    <div class="card__price-block">
                        <p v-if="product.oldPrice" class="card__price-old">{{ product.oldPrice }}</p>
                        <p class="card__price">{{ product.price }}</p>
                        <div v-if="product.discount" class="card__procent">{{ product.discount }}</div>
                        <img class="card__buy" src="assets/icons/cart-icon-small.svg" alt="Купити">
                    </div>
                </div>
            </article>
        </div>
    </div>
</template>

<style scoped lang="scss">
.new-product__inner {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}

.new-product__title {
    text-align: center;
    font-family: $font-family--secondary;
    color: var(--secondary-color, #333); /* Використовує змінні або стандартний колір */
    font-size: 36px;
    font-weight: 700;
}

.card {
    background: #fff;
    //border: 1px solid #ccc;
    border-radius: 8px;
    padding: 10px;
    flex: 1 1 calc(50% - 20px); /* Для адаптивності */
    box-sizing: border-box;
}

.card__img-wrap {
    display: block;
    margin-bottom: 10px;
}

.card__img {
    max-width: 100%;
    border-radius: 8px;
    background: #f5f5f5;
}

.card__title {
    font-family: $font-family--secondary;
    margin: 0 0 20px;
    flex-grow: 1;
        font-size: 14px;
    font-style: normal;
    font-weight: 500;
    line-height: normal;
    color: var(--primary-color, #000);
    //color: deeppink!important;
}

.card__price-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card__price {
    font-size: 20px;
    font-weight: bold;
    color: var(--price-color, #e63946);
}

.card__price-old {
    font-size: 16px;
    text-decoration: line-through;
}

.card__procent {
    margin-left: 10px;
    background: #ff5851;
    color: #fff;
    padding: 5px;
    border-radius: 4px;
}

@media (min-width: 768px) {
    .card {
        flex: 1 1 calc(33.333% - 20px);
        //@include col(md, 4, 12, 30px);
    }
}

@media (min-width: 992px) {
    .card {
        flex: 1 1 calc(25% - 20px);
        //@include col(lg, 3, 12, 24px);

    }
}

@media (min-width: 1400px) {
    .card {
        flex: 1 1 calc(20% - 20px);
        //@include col(xxl, 2, 10, 24px);
    }
}

.card {

    $block-name:                &; // #{$block-name}__element


    @media(min-width: 480px) {
        padding: 0 15px;
    }

    &__inner {
        padding: 16px;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
        align-items: center;
        position: relative;
        width: 100%;
        //   margin-bottom: 20px;
        border: 1px solid #e2e2e2;
        border-radius: 10px;
    }

    &__img-wrap {
        display: block;
        flex-shrink: 0;
        max-width: 173px;
        //   margin-top: 20px;
        margin-bottom: 20px;
    }

    &__img {
        display: block;
    }

    &__title {
        margin: 0 0 20px;
        flex-grow: 1;
        color: $black;
        font-family: $font-family;
        font-size: 14px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    &__new {
        position: absolute;
        z-index: 1;
        //   top: 0;
        //   left: 50%;
        top: 5%;
        left: 15%  ;
        padding: 5px 10px;
        border-radius: 5px;
        font-family: $font-family--secondary;
        font-size: 12px;
        line-height: 1;
        font-weight: 700;
        color: $white;
        background: $color-success;
        //   transform: translateX(-50%) rotate(-10deg);
    }

    &__top {
        position: absolute;
        z-index: 1;
        top: 5%;
        left: 15%;
        padding: 5px 10px;
        border-radius: 5px;
        font-family: $font-family--secondary;
        font-size: 12px;
        line-height: 1;
        font-weight: 700;
        color: $white;
        background: var(--label-top-color);
    }

    &__price {
        margin-top: 20px;
        flex-shrink: 0;
        margin: auto 0 0;
        font-family: $font-family--secondary;
        font-size: $font-size--h3;
        font-weight: 700;
        line-height: 1;
    }

    &__price-old {
        position: absolute;
        top: -50%;
        left: 0;
        color: var(--light-text-color);
        font-family: $font-family;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
        text-decoration-line: strikethrough;
    }

    &__procent {
        position: absolute;
        top: -50%;
        left: 35%;
        padding: 0 5px;
        color: $white;
        background: var(--tertiary-color);
        font-family: $font-family;
        border-radius: 10px;
        font-size: 10px;
        font-style: normal;
        font-weight: 500;
        line-height: normal;
    }

    &__price-block {
        position: relative;
        // margin-top: 20px;
        flex-shrink: 0;
        width: 100%;
        display: flex;
        justify-content: space-between;
    }

    &__buy {
        flex-shrink: 0;
        position: relative;
        top: 5px;
    }

}

</style>
