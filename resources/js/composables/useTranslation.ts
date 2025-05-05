// resources/js/Composables/useTranslation.ts
import { computed, ref } from 'vue';
import { usePage } from '@inertiajs/vue3';

// Кэш переводов, хранящийся между обновлениями компонентов
const translationsCache = ref<Record<string, Record<string, string>>>({});

export function useTranslation() {
  const locale = computed(() => usePage().props.locale as string || 'en');
  const translations = computed(() => {
    if (!translationsCache.value[locale.value]) {
      translationsCache.value[locale.value] = usePage().props.translations as Record<string, string> || {};
    }
    return translationsCache.value[locale.value];
  });

  const t = (key: string, replacements: Record<string, string> = {}) => {
    let translation = translations.value[key] || key;

    Object.keys(replacements).forEach(replaceKey => {
      translation = translation.replace(
        new RegExp(`:${replaceKey}`, 'g'),
        replacements[replaceKey]
      );
    });

    return translation;
  };

  return { t, locale };
}
