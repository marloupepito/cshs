<template>
  
 <CurvedBottomNavigation
 style="z-index:1 !important"
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
          icon: "text-white fas fa-list",
          title: "Event",
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
    }),
  };
</script>
