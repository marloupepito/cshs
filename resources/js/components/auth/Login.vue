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
	            		 <h4 class="not-margin mt-5">
			                    Welcome to <b>Attendance Monitoring</b>
			                  </h4>


			                <div class="con-form row">
				                <div class="col-md-12">
				                	<vs-input v-model="input1" class="mb-3 mt-5 " block placeholder="Username" />
				                </div>
				                <div  class="col-md-12">
				                	 <vs-input type="password" class="mb-3 " block v-model="input2" placeholder="Password" />
				                </div>
			                </div>
			     			
				                <div class="flex">
				                    <vs-checkbox v-model="checkbox1">Remember me</vs-checkbox>
				                  </div>
			                <div class="mt-3"
			                >
			                  <div class="footer-dialog">
			                    <vs-button block color="rgb(64, 191, 128)">
			                      Sign In
			                    </vs-button>

			                    <div class="new">
			                      New Here? <a @click="gotoRegister" href="#">Create New Account</a><br /> <br />      
				                    <a href="#">Forgot Password?</a>
			                    </div>
			                  </div>
			                </div>
	           </div>
          </div>


                 
	</div>
</template>

<script>
    export default {
      data:() => ({
        active: true,
        input1: '',
        input2: '',
        checkbox1: false
      }),
      methods:{
      	gotoRegister(){
				this.$router.push({path:'/register'})
			}
      }
    }
  </script>