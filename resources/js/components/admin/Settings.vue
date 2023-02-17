<template>
	<div class="col-md-6 offset-md-3" style="margin-bottom:50px">
		<h3>Change Username or Password</h3>
		<div class="con-form">
          Username
          <vs-input  block v-model="username" placeholder="Username">
            <template #icon>
              <i class='bx bxs-user'></i>
            </template>
            <template v-if="error.username !== undefined" #message-danger>
		          {{error.username[0]}}
		      </template>
          </vs-input>
          Password
         
						  <vs-input
						type="password"
						v-model="password"
						:visiblePassword="hasVisiblePassword"
						icon-after
						@click-icon="hasVisiblePassword = !hasVisiblePassword">
						<template #icon>
						<i v-if="!hasVisiblePassword" class='bx bx-show-alt'></i>
						<i v-else class='bx bx-hide'></i>
						</template>
						<template v-if="error.password !== undefined" #message-danger>
					          {{error.password[0]}}
					      </template>
						  </vs-input>

         
        </div>

         <vs-button block class="mt-4" color="rgb(64, 191, 128)" :loading="loading" @click="submit">
             SAVE
            </vs-button>
	</div>
</template>



<script>

export default {
	props:['data'],
  data:()=>({
    value:'',
    active: false,
    loading:false,
	hasVisiblePassword: false,
	username:null,
	password:null,
	error:''
  }),
  mounted(){
  	
  	},
  methods:{

  
  	submit(){
  		axios.post('/edit_admin',{
  			username:this.username,
  			password:this.password,
  			})
  		.then(res=>{
  		
  			 this.$swal({
				  icon: 'success',
				  title: 'Your work has been saved',
				  showConfirmButton: false,
				  timer: 1500
				})


  			})

  	}
  }
}
</script>