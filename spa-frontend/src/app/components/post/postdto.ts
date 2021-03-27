import Restore from '@/store/restore'

@Restore()
export default class PostDTO {
    private uuid: string;
    private title: string;
    private link: string;
    private content: string;
    private createdAt: Date;
    private updatedAt: Date;

    constructor(uuid: string, title: string, link: string, content: string, createdAt: string, updatedAt: string) {
        this.uuid = uuid;
        this.title = title;
        this.link = link;
        this.content = content;
        this.createdAt = new Date(createdAt);
        this.updatedAt = new Date(updatedAt);
    }

    getUuid(): string {
        return this.uuid
    }

    getTitle(): string {
        return this.title
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