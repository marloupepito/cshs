
import GetStarted from './../homepage/GetStarted.vue'
import Login from './../auth/Login.vue'
import Register from './../homepage/Register.vue'
import Register2 from './../homepage/Register2.vue'
import Administrator from './../admin/_Index.vue'
import TopNavbar from './../homepage/TopNavbar.vue'

import AdminTopNavbar from './../admin/TopNavbar.vue'
import Teacher from './../admin/teacher/_Index.vue'
import Loading from './../admin/Loading.vue'
import Event from './../admin/event/_Index.vue'
import Home from './../admin/home/_Index.vue'
import Grade from './../admin/student/_Index.vue'
import Loading2 from './../admin/student/Loading.vue'
import Loading3 from './../admin/event/Loading.vue'
import Logout from './../admin/Logout.vue'

import Student from './../student/_Index.vue'
import EventPost from './../admin/event/Event.vue'
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
          { path:'/administrator', component:Home},
          { path:'/administrator/loading', component:Loading},
          { path:'/administrator/teachers', component:Teacher},
          { path:'/administrator/events', component:Event},
          { path:'/administrator/grade/:id', component:Grade},
          { path:'/administrator/loading2', component:Loading2},
          { path:'/administrator/loading3', component:Loading3},
          { path:'/administrator/logout', component:Logout},

        ]
    },
      { path: '/student', component: Student,
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
        { path:'/student', component:EventPost},
          { path:'/student/events', component:EventPost},
          { path:'/administrator/logout', component:Logout},

        ]
    },
]


export default routes;