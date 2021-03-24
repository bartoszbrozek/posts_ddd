<template>
  <div class="onboarding">
    <h2>Onboarding</h2>

    <keep-alive>
      <transition name="component-fade" mode="out-in">
        <component v-bind:is="currentComponent" />
      </transition>
    </keep-alive>
  </div>
</template>

<script lang="ts">
import { Component } from "@vue/runtime-core";
import { Vue, Options } from "vue-class-component";
import Login from "../components/Onboarding/Login.vue";
import Register from "../components/Onboarding/Register.vue";
import store from "@/store";

@Options({
  components: {
    Login,
    Register,
  },
})
export default class Onboarding extends Vue {
  actualComponent = "login";

  get currentComponent(): Component {
    switch (store.getters["onboarding/getCurrentPage"]) {
      case "login":
        return Login;

      case "register":
        return Register;

      default:
        return Login;
    }
  }
}
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