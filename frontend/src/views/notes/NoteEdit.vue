<script setup>
import useNotes from "../../api/notes";
import { onMounted, reactive } from "vue";
import Input from "../../components/Input/Input.vue";

const { note, errors, getNote, updateNote } = useNotes();

const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

onMounted(() => {
  getNote(props.id);
});

const form = reactive({
  label: "",
});
</script>

<template>
  <div class="mt-12">
    <form
      action="post"
      class="bg-white p-4 rounded"
      @submit.prevent="updateNote($route.params.id)"
    >
      <div class="space-y-6">
        <Input
          label="Note Title"
          name="title"
          type="textfield"
          :error="errors.title ? errors.title[0] : ''"
          v-model:model-value="note.title"
        />
        <Input
          label="Note Content"
          name="content"
          type="textarea"
          :error="errors.content ? errors.content[0] : ''"
          v-model:model-value="note.content"
        />
        <Input
          label="Note Label"
          name="label"
          type="textfield"
          v-model:model-value="form.label"
        />
        <button class="p-2 rounded border bg-yellow-300 text-xl" type="submit">
          Submit
        </button>
      </div>
    </form>
  </div>
</template>
