<template>
  <div class="notifications-container">
    <MsgTemplate
      v-for="(message, key) in messages"
      :key="key"
      :message="message"
    />
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import MessageDTO from "@/app/components/message/messagedto";
import MsgTemplate from "./MsgTemplate.vue";
import MessageDispatcher from "@/app/components/message/message-dispatcher";
import store from "@/store";

@Options({
  components: {
    MsgTemplate,
  },
})
export default class Messages extends Vue {
  messageDispatcher!: MessageDispatcher;

  mounted() {
    this.messageDispatcher = new MessageDispatcher(store);
  }

  get messages(): Array<MessageDTO> {
    return store.getters["messages/all"];
  }
}
</script>
