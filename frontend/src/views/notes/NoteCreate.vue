<script setup>
import { reactive, onMounted, ref, computed } from "vue";
import {
  Combobox,
  ComboboxInput,
  ComboboxOptions,
  ComboboxOption,
} from "@headlessui/vue";

import useNotes from "../../api/notes";
import useLabels from "../../api/labels";
import Input from "../../components/Input/Input.vue";

const { labels, getLabels } = useLabels();
const { storeNote, errors } = useNotes();
const form = reactive({
  title: "",
  content: "",
  label: "",
});
onMounted(() => getLabels());

const people = [
  "Durward Reynolds",
  "Kenton Towne",
  "Therese Wunsch",
  "Benedict Kessler",
  "Katelyn Rohan",
];
const selectedPerson = ref([labels.value[0], labels.value[1]]);
const query = ref("");

const filteredLabels = computed(() =>
  query.value === ""
    ? labels
    : labels.value.filter((label) => {
        return label.name.toLowerCase().includes(query.value.toLowerCase());
      })
);
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
        <Input
          label="Note Label"
          name="label"
          type="textfield"
          v-model:model-value="form.label"
        />
        <Combobox v-model="selectedPerson" multiple>
          <ul v-if="selectedPerson.length > 0">
            <li v-for="person in selectedPerson" :key="person.id">
              {{ person.name }}
            </li>
          </ul>
          <ComboboxInput
            @change="query = $event.target.value"
            :displayValue="(label) => label.name"
          />
          <ComboboxOptions>
            <ComboboxOption
              v-for="label in filteredLabels"
              :key="label.id"
              :value="label"
            >
              {{ label.name }}
            </ComboboxOption>
          </ComboboxOptions>
        </Combobox>
        <button class="p-2 rounded border bg-yellow-300 text-xl" type="submit">
          Submit
        </button>
      </div>
    </form>
  </div>
</template>
