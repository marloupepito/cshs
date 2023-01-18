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
			                <form  @submit="loginUser">

			                <div class="con-form row">
			                	<div class="col-md-12">
			                		 <div v-if="error !=='' " class="text-danger">{{error}}</div>
			                	</div>
				                <div class="col-md-12">
				                	<vs-input v-model="input1" class="mb-3 mt-5 " block placeholder="Username" />
				                </div>
				                <div  class="col-md-12">
									<vs-input
									type="password"
									v-model="input2"
									placeholder="Password"
									:visiblePassword="hasVisiblePassword"
									icon-after
									@click-icon="hasVisiblePassword = !hasVisiblePassword">
									<template #icon>
									<i v-if="!hasVisiblePassword" class='bx bx-show-alt'></i>
									<i v-else class='bx bx-hide'></i>
									</template>


								</vs-input>
				                </div>
			                </div>
			     			
				                <div class="flex">
				                    <vs-checkbox v-model="checkbox1">Remember me</vs-checkbox>
				                  </div>
			                <div class="mt-3"
			                >
			                  <div class="footer-dialog">
			                    <vs-button block color="rgb(64, 191, 128)" @click="loginUser">
			                      Sign In
			                    </vs-button>

			                    <div class="new">
			                      New Here? <a @click="gotoRegister" href="#">Create New Account</a><br /> <br />      
				                    <a href="#">Forgot Password?</a>
			                    </div>
			                  </div>
			                </div>
			                </form>
	           </div>
          </div>


                 
	</div>
</template>

<script>
import axios from 'axios'
    export default {

      data:() => ({
        active: true,
        input1: '',
        input2: '',
        checkbox1: false,
        error:'',
		hasVisiblePassword: false
      }),
	
      methods:{
      	gotoRegister(){
				this.$router.push({path:'/register'})

			},
			loginUser(e){
				e.preventDefault()
				this.error=''
				axios.post('/login_user',{
					username:this.input1,
					password:this.input2
					})
				.then(res=>{
						if(res.data.status2 === 'success'){
								if(res.data.status.usertype === 'admin'){
									this.$router.push({path:'/administrator'})
								}else if(res.data.status.usertype === 'teacher'){
									this.$router.push({path:'/teacher'})
								}else{
									if(res.data.status.access === null){
										this.error = 'Your account not already approved!'
									}else{
										this.$router.push({path:'/student'})
									}
									
								}
							}else{
								this.error =res.data.status
						}
					})
				.catch(err=>{
					this.error = 'Invalid Username or Password!'
					})
			}
      }
    }
  </script>