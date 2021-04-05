import Post from "@/app/api/post"
import NewPostDTO from "@/app/components/post/new-postdto"
import PostDTO from "@/app/components/post/postdto"
import { AxiosResponse } from "axios"

const state = {
    posts: [] as Array<PostDTO>,
    currentPost: {} as PostDTO,
}

const getters = {
    all: (state: any): Array<PostDTO> => {
        return state.posts
    },
    currentPost: (state: any): PostDTO => {
        return state.currentPost
    }
}

const actions = {
    paginate(v: any, numberOfPosts: number): void {
        const post = new Post
        post.paginate(numberOfPosts).then((response: AxiosResponse<any>) => {
            const posts: Array<PostDTO> = [];

            response.data.data.forEach((element: any) => {
                posts.push(
                    new PostDTO(
                        element.id,
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

    add(v: any, newPost: NewPostDTO): Promise<AxiosResponse<any>> {
        const post = new Post

        return post.add(newPost)
    },

    fetchOne(v: any, uuid: string): void {
        const post = new Post
        post.fetchOne(uuid).then((response: AxiosResponse<any>) => {
            const postData = response.data.data

            v.commit("SET_CURRENT_POST", new PostDTO(
                postData.id,
                postData.title,
                postData.link,
                postData.content,
                postData.created_at,
                postData.updated_at,
            ))
        })
    },
}

const mutations = {
    SET_POSTS(state: any, posts: Array<PostDTO>) {
        state.posts = posts
    },
    SET_CURRENT_POST(state: any, post: PostDTO) {
        state.currentPost = post
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}