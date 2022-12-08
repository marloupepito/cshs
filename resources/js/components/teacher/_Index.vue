<template>
  <div>
    <div class="center examplex mt-5 container">
      <router-view></router-view> 
    </div>
      <BottomNavbar />
  </div>
  </template>



<script>

import BottomNavbar from './BottomNavbar.vue'
  export default {
    components:{
      BottomNavbar
      },
    data:() => ({
      active: 'guide'
    }),
    mounted(){
      axios.get('/user')
      .then(res=>{
        if(res.data.usertype === 'teacher'){

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
