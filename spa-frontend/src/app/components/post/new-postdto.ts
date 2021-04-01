import Restore from '@/store/restore'

@Restore()
export default class NewPostDTO {
    private title: string;
    private link: string;
    private content: string;

    constructor(title: string, link: string, content: string) {
        this.title = title;
        this.link = link;
        this.content = content;
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
}