<template>
	<div>
		 <vs-button color="rgb(64, 191, 128)" @click="active=!active">
                Create Student
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
              	<vs-avatar history success size="100" class="mb-3">
		        <a href="#" @click="uploadPP()"  ref="myBtn"><img :src="pp" alt=""></a>
		       		
		      </vs-avatar>
              </center>

      		 <div v-if="error.profile !== undefined" class="text-danger">
		         {{error.profile[0]}}
		      </div>

          <vs-input v-model="fullname" block class="mb-3"  placeholder="Fullname">
            <template #icon>
              @
            </template>
              <template v-if="error.fullname !== undefined" #message-danger>
		          {{error.fullname[0]}}
		      </template>


          </vs-input>

         	  <vs-select
		        label-placeholder="Grade"
		        v-model="grade"
		        block
		        block class="mb-3"
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

		       <vs-input type="number" v-model="idnumber" block class="mb-3"  placeholder="ID Number">
            <template #icon>
              @
            </template>
	            <template v-if="error.idnumber !== undefined" #message-danger>
			          {{error.idnumber[0]}}
			      </template>
          </vs-input>

          <vs-input v-model="section" block class="mb-3"  placeholder="Section">
            <template #icon>
              @
            </template>
            <template v-if="error.section !== undefined" #message-danger>
		          {{error.section[0]}}
		      </template>
          </vs-input>

           <vs-input type="number" v-model="contact" block class="mb-3"  placeholder="Contact">
            <template #icon>
              @
            </template>
            <template v-if="error.contact !== undefined" #message-danger>
		          {{error.contact[0]}}
		      </template>
          </vs-input>

          <vs-input  block class="mb-3" v-model="username" placeholder="Username">
            <template #icon>
              <i class='bx bxs-user'></i>
            </template>
            <template v-if="error.username !== undefined" #message-danger>
		          {{error.username[0]}}
		      </template>
          </vs-input>

          <vs-input type="password" block class="mb-3" v-model="password" placeholder="Password">
            <template #icon>
              <i class='bx bxs-lock'></i>
            </template>
            <template v-if="error.password !== undefined" #message-danger>
		          {{error.password[0]}}
		      </template>
          </vs-input>

         
        </div>

        <template #footer>
          <div class="footer-dialog">
            <vs-button block color="rgb(64, 191, 128)" :loading="loading" @click="submit">
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
        active: false,
        fullname: '',
         grade: '',
         section: '',
         username: '',
         contact:'',
          idnumber:'',
        password: '',
        pp:'/images/logo.png',
	 	profile:'',
	 	error:'',
	 	loading:false
      }),
      methods:{
      	submit(){
      		this.loading=true
      		var fd = new FormData();
      		fd.append("fullname",this.fullname);
      		fd.append("grade",this.grade);
      		fd.append("section",this.section);
					fd.append("username",this.username);
					fd.append("contact",this.contact);
					fd.append("idnumber",this.idnumber);
					fd.append("password",this.password);
					fd.append("profile", this.profile);
			axios.post('/add_teacher',fd)
			.then(res=>{
				this.active=false

					this.loading=false
				 this.$router.push({path:'/administrator/loading'})

			})
			.catch(err=>{
				this.error =err.response.data.errors
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