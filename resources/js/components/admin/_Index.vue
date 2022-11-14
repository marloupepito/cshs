<template>
  <div>
    <div class="center examplex mt-5 container">
      <TopNavbar />
      <SidebarNav />
      <router-view></router-view> 
    </div>
    
      <BottomNavbar />
  </div>
  </template>

<script>

import TopNavbar from './TopNavbar.vue'
import SidebarNav from './SideNavbar.vue'
import BottomNavbar from './BottomNavbar.vue'
  export default {
    components:{
      SidebarNav,
      TopNavbar,
      BottomNavbar
      },
    data:() => ({
      active: 'guide'
    })
  }
  </script>

