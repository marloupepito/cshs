<template>
  <div>
    <div class="center examplex mt-5 container">
      <TopNavbar />
      <SidebarNav />
      <router-view></router-view> 
       </div>
    
      <BottomNavbar />
  </div>
  </template>

<script>

import TopNavbar from './TopNavbar.vue'
import SidebarNav from './SideNavbar.vue'
import BottomNavbar from './BottomNavbar.vue'
  export default {
    components:{
      SidebarNav,
      TopNavbar,
      BottomNavbar
      },
    data:() => ({
      active: 'guide'
    }),
    mounted(){
      axios.get('/user')
      .then(res=>{
        if(res.data.usertype === 'admin'){

        }else{
          axios.post('/logout')
          .then(res=>{
          this.$router.push({path:'/login'})
          })
        }
      })
    }
  }
  </script>

