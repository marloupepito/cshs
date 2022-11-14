<template>
  <div class="col-md-12 container" style="margin-top:120px">
      <center> 
        <vs-navbar color="rgb(64, 191, 128)" fixed textWhite  padding-scroll v-model="active">
          <template >
            <img src="/images/logo.png" width="70" alt="">
          </template>
          <h1 class="nav"><b>Hola Senior of CSHS-SA!</b></h1>
        </vs-navbar> 
      </center>
    </div>
</template>
  <script>
  export default {
    data:() => ({
      active: 'guide'
    })
  }
  </script>