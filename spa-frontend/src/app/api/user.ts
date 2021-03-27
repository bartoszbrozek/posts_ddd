import axios from "@/app/http/axios";
import Csrf from "@/app/api/csrf"
import { AxiosResponse } from "axios";
import router from "@/router"
import store from "@/store"

export default class User {
    csrf = new Csrf

    async register(form: object): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post("/register", form);
    }

    async login(form: object): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        const response = axios.post("/login", form)

        response.then(() => {
            router.push('/')
        })

        return response
    }

    async logout(): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post("/logout");
    }

    auth(): Promise<AxiosResponse<any>> {
        return axios.get("/user");
    }

    isLoggedIn(): boolean {
        return store.getters['user/isLoggedIn']
    }
}
