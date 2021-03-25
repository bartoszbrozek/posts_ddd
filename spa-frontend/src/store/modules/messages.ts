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
    add(v: any, message: MessageDTO) {
        v.state.messages.push(message)

        setTimeout(function () {
            const messages = v.state.messages.filter((e: MessageDTO) => {
                return e.getUuid() != message.getUuid();
            })

            v.commit("SET_MESSAGES", messages)
        }, message.getTimeout())
    },

    close(v: any, uuid: string) {
        const messages = v.state.messages.filter((e: MessageDTO) => {
            return e.getUuid() != uuid;
        })

        v.commit("SET_MESSAGES", messages)
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