<script lang="ts" setup>
import { MenuType } from "@/types/Menu.type";
import { Link } from "@inertiajs/vue3";

defineProps<{
  menus: MenuType[];
}>();
</script>

<template>
  <Link v-for="(menu, key) in menus" :key="key" :href="route(menu.routeName)">
    <v-list-item
      class="text-secondary"
      :title="$t(menu.label.key, menu.label.plural ?? 1)"
      :prepend-icon="menu.icon"
      active-class="border-e-lg border-primary"
      :active="route().current(menu.routeName)"
      :ripple="{ class: 'text-primary-lighten-2' }"
      link
    >
    </v-list-item>
  </Link>
</template>

<style scoped>
@import url("vuetify/dist/vuetify.min.css");
.border-primary {
  border-color: rgb(var(--v-theme-primary)) !important;
}
</style>
