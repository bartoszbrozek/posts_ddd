import axios from "@/app/http/axios";
import Cookies from 'js-cookie'

export default class Csrf {
    getCookie(): Promise<unknown> {
        const token = Cookies.get("XSRF-TOKEN");

        if (token) {
            return new Promise(resolve => {
                resolve(token);
            });
        }

        return axios.get("csrf-cookie")
    }
}