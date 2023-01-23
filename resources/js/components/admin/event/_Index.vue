<template>
	<div class="row">
		<div class="col-md-6">
			<h3><center>Create <b>Event</b></center></h3>
			<form @submit="submit">
				<textarea placeholder="What" v-model="what" class="form-control mb-3"/>
				When
				<date-picker v-model="when" type="datetime" valueType="format" style="width:100%"/>
	           <textarea placeholder="Where" v-model="where" class="form-control mb-3 mt-4"/>
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
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';
import moment from 'moment'
	export default {
		components:{
			Event,
			DatePicker 
			},
		 data:() => ({
	        loading: false,
	        what:'',
	        when:'',
	        where:'',
	        event:'',
	        user:'',
	      }),
	     
	      methods:{

	      	submit(e){
	      		this.loading = true
	      		e.preventDefault();
	      		axios.post('/add_event',{
	      			what:this.what,
	      			when:moment(this.when).format('LLLL'),
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