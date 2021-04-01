import axios from "@/app/http/axios";
import Csrf from "@/app/api/csrf"
import { AxiosResponse } from "axios";
import NewPostDTO from "../components/post/new-postdto";

export default class Post {
    csrf = new Csrf

    async paginate(numberOfPosts: number): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.get(`/posts/paginate/${numberOfPosts}`);
    }

    async add(newPost: NewPostDTO): Promise<AxiosResponse<any>> {
        await this.csrf.getCookie();

        return axios.post(`/posts`, newPost);
    }
}
