<template>
  <div class="create-post">
    <Create />
  </div>
</template>

<script lang="ts">
import { Options, Vue } from "vue-class-component";
import Create from "@/components/Posts/Create.vue";

@Options({
  components: {
    Create,
  },
})
export default class CreatePost extends Vue {}
</script>
