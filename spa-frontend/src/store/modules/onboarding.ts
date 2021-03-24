import User from '@/app/api/user'

const user = new User

const state = {
    currentPage: 'login',
    isTryingToLogIn: false,
    isTryingToRegister: false,
}

const getters = {
    getCurrentPage: (state: any) => {
        return state.currentPage
    },

    isTryingToLogIn: (state: any) => {
        return state.isTryingToLogIn
    },

    isTryingToRegister: (state: any) => {
        return state.isTryingToRegister
    }
}

const actions = {
    login(v: any, form: object): void {
        v.commit('SET_IS_TRYING_TO_LOG_IN', true)
        user.login(form).finally(() => {
            v.commit('SET_IS_TRYING_TO_LOG_IN', false)
        })
    },

    register(v: any, form: object): void {
        v.commit('SET_IS_TRYING_TO_REGISTER', true)
        user.register(form).finally(() => {
            v.commit('SET_IS_TRYING_TO_REGISTER', false)
        })
    }
}

const mutations = {
    CHANGE_PAGE(state: any) {
        if (state.currentPage === 'login') {
            state.currentPage = 'register'
        } else if (state.currentPage === 'register') {
            state.currentPage = 'login'
        }
    },

    SET_IS_TRYING_TO_LOG_IN(state: any, value: boolean) {
        state.isTryingToLogIn = value
    },

    SET_IS_TRYING_TO_REGISTER(state: any, value: boolean) {
        state.isTryingToRegister = value
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}