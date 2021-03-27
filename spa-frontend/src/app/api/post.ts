import axios from "@/app/http/axios";
import Csrf from "@/app/api/csrf"
import { AxiosResponse } from "axios";

export default class Post {
    csrf = new Csrf

    async paginate(numberOfPosts: number): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.get(`/posts/paginate/${numberOfPosts}`);
    }
}
