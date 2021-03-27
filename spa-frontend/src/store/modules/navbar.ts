const state = {
    isMobileNavbarOn: false,
}

const getters = {
    isMobileNavbarOn: (state: any): boolean => {
        return state.isMobileNavbarOn
    }
}

const actions = {}

const mutations = {
    TOGGLE_NAVBAR(state: any) {
        state.isMobileNavbarOn = !state.isMobileNavbarOn
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}