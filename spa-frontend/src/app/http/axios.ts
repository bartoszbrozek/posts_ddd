import axios, { AxiosResponse } from "axios";
import router from "@/router"
import store from "@/store"

const axiosInstance = axios.create({
    baseURL: "http://my-clusters.local/api/",
    withCredentials: true,
    headers: {
        "Content-type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
    }
});

axiosInstance.defaults.params = {}
axiosInstance.defaults.params['XDEBUG_SESSION_START'] = 'VSCODE';

axiosInstance.interceptors.response.use((response: AxiosResponse<any>) => {
    return response
}, (error: any) => {

    if ([401, 403].includes(error.response.status)) {
        localStorage.setItem('vuex', '{}')
        store.commit("user/SET_IS_LOGGED_IN", false)
        router.push("/onboarding")
    }

    return Promise.reject(error)
})

export default axiosInstance