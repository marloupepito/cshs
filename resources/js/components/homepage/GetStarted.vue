<template>
	<div class="col-md-12 container  pb-5">

		 <div class="row">
          	<div class="getStarted col-md-8 col-12">
	               <center>
	               		<img src="/images/logo2.png" width="70%"/>
	               		<b><p>Welcome to Cal.S, an application to your attendance in every events of CSHS-SA</p></b>
	               </center>
	           </div>
	           <div class="col-md-4 col-12">
	            		   <h1 class="not-margin mt-5 mb-5">
				            Get <b>Started</b>
				          </h1>
						
				          <div class="footer-dialog mb-5">
				            <vs-button @click="gotoLogin" class="p-3" block color="rgb(64, 191, 128)">
				             <h2 class="mt-2"><b> Login</b></h2>
				            </vs-button>
				          </div>


				          <div class="footer-dialog">
				            <vs-button @click="gotoRegister" class="p-3" block color="rgb(64, 191, 128)">
				            	 <h2 class="mt-2"><b>Register</b></h2>
				            </vs-button>
				          </div>
	           </div>
          </div>


	</div>
</template>

<script>
	export default{
		methods:{
			gotoLogin(){
				this.$router.push({path:'/login'})
			},
			gotoRegister(){
				this.$router.push({path:'/register'})
			}
		}
	}
</script>