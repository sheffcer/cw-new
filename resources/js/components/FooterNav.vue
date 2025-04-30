<script setup lang="ts">
import MySocial from './MySocial.vue'

interface NavItemChild {
    title: string
    href: string
    descr?: string
    include?: string
}

interface NavItem {
    title: string
    href: string
    children?: NavItemChild[]
}

const navItems: NavItem[] = [
    {
        title: 'Про ColorWay',
        href: '',
        children: [
            { title: 'Про Компанію', href: '' },
            { title: 'Нагороди', href: '' },
            { title: 'Публікації', href: '' },
            { title: 'Вакансії', href: '' },
            { title: 'Новини', href: '' },
        ],
    },
    {
        title: 'Споживачу',
        href: '',
        children: [
            { title: 'Де придбати', href: '' },
            { title: 'Відео про продукцію', href: '' },
            { title: 'Статті', href: '' },
            { title: 'ICC профіль', href: '' },
            { title: "Зворотній зв'язок", href: '' },
        ],
    },
    {
        title: 'Каталог',
        href: '',
        children: [
            { title: 'Витратні матеріали', href: '' },
            { title: 'Мобільні аксесуари', href: '' },
            { title: 'Аксесуари', href: '' },
        ],
    },
    {
        title: 'Контакти',
        href: '',
        children: [
            { title: '+38 (097) 846-06-91', href: '', descr: 'Гуртові продаж' },
            { title: '+38 (095) 270-50-86', href: '', descr: 'Роздрібний продаж' },
            { title: '+38 (097) 228-4603', href: '', descr: 'Техпідтримка' },
            { title: 'info@colorway.ua', href: '' },
            { title: '', href: '', include: 'social' },
        ],
    },
]
</script>

<template>
    <nav id="footer-nav" class="footer-nav" role="navigation">
        <ul class="footer-nav__list">
            <!-- Проходимо через кожен пункт навігації -->
            <li v-for="(navItem, index) in navItems" :key="index" class="footer-nav__item">
                <a :href="navItem.href" class="footer-nav__link">
                    {{ navItem.title }}
                </a>

                <!-- Якщо у пункту є підпункти, відображаємо їх -->
                <div v-if="navItem.children?.length" class="footer-nav__lvl footer-nav__lvl--2">
                    <ul class="footer-nav__list footer-nav__list--lvl-2">
                        <!-- Проходимо через кожен підпункт цього пункту -->
                        <li v-for="(child, childIndex) in navItem.children" :key="childIndex" class="footer-nav__item footer-nav__item--lvl-2">
                            <!-- Якщо у підпункту є опис, відображаємо його -->
                            <span v-if="child.descr" class="footer-nav__descr">{{ child.descr }}</span><br v-if="child.descr">
                            <!-- Виводимо назву і посилання для підпункту -->
                            <a :href="child.href" class="footer-nav__link footer-nav__link--lvl-2">
                                {{ child.title }}
                            </a>

                            <!-- Якщо у підпункті вказано, що потрібно відобразити соціальні мережі, вставляємо компонент MySocial -->
                            <div v-if="child.include === 'social'" class="footer-nav__item footer-nav__item--lvl-2">
                                <MySocial />
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>
</template>

<style scoped lang="scss">
$gray-lightest:               hsl(0, 0%, 90%) !default;

$screen-xs:                   0 !default;
$screen-sm:                   480px !default;
$screen-md:                   768px !default;
$screen-lg:                   992px !default;
$screen-xl:                   1200px !default;
$screen-xxl:                  1400px !default;

$menu-desktop-width:          $screen-xl !default;
$toggler-part-height:         3px !default;
$toggler-part-bg-color:       #000 !default;

$transition-time:             0.3s !default;


.page-footer__copyright {
    font-family: $font-family;
    font-weight: 400;
    font-size: 12px;
    text-align: center;
    padding-bottom: 20px;
    color: var(--light-text-color);
}

.footer-nav__list  .footer-nav__list--lvl-2 {
    display: flex;
    flex-direction: column;
}

.footer-nav {

    $block-name:                &;

    margin-top: 10px;
    position: relative;
    z-index: 10;

    // первый уровень

    &__list {
        margin: 0;
        padding: 0;
        list-style: none;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    &__item {
        position: relative;

        &--active {}
    }

    &__link {
        display: block;
        padding: 0.5em;
        text-decoration: none;
        color: $white;
        background-color: transparent;
        font-family: $font-family;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: 26px; /* 185.714% */

        &:hover,
        &:focus {
            text-decoration: none;
            background-color: $gray-lightest;
        }

        &--lvl-2 {
            font-size: 14px;
            font-weight: 400;

            @media (max-width: ($menu-desktop-width - 1)) {
                // padding-left: 1.2em;
            }
        }

        &--lvl-3 {
            @media (max-width: ($menu-desktop-width - 1)) {
                padding-left: 2.4em;
            }
        }
    }

    &__descr {
        padding-left: 0.5em;
        font-family: $font-family;
        font-size: 12px;
        font-weight: 400;
        line-height: 16px;
        color: $white;
    }

    &__lvl {

        &--2 {
            // @media (min-width: $menu-desktop-width) {
            //   position: absolute;
            //   top: 100%;
            //   left: 0;
            //   z-index: 1;
            //   opacity: 0;
            //   height: 0;
            //   overflow: hidden;
            //   transition: opacity $transition-time;

            //   #{$block-name}__item--show-child > &,
            //   #{$block-name}__item:hover & {
            //     opacity: 1;
            //     height: auto;
            //     overflow: visible;
            //   }
            // }
        }

        &--3 {
            @media (min-width: $menu-desktop-width) {
                position: absolute;
                z-index: 1;
                top: 0;
                left: 100%;
                opacity: 0;
                height: 0;
                overflow: hidden;
                transition: opacity $transition-time;

                #{$block-name}__item--show-child > &,
                #{$block-name}__item--lvl-2:hover & {
                    opacity: 1;
                    height: auto;
                    overflow: visible;
                }
            }
        }
    }

    // переключатель

    &__toggler {

        .no-js & {
            display: none;
        }

        @media (min-width: $menu-desktop-width) {
            display: none;
        }
    }
}
</style>
