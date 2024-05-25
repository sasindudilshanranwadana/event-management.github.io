<template>
    <div>
      <h1>Login</h1>
      <form @submit.prevent="login">
        <input type="email" v-model="email" placeholder="Email" required />
        <input type="password" v-model="password" placeholder="Password" required />
        <button type="submit">Login</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    data() {
      return {
        email: '',
        password: ''
      };
    },
    methods: {
      login() {
        axios.post('http://localhost/your_php_folder/login.php', {
          email: this.email,
          password: this.password
        })
        .then(response => {
          if (response.data.success) {
            alert('Login successful');
          } else {
            alert('Login failed: ' + response.data.error);
          }
        })
        .catch(error => {
          console.error('Error during login:', error);
        });
      }
    }
  };
  </script>
  