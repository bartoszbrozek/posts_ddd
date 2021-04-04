import Restore from '@/store/restore'

@Restore()
export default class PostDTO {
    private uuid: string;
    private value: string;
    private link: string;
    private content: string;
    private createdAt: Date;
    private updatedAt: Date;

    constructor(uuid: string, value: string, link: string, content: string, createdAt: string, updatedAt: string) {
        this.uuid = uuid;
        this.value = value;
        this.link = link;
        this.content = content;
        this.createdAt = new Date(createdAt);
        this.updatedAt = new Date(updatedAt);
    }

    getUuid(): string {
        return this.uuid
    }

    getValue(): string {
        return this.value
    }

    getLink(): string {
        return this.link
    }

    getContent(): string {
        return this.content
    }

    getCreatedAt(): Date {
        return this.createdAt
    }

    getUpdatedAt(): Date {
        return this.updatedAt
    }
}