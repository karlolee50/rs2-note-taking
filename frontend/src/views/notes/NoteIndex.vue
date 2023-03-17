<script setup>
import NoteCard from "../../components/NoteCard/NoteCard.vue";
import useNotes from "../../api/notes";
import { onMounted } from "vue";

const { notes, getNotes } = useNotes();

onMounted(() => getNotes());
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
