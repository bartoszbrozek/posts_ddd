import User from '@/app/api/user'

const user = new User

const state = {
    currentPage: 'login',
    isTryingToLogIn: false,
}

const getters = {
    getCurrentPage: (state: any) => {
        return state.currentPage
    },

    isTryingToLogIn: (state: any) => {
        return state.isTryingToLogIn
    }
}

const actions = {
    login(v: any, form: object): void {
        v.commit('SET_IS_TRYING_TO_LOG_IN', true)
        user.login(form).finally(() => {
            v.commit('SET_IS_TRYING_TO_LOG_IN', false)
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
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}