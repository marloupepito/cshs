
import GetStarted from './../homepage/GetStarted.vue'
import Login from './../auth/Login.vue'
import Scanner from './../auth/Scanner.vue'
import Register from './../homepage/Register.vue'
import Register2 from './../homepage/Register2.vue'
import Administrator from './../admin/_Index.vue'
import TopNavbar from './../homepage/TopNavbar.vue'

import AdminTopNavbar from './../admin/TopNavbar.vue'
import Teacher from './../admin/teacher/_Index.vue'
import Loading from './../admin/Loading.vue'
import Event from './../admin/event/_Index.vue'
import Home from './../admin/home/_Index.vue'
import CheckAttendance from './../admin/home/CheckAttendance.vue'
import ClassroomAttendance from './../admin/event/Card.vue'
import Grade from './../admin/student/_Index.vue'
import Loading2 from './../admin/student/Loading.vue'
import Loading3 from './../admin/event/Loading.vue'
import Logout from './../admin/Logout.vue'

import Student from './../student/_Index.vue'
import Loading4 from './../student/Loading.vue'
import StudentHistory from './../student/History.vue'
import Profile from './../student/Profile.vue'
import EventPost from './../student/event/Layout.vue'


import Teacher2 from './../teacher/_Index.vue'
import Loading22 from './../teacher/Loading.vue'
import TeacherStudent1 from './../teacher/Table.vue'

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
          { path:'/administrator/check_attendance', component:ClassroomAttendance},
          { path:'/administrator/check_attendance_list', component:CheckAttendance},
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
        { path:'/student/my_attendance', component:EventPost},
        { path:'/student/history', component:StudentHistory},
        { path:'/student/loading', component:Loading4},
        { path:'/student/events', component:EventPost},
        { path:'/student/logout', component:Logout},
        { path:'/student/scanner', component:Scanner},
        { path:'/student/profile', component:Profile},

        ]
    },
     { path: '/teacher', component: Teacher2,
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
        { path:'/teacher', component:EventPost},
        { path:'/teacher/logout', component:Logout},
        { path:'/teacher/check_attendance', component:CheckAttendance},
        { path:'/teacher/student_list/11', component:TeacherStudent1},
        { path:'/teacher/student_list/12', component:TeacherStudent1},
        { path:'/teacher/loading', component:Loading22},

        ]
    },
]


export default routes;