<template>
  <div class="container">
    <div class="content">
      <h1>Create Post</h1>

      <div class="field">
        <label class="label">Title</label>
        <div class="control">
          <input class="input" type="text" v-model="title" />
        </div>
      </div>

      <div class="field">
        <label class="label">Link</label>
        <div class="control">
          <input class="input" type="text" v-model="link" />
        </div>
      </div>

      <div class="field">
        <label class="label">Content</label>
        <div class="control">
          <ckeditor
            :editor="editor"
            :config="editorConfig"
            tag-name="textarea"
            v-model="content"
          ></ckeditor>
        </div>
      </div>

      <div class="field">
        <div class="field-label">
          <!-- Left empty for spacing -->
        </div>
        <div class="field-body">
          <div class="field">
            <div class="control">
              <button class="button is-primary" @click="createPost()">
                Save
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import NewPostDTO from "@/app/components/post/new-postdto";
import store from "@/store";

@Options({
  components: {},
})
export default class Create extends Vue {
  title!: string;
  link!: string;
  content!: string;

  created() {
    this.editor = ClassicEditor;
    this.editorConfig = {};
  }

  editor!: ClassicEditor;
  editorConfig!: {};

  createPost(): void {
    store.dispatch(
      "posts/add",
      new NewPostDTO(this.title, this.link, this.content)
    );
  }
}
</script>
