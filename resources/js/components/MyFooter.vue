<script setup lang="ts">
import FooterNav from './FooterNav.vue';
</script>

<template>
    <div class="page__footer-wrapper">
        <footer class="page-footer" role="contentinfo">
            <!-- Футер -->
            <FooterNav/>
            <hr>
            <p class="page-footer__copyright">© 2024 ColorWay | All Rights Reserved</p>
        </footer>
    </div>
</template>

<style scoped lang="scss">
.page-footer {
    @include container;
    background-color: $black;
}

</style>
