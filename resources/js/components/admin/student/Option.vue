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
		border
		icon
		size="small"
		  @click="clickOption('delete')"
		      >
		        <i class='bx bx-trash-alt'></i>
		      </vs-button>
		</div>
	</div>

   <vs-dialog v-model="active" v-on:close="clickMe"  prevent-close>
        <template #header>
          <h4 class="not-margin">
            Edit <b>Student</b>
          </h4>
        </template>


        <div class="con-form">

       		
        Fullname
          <vs-input v-model="data2.name" block  placeholder="Fullname">
            <template #icon>
              @
            </template>
              <template v-if="error.fullname !== undefined" #message-danger>
		          {{error.fullname[0]}}
		      </template>


          </vs-input>
          Grade
         	  <vs-select
		        v-model="data2.grade"
		        block
		        block
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
		      ID Number
		       <vs-input type="number" v-model="data2.idnumber" block  placeholder="ID Number">
            <template #icon>
              @
            </template>
	            <template v-if="error.idnumber !== undefined" #message-danger>
			          {{error.idnumber[0]}}
			      </template>
          </vs-input>
          Section
          <vs-input v-model="data2.section" block  placeholder="Section">
            <template #icon>
              @
            </template>
            <template v-if="error.section !== undefined" #message-danger>
		          {{error.section[0]}}
		      </template>
          </vs-input>
          Contact
           <vs-input type="number" v-model="data2.contact" block  placeholder="Contact">
            <template #icon>
              @
            </template>
            <template v-if="error.contact !== undefined" #message-danger>
		          {{error.contact[0]}}
		      </template>
          </vs-input>
          Username
          <vs-input  block v-model="data2.username" placeholder="Username">
            <template #icon>
              <i class='bx bxs-user'></i>
            </template>
            <template v-if="error.username !== undefined" #message-danger>
		          {{error.username[0]}}
		      </template>
          </vs-input>
          Password
          <vs-input type="password" block v-model="data2.password" placeholder="Password">
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
export default {
	props:['data'],
  data:()=>({
    value:'',
    active: false,
    error:[],
    loading:false,
    data2:[],
    grade:''
  }),
  mounted(){
  	
  			this.grade = window.location.pathname.split('/')[3]
  	},
  methods:{
  	clickMe(){
  		this.$router.push({path:'/administrator/loading2?'+this.grade})
  		},
  	clickOption(e){
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
					    this.$swal({
							  icon: 'success',
							  title: 'Your work has been saved',
							  showConfirmButton: false,
							  timer: 1500
							})
					  }
					})
  			}
  	},
  	submit(){
  		console.log(this.data2.name)
  	}
  }
}
</script>