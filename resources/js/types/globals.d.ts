import type { route as routeFn } from 'ziggy-js';
import { DefineComponent } from 'vue';

declare global {
    const route: typeof routeFn;
}

declare module '@inertiajs/inertia' {
    interface PageProps {}
}

declare module '@inertiajs/vue3' {
    interface PageComponent extends DefineComponent {
        layout?: any
    }
}
