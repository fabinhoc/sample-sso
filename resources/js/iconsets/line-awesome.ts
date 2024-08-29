import { h } from "vue";
import type { IconSet, IconAliases, IconProps } from "vuetify";

const aliases: IconAliases = {
  collapse: "mdi-calendar",
  complete: "mdi-check",
  cancel: "mdi-close-circle",
  close: "mdi-close",
  delete: "mdi-close-circle",
  clear: "mdi-close-circle",
  success: "...",
  info: "...",
  warning: "...",
  error: "...",
  prev: "...",
  next: "...",
  checkboxOn: "...",
  checkboxOff: "...",
  checkboxIndeterminate: "...",
  delimiter: "...",
  sort: "...",
  expand: "...",
  menu: "...",
  subgroup: "...",
  dropdown: "...",
  radioOn: "...",
  radioOff: "...",
  edit: "...",
  ratingEmpty: "...",
  ratingFull: "...",
  ratingHalf: "...",
  loading: "...",
  first: "...",
  last: "...",
  unfold: "...",
  file: "...",
  plus: "...",
  minus: "...",
  sortAsc: "",
  sortDesc: "",
  calendar: "",
};

const las: IconSet = {
  component: (props: IconProps) =>
    h("i", {
      ...props,
      class: props.icon,
    }),
};

export { aliases, las };
