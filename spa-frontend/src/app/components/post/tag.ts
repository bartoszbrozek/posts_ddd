import Restore from '@/store/restore'

@Restore()
export default class TagDTO {
    private title: string;
    private uuid: string;

    constructor(title: string) {
        this.title = title;
        this.uuid = btoa(Math.random().toString()).slice(0, 10)
    }

    getTitle(): string {
        return this.title
    }

    getUuid(): string {
        return this.uuid
    }
}