<template>
	<center >
		<h3 class="mt-4"><center>Event <b>List</b></center></h3>

		<div  v-for="i in event" class="col-md-12 col-12">
		<vs-sidebar-group>
          <template #header>
            <vs-sidebar-item arrow>
              <template #icon>
                <i class='bx bx-group'></i>
              </template>
              {{i.what}}
            </vs-sidebar-item>
          </template>

          <div id="Instagram">
         
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

			<div class="row container">

<div  v-if="usertype !== 'student'" class="col-md-12 col-12">
	 <vs-button @click="getQR(i.qr)" class="btn-chat" block size="small" color="blue">
	<span class="span">
		  QRCODE
	</span>
  </vs-button>
</div>

<div  v-if="usertype !== 'student'" class="col-md-12 col-12">
	<vs-button v-if="usertype === 'admin'" @click="gotoAttendance($router.push({path:'/administrator/check_attendance?'+i.id}))" class="btn-chat" block size="small" color="warn">
	<span class="span">
		  SHOW ATTENDANCE
	</span>
  </vs-button>
   <vs-button v-if="usertype === 'teacher'" @click="gotoAttendance($router.push({path:'/teacher/check_attendance?'+i.id}))" class="btn-chat" block size="small" color="warn">
	<span class="span">
		  SHOW ATTENDANCE
	</span>
  </vs-button>
</div>
<div  v-if="usertype === 'student'" class="col-md-12 col-12">
<vs-button class="d-none"></vs-button>
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
	 <vs-button @click="deleteEvent(i.id)" class="btn-chat" block size="small" color="danger">
	<span class="span">
		  Delete
	</span>
  </vs-button>
</div>
</div>

			
          </div>
        </vs-sidebar-group>
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
      	deleteEvent(id){
      		this.$swal({
					  title: 'Are you sure?',
					  text: "You won't be able to revert this!",
					  icon: 'warning',
					  showCancelButton: true,
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					  if (result.isConfirmed) {
					    axios.post('/delete_event',{
		      			id:id
		      			})
		      		.then(res=>{
		      			this.$router.push({path:'/administrator/loading3'})
		      			this.$swal({
												  icon: 'success',
												  title: 'Event has been deleted!',
												  showConfirmButton: false,
												  timer: 1500
												})
		      			})
					  }
					})
      		
      		},
      	 getQR(e){
            this.$swal({
              showConfirmButton: false,
              showCloseButton: true,
              imageUrl: "http://api.qrserver.com/v1/create-qr-code/?data=" + e,
              imageAlt: 'QR CODE'
              })
          },
      	EventTimeIn(status,id){
      		if(status === 'co1' || status === 'co2' || status === 'co3'){
	      			this.$swal({
							  icon: 'error',
							  title: 'The event is already cut off!',
							  showConfirmButton: false,
							  timer: 1500
							})
      		}else if(status === 'Finish'){
	      			this.$swal({
							  icon: 'error',
							  title: 'The event is already end!',
							  showConfirmButton: false,
							  timer: 1500
							})
      		}else if(status === null){
      			this.$swal({
							  icon: 'error',
							  title: 'The event not is already starting!',
							  showConfirmButton: false,
							  timer: 1500
							})
      			}else{
      				axios.post('/get_event',{
      					verify:'verify',
      					id:id,
      					status:status
      					})
		      		.then(res =>{
		      		if(res.data.status === 'continue'){
		      				this.$router.push({path:'/student/scanner?'+id})
		      				}else{
		      							this.$swal({
												  icon: 'warning',
												  title: 'Attendance is already checked!',
												  showConfirmButton: false,
												  timer: 1500
												})

		      				}
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
      				this.$swal({
				  icon: 'success',
				  title: 'save!',
				  showConfirmButton: false,
				  timer: 1500
				})
      			this.$router.push({path:'/administrator/loading3'})
      		})
      		.catch(err=>{

      			})
      	}
	 }
}

</script>