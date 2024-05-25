<template>
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <li class="page-item" :class="{ disabled: currentPage === 1 }">
          <button @click="prevPage" class="page-link">Previous</button>
        </li>
        <li v-for="page in totalPages" :key="page" class="page-item" :class="{ active: currentPage === page }">
          <button @click="setPage(page)" class="page-link">{{ page }}</button>
        </li>
        <li class="page-item" :class="{ disabled: currentPage === totalPages }">
          <button @click="nextPage" class="page-link">Next</button>
        </li>
      </ul>
    </nav>
  </template>
  
  <script>
  export default {
    name: 'PaginationComponent',
    props: {
      totalItems: {
        type: Number,
        required: true
      },
      itemsPerPage: {
        type: Number,
        default: 10
      }
    },
    data() {
      return {
        currentPage: 1
      };
    },
    computed: {
      totalPages() {
        return Math.ceil(this.totalItems / this.itemsPerPage);
      }
    },
    methods: {
      setPage(page) {
        this.currentPage = page;
        this.$emit('page-changed', this.currentPage);
      },
      prevPage() {
        if (this.currentPage > 1) {
          this.currentPage--;
          this.$emit('page-changed', this.currentPage);
        }
      },
      nextPage() {
        if (this.currentPage < this.totalPages) {
          this.currentPage++;
          this.$emit('page-changed', this.currentPage);
        }
      }
    }
  };
  </script>
  
  <style scoped>
  </style>
  