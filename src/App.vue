<template>
  <div id="app">
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
  created() {
    if (!this.isAuthenticated()) {
      this.$router.push('/auth');
    }
  },
  methods: {
    isAuthenticated() {
      // Implement your logic to check if the user is authenticated
      // This can be a token check, session check, etc.
      return !!localStorage.getItem('authToken');
    }
  }
};
</script>

<style>
/* Add any global styles here */
</style>
