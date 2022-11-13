<template>
	<div class="col-md-12 container" style="margin-top:120px">
          <div class="row">
          	<div class="col-md-8 col-12">
	               <center><img src="/images/logo2.png" width="80%"/>
	               	<b><p>Welcome to Cal.S, an application to your attendance in every events of CSHS-SA</p></b>
	               </center>
	           </div>
	           <div class="col-md-4 col-12">
	            	<center> <router-view></router-view> </center>
	           </div>
          </div>
       </div>
</template>

<script>

   export default {
      components:{

        },
      data:() => ({

      })
    }
</script>