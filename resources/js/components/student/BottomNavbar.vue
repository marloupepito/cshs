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
          title: "Events",
          path:"/student"
        },
        { 
          id: 2, 
          icon: "text-white fas fa-clock", 
          title: "History",
          path:"/student/events"
        },
        { 
          id: 5, 
          icon: "text-white fas fa-user-circle", 
          title: "Profile",
          path:"/student/events"
        },
      ],
    }),
  };
</script>
