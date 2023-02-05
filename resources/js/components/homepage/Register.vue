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


			                <div class="con-form row p-1">
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
				                 <div class='text-danger' v-if="contact.length !== 11">Mobile must be 11 digits</div>
				                	<vs-input type="number" class="mb-3 " v-model="contact" block placeholder="Contact" >
				                	 <template v-if="error2.contact !== undefined" #message-danger>
										{{error2.contact[0]}}
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">

				                 <div class='text-danger' v-if="exist !== ''">{{exist}}</div>
				                	 <vs-input  class="mb-3 " v-model="idnumber" block  placeholder="ID Number" >
				                	  <template v-if="error2.idnumber !== undefined" #message-danger>
								          Required
								      </template>
				                	</vs-input>
				                </div>
				                <div  class="col-md-6 col-12">
				                	   <vs-select
									        label-placeholder="Grade"
									        v-model="grade"
									        block
									         class="mb-3"
									         @input="selectGrade"
									      >
									        <vs-option label="Grade 11" value="Grade 11">
									          Grade 11
									        </vs-option>
									        <vs-option label="Grade 12" value="Grade 12">
									          Grade 12
									        </vs-option>
									        <template v-if="error2.grade !== undefined" #message-danger>
									          {{error2.grade[0]}}
									      </template>
									      </vs-select>
				                </div>
				                 <div  class="col-md-6 col-12">
				                	   <select
									   class="form-select mb-3"
									        placeholder="Strand"
									        v-model="strand"
									        block
									      >
										  <option selected disabled>
									         Select Strand
									        </option>
											<option v-for="i in data" :label="i" :value="i">
									         {{ i}}
									        </option>

											
									      </select>
				                </div>
				                 <div  class="col-md-6 col-12">
				                
									<vs-select
									        label-placeholder="Section"
											v-model="section"
									        block
									      class="mb-3"
									      >
									        <vs-option label="Section A" value="Section A">
									          Section A
									        </vs-option>
									        <vs-option label="Section B" value="Section B">
									          Section B
									        </vs-option>
									         <vs-option label="Section C" value="Section C">
									          Section C
									        </vs-option>
									         <vs-option label="Section D" value="Section D">
									          Section D
									        </vs-option>
									         <vs-option label="Section E" value="Section E">
									          Section E
									        </vs-option>
											<vs-option label="Section F" value="Section F">
									          Section F
									        </vs-option>
											<vs-option label="Section G" value="Section G">
									          Section G
									        </vs-option>
											<vs-option label="Section H" value="Section H">
									          Section H
									        </vs-option>
									        <template v-if="error2.section !== undefined" #message-danger>
									          {{error2.section[0]}}
									      </template>
									      </vs-select>


				                </div>
				             
				                <div  class="col-md-6 col-12 row">

				                <vs-radio class="col-md-6 col-6" v-model="gender" val="Male">
							         Male
							        </vs-radio>
							        <vs-radio class="col-md-6 col-6" v-model="gender" val="Female">
							          Female
							        </vs-radio>
				                </div>

				                   <div  class="col-md-12 col-12">
									      <textarea placeholder="Address" class="form-control" v-model="address">
									      </textarea>
				                </div>
				                <div  class="col-md-12 col-12 mt-5">
				                	 <vs-button :loading="loading" @click="registerNext" block color="rgb(64, 191, 128)">
						            	 <b>NEXT</b>
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
		loading:false,
	 	name:'',
	 	lastname:'',
		contact:'',
		idnumber:'',
		grade:'',
		section:'',
		strand:'',
		gender:'',
		error1:'',
		error2:'',
		data:[],
		address:'',
		exist:''
      }),
	  mounted(){
	  },
	methods:{
		selectGrade(e){
			  axios.post('/show_strand',{
                grade:e.substring(5)
            })
            .then(res=>{
            	this.data  = res.data.status.map(res=>res.strand)
            })
            },
		registerNext(){
			this.loading =true
			if(this.contact.length === 11){
				axios.post('/register1',{
				name:this.name,
				lastname:this.lastname,
				contact:this.contact,
				idnumber:this.idnumber,
				grade:this.grade,
				section:this.section,
				strand:this.strand,
				gender:this.gender,
				address:this.address,
				})
			.then(res=>{
				if(res.data.status !== 'exist'){
					this.loading =false
					 this.$router.push({path:'/register2'})
				}else{
					this.exist='The ID number is already exist!'
					this.loading =false
				}
				
			})
			.catch(err=>{
				this.loading =false
				this.error2 =err.response.data.errors
			})
			}else{
				this.loading =false
			}
			
		}
	}
}
</script>