<template>
  <div>
    <button @click="test()"> TEST </button>


    <article
      class="message is-primary"
      v-for="(message, key) in messages"
      :key="key"
    >
      <div class="message-header">
        <p>Primary</p>
        <button class="delete" aria-label="delete"></button>
      </div>
      <div class="message-body">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta
        nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida
        purus diam, et dictum <a>felis venenatis</a> efficitur. Aenean ac
        <em>eleifend lacus</em>, in mollis lectus. Donec sodales, arcu et
        sollicitudin porttitor, tortor urna tempor ligula, id porttitor mi magna
        a neque. Donec dui urna, vehicula et sem eget, facilisis sodales sem.
      </div>
    </article>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import MessageDTO from "@/app/components/message/messagedto";
import store from "@/store";

export default class Messages extends Vue {
  test() {
    store.dispatch(
      "messages/addMessage",
      new MessageDTO("test1", "is-primary", 1000)
    );
    store.dispatch(
      "messages/addMessage",
      new MessageDTO("test2", "is-primary", 2000)
    );
    store.dispatch(
      "messages/addMessage",
      new MessageDTO("test3", "is-primary", 2500)
    );
  }

  get messages() {
    return store.getters["messages/all"];
  }
}
</script>
