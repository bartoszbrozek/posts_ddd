<template>
  <div>
    <Navbar />

    <div class="container mt-6">
      <section class="section">
        <transition name="component-fade" mode="out-in">
          <router-view />
        </transition>
      </section>
    </div>

    <Messages />
  </div>
</template>

<script lang="ts">
import { Vue, Options } from "vue-class-component";
import Messages from "@/components/Message/Messages.vue";
import Navbar from "@/components/Nav/Navbar.vue";

@Options({
  components: {
    Messages,
    Navbar,
  },
})
export default class App extends Vue {}
</script>

<style scoped>
.component-fade-enter-active,
.component-fade-leave-active {
  transition: opacity 0.3s ease;
}

.component-fade-enter-from,
.component-fade-leave-to {
  opacity: 0;
}
</style>