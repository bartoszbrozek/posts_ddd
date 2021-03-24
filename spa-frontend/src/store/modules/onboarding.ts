const state = {
    currentPage: 'login'
}

const getters = {
    getCurrentPage: (state: any) => {
        return state.currentPage
    }
}

const actions = {

}

const mutations = {
    CHANGE_PAGE(state: any) {
        if (state.currentPage === 'login') {
            state.currentPage = 'register'
        } else if (state.currentPage === 'register') {
            state.currentPage = 'login'
        }
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}