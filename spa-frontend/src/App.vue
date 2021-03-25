<template>
  <div>
    <!-- <router-link to="/">Dashboard</router-link> |
    <router-link to="/onboarding">Login</router-link> -->
    <router-view />

    <Messages />
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import Messages from "@/components/Message/Messages.vue";

@Options({
  components: {
    Messages,
  },
})
export default class App extends Vue {}
</script>
