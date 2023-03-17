<script setup>
import { ref, reactive } from "vue";
import useNotes from "../../api/notes";
import Input from "../../components/Input/Input.vue";

const { storeNote, errors } = useNotes();
const form = reactive({
  title: "",
  content: "",
  label: "",
});
</script>

<template>
  <div class="mt-12">
    <form
      action="post"
      class="bg-white p-4 rounded"
      @submit.prevent="storeNote(form)"
    >
      <div class="space-y-6">
        <Input
          label="Note Title"
          name="title"
          type="textfield"
          :error="errors.title ? errors.title[0] : ''"
          v-model:model-value="form.title"
        />
        <Input
          label="Note Content"
          name="content"
          type="textarea"
          v-model:model-value="form.content"
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
