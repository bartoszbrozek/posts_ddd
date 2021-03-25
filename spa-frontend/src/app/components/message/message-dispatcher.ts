import MessageDTO from "./messagedto";

export default class MessageDispatcher {
    store: any;

    constructor(store: any) {
        this.store = store
    }

    success(content: string, timeout = 3000) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, "is-success", timeout)
        );
    }

    error(content: string, timeout = 3000) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, "is-danger", timeout)
        );
    }

    warning(content: string, timeout = 3000) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, "is-warning", timeout)
        );
    }

    primary(content: string, timeout = 3000) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, "", timeout)
        );
    }

    info(content: string, timeout = 3000) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, "is-info", timeout)
        );
    }
}