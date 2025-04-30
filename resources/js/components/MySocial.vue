<script setup lang="ts">
</script>

<template>
    <ul class="social">
        <li>
            <a class="social__facebook" target="_blank" href="https://www.facebook.com/colorway.ua"></a>
        </li>
        <li>
            <a class="social__instagram" target="_blank" href=""></a>
        </li>
        <li>
            <a class="social__youtube" target="_blank" href="https://www.youtube.com/channel/UCtI3sOYTxhx_K59C65INGxg"></a>
        </li>
    </ul>
</template>

<style scoped lang="scss">

.social {

    $block-name: &;
    width: 155px;
    height: 26px;
    list-style: none;
    display: flex;
    justify-content: space-between;

    & li a {
        border: none;
        height: 26px;
        display: inline-block;
    }

    &__facebook {
        width: 16px;
        height: 26px;
        background: url(/assets/icons/Facebook.svg) no-repeat center center;
        background-size: contain;
    }

    &__youtube {
        width: 38px;
        height: 26px;
        background: url(/assets/icons/YouTube.svg) no-repeat center center;
        background-size: contain;
    }

    &__instagram {
        width: 26px;
        height: 26px;
        background: url(/assets/icons/Instagram.svg) no-repeat center center;
        background-size: contain;
    }
}

</style>
