import messages from "./i18n/index";
import { createI18n } from "vue-i18n";

const i18n: any = createI18n({
  legacy: false,
  locale: "pt-BR",
  fallbackLocale: "en-US",
  messages,
});

export default i18n;
