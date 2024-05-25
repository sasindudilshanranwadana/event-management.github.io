<template>
  <header class="bg-dark text-white">
    <nav class="container navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">Cashmere Event Management</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <router-link to="/" class="nav-link">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/about" class="nav-link">About</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/services" class="nav-link">Services</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/contact" class="nav-link">Contact</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/content" class="nav-link">Content</router-link>
          </li>
          <li class="nav-item">
            <router-link to="/auth" class="nav-link">Login/Register</router-link>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: 'HeaderComponent'
};
</script>

<style scoped>
</style>
