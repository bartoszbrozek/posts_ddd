import MessageDTO from "@/app/components/message/messagedto"

const state = {
    messages: []
}

const getters = {
    all: (state: any) => {
        return state.messages
    }
}

const actions = {
    addMessage(v: any, message: MessageDTO) {
        console.log(v)
        v.state.messages.push(message)

        setTimeout(function () {
            const messages = v.state.messages.filter((e: MessageDTO) => {
                return e.getUuid() != message.getUuid();
            })

            v.commit("SET_MESSAGES", messages)
        }, message.getTimeout())
    }

}

const mutations = {
    SET_MESSAGES(state: any, messages: Array<MessageDTO>) {
        state.messages = messages
    },
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}