<script setup lang="ts">
// import { ref, onMounted, onBeforeUnmount, watch } from 'vue';
import { ref, watch } from 'vue';
import CustomIcon from '@/components/ui/icons/CustomIcon.vue'; // Імпортуємо CustomIcon
import { useTranslation } from '@/composables/useTranslation';

const { t, locale } = useTranslation();

// Типи з підтримкою href та компонентних іконок
export type SubItem<U = string> = {
    icon: string;
    label: U;
    href?: string;
};

export type MenuItem<U = string> = {
    icon: string;
    label: U;
    subItems: SubItem<U>[];
};

const props = defineProps<{
    menuItems: MenuItem[];
}>();

const menuVisible = ref(false);
const toggleMenu = () => {
    menuVisible.value = !menuVisible.value;
    console.log('menuVisible:', menuVisible.value); // Лог для перевірки змін
};

const menuRef = ref<HTMLElement | null>(null);

const onClickOutside = (e: MouseEvent) => {
    setTimeout(() => {
        if (menuRef.value && !menuRef.value.contains(e.target as Node)) {
            menuVisible.value = false;
            console.log('menuVisible after outside click:', menuVisible.value); // Лог після кліку поза меню
        }
    }, 0);
};

// Слухаємо зміни menuVisible
watch(menuVisible, (visible) => {
    console.log('watch triggered. menuVisible:', visible); // Лог при кожній зміні menuVisible
    if (visible) {
        // Додаємо слухач на подію click при відкритті меню
        setTimeout(() => {
            document.addEventListener('click', onClickOutside);
        }, 0);
    } else {
        // Видаляємо слухач при закритті меню
        document.removeEventListener('click', onClickOutside);
    }
});
</script>

<template>
    <div class="page-header__catalog" ref="menuRef">
        <button
            class="btn dropdown__toggler"
            @click.prevent.stop="toggleMenu"
            aria-haspopup="true"
            :aria-expanded="menuVisible"
            type="button"
        >
            <!-- Замінили img на CustomIcon -->
            <CustomIcon icon="catalog-icon.svg" size="30px" />
            <span>{{ t('header.catalog') }}</span>
        </button>

        <ul v-if="menuVisible" class="menu">
            <li
                v-for="(item, index) in props.menuItems"
                :key="index"
                class="menu__item"
            >
                <div class="menu__link">
                    <!-- Замінили img на CustomIcon -->
                    <CustomIcon :icon="item.icon" size="30px" />
                    <span>{{ item.label }}</span>
                </div>
                <div class="submenu">
                    <ul>
                        <li v-for="(sub, i) in item.subItems" :key="i">
                            <a :href="sub.href || '#'" class="submenu__link">
                                <!-- Замінили img на CustomIcon для підпунктів -->
                                <CustomIcon :icon="sub.icon" size="30px" />
                                {{ sub.label }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</template>

<style scoped>
.page-header__catalog {
    position: relative;
    display: inline-block;
}

.btn.dropdown__toggler {
    color: white;
    padding: 10px 14px;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn {
    background-color: #22BC3E;
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

.menu {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    z-index: 100;
    padding: 0;
    margin: 0;
}

.menu__item {
    position: relative;
    list-style: none;
    white-space: nowrap;
}

.menu__link {
    display: flex;
    align-items: center;
    padding: 10px 16px;
    cursor: default;
}

.menu__item:hover {
    background-color: #f1f1f1;
}

.submenu {
    display: none;
    position: absolute;
    top: 0;
    left: 100%;
    background-color: #f9f9f9;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 10px;
    min-width: 220px;
}

.menu__item:hover .submenu {
    display: block;
}

.menu__link {
    color: #333;
}

.submenu ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.submenu li {
    display: flex;
    align-items: center;
    padding: 6px 10px;
}

.submenu__link {
    display: flex;
    align-items: center;
    text-decoration: none;
    color: #333;
    gap: 10px;
}

.submenu li:hover {
    background-color: #e0e0e0;
}
</style>
