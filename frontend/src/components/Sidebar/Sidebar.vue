<script setup>
const labels = [
  { id: 1, label: "label1" },
  { id: 2, label: "label2" },
  { id: 3, label: "label3" },
];
</script>

<template>
  <div class="mt-10 mr-10">
    <p
      v-for="label in labels"
      :id="label.id"
      class="p-2 bg-zinc-600 text-white rounded cursor-pointer"
    >
      {{ label.label }}
    </p>
  </div>
</template>
