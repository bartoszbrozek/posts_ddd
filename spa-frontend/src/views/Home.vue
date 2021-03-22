<template>
  <div class="home">
    <Dashboard />
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import Dashboard from "@/components/Dashboard.vue";

@Options({
  components: {
    Dashboard,
  },
})
export default class Home extends Vue {}
</script>
