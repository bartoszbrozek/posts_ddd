import { createApp } from 'vue'
import '@/assets/scss/main.scss'
import App from './App.vue'
import router from './router'
import store from './store'
import CKEditor from '@ckeditor/ckeditor5-vue';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faFontAwesome } from '@fortawesome/free-brands-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faPlusCircle } from '@fortawesome/free-solid-svg-icons'
import { faMinusCircle } from '@fortawesome/free-solid-svg-icons'


library.add(faPlusCircle)
library.add(faMinusCircle)
library.add(faFontAwesome)

createApp(App).use(store).use(router).use(CKEditor).component('font-awesome-icon', FontAwesomeIcon).mount('#app')
