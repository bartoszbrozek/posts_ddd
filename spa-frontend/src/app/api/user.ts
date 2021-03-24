import axios from "@/app/http/axios";
import Csrf from "@/app/api/csrf"
import { AxiosResponse } from "axios";

export default class User {
    csrf = new Csrf

    async register(form: object): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post("/register", form);
    }

    async login(form: object): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post("/login", form);
    }

    async logout(): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post("/logout");
    }

    auth(): Promise<AxiosResponse<any>> {
        return axios.get("/user");
    }
}