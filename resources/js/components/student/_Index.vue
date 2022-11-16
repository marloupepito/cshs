<template>
	<div>
		<router-view></router-view> 
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
        if(res.data.usertype === 'student'){

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
