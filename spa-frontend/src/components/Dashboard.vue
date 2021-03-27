<template>
  <div class="hello">
    <Posts />
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import Posts from "@/components/Posts/Posts.vue";

@Options({
  components: {
    Posts,
  },
})
export default class Dashboard extends Vue {}
</script>
