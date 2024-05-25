import { createRouter, createWebHistory } from 'vue-router';
import HomePage from '@/views/HomePage.vue';
import AboutPage from '@/views/AboutPage.vue';
import ServicesPage from '@/views/ServicesPage.vue';
import ContactPage from '@/views/ContactPage.vue';
import AuthPage from '@/views/AuthPage.vue';
import ContentPage from '@/views/ContentPage.vue';

const routes = [
  { path: '/', name: 'Home', component: HomePage },
  { path: '/about', name: 'About', component: AboutPage },
  { path: '/services', name: 'Services', component: ServicesPage },
  { path: '/contact', name: 'Contact', component: ContactPage },
  { path: '/auth', name: 'Auth', component: AuthPage },
  { path: '/content', name: 'Content', component: ContentPage }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

// Global navigation guard to check authentication
router.beforeEach((to, from, next) => {
  const publicPages = ['/auth'];
  const authRequired = !publicPages.includes(to.path);
  const loggedIn = !!localStorage.getItem('authToken');

  if (authRequired && !loggedIn) {
    return next('/auth');
  }

  next();
});

export default router;
