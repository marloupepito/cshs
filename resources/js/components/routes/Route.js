
import GetStarted from './../homepage/GetStarted.vue'
import Login from './../auth/Login.vue'
import Register from './../homepage/Register.vue'
import Register2 from './../homepage/Register2.vue'
const routes = [
  { path: '/', component: GetStarted },
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/register2', component: Register2 },
]


export default routes;