import axios from "@/app/http/axios";
import Csrf from "@/app/api/csrf"

export default class User {
    csrf = new Csrf

    async register(form: object) {
        await this.csrf.getCookie();

        return axios.post("/register", form);
    }

    async login(form: object) {
        await this.csrf.getCookie();

        return axios.post("/login", form);
    }

    async logout() {
        await this.csrf.getCookie();

        return axios.post("/logout");
    }

    auth() {
        return axios.get("/user");
    }
}