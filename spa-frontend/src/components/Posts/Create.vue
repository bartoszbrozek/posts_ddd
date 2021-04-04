<template>
  <div class="container create-post">
    <VeeForm
      v-slot="{ handleSubmit }"
      :validation-schema="validationSchema"
      as="div"
    >
      <form @submit.prevent="handleSubmit($event, onSubmit)">
        <div class="content">
          <h1>Create Post</h1>
        </div>
        <div class="columns">
          <div class="column is-three-quarters">
            <div class="field">
              <label class="label">Title</label>
              <div class="control">
                <Field class="input" type="text" name="title" v-model="title" />
                <ErrorMessage name="title" class="tag is-danger is-light" />
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
                <div class="content content-editor">
                  <ckeditor
                    :editor="editor"
                    :config="editorConfig"
                    tag-name="textarea"
                    v-model="content"
                    name="content"
                    @blur="validateContent()"
                  ></ckeditor>
                  <span
                    role="alert"
                    class="tag is-danger is-light"
                    v-show="showContentError"
                    >Please fill content</span
                  >
                </div>
              </div>
            </div>
          </div>

          <div class="column">
            <label class="label">Tags</label>
            <div class="field has-addons tag-field">
              <div class="control">
                <input
                  class="input"
                  type="text"
                  placeholder="Use comma as tag separator"
                  v-model="tagTitle"
                />
              </div>
              <div class="control">
                <a class="button is-info" @click="addTag(tagTitle)">
                  Add Tag
                </a>
              </div>
            </div>

            <div class="tags-container">
              <div
                class="tags has-addons"
                v-for="(tag, key) in tags"
                :key="key"
              >
                <span class="tag is-danger">{{ tag.getValue() }}</span>
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
                      <button class="button" @click="cancel()">Cancel</button>
                      <button
                        type="submit"
                        class="button is-success"
                        :class="{ 'is-loading': isProcessing }"
                      >
                        Create Post
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </VeeForm>
  </div>
</template>

<script lang="ts">
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import TagDTO from "@/app/components/post/tag";
import NewPostDTO from "@/app/components/post/new-postdto";
import store from "@/store";
import router from "@/router";
import { defineComponent } from "vue";
import { Field, Form as VeeForm, ErrorMessage } from "vee-validate";
import * as yup from "yup";
import slug from "@/app/tools/slugger";

export default defineComponent({
  components: {
    Field,
    VeeForm,
    ErrorMessage,
  },
  data() {
    return {
      editor: {} as ClassicEditor,
      editorConfig: {},

      title: "",
      link: "",
      content: "",
      tagTitle: "",
      tags: [] as Array<TagDTO>,

      validationSchema: yup.object({
        title: yup.string().required().min(3),
        content: yup.string().required().min(1),
      }),
      showContentError: false,
      isProcessing: false,
    };
  },
  created() {
    this.editor = ClassicEditor;
  },
  methods: {
    onSubmit(): void {
      this.isProcessing = true;

      if (!this.showContentError) {
        this.createPost();
      }
    },

    cancel(): void {
      router.push("/");
    },

    validateContent(): void {
      this.validationSchema.fields.content
        .isValid(this.content)
        .then((isValid: boolean) => {
          this.showContentError = !isValid;
        });
    },

    createPost(): void {
      store
        .dispatch(
          "posts/add",
          new NewPostDTO(this.title, this.link, this.content, this.tags)
        )
        .finally(() => {
          this.isProcessing = false;
        });
    },

    addTag(title: string): void {
      const titles = title.split(",");

      titles.forEach((eTitle: string) => {
        const tmpTitle = slug(eTitle.trim());
        if (tmpTitle.length <= 0) {
          return;
        }

        const tag = new TagDTO(tmpTitle);

        if (
          this.tags.filter((e: TagDTO) => e.getValue() === tmpTitle).length <= 0
        ) {
          this.tags.push(tag);
        }
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
