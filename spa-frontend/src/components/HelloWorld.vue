<template>
  <div class="hello">some content</div>
</template>

<script lang="ts">
import axios from "./../app/http/axios";
import { Vue } from "vue-class-component";

export default class HelloWorld extends Vue {
  msg!: string;

  created(): void {
        axios
          .get("user")
          .then((response) => {
            console.log(response);
          })
          .catch((e) => {
            console.log(e);
          });

    // CSRF
  //   axios
  //     .get("csrf-cookie")
  //     .then((response) => {
  //       console.log(response)
  //       // LOGIN
  //       axios
  //         .post("login", {
  //           email: "bartekbrozek@gmail.com",
  //           password: "Paszolwon11!",
  //         })
  //         .then((response) => {
  //           console.log(response);
  //         })
  //         .catch((e) => {
  //           console.log(e);
  //         });

  //       //get user
  //       axios
  //         .get("user")
  //         .then((response) => {
  //           console.log(response);
  //         })
  //         .catch((e) => {
  //           console.log(e);
  //         });
  //     })
  //     .catch((e: any) => {
  //       console.log(e);
  //     });
  // }
  }
}
</script>
