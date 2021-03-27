import Post from "@/app/api/post"
import PostDTO from "@/app/components/post/postdto"
import { AxiosResponse } from "axios"

const state = {
    posts: []
}

const getters = {
    all: (state: any): Array<PostDTO> => {
        return state.posts
    }
}

const actions = {
    paginate(v: any, numberOfPosts: number) {
        const post = new Post
        post.paginate(numberOfPosts).then((response: AxiosResponse<any>) => {
            const posts: Array<PostDTO> = [];

            response.data.forEach((element: any) => {
                posts.push(
                    new PostDTO(
                        element.uuid,
                        element.title,
                        element.link,
                        element.content,
                        element.created_at,
                        element.updated_at,
                    )
                )
            })

            v.commit("SET_POSTS", posts)
        })

    },
}

const mutations = {
    SET_POSTS(state: any, posts: Array<PostDTO>) {
        state.posts = posts
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}