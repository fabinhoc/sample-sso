<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import PageTitle from "@/Components/partials/PageTitle.vue";
</script>

<template>
  <Head title="Dashboard" />
  <AuthenticatedLayout>
    <div class="d-flex flex-column pa-6 flex-wrap ga-3">
      <PageTitle :title="'Dashboard'" :icon="'las la-chart-bar'" />
      <v-divider opacity="10"></v-divider>
    </div>
  </AuthenticatedLayout>
</template>
