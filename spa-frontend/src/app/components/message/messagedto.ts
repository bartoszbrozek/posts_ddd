export default class MessageDTO {
    private message: string;
    private type: string;
    private timeout: number;
    private uuid: string;

    constructor(message: string, type: string, timeout: number) {
        this.message = message;
        this.type = type;
        this.timeout = timeout
        this.uuid = btoa(Math.random().toString()).slice(0, 10)
    }

    getMessage(): string {
        return this.message
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