<template>
  <div class="hello">
    <div>
      <label for="email">Email</label><br />
      <input type="text" v-model="email" id="email" name="email" /><br />
      <label for="pass">Password</label><br />
      <input type="password" v-model="password" id="pass" name="pass" />
      <button @click="login()">Login</button>
    </div>

    <div>
      <button @click="logout()">Logout</button>
    </div>

        <div>
      <button @click="getUserData()">GetUserData</button>
    </div>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import User from "../app/api/user";

export default class Dashboard extends Vue {
  msg!: string;
  email!: string;
  password!: string;

  userApi = new User();

  login(): void {
    this.userApi.login({
      email: this.email,
      password: this.password,
    });
  }

  logout(): void {
    this.userApi.logout();
  }

  getUserData(): void {
    this.userApi.auth();
  }
}
</script>
