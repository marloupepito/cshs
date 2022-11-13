<template>
	<div class="col-md-12 container  pb-5">
                  <h4 class="not-margin mt-5">
                    Welcome to <b>Attendance Monitoring</b>
                  </h4>


                <div class="con-form row">
                
                <div class="col-md-12">
                	<vs-input v-model="input1" class="mb-3 mt-5 " block placeholder="Username" />
                    
                </div>

                <div  class="col-md-12">
                	 <vs-input type="password" class="mb-3 " block v-model="input2" placeholder="Password" />
                  
                  </vs-input>
                </div>

  			
                </div>
     			<div class="flex">
                    <vs-checkbox v-model="checkbox1">Remember me</vs-checkbox>
                    <a href="#">Forgot Password?</a>
                  </div>
                <div>
                  <div class="footer-dialog">
                    <vs-button block color="rgb(64, 191, 128)">
                      Sign In
                    </vs-button>

                    <div class="new">
                      New Here? <a href="#">Create New Account</a>
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
      })
    }
  </script>