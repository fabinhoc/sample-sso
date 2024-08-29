<script lang="ts" setup>
import PageTitle from "@/Components/partials/PageTitle.vue";
import { Head, router, usePage } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import UsersTable from "@/Components/users/UsersTable.vue";
import { ref, Ref, defineProps } from "vue";
import { GridUserFilterType } from "@/types/filters/GridUserFilter.type";

defineProps<{
  users: any;
}>();

const loading: Ref<boolean> = ref(false);

const handleFilter = (options: any) => {
  loading.value = true;
  const { url } = usePage();
  const filteredObject = Object.fromEntries(
    Object.entries(options.value)
  ) as Partial<GridUserFilterType>;

  router.get(url, filteredObject, {
    preserveScroll: true,
    preserveState: true,
    onFinish: () => (loading.value = false),
  });
};

const handleOptions = async (options: any) => {
  loading.value = true;
  const { page, itemsPerPage, sortBy } = options;
  const { url } = usePage();
  router.get(
    url,
    { page, itemsPerPage, sortBy },
    {
      preserveScroll: true,
      preserveState: true,
      replace: true,
      onFinish: () => (loading.value = false),
    }
  );
};
</script>

<template>
  <Head title="Users" />
  <AuthenticatedLayout>
    <div class="d-flex flex-column pa-6 flex-wrap ga-3">
      <PageTitle :title="$t('user', 2)" :icon="'las la-users'" />
      <v-divider></v-divider>
      <div class="d-flex align-start">
        <v-btn
          variant="outlined"
          color="primary"
          flat
          prepend-icon="las la-plus"
          >{{ $t("page.users.new") }}</v-btn
        >
      </div>
      <UsersTable
        :users="users.data"
        :loading="loading"
        :total-items="users.total"
        @handle-filters="handleFilter"
        @updated-options="handleOptions"
        :itemsPerPage="users.per_page"
      />
    </div>
  </AuthenticatedLayout>
</template>
