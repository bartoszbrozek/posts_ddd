<template>
  <nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="https://bulma.io">
        <img
          src="https://bulma.io/images/bulma-logo.png"
          width="112"
          height="28"
        />
      </a>

      <a
        role="button"
        class="navbar-burger"
        aria-label="menu"
        aria-expanded="false"
        data-target="main-navbar"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="main-navbar" class="navbar-menu">
      <div class="navbar-start">
        <router-link to="/" class="navbar-item">Dashboard</router-link>
        <router-link to="/about" class="navbar-item">About</router-link>
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="buttons" v-if="!isLoggedIn()">
            <router-link to="/onboarding" class="button is-light"
              >Login / Sign Up</router-link
            >
          </div>

          <div class="buttons" v-else>
            <a class="button is-light" @click="logout()">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import store from "@/store";
import User from "@/app/api/user";

export default class Navbar extends Vue {
  user!: User;

  created() {
    this.user = new User();
  }

  isLoggedIn(): boolean {
    return this.user?.isLoggedIn();
  }

  logout(): void {
    this.user.logout();
  }
}
</script>
