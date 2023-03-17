<script setup>
import { RouterView } from "vue-router";
import Header from "./components/header/Header.vue";
import Sidebar from "./components/sidebar/Sidebar.vue";
</script>

<template>
  <Header />

  <main class="flex min-h-screen mt-10">
    <Sidebar />
    <div class="flex mx-auto">
      <RouterView />
    </div>
  </main>
</template>
