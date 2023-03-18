<script setup>
import { reactive, onMounted } from "vue";

import useNotes from "../../api/notes";
import useLabels from "../../api/labels";
import Input from "../../components/Input/Input.vue";

const { labels, getLabels } = useLabels();
const { storeNote, errors } = useNotes();

onMounted(() => getLabels());

const form = reactive({
  title: "",
  content: "",
  noteLabels: [],
});

const filter = reactive({
  label: "",
  filteredLabels: [],
});

const handleFilter = (event) => {
  const filteredLabels = labels.value.filter((label) => {
    return label.name.toLowerCase().includes(event.target.value);
  });
  filter.filteredLabels = filteredLabels;
};

const selectLabel = (label) => {
  if (
    form.noteLabels.find(
      (noteLabel) => noteLabel.id === label.id && noteLabel.name === label.name
    )
  )
    return;
  form.noteLabels.push(label);
  filter.label = "";
};

const addNewLabel = () => {
  form.noteLabels.push({
    id: "",
    name: filter.label,
  });
};
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
          :error="errors.content ? errors.content[0] : ''"
          v-model:model-value="form.content"
        />
        <div>
          <p class="text-2xl">Selected Labels</p>
          <p v-for="label in form.noteLabels" :id="label.id">
            {{ label.name }}
          </p>
        </div>
        <Input
          label="Note Label"
          name="label"
          type="textfield"
          v-model:model-value="filter.label"
          @input="handleFilter"
        />
        <div class="border p-4" v-if="filter.filteredLabels.length">
          <p
            v-for="label in filter.filteredLabels"
            :id="label.id"
            class="cursor-pointer m-1 hover:bg-slate-400"
            @click="selectLabel(label)"
          >
            {{ label.name }}
          </p>
        </div>
        <div
          v-if="!filter.filteredLabels.length && !!filter.label"
          @click="addNewLabel"
          class="cursor-pointer"
        >
          Add new label?
        </div>
        <button class="p-2 rounded border bg-yellow-300 text-xl" type="submit">
          Submit
        </button>
      </div>
    </form>
  </div>
</template>
