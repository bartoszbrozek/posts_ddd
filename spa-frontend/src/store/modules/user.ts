import UserDTO from "@/app/components/user/userdto"

const state = {
    isLoggedIn: false,
    user: UserDTO
}

const getters = {
    isLoggedIn: (state: any): boolean => {
        return state.isLoggedIn
    },
    user: (state: any): UserDTO => {
        return new UserDTO(state.user.username, state.user.email)
    }
}

const actions = {}

const mutations = {
    SET_IS_LOGGED_IN(state: any, value: boolean) {
        state.isLoggedIn = value
    },
    SET_USER(state: any, value: UserDTO) {
        state.user = value
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}