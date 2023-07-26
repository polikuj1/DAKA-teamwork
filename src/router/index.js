import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const routes = [
  {
    path: '/',
    name: 'welcome',
    component: () => import('../views/Welcome.vue'),
  },
  {
    path: '/front',
    name: 'front',
    redirect:'/home',
    component: () => import('../views/FrontView.vue'),
    children:[
      {
        path: '/home',
        name: 'home',
        component: () => import('../views/HomeView.vue'),
      },
      {
        path: '/about',
        name: 'about',
        component: () => import('../views/AboutusView.vue'),
      },
      {
        path: '/location',
        name: 'location',
        component: () => import('../views/LocationView.vue'),
      },
      {
        path: '/news',
        name: 'news',
        component: () => import('../views/NewsView.vue')
      },
      {
        path: '/news_detail',
        name: 'news_detail',
        component: () => import('../views/NewsDetail.vue')
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
        path: '/comic_detail/:id',
        name: 'comic_detail',
        component: () => import('../views/ComicDetail.vue'),
      },
      {
        path: '/comic_cart',
        name: 'comic_cart',
        component: () => import('../views/ComicCart.vue')
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
            path: 'member_add_credit',
            name: 'member_add_credit',
            component: () => import('../components/member_center/AddCredit.vue')
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
          {
            path: 'member_seat_reservation',
            name: 'member_seat_reservation',
            component: () => import('../components/member_center/SeatReservation.vue')
          },
          {
            path: 'member_book_reservation',
            name: 'member_book_reservation',
            component: () => import('../components/member_center/BookRecord.vue')
          },
        ],
      },
      {
        path: '/about_member',
        name: 'about_member',
        component: () => import('../views/AboutMember.vue')
      },
      {
        path: '/game',
        name: 'game',
        component: () => import('../views/PuzzleView.vue')
      },
      {
        path: '/award',
        name: 'award',
        component: () => import('../views/SlotMachine.vue')
      },
      {
        path: '/about_origin',
        name: 'about_origin',
        component: () => import('../views/AboutoriginView.vue')
      }
    ]
    
  },
  
  // {
  //   path: '/login',
  //   name: 'login',
  //   component: () => import('../components/LoginView.vue')
  // },
]





const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
