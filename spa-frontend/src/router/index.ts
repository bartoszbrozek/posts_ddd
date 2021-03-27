import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import Home from '../views/Home.vue'
import User from '@/app/api/user'

const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: { authRequired: true },
  },
  {
    path: '/onboarding',
    name: 'Onboarding',
    component: () => import('../views/Onboarding.vue'),
    meta: { authRequired: false },
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
