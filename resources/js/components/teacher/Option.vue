<<template>
	<div>
	<div class="row">
		<div class="col-md-6 col-6 p-0">
			 <vs-button
			 icon
			 border
			 size="small"
		      @click="clickOption('edit')"
		      >
		        <i class='bx bx-pencil'></i>
		      </vs-button>
		</div>
		<div class="col-md-6 col-6  p-0">
		<vs-button
		color="danger"
		icon
		size="small"
		  @click="clickOption('delete')"
		      >
		        <i class='bx bx-trash-alt'></i>
		      </vs-button>
		</div>
	</div>

      <vs-dialog v-on:close="clickMe" v-model="active" prevent-close>
        <template #header>
          <h4 class="not-margin">
            Edit <b>Student</b>
          </h4>
        </template>


        <div class="con-form">
        Fullname
          <vs-input  v-model="data2.name" block   placeholder="Fullname">
          
              <template v-if="error.fullname !== undefined" #message-danger>
		          {{error.fullname[0]}}
		      </template>


          </vs-input>
         
		      ID Number
		       <vs-input  type="text" v-model="data2.idnumber" block   placeholder="ID Number">
          
	            <template v-if="error.idnumber !== undefined" #message-danger>
			          {{error.idnumber[0]}}
			      </template>
          </vs-input>
        
          Contact #
           <vs-input type="number" v-model="data2.contact" block   placeholder="Contact">
          
            <template v-if="error.contact !== undefined" #message-danger>
		          {{error.contact[0]}}
		      </template>
          </vs-input>


		  <div class="row">
			<div class="col-md-12">
				Advisory
			</div>
			<div class="col-md-12 col-12">
				<vs-select
									        label-placeholder="Strand"
									        v-model="data2.strand"
									        block
									      class="mb-3"
									      >
											<vs-option label="TVL-Cookery" value="TVL-Cookery">
									          TVL-Cookery
									        </vs-option>
											<vs-option label="TVL-SMAW" value="TVL-SMAW">
									          TVL-SMAW
									        </vs-option>
									        <vs-option label="ABM" value="ABM">
									          ABM
									        </vs-option>
									         <vs-option label="HUMSS" value="HUMSS">
									          HUMSS
									        </vs-option>
									         <vs-option label="STEM" value="STEM">
									          STEM
									        </vs-option>
									         <vs-option label="GAS" value="GAS">
									          GAS
									        </vs-option>
									        <template v-if="error.strand !== undefined" #message-danger>
									          {{error.strand[0]}}
									      </template>
									      </vs-select>
			</div>
			<div class="col-md-6 col-6">
				<vs-select
		        label-placeholder="Grade"
		        v-model="data2.grade"
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
					<vs-select
		        label-placeholder="Section"
		        v-model="data2.section"
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
		        <template v-if="error.section !== undefined" #message-danger>
		          {{error.section[0]}}
		      </template>
		      </vs-select>

				</div>
		  </div>

          Username
          <vs-input  block  v-model="data2.username" placeholder="Username">
            <template #icon>
              <i class='bx bxs-user'></i>
            </template>
            <template v-if="error.username !== undefined" #message-danger>
		          {{error.username[0]}}
		      </template>
          </vs-input>
          Password
         
						  <vs-input
									type="password"
									v-model="data2.password"
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
            <vs-button block color="rgb(64, 191, 128)" :loading="loading" @click="submit">
              Submit
            </vs-button>
          </div>
        </template>
      </vs-dialog>
</div>
</template>

<script>
export default {
	props:['data'],
  data:()=>({
    value:'',
    active: false,
    error:[],
    loading:false,
    data2:[],
	hasVisiblePassword: false,
  }),
  mounted(){
  	
  		
  	},
  methods:{
  	clickMe(){
		const grade= window.location.pathname.split('/')[3];
  		this.$router.push({path:'/teacher/loading?'+grade})
  		},
  	clickOption(e){
  		console.log(this.data)
  		if(e === 'edit'){
  				this.data2 = this.data
  			this.active =true
  			this.value =''
  			}else{
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
					  	axios.post('/delete_user',this.data)
					  	.then(res=>{
					  		this.$router.push({path:'/administrator/loading'})
					  		 this.$swal({
									  icon: 'success',
									  title: 'Your work has been deleted',
									  showConfirmButton: false,
									  timer: 1500
									})
					  	})
					   
					  }
					})
  			}
  	},
  	submit(){
  		axios.post('/update_teacher',this.data2)
  		.then(res=>{
  			this.$router.push({path:'/administrator/loading'})
  			 this.$swal({
							  icon: 'success',
							  title: 'Your work has been saved',
							  showConfirmButton: false,
							  timer: 1500
							})
  			})
  	}
  }
}
</script>