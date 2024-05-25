<template>
  <div>
    <HeaderComponent />
    <main class="container my-4">
      <h2 class="text-center mb-4">About Us</h2>

      <!-- Company Overview -->
      <section class="mb-5">
        <h3 class="mb-3">Company Overview</h3>
        <p>
          Cashmere Event Management specializes in organizing and managing a wide range of events, ensuring a memorable experience for all attendees. We provide comprehensive event planning services, including venue selection, catering, entertainment arrangements, and more.
        </p>
      </section>

      <!-- Mission and Vision -->
      <section class="mb-5">
        <h3 class="text-center mb-4">Our Mission and Vision</h3>
        <div class="row text-center">
          <div class="col-md-6 mb-4">
            <div class="card h-100 custom-card">
              <div class="card-header custom-card-header bg-mission">

                <h4 class="mt-2">Mission</h4>
              </div>
              <div class="card-body">
                <p class="card-text">
                  Our mission is to deliver exceptional event management services that exceed our clients' expectations. We strive to create unforgettable experiences through meticulous planning, innovative solutions, and a commitment to excellence.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4">
            <div class="card h-100 custom-card">
              <div class="card-header custom-card-header bg-vision">
                <h4 class="mt-2">Vision</h4>
              </div>
              <div class="card-body">
                <p class="card-text">
                  Our vision is to be the leading event management company, known for our creativity, professionalism, and dedication to making every event a success.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Team Members -->
      <section class="mb-5">
        <h3 class="mb-3">Meet Our Team</h3>
        <div class="row">
          <div class="col-md-4 mb-4" v-for="member in team" :key="member.id">
            <div class="card h-100">
              <img :src="member.image" :alt="member.name" class="card-img-top">
              <div class="card-body">
                <h4 class="card-title">{{ member.name }}</h4>
                <p class="card-text">{{ member.role }}</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials -->
      <section class="mb-5">
        <h3 class="mb-3">Testimonials</h3>
        <div class="accordion" id="testimonialsAccordion">
          <div class="accordion-item" v-for="testimonial in testimonials" :key="testimonial.id">
            <h2 class="accordion-header" :id="'heading' + testimonial.id">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" :data-bs-target="'#collapse' + testimonial.id" aria-expanded="true" :aria-controls="'collapse' + testimonial.id">
                {{ testimonial.author }}
              </button>
            </h2>
            <div :id="'collapse' + testimonial.id" class="accordion-collapse collapse show" :aria-labelledby="'heading' + testimonial.id" data-bs-parent="#testimonialsAccordion">
              <div class="accordion-body">
                <p class="mb-0">"{{ testimonial.quote }}"</p>
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
  name: 'AboutPage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      team: [
        { id: 1, name: 'John Doe', role: 'Founder & CEO', image: require('@/assets/team1.jpg') },
        { id: 2, name: 'Jane Smith', role: 'Event Manager', image: require('@/assets/team3.jpg') },
        { id: 3, name: 'Sam Johnson', role: 'Creative Director', image: require('@/assets/team2.jpg') },
      ],
      testimonials: [
        { id: 1, quote: 'Cashmere Event Management made our wedding day unforgettable. Every detail was perfect!', author: 'Emily & James' },
        { id: 2, quote: 'The corporate conference was a huge success thanks to their exceptional planning and execution.', author: 'ABC Corp.' },
        { id: 3, quote: 'Their team is professional, creative, and truly cares about making your event special.', author: 'Lisa M.' },
      ]
    };
  }
};
</script>

<style scoped>
.custom-card {
  border: none;
}

.custom-card-header {
  position: relative;
  top: -30px;
  border-radius: 50%;
  width: 80px;
  height: 80px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
}

.bg-mission {
  background-color: #f5f5dc;
}

.bg-vision {
  background-color: #f5f5dc;
}

.icon {
  width: 50px;
  height: 50px;
}

.card h4 {
  font-weight: bold;
}

.card-body {
  margin-top: -20px;
}
</style>
