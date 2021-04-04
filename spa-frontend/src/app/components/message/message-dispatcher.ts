import MessageDTO from "./messagedto";

export default class MessageDispatcher {
    private store: any;
    private defaultTimeout = 5000;

    constructor(store: any) {
        this.store = store
    }

    success(content: string, title = "Success", timeout = this.defaultTimeout) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, title, "is-success", timeout)
        );
    }

    error(content: string, title = "Error", timeout = this.defaultTimeout) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, title, "is-danger", timeout)
        );
    }

    warning(content: string, title = "Warning", timeout = this.defaultTimeout) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, title, "is-warning", timeout)
        );
    }

    primary(content: string, title = "Message", timeout = this.defaultTimeout) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, title, "", timeout)
        );
    }

    info(content: string, title = "Information", timeout = this.defaultTimeout) {
        this.store.dispatch(
            "messages/add",
            new MessageDTO(content, title, "is-info", timeout)
        );
    }
}