<template>
  <div class="single-post-details">
    <SinglePostDetails :uuid="uuid" />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import SinglePostDetails from "@/components/Posts/SinglePostDetails.vue";

export default defineComponent({
  props: ["uuid"],
  components: {
    SinglePostDetails,
  },
});
</script>
