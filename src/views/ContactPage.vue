<template>
  <div>
    <HeaderComponent />
    <main class="container my-4">
      <h2 class="text-center mb-4">Contact Us</h2>

      <!-- Contact Information -->
      <section class="mb-5">
        <h3 class="mb-3">Get in Touch</h3>
        <p>If you have any questions or need further information, please feel free to contact us using the form below or through our contact details.</p>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
              <div class="card-body">
                <h5 class="card-title">Our Address</h5>
                <p class="card-text">123 Event Lane, Celebration City, 45678</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
              <div class="card-body">
                <h5 class="card-title">Email Us</h5>
                <p class="card-text">info@cashmereevents.com</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card h-100 text-center">
              <div class="card-body">
                <h5 class="card-title">Call Us</h5>
                <p class="card-text">(123) 456-7890</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Form -->
      <section class="mb-5">
        <h3 class="mb-3">Contact Form</h3>
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">First Name</label>
              <input type="text" class="form-control" id="firstName" v-model="form.firstName" required>
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last Name</label>
              <input type="text" class="form-control" id="lastName" v-model="form.lastName" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" v-model="form.email" required>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="4" v-model="form.message" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
      </section>

      <!-- Map Section -->
      <section class="mb-5">
        <h3 class="mb-3">Find Us</h3>
        <div class="map-responsive">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.1234567890!2d-123.4567890!3d37.7894567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1234567890abcdef!2sEvent%20Location!5e0!3m2!1sen!2sus!4v1234567890123!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
      </section>
    </main>
    <FooterComponent />
  </div>
</template>

<script>
import HeaderComponent from '@/components/HeaderComponent.vue';
import FooterComponent from '@/components/FooterComponent.vue';

export default {
  name: 'ContactPage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      form: {
        firstName: '',
        lastName: '',
        email: '',
        message: ''
      }
    };
  },
  methods: {
    async submitForm() {
      try {
        const response = await fetch('http://localhost/cashmere-event-management/submit_contact_form.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(this.form)
        });
        const data = await response.json();
        if (data.success) {
          alert(`Thank you, ${this.form.firstName}! Your message has been sent.`);
          this.resetForm();
        } else {
          alert('There was an error sending your message.');
        }
      } catch (error) {
        console.error('Error submitting form:', error);
        alert('There was an error sending your message.');
      }
    },
    resetForm() {
      this.form.firstName = '';
      this.form.lastName = '';
      this.form.email = '';
      this.form.message = '';
    }
  }
};
</script>

<style scoped>
.map-responsive {
  overflow: hidden;
  padding-bottom: 56.25%;
  position: relative;
  height: 0;
}
.map-responsive iframe {
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  position: absolute;
}
</style>
