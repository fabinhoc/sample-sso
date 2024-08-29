import { useI18n } from "vue-i18n";

export default function SwitchLocaleHelper() {
  const { locale } = useI18n();

  const localeKey = "@SSOLang:locale";

  const changeLocale = (lang: string) => {
    locale.value = lang;
    localStorage.setItem(localeKey, lang);
  };

  const loadLocale = () => {
    if (localStorage.getItem(localeKey)) {
      locale.value = localStorage.getItem(localeKey) ?? locale.value;
    }
  };

  return {
    changeLocale,
    loadLocale,
  };
}
