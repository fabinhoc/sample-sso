<script lang="ts" setup>
import { GridUserFilterType } from "@/types/filters/GridUserFilter.type";
import { computed, defineEmits, Ref, ref } from "vue";
import { useI18n } from "vue-i18n";

const { t } = useI18n();

const emit = defineEmits<{
  handleFilter: any;
}>();

const filters: Ref<GridUserFilterType> = ref({
  name: null,
  email: null,
  isVerified: null,
});

const list = computed(() => [
  {
    title: t("components.users.gridFilters.confirmed"),
    value: 1,
  },
  {
    title: t("components.users.gridFilters.unconfirmed"),
    value: 0,
  },
]);

const setFilters = () => {
  emit("handleFilter", filters);
};
</script>

<template>
  <tr>
    <td />
    <td>
      <v-text-field
        v-model="filters.name"
        :label="$t('components.users.gridFilters.name')"
        :placeholder="$t('components.users.gridFilters.name')"
        class="mt-2 mb-n4"
        dense
        @blur="setFilters"
        @click:clear="setFilters"
        density="compact"
      />
    </td>
    <td>
      <v-text-field
        v-model="filters.email"
        :label="$t('components.users.gridFilters.email')"
        :placeholder="$t('components.users.gridFilters.email')"
        class="mt-2 mb-n4"
        dense
        @blur="setFilters"
        @click:clear="setFilters"
        density="compact"
      />
    </td>
    <td>
      <v-select
        v-model="filters.isVerified"
        :items="list"
        class="mt-2 mb-n4"
        dense
        density="compact"
        :clearable="true"
        @update:modelValue="setFilters"
      />
    </td>
    <td />
    <td />
  </tr>
</template>
