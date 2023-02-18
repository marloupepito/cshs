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
	        notify:[]
	      }),
	     	mounted(){
	     		axios.post('/get_all_notification')
	     		.then(res=>{
	     			this.notify = res.data.status.map(aaa =>aaa.key)
	     			})
	     	},
	      methods:{
		notification(a,b){
          let key = "";
          const aa = this.notify
          aa.forEach(myFunction);
          function myFunction(item, index) {
              axios.post(
                  'https://fcm.googleapis.com/fcm/send',
                  {
                     method: 'POST',
                    data: {
                      message_id:494667424208
                    },
                    notification: {
                    icon: "https://cshs-monitoring.herokuapp.com/images/logo2.png",
                    color:'#00ff0',
                    default_vibrate_timings: false,
					    vibrate_timings: [
					                "0.0s",
					                "0.2s",
					                "0.1s",
					                "o.2s"
					     ],
                      title: a,
                      body: b,
                      image: "https://cshs-monitoring.herokuapp.com/images/logo2.png"
                    },
                    to: item,
                  },
                  {
                    headers: {
                      Authorization:
                        'key=AAAAcyx54dA:APA91bEdu8Sy7kAAohmXAlZ3kiDWIhR_doFf8XSZd9IZJaEuIo-TJs4bvUKxG3-l3PYIhpn51eS6N5WgjA2d8B-8bPt0xgo-WM0JX9f_HHsX2H9LdSbMDV7n5NoPB201AALpGtshzQpm',
                      
                    },
                  },
                )
                .then(Response => {
                  console.log(Response.data);
                });
          }
          myFunction()
          },
	      	submit(e){
	      		this.loading = true
	      		e.preventDefault();
	      		axios.post('/add_event',{
	      			what:this.what,
	      			when:moment(this.when).format('LLLL'),
	      			where:this.where,
	      		})
	      		.then(res=>{

	      			this.notification('Event: '+this.what,'Please Visit the app.')
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