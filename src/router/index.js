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
    component: () => import('../views/AboutusView.vue'),
    
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
    path: '/comic_demo',
    name: 'comic_demo',
    component: () => import('../views/ComicDemo.vue'),
  },
  {
    path: '/comic_search',
    name: 'comic_search',
    component: () => import('../views/ComicSearch.vue'),
  },
  {
    path: '/comic_detail',
    name: 'comic_detail',
    component: () => import('../views/ComicDetail.vue'),
  },
  {
    path: '/member_center',
    name: 'member_center',
    component: () => import('../views/MemberCenter.vue'),
    children: [
      {
        path: 'member_nav',
        name: 'member_nav',
        component: () => import('../components/member_center/MemberNav.vue')
      },
      {
        path: 'member_add_value',
        name: 'member_add_value',
        component: () => import('../components/member_center/Add_Value.vue')
      },
    ],
  },
  {
    path: '/about_member',
    name: 'about_member',
    component: () => import('../views/AboutMember.vue')
  },
  // {
  //   path: '/login',
  //   name: 'login',
  //   component: () => import('../views/LoginView.vue')
  // },
]





const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
