<script setup lang="ts">
import Sidebar from '@/components/ui/sidebar/Sidebar.vue';
import { ref } from 'vue';

// Состояние панели (будет управляться в Layout)
const isSidebarOpen = ref(false);

// Функция для отображения панели (может использоваться в любом месте)
function openSidebar() {
    isSidebarOpen.value = true;
}

// Функция для скрытия панели
function closeSidebar() {
    isSidebarOpen.value = false;
}
</script>

<template>
    <div class="layout">
        <!-- Sidebar -->
        <Sidebar
            :open="isSidebarOpen"
            @update:open="isSidebarOpen = $event"
            class="custom-sidebar-class"
        >
            <template #default>
                <!-- Содержимое боковой панели -->
                <p>Содержимое Sidebar</p>
            </template>
        </Sidebar>

        <!-- Основное содержимое страницы -->
        <div class="content">
            <slot />
        </div>
    </div>
</template>
