<script setup>
import { RouterLink, RouterView } from "vue-router";

const routes = [
  { to: "/", text: "Home" },
  { to: "/notes", text: "Notes" },
];
</script>

<template>
  <header>
    <div class="max-w-7xl mx-auto">
      <nav class="m-2 p-2">
        <template v-for="route in routes">
          <RouterLink
            :to="route.to"
            class="px-4 py-2 mr-4 bg-indigo-600 hover:bg-indigo-800 rounded text-white"
          >
            {{ route.text }}
          </RouterLink>
        </template>
      </nav>
    </div>
  </header>

  <main class="max-w-7xl mx-auto min-h-screen">
    <RouterView />
  </main>
</template>
