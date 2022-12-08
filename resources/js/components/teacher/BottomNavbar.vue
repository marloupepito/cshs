<template>
  
  <RingBottomNavigation
   background-color='rgb(64, 191, 128)'
  border-color='#4F7A28'
  title-color='rgb(10, 10, 10)'
  badge-color='#FBC02D'
  icon-color='#669C35'
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
          title: "Events",
          path:"/teacher",
        },
        { 
          id: 2, 
          icon: "text-white fas fa-users", 
          title: "Grade 11",
          path:"/teacher/loading?11"
        },
        { 
          id: 3, 
          icon: "text-white fas fa-users", 
          title: "Grade 12",
          path:"/teacher/loading?12"
        },
         { 
          icon: "text-white fas fa-sign-out-alt", 
          title: "Grade 12",
          path:"/teacher/logout",
        },
     
      ],
    }),
    methods:{
      logoutClick(){
        alert('ss')
      }
      },
    mounted(){
     const grade = window.location.pathname.split('/')[3]
      if(grade === '11'){
        this.selected = 2
      }else if(grade === '12'){
        this.selected = 3
      }else{
        this.selected = 1
      }
      },
    methods:{

    }
  };
</script>
