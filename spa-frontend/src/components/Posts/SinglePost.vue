<template>
  <div class="card">
    <div class="content">
      <header class="card-header">
        <h1 class="card-header-title mb-0">
          {{ post.getTitle() }} <span> - by Paolcia</span>
        </h1>
        <div class="up-downvote-container">
          <button class="button h-auto" @click="upvote(post.getUuid())">
            <font-awesome-icon :icon="['fa', 'plus-circle']" />
            <span class="number-of-upvotes">3541</span>
          </button>
          <button class="button h-auto" @click="downvote(post.getUuid())">
            <font-awesome-icon :icon="['fa', 'minus-circle']" />
            <span class="number-of-downvotes">21</span>
          </button>
        </div>
      </header>
      <div class="card-content">
        <div class="content" v-html="post.getContent()"></div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">Show more...</a>
        <a href="#" class="card-footer-item" target="_blank">
          {{ post.getLink() }}</a
        >
      </footer>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import { Prop } from "vue-property-decorator";
import PostDTO from "@/app/components/post/postdto";

export default class SinglePost extends Vue {
  @Prop({ type: PostDTO, required: true })
  post!: PostDTO;

  upvote(uuid: string): void {
    console.log("UPVOTE", uuid);
  }

  downvote(uuid: string): void {
    console.log("DOWNVOTE");
  }
}
</script>
