<template>
  <div class="card">
    <div class="content">
      <header class="card-header">
        <h1 class="card-header-title mb-0">
          {{ post.getTitle() }} <span> - by Paolcia</span>
        </h1>
        <button class="button h-auto is-success">+</button>
      </header>
      <div class="card-content">
        <div class="content">
          {{ post.getContent() }}
        </div>
      </div>
      <footer class="card-footer">
        <a href="#" class="card-footer-item">Save</a>
        <a href="#" class="card-footer-item">Edit</a>
        <a href="#" class="card-footer-item">Delete</a>
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
  post!: SinglePost;
}
</script>
