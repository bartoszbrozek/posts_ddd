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
import MessageDTO from "@/app/components/message/messagedto";
import MsgTemplate from "./MsgTemplate.vue";
import MessageDispatcher from "@/app/components/message/message-dispatcher";
import store from "@/store";
import { defineComponent } from "vue";

export default defineComponent({
  components: {
    MsgTemplate,
  },
  data() {
    return {
      messageDispatcher: {} as MessageDispatcher,
    };
  },
  mounted() {
    this.messageDispatcher = new MessageDispatcher(store);
  },
  computed: {
    messages: function (): Array<MessageDTO> {
      return store.getters["messages/all"];
    },
  },
});
</script>
