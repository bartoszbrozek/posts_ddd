<template>
  <section class="section">
    <div class="container">
      <div class="content">
        <h1>Posts</h1>
      </div>
      <SinglePost
        v-for="(post, key) in posts"
        :key="key"
        :post="post"
        class="mb-5"
      />
    </div>
  </section>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import store from "@/store";
import Post from "@/app/api/post";
import SinglePost from "@/components/Posts/SinglePost.vue";

@Options({
  components: {
    SinglePost,
  },
})
export default class Posts extends Vue {
  post!: Post;

  mounted() {
    this.post = new Post();

    store.dispatch("posts/paginate", 10);
  }

  get posts(): boolean {
    return store.getters["posts/all"];
  }
}
</script>
