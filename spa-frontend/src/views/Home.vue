<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.png">
    <Dashboard msg="Welcome to Your Vue.js + TypeScript App"/>
  </div>
</template>

<script lang="ts">
import { Options, Vue } from 'vue-class-component';
import Dashboard from '@/components/Dashboard.vue'; // @ is an alias to /src

@Options({
  components: {
    Dashboard,
  },
})
export default class Home extends Vue {}
</script>
