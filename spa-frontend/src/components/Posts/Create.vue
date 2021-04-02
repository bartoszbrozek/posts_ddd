<template>
  <div class="container create-post">
    <div class="content">
      <h1>Create Post</h1>
      <div class="columns">
        <div class="column is-three-quarters">
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
        </div>

        <div class="column">
          <label class="label">Content</label>
          <div class="field has-addons">
            <div class="control">
              <input
                class="input"
                type="text"
                placeholder="Use comma as tag separator"
                v-model="tagTitle"
              />
            </div>
            <div class="control">
              <a class="button is-success" @click="addTag(tagTitle)">
                Add Tag
              </a>
            </div>
          </div>

          <div class="tags-container">
            <div class="tags has-addons" v-for="(tag, key) in tags" :key="key">
              <span class="tag is-danger">{{ tag.getTitle() }}</span>
              <a class="tag is-delete" @click="removeTag(tag)"></a>
            </div>
          </div>

          <div class="field main-buttons-container">
            <div class="field-label">
              <!-- Left empty for spacing -->
            </div>
            <div class="field-body">
              <div class="field">
                <label class="label">&nbsp;</label>

                <div class="control">
                  <div class="buttons has-addons">
                    <button class="button">Cancel</button>
                    <button class="button is-success" @click="createPost()">
                      Create Post
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import TagDTO from "@/app/components/post/tag";
import NewPostDTO from "@/app/components/post/new-postdto";
import store from "@/store";
import { defineComponent } from "vue";

export default defineComponent({
  data() {
    return {
      editor: {} as ClassicEditor,
      editorConfig: {},

      title: "",
      link: "",
      content: "",
      tagTitle: "",
      tags: [] as TagDTO[],
    };
  },
  created() {
    this.editor = ClassicEditor;
    this.editorConfig = {};
    this.tags = [];
  },
  methods: {
    createPost(): void {
      store.dispatch(
        "posts/add",
        new NewPostDTO(this.title, this.link, this.content, this.tags)
      );
    },

    addTag(title: string): void {
      const titles = title.split(",");

      titles.forEach((eTitle: string) => {
        const tmpTitle = eTitle.trim();
        if (tmpTitle.length <= 0) {
          return;
        }

        this.tags.push(new TagDTO(tmpTitle));
      });

      this.tagTitle = "";
    },

    removeTag(tag: TagDTO): void {
      this.tags = this.tags.filter((e: TagDTO) => {
        return e.getUuid() !== tag.getUuid();
      });
    },
  },
});
</script>
