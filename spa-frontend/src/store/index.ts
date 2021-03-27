import { createStore } from 'vuex'
import onboarding from '@/store/modules/onboarding'
import messages from '@/store/modules/messages'
import user from '@/store/modules/user'
import navbar from '@/store/modules/navbar'
import VuexPersistence from 'vuex-persist'

const vuexLocal = new VuexPersistence({
  storage: window.localStorage
})

export default createStore({
  state: {
  },
  mutations: {
  },
  actions: {
  },
  modules: {
    onboarding,
    messages,
    user,
    navbar,
  },
  plugins: [
    vuexLocal.plugin
  ]
})
