<script setup>
import useNotes from "../../api/notes";
import useLabels from "../../api/labels";
import { onMounted, reactive } from "vue";
import Input from "../../components/Input/Input.vue";

const { note, errors, getNote, updateNote } = useNotes();
const { labels, getLabels } = useLabels();
const props = defineProps({
  id: {
    required: true,
    type: String,
  },
});

onMounted(() => {
  getNote(props.id);
  getLabels();
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
    note.value.labels.find(
      (noteLabel) => noteLabel.id === label.id && noteLabel.name === label.name
    )
  )
    return;
  note.value.labels.push(label);
  filter.label = "";
};

const addNewLabel = () => {
  note.value.labels.push({
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
        <div>
          <p class="text-2xl">Selected Labels</p>
          <p v-for="label in note.labels" :id="label.id">
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
