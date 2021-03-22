<template>
  <section class="section">
    <div class="container">
      <div class="columns is-vcentered is-multiline">
        <div class="column is-half is-offset-one-quarter">
          <h1 class="is-size-3-mobile is-size-1-desktop title">Login</h1>
          <div class="card">
            <div class="card-content">
              <!-- Username -->
              <div class="field">
                <label class="label">Username</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="text" placeholder="Username" />
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-check"></i>
                  </span>
                </div>
              </div>

              <!-- Email -->
              <div class="field">
                <label class="label">Email</label>
                <div class="control has-icons-left has-icons-right">
                  <input class="input" type="email" placeholder="Email" />
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
                  <input class="input" type="password" placeholder="Password" />
                  <span class="icon is-small is-left">
                    <i class="fas fa-envelope"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                  </span>
                </div>
              </div>

              <!-- Buttons -->
              <div class="field is-grouped">
                <button class="button is-link is-fullwidth mr-3">Login</button>
                <div class="control">
                  <button class="button is-link is-light">Cancel</button>
                </div>
              </div>
            </div>
          </div>

          <div class="container-fluid">
            <div class="mt-5">
              <button class="button is-primary is-large is-fullwidth">
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

export default class Login extends Vue {}
</script>
