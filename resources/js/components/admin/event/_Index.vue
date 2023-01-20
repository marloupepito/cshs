<template>
	<div class="row">
		<div class="col-md-6">
			<h3><center>Create <b>Event</b></center></h3>
			<form @submit="submit">
				<textarea placeholder="What" v-model="what" class="form-control mb-3"/>
	           <textarea placeholder="When" v-model="when" class="form-control mb-3" />
	           <textarea placeholder="Where" v-model="where" class="form-control mb-3"/>
	           <vs-button  style="z-index:98 !important" block color="rgb(64, 191, 128)" :loading="loading" @click="submit">
	              Submit
	            </vs-button>
			</form>
		</div>
		<div class="col-md-6">
				<Event />
		</div>
	</div>
</template>

<script>
import axios from 'axios'
import Event from './Event.vue'
	export default {
		components:{
			Event
			},
		 data:() => ({
	        loading: false,
	        what:'',
	        when:'',
	        where:'',
	        event:'',
	        user:''
	      }),
	     
	      methods:{

	      	submit(e){
	      		this.loading = true
	      		e.preventDefault();
	      		axios.post('/add_event',{
	      			what:this.what,
	      			when:this.when,
	      			where:this.where,
	      		})
	      		.then(res=>{
	      			 this.what=''
	       			this.when=''
	        		this.where=''
	      			this.loading=false
	      			this.$router.push({path:'/administrator/loading3'})
	      					this.$swal({
							  icon: 'success',
							  title: 'Event Added',
							  showConfirmButton: false,
							  timer: 1500
							})
	      		})
	      		.catch(err=>{
	      			this.loading=false
	      		})

	      	}
	      }
	}
</script>