<template>
	<div class="col-md-12 container  pb-5">
          <h1 class="not-margin mt-5 mb-5">
            Get <b>Started</b>
          </h1>
		
          <div class="footer-dialog mb-5">
            <vs-button @click="gotoLogin"class="p-3" block color="rgb(64, 191, 128)">
             <h2><b> Login</b></h2>
            </vs-button>
          </div>


          <div class="footer-dialog">
            <vs-button class="p-3" block color="rgb(64, 191, 128)">
            	 <h2><b>Register</b></h2>
            </vs-button>
          </div>


        </div>
	</div>
</template>

<script>
	export default{
		methods:{
			gotoLogin(){
				this.$router.push({path:'/login'})
			}
		}
	}
</script>