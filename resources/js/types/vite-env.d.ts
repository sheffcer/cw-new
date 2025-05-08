/// <reference types="vite/client" />

interface ImportMetaEnv {
    readonly VITE_APP_NAME: string;
    readonly VITE_BASE_URL?: string;
    readonly VITE_DEV?: boolean;
    readonly VITE_PROD?: boolean;
    readonly VITE_MODE?: string;
    readonly [key: `VITE_${string}`]: string | boolean | undefined;
}
