<template>
  
 <CurvedBottomNavigation
 style="z-index:100 !important"
 foreground-color='#F7F7F8'
  badge-color='#FBC02D'
  background-color='rgb(64, 191, 128)'
  icon-color='#0000008A'
   :options="options" 
   v-model="selected" />
</template>

<script>

  export default {
    data: () => ({
      selected: 1,
      options: [
        {
          id: 1,
          icon: "text-white fas fa-list",
          title: "News Feed",
          path:"/administrator"
        },
        { 
          id: 2, 
          icon: "text-white fas fa-calendar", 
          title: "Events",
          path:"/administrator/events",
        },
        {
          id: 3,
          icon: "text-white fas fa-user-circle",
          title: "Teachers",
          path:"/administrator/teachers"
        },
        {
              id: 4, 
              icon: "text-white fas fa-users", 
              title: "Grade11",
              path:"/administrator/loading2?11",
            },
             {
              id: 5, 
              icon: "text-white fas fa-users", 
              title: "Grade12",
              path:"/administrator/loading2?12",
            },
        { 
          icon: "text-white fas fa-sign-out-alt", 
          title: "Logout",
          path:"/administrator/logout"
        },
      ],
      path:''
    }),
    mounted(){
      const path = this.$route.path.split('/')[2]
      const path2 = this.$route.path.split('/')[3]
      
      if(path === undefined){
        this.selected =1
      }else if(path === "events"){
        this.selected =2
      }else if(path === "teachers"){
        this.selected =3
      }else if(path === "grade" && path2 === '11'){
        this.selected =4
      }else if(path === "grade" && path2 === '12'){
        this.selected =5
      }
    }
  };
</script>
