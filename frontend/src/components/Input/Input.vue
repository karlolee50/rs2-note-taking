<script setup>
const props = defineProps({
  type: String,
  label: String,
  name: String,
  error: String,
  modelValue: String,
});
const emit = defineEmits(["update:modelValue"]);
</script>

<template>
  <div class="mb-6">
    <label :for="name" class="text-2xl">{{ label }}</label>
    <template v-if="type === 'textfield'">
      <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :name="name"
        type="text"
        class="p-2 border-2 border-yellow-300 mt-1 w-full h-8 focus:outline-none"
      />
    </template>
    <template v-else>
      <textarea
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        :name="name"
        rows="10"
        cols="50"
        name="content"
        class="p-2 border-2 border-yellow-300 mb-2 w-full focus:outline-none"
      />
    </template>
    <div v-if="error" class="text-sm text-red-400">{{ error }}</div>
  </div>
</template>
