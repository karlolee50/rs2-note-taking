<script setup>
import NoteCard from "../../components/NoteCard/NoteCard.vue";

const notes = [
  {
    title: "Note 1 title",
    content: "Some note text",
    labels: ["label1"],
  },
  {
    title: "Note 2 title",
    content: "Some note text",
    labels: ["label1", "label2", "label3"],
  },
  {
    title: "Note 3 title",
    content: "Some note text",
    labels: [],
  },
  {
    title: "Note 4 title",
    content: "Some note text",
    labels: [],
  },
];
</script>

<template>
  <div class="grid grid-cols-3 gap-4">
    <NoteCard
      v-for="note in notes"
      :title="note.title"
      :content="note.content"
      :labels="note.labels"
    />
  </div>
</template>
