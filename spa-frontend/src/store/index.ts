import { createStore } from 'vuex'
import onboarding from '@/store/modules/onboarding'
import messages from '@/store/modules/messages'
import user from '@/store/modules/user'
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
  },
  plugins: [
    vuexLocal.plugin
  ]
})
