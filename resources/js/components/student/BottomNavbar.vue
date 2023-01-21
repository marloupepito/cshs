<template>
  
  <CurvedBottomNavigation
  style="z-index:100 !important"
 foreground-color='#F7F7F8'
  badge-color='#FBC02D'
  background-color='rgb(64, 191, 128)'
  icon-color='#0000008A'
   :options="options" v-model="selected" />
</template>

<script>

  export default {
    data: () => ({
      selected: 1,
      options: [
        {
          id: 1,
          icon: "text-white fas fa-home",
          title: "News Feed",
          path:"/student"
        },
        { 
          id: 2, 
          icon: "text-white fas fa-clock", 
          title: "History",
          path:"/student/history"
        },
        { 
          id: 3, 
          icon: "text-white fas fa-user-circle", 
          title: "Profile",
          path:"/student/profile"
        },
        { 
          icon: "text-white fas fa-sign-out-alt", 
          title: "Logout",
          path:"/student/logout"
        },
     
      ],
    }),
    mounted(){
       const grade = window.location.pathname.split('/')[2]
      if(grade === 'history'){
        this.selected = 2
      }else if(grade === 'profile'){
        this.selected = 3
      }else{
        this.selected = 1
      }
    }
  };
</script>
