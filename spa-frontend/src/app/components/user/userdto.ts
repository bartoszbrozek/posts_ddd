import Restore from '@/store/restore'
@Restore()
export default class UserDTO {
    private username: string;
    private email: string;

    constructor(username: string, email: string) {
        this.username = username;
        this.email = email;
    }

    getName(): string {
        return this.username
    }

    getEmail(): string {
        return this.email
    }
}