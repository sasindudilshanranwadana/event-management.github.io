<template>
  <div>
    <HeaderComponent />
    
    <main class="container my-4" :style="{ backgroundColor: bgColor }">
      <!-- Call-to-Action Section -->
      <section class="text-center py-5 bg-beige">
        <h2 class="display-4">Explore Our Content</h2>
        <p class="lead mt-3">Discover more about our offerings and add your favorites to your wishlist.</p>
      </section>

      <!-- Content Section -->
      <section class="mt-5">
        <h3 class="mb-4 text-center">Our Content</h3>
        <div class="row" v-for="(row, index) in rows" :key="index">
          <div class="col-md-4 mb-4" v-for="item in row" :key="item.id">
            <div class="card">
              <img :src="item.image" class="card-img-top" :alt="item.title">
              <div class="card-body">
                <h5 class="card-title">{{ item.title }}</h5>
                <p class="card-text">{{ item.description }}</p>
                <p class="card-text">{{ item.date }}</p>
                <button @click="addToWishlist(item.id)" class="btn btn-outline-primary wishlist-button">
                  <i :class="['fa', 'fa-heart', { 'heart': item.wishlist > 0 }]"></i> Add to Wishlist
                </button>
                <p>Wishlist: {{ item.wishlist }}</p>
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
import axios from 'axios';

export default {
  name: 'ContentPage',
  components: {
    HeaderComponent,
    FooterComponent
  },
  data() {
    return {
      bgColor: '#f5f5dc', // Background color
      items: [
        { id: 1, title: 'DJ Night', description: 'An electrifying night with top DJs.', date: 'June 20, 2024', image: require('@/assets/dj.jpg'), wishlist: 0 },
        { id: 2, title: 'Birthday Party', description: 'A fun-filled birthday celebration.', date: 'July 10, 2024', image: require('@/assets/birthday.jpeg'), wishlist: 0 },
        { id: 3, title: 'Beach Wedding', description: 'A beautiful beachside wedding ceremony.', date: 'August 15, 2024', image: require('@/assets/wedding.jpg'), wishlist: 0 }
      ],
      rows: []
    };
  },
  methods: {
    async fetchData() {
      try {
        const response = await axios.get('http://localhost/cashmere-event-management/fetch_content.php');
        this.items = response.data;
        this.splitIntoRows();
      } catch (error) {
        console.error('Error fetching data:', error);
      }
    },
    async addToWishlist(itemId) {
      try {
        const response = await fetch('http://localhost/cashmere-event-management/add_to_wishlist.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ item_id: itemId })
        });
        const data = await response.json();
        if (data.success) {
          const item = this.items.find(item => item.id === itemId);
          item.wishlist = data.wishlist_count;
        } else {
          console.error(data.message);
        }
      } catch (error) {
        console.error('Error adding to wishlist:', error);
      }
    },
    splitIntoRows() {
      const itemsPerRow = 3;
      this.rows = [];
      for (let i = 0; i < this.items.length; i += itemsPerRow) {
        this.rows.push(this.items.slice(i, i + itemsPerRow));
      }
    }
  },
  created() {
    this.splitIntoRows();  // Call splitIntoRows on creation
  }
};
</script>

<style scoped>
.bg-beige {
  background-color: #f5f5dc;
}
.wishlist-button {
  display: flex;
  align-items: center;
}
.wishlist-button .fa {
  margin-right: 8px;
}
.wishlist-button .fa.heart {
  color: red;
}
</style>
