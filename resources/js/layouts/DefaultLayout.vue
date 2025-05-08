<script setup lang="ts">
import Header from '@/components/MyHeader.vue'
import Footer from '@/components/MyFooter.vue'
import Sidebar from '@/components/MySidebar.vue'
import { ref } from 'vue'

const isOpen = ref(false)

const toggleSidebar = () => {
    console.log('Toggling sidebar, current state:', isOpen.value)
    isOpen.value = !isOpen.value
    console.log('New state:', isOpen.value)
}


</script>

<template>
    <div class="layout">
        <div class="off-canvas" :class="{ 'off-canvas--open': isOpen }">
            <Sidebar
                :is-open="isOpen"
                @toggle="toggleSidebar"
            />
            <div class="page__inner off-canvas__page-content">
                <div class="page__content">
                    <Header @toggle-sidebar="toggleSidebar" />
                    <main class="main-content" role="main">
                        <KeepAlive>
                            <slot />
                        </KeepAlive>

                    </main>
                </div>
                <Footer />
            </div>
            <div class="off-canvas__overlay" @click="isOpen = false"
            ></div>
        </div>
    </div>
</template>


<style scoped lang="scss">
.layout {
    min-height: 100vh;
    position: relative;
}

.off-canvas {
    position: relative;
    width: 100%;
    min-height: 100vh;
    overflow-x: hidden;

    &__overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }

    &--open {
        .off-canvas__overlay {
            opacity: 1;
            visibility: visible;
        }

        :deep(.off-canvas__aside) {
            transform: translateX(0);
        }
    }
}

.page__inner {
    position: relative;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.page__content {
    flex: 1 0 auto;
}

:deep(.off-canvas__aside) {
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    max-height: 100vh !important;
    width: 320px;
    z-index: 999;
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    overflow-y: auto;
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.2s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}


</style>
