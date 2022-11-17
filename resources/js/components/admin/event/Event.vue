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


			    	<div  v-if="usertype === 'student'" class="col-md-12 col-12">
			    	  		<vs-button class="btn-chat" @click="EventTimeIn(i.status,i.id)" size="small" block 
			    	  		:color="i.status === null?'primary':
			    	  		i.status === 'MS'?'success':
			    	  		i.status === 'co1'?'warn':
			    	  		i.status === 'ME'?'success':
			    	  		i.status === 'co2'?'warn':
			    	  		i.status === 'AS'?'success':
			    	  		i.status === 'co3'?'warn':
			    	  		i.status === 'AE'?'success':'danger'">
						        <span class="span">
						          	{{
						          		i.status === null?'The Event is not already starting!':
						    	  		i.status === 'MS'?'Morning In':
						    	  		i.status === 'co1'?'Cut Off':
						    	  		i.status === 'ME'?'Morning Out':
						    	  		i.status === 'co2'?'Cut Off':
						    	  		i.status === 'AS'?'Afternoon In':
						    	  		i.status === 'co3'?'Cut Off':
						    	  		i.status === 'AE'?'Afternoon Out':'Event Ended!'
						          	}}
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat"  :disabled="i.status === null?false:true" @click="setTime('MS',i.id)" size="small" block color="success">
						        <span class="span">
						          	Morning Start
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat"  :disabled="i.status === 'MS'?false:true" @click="setTime('co1',i.id)" size="small" block color="warn">
						        <span class="span">
						          	Cut Off
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat"  :disabled="i.status === 'co1'?false:true" @click="setTime('ME',i.id)" size="small" block color="primary">
						        <span class="span">
						          	Morning End
						        </span>
						      </vs-button>
			    	</div>

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat"  :disabled="i.status === 'ME'?false:true" @click="setTime('co2',i.id)" size="small" block color="warn">
						        <span class="span">
						          	Cut Off
						        </span>
						      </vs-button>
			    	</div>

				<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat"  :disabled="i.status === 'co2'?false:true" @click="setTime('AS',i.id)"  size="small" block color="success">
						        <span class="span">
						          	Afternoon Start
						        </span>
						      </vs-button>
			    	</div>
			    

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat"  :disabled="i.status === 'AS'?false:true" @click="setTime('co3',i.id)" size="small" block color="warn">
						        <span class="span">
						          	Cut Off
						        </span>
						      </vs-button>
			    	</div>

			    

			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    	  		<vs-button class="btn-chat"  :disabled="i.status === 'co3'?false:true" @click="setTime('AE',i.id)" size="small" block color="warning">
						        <span class="span">
						          	Afternoon End
						        </span>
						      </vs-button>
			    	</div>


			    	<div  v-if="usertype === 'admin'" class="col-md-6 col-6">
			    			 <vs-button class="btn-chat"  :disabled="i.status === 'AE'?false:true" @click="setTime('Finish',i.id)" size="small" block color="warn">
						        <span class="span">
						          	Cut Off
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
      	EventTimeIn(status,id){
      		if(status === 'co1' || status === 'co2' || status === 'co3'){
      			alert('The event is already cut off!');
      		}else if(status === 'Finish'){
      			alert('The event is already end!');
      		}else{
  				axios.post('/add_attendance',{
  				event_id:id,
  				status:status
  				})
      			.then(res=>{
      				this.mount();
      				alert('check')
      			})
      		}
      	},
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
      	setTime(e,id){
      		axios.post('/event_set_time',{
      			status:e,
      			id:id
      			})
      		.then(res=>{
      			this.$router.push({path:'/administrator/loading3'})
      		})
      		.catch(err=>{

      			})
      	}
	 }
}

</script>