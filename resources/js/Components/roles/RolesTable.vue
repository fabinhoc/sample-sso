<script lang="ts" setup>
import { UserType } from "@/types/User.type";
import { ref, defineProps, defineEmits } from "vue";
import GridFilters from "@/Components/roles/GridFilters.vue";
import { GridUserFilterType } from "@/types/filters/GridUserFilter.type";
import { RoleType } from "@/types/Role.type";
import { GridRoleFilterType } from "@/types/filters/GridRoleFilter.type";

defineProps<{
  roles: Array<RoleType>;
  loading: boolean;
  totalItems: number;
  itemsPerPage: number;
}>();

const emit = defineEmits<{
  handleFilters: [filters: GridRoleFilterType];
  updatedOptions: [options: number];
}>();

const expandedItems = ref([]);
const itemsPerPageOptions: Array<{ value: number; title: string }> = [
  {
    title: "3",
    value: 3,
  },
  {
    title: "5",
    value: 5,
  },
  {
    title: "10",
    value: 10,
  },
  {
    title: "15",
    value: 15,
  },
  {
    title: "20",
    value: 20,
  },
  {
    title: "50",
    value: 50,
  },
  {
    title: "100",
    value: 100,
  },
];

const columns = [
  {
    title: "components.roles.rolesTable.application",
    key: "application.name",
  },
  {
    title: "components.roles.rolesTable.name",
    key: "name",
  },
  {
    title: "components.roles.rolesTable.actions",
    key: "actions",
  },
];

const handleFilters = (options: GridRoleFilterType) => {
  emit("handleFilters", options);
};

const updatedOptions = (perPage: number) => {
  emit("updatedOptions", perPage);
};
</script>

<template>
  <v-data-table-server
    :items-per-page="itemsPerPage"
    v-model:expanded="expandedItems"
    item-value="id"
    :headers="columns"
    :items="roles"
    :items-length="totalItems"
    :loading="loading"
    :items-per-page-options="itemsPerPageOptions"
    @update:options="updatedOptions"
  >
    <template #body.prepend="{}">
      <GridFilters @handle-filter="handleFilters" />
    </template>
    <template v-slot:headers="{ columns }">
      <tr>
        <template v-for="column in columns" :key="column.key">
          <td v-if="column.title" class="font-weight-medium text-darken-1">
            {{ $t(column.title).toUpperCase() }}
          </td>
          <td v-else></td>
        </template>
      </tr>
    </template>
    <template v-slot:item.actions="{}" class="size-sm">
      <v-btn
        color="info"
        icon="las la-pencil-alt"
        variant="text"
        density="comfortable"
        size="small"
      ></v-btn>
      <v-btn
        color="error"
        icon="las la-trash-alt"
        variant="text"
        density="comfortable"
        size="small"
      ></v-btn>
    </template>
  </v-data-table-server>
</template>
