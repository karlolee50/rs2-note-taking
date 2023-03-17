<script setup>
import SquareEditOutline from "vue-material-design-icons/SquareEditOutline.vue";
import TrashCanOutline from "vue-material-design-icons/TrashCanOutline.vue";

const props = defineProps({
  title: String,
  content: String,
  labels: Array,
});
</script>

<template>
  <div class="w-80 max-h-80 p-5 bg-white border border-yellow-300 rounded">
    <div class="h-full relative">
      <div class="flex items-center justify-between">
        <p class="text-xl">{{ title }}</p>
        <span class="cursor-pointer">
          <SquareEditOutline fillColor="#1A9CD8" />
        </span>
      </div>
      <div class="mt-4">
        {{ content }}
      </div>
      <div class="absolute bottom-0 right-0 cursor-pointer">
        <TrashCanOutline fillColor="#1A9CD8" />
      </div>
    </div>
  </div>
</template>
