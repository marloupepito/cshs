<template>
  
  <CurvedBottomNavigation
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
          icon: "fas fa-home",
          title: "Home",
          childs: [{ id: 101, icon: "fas fa-gifts", title: "Gifts", badge: 7 }],
        },
        { id: 2, icon: "fas fa-wallet", title: "Wallet" },
        {
          id: 3,
          icon: "fas fa-plus",
          title: "Setting",
          childs: [{ id: 301, icon: "fas fa-ticket-alt", title: "Tickets" }],
        },
        { id: 4, icon: "fas fa-bell", title: "Notification", badge: 15 },
      ],
    }),
  };
</script>
