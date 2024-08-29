<script setup lang="ts">
import { ref, onMounted } from "vue";
import { Link, router } from "@inertiajs/vue3";
import { MenuType } from "@/types/Menu.type";
import SwitchLocaleHelper from "@/Helpers/SwitchLocale.helper";
import NavigationMenu from "@/Components/partials/NavigationMenu.vue";

const showingNavigationDropdown = ref(false);
const { changeLocale, loadLocale } = SwitchLocaleHelper();

onMounted(() => {
  loadLocale();
});

const menus: MenuType[] = [
  {
    label: {
      key: "dashboard",
      plural: 2,
    },
    url: "dashboard",
    icon: "las la-chart-bar",
    routeName: "dashboard",
  },
  {
    label: {
      key: "user",
      plural: 2,
    },
    url: "users.index",
    icon: "las la-users",
    routeName: "users.index",
  },
];

const logout = () => {
  router.post("logout");
};
</script>

<template>
  <v-layout class="rounded rounded-md">
    <v-navigation-drawer>
      <v-list>
        <v-list-item
          class="mb-1 d-flex justify-evenly justify-start align-self-center mb-4"
        >
          <Link :href="route('dashboard')">
            <img src="/images/LOGO-SAMPLE-SSO.png" alt="logo sample sso" />
          </Link>
        </v-list-item>
        <NavigationMenu :menus="menus" />
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      class="border-b-sm pa-1 text-secondary"
      :title="'SAMPLE SSO'"
      elevation="0"
    >
      <v-menu transition="slide-y-transition">
        <template v-slot:activator="{ props }">
          <v-btn v-bind="props" icon class="text-capitalize">
            <v-icon icon="las la-user text-primary" size="28px"></v-icon>
          </v-btn>
        </template>
        <v-list elevation="0" class="border-sm">
          <Link :href="route('profile.edit')">
            <v-list-item link prepend-icon="las la-user">
              <v-list-item-title>
                <p style="font-size: 10px" class="text-secondary">
                  {{ $t("welcome") }}!
                </p>
                {{ $page.props.auth.user.name }}
              </v-list-item-title>
            </v-list-item>
          </Link>
          <Link :href="route('logout')" method="post" as="form">
            <v-list-item link prepend-icon="las la-sign-out-alt">
              <v-list-item-title>{{ $t("logout") }}</v-list-item-title>
            </v-list-item>
          </Link>
        </v-list>
      </v-menu>
      <v-menu transition="slide-y-transition">
        <template v-slot:activator="{ props }">
          <v-btn v-bind="props" link class="text-capitalize" icon>
            <v-icon icon="las la-language text-primary" size="28px"></v-icon>
          </v-btn>
        </template>
        <v-list elevation="0" class="border-sm">
          <v-list-item
            @click="changeLocale('en-US')"
            prepend-icon="las la-flag"
          >
            <v-list-item-title>{{ $t("english") }}</v-list-item-title>
          </v-list-item>
          <v-list-item
            @click="changeLocale('pt-BR')"
            prepend-icon="las la-flag"
          >
            <v-list-item-title>{{ $t("portuguese") }}</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <!-- Page Heading -->
    <header class="bg-white shadow" v-if="$slots.header">
      <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <slot name="header" />
      </div>
    </header>

    <!-- Page Content -->
    <v-main>
      <slot />
    </v-main>
  </v-layout>
</template>
