<script setup lang="ts">

</script>

<template>
    <div class="off-canvas__user-block">
        <div class="user-block">
            <div class="user-block__wrap">
                <img src="assets/icons/login.svg" alt="">
                <div class="user-block__inner">
                    <span class="user-block__login">вхід</span>
                    <span class="user-block__account">Акаунт</span>
                </div>
            </div>
            <a class="btn btn--user-block">Вхід в акаунт</a>
        </div>
    </div>
</template>

<style scoped lang="scss">
.user-block {

    $block-name:                &;

    margin-top: 20px;
    position: relative;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    background: var(--slider-green-bg-color);
    border-radius: 5px;


    &__wrap {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 0;
    }

    &__account {
        font-family: $font-family--secondary;
        color: $black!important;
        font-size: 14px;
        font-style: normal;
        font-weight: 700;
        line-height: 16px;
    }

    &__inner {
        display: flex;
        flex-direction: column;
    }

    &__login {
        font-family: $font-family;
        color: var(--light-text-color)!important;
        font-size: 12px;
        font-style: normal;
        font-weight: 500;
        line-height: 16px;
    }

    & .btn--user-block {
        position: relative;
        background: var(--secondary-color);
        color: $white;
        font-family: $font-family--secondary;
        font-size: 10px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
        text-decoration: none;
        padding-left: 17px;
        padding-right:  25px;
        padding-top: 12px;
        padding-bottom: 12px;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        flex-shrink: 0;
        border-radius: 25px;
        border: none;
    }

    & .btn--user-block::after {
        content: '';
        position: absolute;
        display: block;
        top: 58%;
        right: 12px;
        width: 6px;
        height: 12px;
        background: url('../assets/icons/small-white-arrow-icon.svg') no-repeat;
        transform: translateY(-50%);
    }


}
</style>
