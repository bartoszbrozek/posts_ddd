import { createStore } from 'vuex'
import onboarding from '@/store/modules/onboarding'
import messages from '@/store/modules/messages'
import user from '@/store/modules/user'
import navbar from '@/store/modules/navbar'
import VuexPersistence from 'vuex-persist'
import { restoreTyping, isEmpty } from '@/store/restore'

const vuexLocal = new VuexPersistence({
  storage: window.localStorage,
  restoreState: (key, storage) => {
    let json = storage!.getItem(key) as string
    if (isEmpty(json)) {
      json = '{}'
    }

    try {
      const state = JSON.parse(json)
      restoreTyping(state)
      return state
    } catch {
      return {}
    }
  }
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
