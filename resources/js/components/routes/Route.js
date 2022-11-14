
import GetStarted from './../homepage/GetStarted.vue'
import Login from './../auth/Login.vue'
import Register from './../homepage/Register.vue'
import Register2 from './../homepage/Register2.vue'
import Administrator from './../admin/_Index.vue'
import TopNavbar from './../homepage/TopNavbar.vue'

import AdminTopNavbar from './../admin/TopNavbar.vue'
import Teacher from './../admin/Teacher.vue'
const routes = [
  { path: '/', component: TopNavbar,
      children:[
          { path: '/', component: GetStarted },
          { path: '/login', component: Login },
          { path: '/register', component: Register },
          { path: '/register2', component: Register2 },
      ]
  },
  
  { path: '/administrator', component: Administrator,
      beforeEnter: (to, from, next) => {
          axios.get('/authenticated')
          .then(res=>{
            next()
           
          })
          .catch(err=>{
            return next({ path: '/'})
          })
        },
        children:[
          { path:'/administrator/teachers', component:Teacher},
          { path:'/administrator/events', component:Teacher},
          { path:'/administrator/grade/:id', component:Teacher},

        ]
    },
]


export default routes;