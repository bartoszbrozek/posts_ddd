import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/Home.vue'
import CreatePost from '../views/CreatePost.vue'
import User from '@/app/api/user'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { authRequired: true },
  },
  {
    path: '/post/create',
    name: 'CreatePost',
    component: CreatePost,
    meta: { authRequired: true },
  },
  {
    path: '/onboarding',
    name: 'Onboarding',
    component: () => import('../views/Onboarding.vue'),
    meta: { authRequired: false },
  },
  {
    path: '/about',
    name: 'About',
    component: () => import('../views/About.vue'),
    meta: { authRequired: true },
  },
  {
    path: '/posts/:uuid',
    name: 'PostDetails',
    component: () => import('../views/PostDetails.vue'),
    meta: { authRequired: true },
    props: true,
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

router.beforeEach((to: any, from: any, next: any) => {
  const user = new User

  if (user.isLoggedIn() && to.name === "Onboarding") {
    next({
      path: '/',
    })
  } else if (user.isLoggedIn()) {
    next()
  } else if (to.matched.some((record: any) => !record.meta.authRequired)) {
    next()
  } else {
    next({
      path: '/onboarding',
    })
  }
})

export default router
