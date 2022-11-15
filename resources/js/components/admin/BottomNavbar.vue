<template>
  
  <CurvedBottomNavigation
  class="botNavbar text-white"
   foreground-color='white'
  badge-color='#FBC02D'
  background-color='rgb(64, 191, 128)'
  icon-color='dark'
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
          title: "Home",
          path:"/administrator"
        },
        { 
          id: 2, 
          icon: "text-white fas fa-calendar", 
          title: "Events",
          path:"/administrator/events"
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
          title: "Students",
          path:"/administrator",
        },
        { 
          id: 5, 
          icon: "text-white fas fa-sign-out-alt", 
          title: "Logout",
          path:"/administrator/logout"
        },
      ],
    }),
  };
</script>
