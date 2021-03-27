<template>
  <nav
    class="navbar is-fixed-top"
    role="navigation"
    aria-label="main navigation"
    v-show="isLoggedIn()"
  >
    <div class="navbar-brand">
      <router-link to="/" class="navbar-item" href="https://bulma.io">
        <img
          src="https://bulma.io/images/bulma-logo.png"
          width="112"
          height="28"
        />
      </router-link>

      <a
        role="button"
        class="navbar-burger"
        aria-label="menu"
        aria-expanded="false"
        data-target="main-navbar"
        @click="toggleMobileNavbar()"
        :class="{ 'is-active': this.isMobileNavbarOn }"
      >
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div
      id="main-navbar"
      class="navbar-menu"
      :class="{ 'is-active': this.isMobileNavbarOn }"
    >
      <div class="navbar-start">
        <router-link to="/" class="navbar-item">Dashboard</router-link>
        <router-link to="/about" class="navbar-item">About</router-link>
      </div>

      <div class="navbar-end">
        <div class="navbar-item" v-if="isLoggedIn()">
          Welcome,&nbsp;<span v-html="userData.getName()"></span>
        </div>
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
import User from "@/app/api/user";
import store from "@/store";
import UserDTO from "@/app/components/user/userdto";

export default class Navbar extends Vue {
  private user!: User;

  created() {
    this.user = new User();
  }

  isLoggedIn(): boolean {
    return this.user?.isLoggedIn();
  }

  logout(): void {
    this.user.logout();
  }

  toggleMobileNavbar(): void {
    store.commit("navbar/TOGGLE_NAVBAR");
  }

  get isMobileNavbarOn(): boolean {
    return store.getters["navbar/isMobileNavbarOn"];
  }

  get userData(): UserDTO {
    return store.getters["user/user"];
  }
}
</script>
