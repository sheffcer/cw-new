<script setup lang="ts">
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '../components/PlaceholderPattern.vue';
import MainDropDown from '@/components/ui/my-dropdown-menu/MainDropDown.vue';


const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

import { usePage } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const page = usePage();

onMounted(() => {
    console.log('Page data:', page);
    console.log('test123');
});
</script>

<template>
    <Head title="Dashboard" />
    <p>{{ page.props.message}}</p>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="my-label">test555</div>
        <MainDropDown/>
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <div class="grid auto-rows-min gap-4 md:grid-cols-3">
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
                <div class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                    <PlaceholderPattern />
                </div>
            </div>
            <div class="relative min-h-[100vh] flex-1 rounded-xl border border-sidebar-border/70 dark:border-sidebar-border md:min-h-min">
                <PlaceholderPattern />
            </div>
        </div>
    </AppLayout>
</template>
<style>
.my-label {
    background: cornflowerblue;
    color: green;
}
</style>
