<template>
  <div class="notification is-primary" :class="message.getType()">
    <button class="delete" @click="close(message.getUuid())"></button>
    <strong v-html="message.getTitle()"></strong>
    <p v-html="message.getMessage()"></p>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import { Prop } from "vue-property-decorator";
import MessageDTO from "@/app/components/message/messagedto";
import store from "@/store";

export default class MsgTemplate extends Vue {
  @Prop({ type: Object, required: true })
  message!: MessageDTO;

  close(uuid: string): void {
    store.dispatch("messages/close", uuid);
  }
}
</script>
