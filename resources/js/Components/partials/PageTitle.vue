<script lang="ts" setup>
import { defineProps } from "vue";

defineProps<{
  title: string;
  icon: string;
}>();
</script>

<template>
  <h1 class="text-secondary text-h6 font-weight-regular">
    <v-icon :icon="icon" size="23px" class="mt-n1"></v-icon>
    {{ title }}
  </h1>
</template>
