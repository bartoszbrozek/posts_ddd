import axios, { AxiosResponse } from "axios";
import router from "@/router"
import store from "@/store"
import MessageDispatcher from "@/app/components/message/message-dispatcher";

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
    const httpCode = response.status

    if (httpCode >= 201 && httpCode < 300) {
        new MessageDispatcher(store).info(response.data.message);
    }

    return response
}, (error: any) => {
    if (typeof error.response === 'undefined') {
        new MessageDispatcher(store).error("Something went wrong");
    } else {
        const httpCode = error.response.status
        if ([401, 403].includes(httpCode)) {
            localStorage.setItem('vuex', '{}')
            store.commit("user/SET_IS_LOGGED_IN", false)
            router.push("/onboarding")
        }

        if (httpCode >= 400) {
            new MessageDispatcher(store).error(error.response.data.message);
        }
    }



    return Promise.reject(error)
})

export default axiosInstance