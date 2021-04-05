<template>
  <div class="container">
    <div class="content">
      <h1>Single Post Details</h1>
    </div>
    <SinglePost :post="post" class="mb-5" />
  </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import PostDTO from "@/app/components/post/postdto";
import store from "@/store";

export default defineComponent({
  props: ["uuid"],
  data() {
    return {
      post: {} as PostDTO,
    };
  },
  created() {
    this.fetchPost(this.uuid);
  },
  methods: {
    fetchPost(uuid: string): void {
      store.dispatch("posts/fetchOne", uuid).then(() => {
        this.post = store.getters["posts/currentPost"];
      });
    },
  },
});
</script>
