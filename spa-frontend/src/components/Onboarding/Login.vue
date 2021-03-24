<template>
  <section class="section">
    <div class="container">
      <div class="columns is-vcentered is-multiline">
        <div class="column is-half is-offset-one-quarter">
          <h1 class="is-size-3-mobile is-size-1-desktop title">Login</h1>
          <div class="card">
            <div class="card-content">
              <!-- Email -->
              <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                  <input
                    class="input"
                    type="email"
                    placeholder="Email"
                    v-model="email"
                  />
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                  </span>
                </div>
              </div>

              <!-- Password -->
              <div class="field">
                <label class="label">Password</label>
                <div class="control has-icons-left has-icons-right">
                  <input
                    class="input"
                    type="password"
                    placeholder="Password"
                    v-model="password"
                  />
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                  </span>
                </div>
              </div>

              <hr />

              <!-- Buttons -->
              <div class="field is-grouped">
                <div class="control">
                  <button class="button is-link is-light">Cancel</button>
                </div>
                <button
                  class="button is-link is-fullwidth mr-3"
                  :class="{ 'is-loading': isTryingToLogIn  }"
                  @click="login()"
                >
                  Login
                </button>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="mt-5">
              <button
                class="button is-primary is-large is-fullwidth"
                @click="changePage()"
              >
                No account? Create one now
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import store from "@/store";

export default class Login extends Vue {
  email = "";
  password = "";

  changePage(): void {
    store.commit("onboarding/CHANGE_PAGE");
  }

  login(): void {
    store.dispatch("onboarding/login", {
      email: this.email,
      password: this.password,
    });
  }

  get isTryingToLogIn(): boolean {
    return store.getters["onboarding/isTryingToLogIn"];
  }
}
</script>
