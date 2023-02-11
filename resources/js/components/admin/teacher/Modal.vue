<template>
	<div>
		 <vs-button  style="z-index:1 !important"  color="rgb(64, 191, 128)" @click="active=!active">
                Create Teacher
              </vs-button>

 <vs-dialog v-model="active" prevent-close>
        <template #header>
          <h4 class="not-margin">
            Create <b>Teacher</b>
          </h4>
        </template>


        <div class="con-form">

       		 <input hidden id="uploadpp" @change="uploadPP2" ref="uploadpp" type="file"   accept="image/png, image/gif, image/jpeg"/>
              <center>
              	<vs-avatar history  size="100" class="mb-3">
		        <a href="#" @click="uploadPP()"  ref="myBtn"><img :src="pp" alt=""></a>
		       		
		      </vs-avatar>
              </center>
			  <p style="color:red">{{ notify }}</p>
      		 <div v-if="error.profile !== undefined" class="text-danger">
		         {{error.profile[0]}}
		      </div>

          <vs-input v-model="fullname" block class="mb-3"  placeholder="Fullname">
            
              <template v-if="error.fullname !== undefined" #message-danger>
		          {{error.fullname[0]}}
		      </template>

          </vs-input>
		 	 

		       <vs-input type="text" v-model="idnumber" block class="mb-3"  placeholder="ID Number">
           
	            <template v-if="error.idnumber !== undefined" #message-danger>
			          {{error.idnumber[0]}}
			      </template>
          </vs-input>

      
		  <div v-if="contact.length !== 11" class="text-danger">
		         Contact # be must 11 digits!
		      </div>
           <vs-input type="number" v-model="contact" block class="mb-3"  placeholder="Contact No.">
            <template v-if="error.contact !== undefined" #message-danger>
		          {{error.contact[0]}}
		      </template>
          </vs-input>



		  <div class="row">
			<div class="col-md-12">
				Advisory
			</div>
			<div class="col-md-12 col-12">
				<select
									       placeholder="Strand"
									        v-model="strand"
									        block
									       class="form-select mb-3"
									      >
										  <option selected disabled>
									         Select Strand
									        </option>
													<option v-for="i in datasss" :label="i" :value="i">
									         {{ i}}
									        </option>
									      </select>
			</div>
			<div class="col-md-6 col-6">
				<vs-select
		        label-placeholder="Grade"
		        v-model="grade"
		        block
		         class="mb-3"
		      >
		        <vs-option label="Grade 11" value="Grade 11">
		          Grade 11
		        </vs-option>
		        <vs-option label="Grade 12" value="12">
		          Grade 12
		        </vs-option>
		        <template v-if="error.grade !== undefined" #message-danger>
		          {{error.grade[0]}}
		      </template>
		      </vs-select>
				</div>
				<div class="col-md-6 col-6">
					<select
		        label-placeholder="Section"
		        v-model="section"
		        block
		        
		       class="form-select mb-3"
		      >
			  <option label="Section A" value="Section A">
									          Section A
									        </option>
									        <option label="Section B" value="Section B">
									          Section B
									        </option>
									         <option label="Section C" value="Section C">
									          Section C
									        </option>
									         <option label="Section D" value="Section D">
									          Section D
									        </option>
									         <option label="Section E" value="Section E">
									          Section E
									        </option>
											<option label="Section F" value="Section F">
									          Section F
									        </option>
											<option label="Section G" value="Section G">
									          Section G
									        </option>
											<option label="Section H" value="Section H">
									          Section H
									        </option>
		       
		      </select>

				</div>
		  </div>
        


          <vs-input  block class="mb-3" v-model="username" placeholder="Username">
            <template #icon>
              <i class='bx bxs-user'></i>
            </template>
            <template v-if="error.username !== undefined" #message-danger>
		          {{error.username[0]}}
		      </template>
          </vs-input>




		 <p style="color:red" v-if="password.length < 8">Password must be 8 characters and above!</p>

					  <vs-input
									type="password"
									v-model="password"
									placeholder="Password"
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

        <template #footer>
          <div class="footer-dialog">
            <vs-button :disabled="contact.length !== 11 || password.length < 8?true:false" block color="rgb(64, 191, 128)" :loading="loading" @click="submit">
              Submit
            </vs-button>
          </div>
        </template>
      </vs-dialog>
	</div>
</template>

  <script>
import axios from 'axios'
    export default {
      data:() => ({
      	datasss:[],
        active: false,
        fullname: '',
         grade: '',
         section: '',
         username: '',
         contact:'',
          idnumber:'',
        password: '',
        pp:'/images/profileupload.png',
	 	profile:'',
	 	error:'',
	 	loading:false,
		 hasVisiblePassword: false,
		 strand:"",
		 g:"",
		 s:'',
		 notify:''
      }),
     mounted(){
		const grade = this.$route.path.split('/')[3]
		const strand = this.$route.path.split('/')[4]
		this.grade= 'Grade '+grade
		this.strand=strand
		this.g = window.location.pathname.split('/')[3]
        this.s= window.location.pathname.split('/')[4].replace(/ /g,'_')


        axios.post('/show_strand',{
            grade:window.location.pathname.split('/')[3]
            })
        .then(res=>{
        	console.log('fff',res.data.status.map(res=>res.strand))
            this.datasss = res.data.status.map(res=>res.strand)
        })
	 },
      methods:{
      	submit(){
      		this.loading=true
      		var fd = new FormData();
			this.notify = ''
      		fd.append("fullname",this.fullname);
      		fd.append("grade",this.grade);
      		fd.append("section",this.section);
					fd.append("username",this.username);
					fd.append("contact",this.contact);
					fd.append("idnumber",this.idnumber);
					fd.append("password",this.password);
					fd.append("profile", this.profile);
					fd.append("strand", this.strand);
			axios.post('/add_teacher',fd)
			.then(res=>{

				if(res.data.status ==='exist2'){
					this.loading=false
					this.notify ='Teacher ID is already exist!'
				}else if(res.data.status ==='exist'){
					this.loading=false
					this.notify ='Grade and Section had already assigned to other teacher!'
				}else{
					this.active=false
					this.$swal({
					icon: 'success',
					title: 'Saved!',
					showConfirmButton: false,
					timer: 1500
					})
					this.notify =''
					this.loading=false
					this.$router.push({path:'/administrator/loading?'+this.g+','+this.s.replace(/ /g,'_')})

				}
			
			})
			.catch(err=>{
				this.notify ='The username is already exist or profile picture is required!'
				this.loading=false
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
      }
    }
  </script>