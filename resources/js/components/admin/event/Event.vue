<template>
	<center>
		<h3 class="mt-4"><center>Event <b>List</b></center></h3>
			<div v-for="i in event" class="mb-3">
			  <vs-card>
		    <template #title>
		    	<div class="row">
			    	<div class="col-md-3 col-4">
			    	 <b>What ?</b>
			    	</div>
			    	<div class="col-md-9 col-8">
			    	  <p class="col-md-12">{{i.what}}</p>
			    	</div>

			    	<div class="col-md-3 col-4">
			    	 <b>When ?</b>
			    	</div>
			    	<div class="col-md-9 col-8">
			    	  <p class="col-md-12">{{i.when}}</p>
			    	</div>

			    	<div class="col-md-3 col-4">
			    	 <b>Where ?</b>
			    	</div>
			    	<div class="col-md-9 col-8">
			    	  <p class="col-md-12">{{i.where}}</p>
			    	</div>
		    	</div>
		    </template>

		    <template #img>
		      <img src="/foto5.png" alt="">
		    </template>
		    <template #text>

		    <div class="row">

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat" size="small" block color="success">
						        <span class="span">
						          	Morning Start
						        </span>
						      </vs-button>
			    	</div>
			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat" size="small" block color="warning">
						        <span class="span">
						          	Morning End
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat" size="small" block color="success">
						        <span class="span">
						          	Afternoon Start
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat" size="small" block color="warning">
						        <span class="span">
						          	Afternoon End
						        </span>
						      </vs-button>
			    	</div>
			    	<div  v-if="usertype === 'admin'" class="col-md-12 col-12">
			    	 	  	  <vs-button class="btn-chat" block size="small" color="danger">
						        <span class="span">
						          	Delete
						        </span>
						      </vs-button>
			    	</div>

		    	</div>
		  
		    </template>
		  </vs-card>
			</div>
	<br /><br /><br /></center>
</template>

<script>

export default {
	data:() => ({
	        event:'',
	        user:'',
	        usertype:''
	      }),
	 mounted(){
      	this.mount()
      	},
      methods:{
      	 mount(){
      		axios.post('/get_event')
      		.then(res =>{
      			this.event =res.data.status
      		})
      		axios.get('/user')
      		.then(res=>{
      			this.usertype = res.data.usertype
      			this.user = res.data
      		})
      	},
	 }
}

</script>