<script setup>
import { ref } from "vue";
import Input from "../../components/Input/Input.vue";

const title = ref("");
const content = ref("");
const label = ref("");
</script>

<template>
  <div class="w-fit">
    <Input label="Note Title" name="title" v-model:model-value="title" />

    <p class="text-2xl">Note Content</p>
    <textarea
      v-model="content"
      rows="10"
      cols="50"
      name="content"
      class="border-2 border-lime-900 mb-2"
    />

    <Input label="Note Label" name="label" v-model:model-value="label" />
    <button class="w-full p-2 rounded border bg-cyan-400 text-xl">
      Submit
    </button>
  </div>
</template>
