<script setup lang="ts">
import MenuComponent, { MenuItem } from './MenuComponent.vue';
import CustomIcon from '@/components/ui/icons/CustomIcon.vue';

// Масив даних меню
const menuData: MenuItem[] = [
    {
        icon: 'supplies-icon.svg',
        label: 'Витратні Матеріали',
        subItems: [
            { icon: 'printer-icon.svg', label: 'Лазерні картриджі', href: '/laser' },
            { icon: 'paper-icon.svg', label: 'Фотопапір', href: '/paper' },
            { icon: 'ink-icon.svg', label: 'Чорнило', href: '/ink' },
            { icon: 'toner-icon.svg', label: 'Тонер', href: '/toner' },
            { icon: 'spare-icon.svg', label: 'ЗІП', href: '/zip' },
        ],
    },
    {
        icon: 'cable-icon.svg',
        label: 'Мобільні Аксессуари',
        subItems: [
            { icon: 'glass-icon.svg', label: 'Захисне скло', href: '/glass' },
            { icon: 'case-icon.svg', label: 'Чохли', href: '/case' },
            { icon: 'charge-icon.svg', label: 'Зарядні пристрої', href: '/charge' },
            { icon: 'cable-icon.svg', label: 'Кабелі, адаптери та USB хаби', href: '/cables' },
            { icon: 'powerbank-icon.svg', label: 'Повербанки, зарядні станції та UPS', href: '/powerbanks' },
        ],
    },
    {
        icon: 'lamp-icon.svg',
        label: 'Аксесуари',
        subItems: [
            { icon: 'headphones-icon.svg', label: 'Навушники', href: '/headphones' },
            { icon: 'antiseptic-icon.svg', label: 'Антисептики', href: '/antiseptics' },
            { icon: 'cleaner-icon.svg', label: 'Чистилки', href: '/cleaners' },
            { icon: 'powersocket-icon.svg', label: 'Мережеві фільтри та реле напруги', href: '/powersockets' },
            { icon: 'battery-icon.svg', label: 'Акумуляторні USB батареї', href: '/usb-batteries' },
            { icon: 'batteries-icon.svg', label: 'Батарейки', href: '/batteries' },
            { icon: 'lamp-icon.svg', label: 'Лампи', href: '/lamps' },
            { icon: 'decore-icon.svg', label: 'Декор', href: '/decor' },
            { icon: 'bags-icon.svg', label: 'Сумки та рюкзаки', href: '/bags' },
            { icon: 'accessory-icon.svg', label: 'Автотримачі та Аксесуари', href: '/accessories' },
        ],
    },
];
console.log('menuData:', menuData);
console.log('Icons:', menuData.map(item => item.icon));

</script>

<template>
    <MenuComponent :menu-items="menuData" />
</template>
<style scoped lang="scss">
.menu__item img {
    max-width: max-content;
}
</style>
