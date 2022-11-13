
<template>
    <div class="col-md-12">
     <TopNavbar/>
       <Home />
    </div>
  </template>
<script>
import TopNavbar from './homepage/TopNavbar.vue'
import Home from './homepage/Home.vue'
    export default {
      components:{
        TopNavbar,
        Home
        },
      data:() => ({
        active: 0
      })
    }
  </script>

        