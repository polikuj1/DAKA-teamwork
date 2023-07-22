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
      {
        path: 'member_bind_credit',
        name: 'member_bind_credit',
        component: () => import('../components/member_center/BindCredit.vue')
      },
      {
        path: 'member_value_record',
        name: 'member_value_record',
        component: () => import('../components/member_center/ValueRecord.vue')
      },
      {
        path: 'member_coupon',
        name: 'member_coupon',
        component: () => import('../components/member_center/Coupon.vue')
      },
      {
        path: 'member_edit',
        name: 'member_edit',
        component: () => import('../components/member_center/Edit.vue')
      },
    ],
  },
  {
    path: '/about_member',
    name: 'about_member',
    component: () => import('../views/AboutMember.vue')
  },
  {
    path: '/comic_cart',
    name: 'comic_cart',
    component: () => import('../views/ComicCart.vue')
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
