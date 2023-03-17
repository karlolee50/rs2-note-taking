<script setup>
const props = defineProps({
  label: String,
  name: String,
  modelValue: String,
});
const emit = defineEmits(["update:modelValue"]);
</script>

<template>
  <p class="text-2xl mb-2">{{ label }}</p>
  <input
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    :name="name"
    type="text"
    class="border-2 border-lime-900 mb-4 w-full h-8"
  />
</template>
