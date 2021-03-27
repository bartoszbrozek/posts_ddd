<template>
  <div>
    <Navbar />
    <router-view />

    <Messages />
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import Messages from "@/components/Message/Messages.vue";
import Navbar from "@/components/Nav/Navbar.vue";

@Options({
  components: {
    Messages,
    Navbar,
  },
})
export default class App extends Vue {}
</script>
