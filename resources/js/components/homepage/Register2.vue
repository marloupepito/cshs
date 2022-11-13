<template>
	 <div class="row">
          	<div class="registration col-md-6 col-12">
	               <center>
	               	 <h1 class="not-margin">
			             Student <b>Registration</b>
			          </h1>
	               		<b>
	               			<p>
	               				A student registration system can be used by the teacher and admin institutions gather relevant information about students.
	               			</p>
	               		</b>
	               		<img src="/images/logo3.png" width="60%"/>
	               </center>
	           </div>
	           <div class="col-md-6 col-12">
	            		  <h1 class="not-margin mt-5">
			                    Create <b>Account</b>
			                  </h1>


			                <div class="con-form row">
				                <div class="col-md-12 col-12">
				                	<vs-input type="text" class="mb-3 " block placeholder="Username" />
				                </div>
				                <div  class="col-md-12 col-12">
				                	 <vs-input type="password" class="mb-3 " block  placeholder="Password" />
				                </div>
				               
				                <div  class="col-md-12 col-12">
				                	 <vs-button @click="submit" block color="rgb(64, 191, 128)">
						            	 <h2><b>CONFIRM</b></h2>
						            </vs-button>
				                </div>
			                </div>
	           </div>
          </div>
</template>

<script>
export default{
	methods:{
		submit(){
			this.$router.push({path:'/register2'})
		}
	}
}
</script>