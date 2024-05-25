<template>
  <div>
    <HeaderComponent />
    <main class="container my-4">
      <h2 class="text-center mb-4">Our Services</h2>

      <!-- Services Section -->
      <section id="services" class="services-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <!-- Event Planning -->
              <div class="service-item mb-5">
                <div class="service-icon">
                  <img src="@/assets/event-planning.jpg" alt="Event Planning" class="img-fluid rounded-circle">
                </div>
                <div class="service-content">
                  <h3>Event Planning</h3>
                  <p>
                    Our experienced team offers comprehensive event planning services to ensure every detail is perfect. We work closely with you to bring your vision to life, managing everything from initial concept to final execution.
                  </p>
                </div>
              </div>

              <!-- Venue Selection -->
              <div class="service-item mb-5">
                <div class="service-icon">
                  <img src="@/assets/venue-selection.jpg" alt="Venue Selection" class="img-fluid rounded-circle">
                </div>
                <div class="service-content">
                  <h3>Venue Selection</h3>
                  <p>
                    We help you find the ideal venue for your event, whether it's a small intimate gathering or a large corporate conference. Our team has access to a wide range of venues and will assist you in selecting the perfect location.
                  </p>
                </div>
              </div>

              <!-- Catering Services -->
              <div class="service-item mb-5">
                <div class="service-icon">
                  <img src="@/assets/catering.jpg" alt="Catering Services" class="img-fluid rounded-circle">
                </div>
                <div class="service-content">
                  <h3>Catering Services</h3>
                  <p>
                    Our catering services offer a diverse menu to suit all tastes and dietary requirements. We work with top chefs and catering companies to provide delicious and beautifully presented food for your event.
                  </p>
                </div>
              </div>

              <!-- Entertainment Arrangements -->
              <div class="service-item mb-5">
                <div class="service-icon">
                  <img src="@/assets/entertainment.jpg" alt="Entertainment Arrangements" class="img-fluid rounded-circle">
                </div>
                <div class="service-content">
                  <h3>Entertainment Arrangements</h3>
                  <p>
                    We can arrange a variety of entertainment options to enhance your event, from live bands and DJs to magicians and speakers. Whatever your entertainment needs, we have the resources to make it happen.
                  </p>
                </div>
              </div>

              <!-- Additional Services -->
              <div class="service-item mb-5">
                <div class="service-icon">
                  <img src="@/assets/additional-services.jpg" alt="Additional Services" class="img-fluid rounded-circle">
                </div>
                <div class="service-content">
                  <h3>Additional Services</h3>
                  <p>
                    In addition to our core services, we offer a range of additional services including event decor, photography, videography, and transportation. Our goal is to provide a seamless experience and ensure your event is unforgettable.
                  </p>
                </div>
              </div>
            </div>
          </div>
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
  name: 'ServicesPage',
  components: {
    HeaderComponent,
    FooterComponent
  }
};
</script>

<style scoped>
.services-section {
  padding: 60px 0;
}

.service-item {
  display: flex;
  align-items: center;
  margin-bottom: 40px;
}

.service-icon {
  flex: 0 0 200px; /* Adjust the width of the image container */
  margin-right: 20px;
}

.service-icon img {
  width: 200px; /* Adjust the width of the image */
  height: 200px; /* Adjust the height of the image */
}

.service-content {
  flex: 1;
}

.service-content h3 {
  margin-top: 0;
}
</style>
