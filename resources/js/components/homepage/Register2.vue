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
			                  <input hidden id="uploadpp" @change="uploadPP2" ref="uploadpp" type="file"   accept="image/png, image/gif, image/jpeg"/>
			                  <vs-avatar history success size="100" class="mb-3">
						        <a href="#" @click="uploadPP()"  ref="myBtn"><img :src="pp" alt=""></a>
						       		
						      </vs-avatar>
						      		 <div v-if="error.profile !== undefined" class="text-danger">
								         {{error.profile[0]}}
								      </div>

			                <div class="con-form row p-1">
				                <div class="col-md-12 col-12">
				                	<vs-input type="text" class="mb-3 " v-model="username" block placeholder="Username">
				                	 <template v-if="error.username !== undefined" #message-danger>
								          {{error.username[0]}}
								      </template>
								     </vs-input>
				                </div>

				                <div  class="col-md-12 col-12">
				                	 <vs-input type="password" class="mb-3 "  v-model="password" block  placeholder="Password" >
				                	 <template v-if="error.password !== undefined" #message-danger>
								          {{error.password[0]}}
								      </template>
								     </vs-input>
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
import axios from 'axios'
export default{
	data:() => ({
		pp:'/images/logo.png',
	 	profile:'',
	 	username:'',
	 	password:'',
	 	error:''
      }),
      mounted(){
      		this.mount()
      	},
	methods:{
		submit(){

			var fd = new FormData();
			fd.append("username",this.username);
			fd.append("password",this.password);
			fd.append("profile", this.profile);
			axios.post('/add_student',fd)
			.then(res=>{
				 this.$router.push({path:'/administrator'})
			})
			.catch(err=>{
				this.error =err.response.data.errors
				})
		},

		uploadPP(){
			this.$refs.uploadpp.click()
		},
		uploadPP2(event){
			this.profile = event.target.files[0]
			this.pp = uploadpp.src=URL.createObjectURL(event.target.files[0])
			uploadpp.src=URL.createObjectURL(event.target.files[0]);
		},
		mount(){
			axios.post('/register2')
	      	.then(res=>{
		      		if(res.data.status === true){
	      				}else{
	      					this.$router.push({ path:'/register'})
	      			}
	      		})
	      	.catch(err=>{

      		})
		}
	}
}
</script>