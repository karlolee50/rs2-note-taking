<script setup>
import SquareEditOutline from "vue-material-design-icons/SquareEditOutline.vue";
import TrashCanOutline from "vue-material-design-icons/TrashCanOutline.vue";
import { useRouter } from "vue-router";

const props = defineProps({
  id: Number,
  title: String,
  content: String,
  labels: Array,
});
const router = useRouter();
</script>

<template>
  <div class="w-80 max-h-56 bg-white border border-yellow-300 rounded">
    <div class="h-full relative p-5">
      <div>
        <div class="flex items-center justify-between">
          <p class="text-xl">{{ title }}</p>
          <span class="cursor-pointer">
            <SquareEditOutline
              fillColor="#1A9CD8"
              @click="router.push({ name: 'NoteEdit', params: { id } })"
            />
          </span>
        </div>
        <div class="mt-4 overflow-auto">
          {{ content }}
        </div>
        <div class="absolute bottom-2.5 right-4 cursor-pointer">
          <TrashCanOutline fillColor="#1A9CD8" />
        </div>
      </div>
    </div>
    <div class="p-2 flex justify-end bg-yellow-300 rounded">
      <span v-for="label in labels" :id="label.id">{{ label.name }},</span>
    </div>
  </div>
</template>
