import Restore from '@/store/restore'

@Restore()
export default class TagDTO {
    private value: string;
    private uuid: string;

    constructor(value: string) {
        this.value = value;
        this.uuid = btoa(Math.random().toString()).slice(0, 10)
    }

    getValue(): string {
        return this.value
    }

    getUuid(): string {
        return this.uuid
    }
}