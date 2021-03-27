import axios, { AxiosResponse } from "axios";
import router from "@/router"

const axiosInstance = axios.create({
    baseURL: "http://my-clusters.local/api/",
    withCredentials: true,
    headers: {
        "Content-type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
    }
});

axiosInstance.interceptors.response.use((response: AxiosResponse<any>) => {
    return response
}, (error: any) => {
    if ([401, 403].includes(error.response.status)) {
        localStorage.setItem('isAuthorized', '0')
        router.push("/onboarding")
    }

    return Promise.reject(error)
})

export default axiosInstance