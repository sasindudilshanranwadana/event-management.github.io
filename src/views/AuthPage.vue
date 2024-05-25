<template>
  <div>
    <HeaderComponent />

    <main class="container my-4" :style="{ backgroundColor: bgColor }">
      <!-- Auth Section -->
      <section class="auth-section text-center py-5 bg-beige">
        <div v-if="!isRegistering">
          <h2 class="display-4">Login</h2>
          <p class="lead mt-3">Please log in to access the website</p>
          <form @submit.prevent="login">
            <div class="form-group">
              <input type="text" class="form-control" v-model="loginData.username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" v-model="loginData.password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
          </form>
          <p class="mt-3">Don't have an account? <a href="#" @click.prevent="isRegistering = true">Register here</a></p>
        </div>

        <div v-else>
          <h2 class="display-4">Register</h2>
          <p class="lead mt-3">Create an account to get started</p>
          <form @submit.prevent="register">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" class="form-control" v-model="registerData.firstName" placeholder="First Name" required>
              </div>
              <div class="form-group col-md-6">
                <input type="text" class="form-control" v-model="registerData.lastName" placeholder="Last Name" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" v-model="registerData.username" placeholder="Username" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" v-model="registerData.email" placeholder="Email Address" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="password" class="form-control" v-model="registerData.password" placeholder="Password" required>
              </div>
              <div class="form-group col-md-6">
                <input type="password" class="form-control" v-model="registerData.confirmPassword" placeholder="Confirm Password" required>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Register</button>
          </form>
          <p class="mt-3">Already have an account? <a href="#" @click.prevent="isRegistering = false">Login here</a></p>
        </div>

        <!-- Notification Section -->
        <div v-if="notification.message" class="alert" :class="notification.type">
          {{ notification.message }}
        </div>
      </section>
    </main>

    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from '@/components/HeaderComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';
import axios from 'axios';

export default {
  name: 'AuthPage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      bgColor: '#f5f5dc', // Background color
      isRegistering: false,
      loginData: {
        username: '',
        password: ''
      },
      registerData: {
        firstName: '',
        lastName: '',
        username: '',
        email: '',
        password: '',
        confirmPassword: ''
      },
      notification: {
        message: '',
        type: ''
      }
    };
  },
  methods: {
    async login() {
      try {
        const response = await axios.post('http://localhost/cashmere-event-management/login.php', this.loginData);
        if (response.data.success) {
          localStorage.setItem('authToken', 'sample_token'); // Store a sample token (replace with actual token logic)
          window.location.href = '/'; // Redirect to home page after successful login
        } else {
          this.notification.message = response.data.message;
          this.notification.type = 'alert-danger';
        }
      } catch (error) {
        console.error('Error logging in:', error);
        this.notification.message = 'An error occurred during login.';
        this.notification.type = 'alert-danger';
      }
    },
    async register() {
      if (this.registerData.password !== this.registerData.confirmPassword) {
        this.notification.message = 'Passwords do not match';
        this.notification.type = 'alert-danger';
        return;
      }

      try {
        const response = await axios.post('http://localhost/cashmere-event-management/register.php', this.registerData);
        if (response.data.success) {
          this.notification.message = 'Registration Successful';
          this.notification.type = 'alert-success';
          this.isRegistering = false;
        } else {
          this.notification.message = response.data.message;
          this.notification.type = 'alert-danger';
        }
      } catch (error) {
        console.error('Error registering:', error);
        this.notification.message = 'An error occurred during registration.';
        this.notification.type = 'alert-danger';
      }
    }
  }
};
</script>

<style scoped>
.bg-beige {
  background-color: #f5f5dc;
}
.auth-section {
  max-width: 600px;
  margin: 0 auto;
}
.auth-section h2 {
  margin-bottom: 1.5rem;
}
.auth-section form {
  max-width: 100%;
  margin: 0 auto;
}
.auth-section .form-group {
  margin-bottom: 1rem;
}
.auth-section .form-row .form-group {
  margin-bottom: 0;
}
.alert {
  margin-top: 20px;
  padding: 10px;
  border: 1px solid transparent;
  border-radius: 4px;
}
.alert-success {
  color: #155724;
  background-color: #d4edda;
  border-color: #c3e6cb;
}
.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}
</style>
