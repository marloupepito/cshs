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
          title: "Home"
        },
        { id: 2, icon: "text-white fas fa-calendar", title: "Events" },
        {
          id: 3,
          icon: "text-white fas fa-user-circle",
          title: "Teachers",
        },
        { id: 4, icon: "text-white fas fa-users", title: "Students" },
        { id: 5, icon: "text-white fas fa-sign-out-alt", title: "Logout" },
      ],
    }),
  };
</script>
