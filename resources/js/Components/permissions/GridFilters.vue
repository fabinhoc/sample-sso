<script lang="ts" setup>
import { GridPermissionFilterType } from "@/types/filters/GridPermissionFilter.type";
import { defineEmits, Ref, ref } from "vue";
import { useI18n } from "vue-i18n";

const emit = defineEmits<{
  handleFilter: any;
}>();

const filters: Ref<GridPermissionFilterType> = ref({
  name: null,
  role: null,
});

const setFilters = () => {
  emit("handleFilter", filters);
};
</script>

<template>
  <tr>
    <td>
      <v-text-field
        v-model="filters.role"
        :label="$t('components.permissions.gridFilters.role')"
        :placeholder="$t('components.permissions.gridFilters.role')"
        class="mt-2 mb-n4"
        dense
        @blur="setFilters"
        @click:clear="setFilters"
        density="compact"
      />
    </td>
    <td>
      <v-text-field
        v-model="filters.name"
        :label="$t('components.permissions.gridFilters.name')"
        :placeholder="$t('components.permissions.gridFilters.name')"
        class="mt-2 mb-n4"
        dense
        @blur="setFilters"
        @click:clear="setFilters"
        density="compact"
      />
    </td>

    <td />
  </tr>
</template>
