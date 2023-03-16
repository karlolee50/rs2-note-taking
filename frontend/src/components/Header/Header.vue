<script setup>
import { RouterLink } from "vue-router";

const routes = [
  { to: "/notes", text: "Notes" },
  { to: "/notes/create", text: "New Note" },
];
</script>

<template>
  <header>
    <div>
      <nav class="p-4 bg-stone-600">
        <template v-for="route in routes">
          <RouterLink
            :to="route.to"
            class="px-4 py-2 mr-4 bg-neutral-900 hover:bg-indigo-800 rounded text-white"
          >
            {{ route.text }}
          </RouterLink>
        </template>
      </nav>
    </div>
  </header>
</template>
