<script lang="ts" setup>
import { UserType } from "@/types/User.type";
import { ref, defineProps, defineEmits } from "vue";
import GridFilters from "@/Components/users/GridFilters.vue";
import { GridUserFilterType } from "@/types/filters/GridUserFilter.type";

defineProps<{
  users: Array<UserType>;
  loading: boolean;
  totalItems: number;
  itemsPerPage: number;
}>();

const emit = defineEmits<{
  handleFilters: [filters: GridUserFilterType];
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
    title: "",
    key: "avatar",
  },
  {
    title: "components.usersTable.name",
    key: "name",
  },
  {
    title: "components.usersTable.email",
    key: "email",
  },
  {
    title: "components.usersTable.emailVerifiedAt",
    key: "email_verified_at",
  },
  {
    title: "components.usersTable.actions",
    key: "actions",
  },
];

const handleFilters = (options: GridUserFilterType) => {
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
    :items="users"
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
    <template v-slot:item.avatar="{ item }">
      <v-avatar
        v-if="item.avatar"
        color="grey-darken-3"
        image="https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=Default&skinColor=Light"
      ></v-avatar>
      <v-avatar
        v-else
        icon="las la-user"
        color="secondary-lighten-3"
      ></v-avatar>
    </template>
    <template v-slot:item.email_verified_at="{ item }">
      <v-chip :color="item.email_verified_at ? 'primary' : 'secondary'"
        >{{
          item.email_verified_at
            ? $t("components.usersTable.confirmed")
            : $t("components.usersTable.unconfirmed")
        }}
      </v-chip>
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
      <v-btn color="accent" icon="las la-envelope" variant="text"></v-btn>
    </template>
  </v-data-table-server>
</template>
