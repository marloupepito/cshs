
<template>
      <div class="col-md-12">
         <router-view></router-view>
      </div>
</template>

<script>
import axios from 'axios'
    export default {
      components:{

        },
        mounted(){
          const loading = this.$vs.loading({
            text: 'Loading...',
            type:'circles'
          })
          axios.get('/user')
          .then(res=>{
            loading.close()
            })
          .catch(err=>{
            loading.close()
            })
          },
      data:() => ({
        active: true
      })
    }
  </script>

        