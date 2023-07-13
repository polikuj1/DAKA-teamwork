import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('../views/AboutusView.vue')
  },
  {
    path: '/news',
    name: 'news',
    component: () => import('../views/NewsView.vue')
  },
  {
    path: '/food',
    name: 'food',
    component: () => import('../views/FoodIntro.vue')
  },
  {
    path: '/reservation',
    name: 'reservation',
    component: () => import('../views/ReservationView.vue')
  },
  {
    path: '/comic',
    name: 'comic',
    component: () => import('../views/ComicView.vue'),
  },
  {
    path: '/comic_detail',
    name: 'comic_detail',
    component: () => import('../views/ComicDetail.vue'),
  },
  // {
  //   path: '/login',
  //   name: 'login',
  //   component: () => import('../views/LoginView.vue')
  // },
  {
    path: '/member_center',
    name: 'member_center',
    component: () => import('../views/MemberCenter.vue')
  },
  {
    path: '/about_member',
    name: 'about_member',
    component: () => import('../views/AboutMember.vue')
  },
]





const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
