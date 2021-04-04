import Restore from '@/store/restore'
import TagDTO from './tag';

@Restore()
export default class NewPostDTO {
    private title: string;
    private link: string;
    private content: string;
    private tags: TagDTO[];

    constructor(title: string, link: string, content: string, tags: TagDTO[]) {
        this.title = title;
        this.link = link;
        this.content = content;
        this.tags = tags;
    }

    getValue(): string {
        return this.title
    }

    getLink(): string {
        return this.link
    }

    getContent(): string {
        return this.content
    }

    getTags(): TagDTO[] {
        return this.tags
    }
}