<script lang="ts" setup>
import { GridRoleFilterType } from "@/types/filters/GridRoleFilter.type";
import { defineEmits, Ref, ref } from "vue";
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const emit = defineEmits<{
  handleFilter: any;
}>();

const filters: Ref<GridRoleFilterType> = ref({
  name: null,
  application: null,
});

const setFilters = () => {
  emit("handleFilter", filters);
};
</script>

<template>
  <tr>
    <td>
      <v-text-field
        v-model="filters.application"
        :label="$t('components.roles.gridFilters.application')"
        :placeholder="$t('components.roles.gridFilters.application')"
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
        :label="$t('components.roles.gridFilters.name')"
        :placeholder="$t('components.roles.gridFilters.name')"
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
