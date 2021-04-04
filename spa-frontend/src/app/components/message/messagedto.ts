export default class MessageDTO {
    private message: string;
    private title: string;
    private type: string;
    private timeout: number;
    private uuid: string;

    constructor(message: string, title: string, type: string, timeout: number) {
        this.message = message;
        this.title = title;
        this.type = type;
        this.timeout = timeout
        this.uuid = btoa(Math.random().toString()).slice(0, 10)
    }

    getMessage(): string {
        return this.message
    }

    getTitle(): string {
        return this.title
    }

    getType(): string {
        return this.type
    }

    getTimeout(): number {
        return this.timeout
    }

    getUuid(): string {
        return this.uuid;
    }
}