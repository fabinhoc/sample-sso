import { sampleTheme } from "./sampleTheme";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";
import { createVuetify } from "vuetify";
import { VDateInput } from "vuetify/labs/VDateInput";
import "vuetify/styles";
import "line-awesome/dist/line-awesome/css/line-awesome.min.css";
import { las } from "@/iconsets/line-awesome";
import { createVueI18nAdapter } from "vuetify/locale/adapters/vue-i18n";
import i18n from "./i18n";
import { useI18n } from "vue-i18n";

export default createVuetify({
  locale: {
    adapter: createVueI18nAdapter({ i18n, useI18n }),
  },
  components: {
    ...components,
    VDateInput,
  },
  directives,
  defaults: {
    VTextField: {
      variant: "outlined",
      color: "primary",
      clearable: true,
      density: "comfortable",
      clearIcon: "las la-times-circle",
    },
    VDateInput: {
      variant: "outlined",
      color: "primary",
      clearable: false,
      density: "comfortable",
      modeIcon: "las la-caret-down",
    },
    VSelect: {
      variant: "outlined",
      density: "comfortable",
      menuIcon: "las la-angle-down",
      clearIcon: "las la-times-circle",
    },
    VDataTableServer: {
      firstIcon: "las la-angle-double-left",
      lastIcon: "las la-angle-double-right",
      prevIcon: "las la-angle-left",
      nextIcon: "las la-angle-right",
      sortAscIcon: "las la-arrow-up",
      sortDescIcon: "las la-arrow-down",
    },
    VDataTable: {
      firstIcon: "las la-angle-double-left",
      lastIcon: "las la-angle-double-right",
      prevIcon: "las la-angle-left",
      nextIcon: "las la-angle-right",
      sortAscIcon: "las la-arrow-up",
      sortDescIcon: "las la-arrow-down",
    },
  },
  theme: {
    defaultTheme: "sampleTheme",
    themes: {
      sampleTheme,
    },
  },
  icons: {
    defaultSet: "las",
    sets: {
      las,
    },
  },
});
