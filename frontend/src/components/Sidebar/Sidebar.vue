<script setup>
import useLabels from "../../api/labels";
import { onMounted } from "vue";

const { labels, getLabels } = useLabels();
onMounted(() => {
  getLabels();
});
</script>

<template>
  <div class="mt-10 mr-10">
    <p
      v-for="label in labels"
      :id="label.id"
      class="p-2 bg-zinc-600 text-white rounded cursor-pointer"
    >
      {{ label.name }}
    </p>
  </div>
</template>
