
<template>
    <div class="center examplex mt-5 container">
      <vs-navbar color="rgb(64, 191, 128)" fixed textWhite  padding-scroll v-model="active">
        <template >
          <img src="/images/logo.png" width="70" alt="">
        </template>
        <h1 class="nav"><b>Holla Senior of CSHS-SA!</b></h1>
      </vs-navbar> 
      <Home /> 
    </div>
  </template>

<script>
import Home from './Home.vue'
  export default {
    components:{
      Home
      },
    data:() => ({
      active: 'guide'
    })
  }
  </script>

        