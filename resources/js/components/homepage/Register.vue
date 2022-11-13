<template>
	 <div class="row">
          	<div class="registration col-md-6 col-12">
	               <center>
	               	 <h1 class="not-margin">
			             Student <b>Registration</b>
			          </h1>
	               		<b>
	               			<p>
	               				A student registration system can be used by the teacher and admin institutions gather relevant information about students.
	               			</p>
	               		</b>
	               		<img src="/images/logo3.png" width="60%"/>
	               </center>
	           </div>
	           <div class="col-md-6 col-12">
	            		  <h1 class="not-margin mt-5">
			                    What's <b>Your</b>
			                  </h1>


			                <div class="con-form row">
				                <div class="col-md-6 col-12">
				                	<vs-input type="text" v-model="name" class="mb-3 " block placeholder="Name" >
				                	 <template v-if="error2.name !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>

				                </div>
				                <div  class="col-md-6 col-12">
				                	 <vs-input type="text" v-model="lastname" class="mb-3 " block  placeholder="Last Name" >
				                	  <template v-if="error2.lastname !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                 <div class="col-md-6 col-12">
				                	<vs-input type="number" class="mb-3 " v-model="contact" block placeholder="Contact" >
				                	 <template v-if="error2.contact !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">
				                	 <vs-input type="text" class="mb-3 " v-model="idnumber" block  placeholder="ID Number" >
				                	  <template v-if="error2.idnumber !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">
				                	 <vs-input type="text" class="mb-3 " v-model="grade" block  placeholder="Grade" >
				                	  <template v-if="error2.grade !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">
				                	 <vs-input type="text" class="mb-3 " v-model="section" block  placeholder="Section" >
				                	  <template v-if="error2.section !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                 <div  class="col-md-6 col-12">
				                	 <vs-input type="text" class="mb-3 " v-model="strand" block  placeholder="Strand" >
				                	  <template v-if="error2.strand !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">
				                	 <vs-input type="text" class="mb-3 " v-model="gender" block  placeholder="Gender" >
				                	  <template v-if="error2.gender !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-12 col-12 mt-5 mb-3">
				                	 <vs-button @click="registerNext" block color="rgb(64, 191, 128)">
						            	 <h2><b>NEXT</b></h2>
						            </vs-button>
				                </div>
			                </div>
	           </div>
          </div>
</template>

<script>
import axios from 'axios'
export default{
	 data:() => ({
	 	name:'',
	 	lastname:'',
		contact:'',
		idnumber:'',
		grade:'',
		section:'',
		strand:'',
		gender:'',
		error1:'',
		error2:''
      }),
	methods:{
		registerNext(){
			axios.post('/register1',{
				name:this.name,
				lastname:this.lastname,
				contact:this.contact,
				idnumber:this.idnumber,
				grade:this.grade,
				section:this.section,
				strand:this.strand,
				gender:this.gender,
				})
			.then(res=>{
			 this.$router.push({path:'/register2'})
			})
			.catch(err=>{
				console.log(err.response.data.message)
				console.log(err.response.data.errors.contact)
				this.error2 =err.response.data.errors
			})
		}
	}
}
</script>