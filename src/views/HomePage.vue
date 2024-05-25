<template>
  <div>
    <HeaderComponent />
    
    <main class="container my-4" :style="{ backgroundImage: `url(${bgImage})`, backgroundColor: bgColor, backgroundSize: 'cover', backgroundPosition: 'center', backgroundRepeat: 'no-repeat' }">
      <!-- Call-to-Action Section -->
      <section class="text-center py-5 bg-beige">
        <h2 class="display-4">Ready to Plan Your Next Event?</h2>
        <p class="lead mt-3">Contact us today to start planning your memorable event with Cashmere Event Management.</p>
        <router-link to="/contact" class="btn btn-primary mt-4">Get in Touch</router-link>
      </section>

      <!-- Events Section -->
      <section class="mt-5">
        <h3 class="mb-4 text-center">Recent Events</h3>
        <div class="row">
          <div class="col-md-4 mb-4" v-for="event in events" :key="event.id">
            <div class="card">
              <img :src="event.image" class="card-img-top" :alt="event.title">
              <div class="card-body">
                <h5 class="card-title">{{ event.title }}</h5>
                <p class="card-text">{{ event.description }}</p>
                <button @click="likeEvent(event.id)" class="btn btn-outline-primary like-button">
                  <i :class="['fa', 'fa-heart', { 'liked': event.liked }]"></i> Like
                </button>
                <p>Likes: {{ event.likes }}</p>
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
  name: 'HomePage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      bgColor: '#f5f5dc', // Background color
      events: [
        { id: 1, title: 'Annual Charity Gala', description: 'A glamorous evening of dining and entertainment to support local charities.', date: 'March 15, 2024', image: require('@/assets/event1.jpg'), likes: 0, liked: false },
        { id: 2, title: 'Corporate Conference 2024', description: 'A three-day conference bringing together industry leaders and innovators.', date: 'June 22, 2024', image: require('@/assets/event2.jpg'), likes: 0, liked: false },
        { id: 3, title: 'Luxury Wedding', description: 'An elegant wedding ceremony and reception in a picturesque setting.', date: 'September 5, 2024', image: require('@/assets/event3.jpg'), likes: 0, liked: false },
        { id: 4, title: 'Tech Expo 2024', description: 'A showcase of the latest advancements in technology and innovation.', date: 'November 11, 2024', image: require('@/assets/event4.jpg'), likes: 0, liked: false },
        { id: 5, title: 'Music Festival', description: 'A weekend of live music, food, and fun for all ages.', date: 'August 19, 2024', image: require('@/assets/event5.jpg'), likes: 0, liked: false },
        { id: 6, title: 'Art Exhibition', description: 'A display of stunning artworks from local and international artists.', date: 'October 10, 2024', image: require('@/assets/event6.jpg'), likes: 0, liked: false },
      ]
    };
  },
  methods: {
    async likeEvent(eventId) {
      try {
        const response = await fetch('http://localhost/cashmere-event-management/like_event.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ event_id: eventId })
        });
        const data = await response.json();
        if (data.success) {
          const event = this.events.find(event => event.id === eventId);
          event.likes = data.like_count;
          event.liked = true;
        } else {
          console.error(data.message);
        }
      } catch (error) {
        console.error('Error liking event:', error);
      }
    }
  },
  async mounted() {
    try {
      const response = await fetch('http://localhost/cashmere-event-management/fetch_likes.php');
      const likesData = await response.json();
      this.events.forEach(event => {
        const like = likesData.find(like => like.event_id === event.id);
        if (like) {
          event.likes = like.like_count;
        }
      });
    } catch (error) {
      console.error('Error fetching likes:', error);
    }
  }
}
</script>

<style scoped>
.bg-beige {
  background-color: #f5f5dc;
}
.like-button {
  display: flex;
  align-items: center;
}
.like-button .fa {
  margin-right: 8px;
}
.like-button .fa.liked {
  color: red;
}
</style>
