<script setup lang="ts">
interface MenuItem {
    title: string
    items: Array<{
        text?: string
        link?: string
        phone?: string
        isPhone?: boolean
    }>
}

const props = defineProps<{
    menuItems: MenuItem[]
}>()
</script>

<template>
    <nav class="details-menu">
        <details v-for="section in menuItems" :key="section.title">
            <summary class="details-menu__title">{{ section.title }}</summary>
            <ul class="details-menu__list">
                <li
                    v-for="(item, index) in section.items"
                    :key="index"
                    class="details-menu__item"
                >
                    <template v-if="item.isPhone">
                        <span class="details-menu__text">{{ item.text }}</span><br>
                        <a class="details-menu__link" :href="`tel:${item.phone}`">{{ item.phone }}</a>
                    </template>
                    <a
                        v-else
                        class="details-menu__link"
                        :href="item.link"
                    >{{ item.text }}</a>
                </li>
            </ul>
        </details>
    </nav>
</template>

<style scoped lang="scss">
.details-menu {
    $block-name:                &;
    margin-top: 20px;

    & nav {
        // background-color: #333;
        // color: white;
        width: 200px;
        padding: 10px;
    }

    & details {
        margin: 10px 0;
    }

    // & summary {
    //     cursor: pointer;
    //     padding: 10px;
    //     background-color: #444;
    //     border: none;
    //     color: white;
    //     font-weight: bold;
    //   }

    // & summary:hover {
    //     background-color: #555;
    //   }

    &__title {
        margin-bottom: 20px;
        color: $black;
        font-feature-settings: 'liga' off, 'clig' off;
        font-family: $font-family;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
        cursor: pointer;
    }

    &__text {
        color: $black!important;
        font-family: $font-family;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
    }


    &__list {
        list-style: none;
        margin-top: -10px;
        padding-left: 20px;
    }

    &__item {

        padding: 5px 0;
    }

    &__link {
        text-decoration: none;
        margin-bottom: 20px;
        color: $black;
        font-feature-settings: 'liga' off, 'clig' off;
        font-family: $font-family;
        font-size: 14px;
        font-style: normal;
        font-weight: 400;
        line-height: 16px;
        cursor: pointer;
    }

    &__link:hover {
        color: var(--secondary-color)!important;
        // color: white;
    }



}
</style>
