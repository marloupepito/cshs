
import GetStarted from './../homepage/GetStarted.vue'
import Login from './../auth/Login.vue'
import Register from './../homepage/Register.vue'
import Register2 from './../homepage/Register2.vue'
import Administrator from './../admin/_Index.vue'


import TopNavbar from './../homepage/TopNavbar.vue'
const routes = [
  { path: '/', component: TopNavbar,
      children:[
          { path: '/', component: GetStarted },
          { path: '/login', component: Login },
          { path: '/register', component: Register },
          { path: '/register2', component: Register2 },
      ]
  },
  
  { path: '/administrator', component: Administrator },
]


export default routes;