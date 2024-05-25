<template>
    <div>
      <h1>Register</h1>
      <form @submit.prevent="register">
        <input type="email" v-model="email" placeholder="Email" required />
        <input type="password" v-model="password" placeholder="Password" required />
        <button type="submit">Register</button>
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
      register() {
        axios.post('http://localhost/your_php_folder/register.php', {
          email: this.email,
          password: this.password
        })
        .then(response => {
          if (response.data.success) {
            alert('Registration successful');
          } else {
            alert('Registration failed: ' + response.data.error);
          }
        })
        .catch(error => {
          console.error('Error during registration:', error);
        });
      }
    }
  };
  </script>
  