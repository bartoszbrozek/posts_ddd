import axios from "axios";

export default axios.create({
    baseURL: "http://my-clusters.local/api/",
    withCredentials: true,
    headers: {
        "Content-type": "application/json",
        "X-Requested-With": "XMLHttpRequest"
    }
});