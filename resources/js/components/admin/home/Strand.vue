<template>
    <div class="row" style="margin-bottom:70px;">
        <!-- <div class="col-md-5 offset-md-7">
            <div class="row">
                <div class="col-md-9">
                    <vs-input v-model="strand" block class="mb-3"  placeholder="Strand"/>
                </div>
                <div class="col-md-3">
                    <vs-button block color="rgb(64, 191, 128)" :disabled="strand===''?true:false" :loading="loading" @click="submit">Add Strand</vs-button>
                </div>
            </div>
           
        </div> -->

        <div class="col-md-12 p-3">
            <h4><a href="#" @click="goBack">BACK</a></h4>
          </div>


        <div class="col-md-4 col-6 mt-5" v-for="i in data" :key="i.id">
           
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>{{i.strand}}</b></h3>
                    </template>
                   
                    <template #img>
                        <a @click="nextPage(i.strand)">
                        <img src="/images/logo2.png" alt="" />
                       </a>
                    </template>
                
                    <template #text>
                        <p>Calatrava Nation High School</p>
                    </template>
                    <!-- <template #interactions>
                        <vs-button danger icon @click="deleteStrand(i.id)">
                            <i class='bx bx-trash'></i>
                        </vs-button>
                        </template> -->
                </vs-card>
           
        </div>
    
   
        
       
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data:() => ({
		 strand:"",
         loading:false,
         data:[],
         eventid:''
      }),
    mounted(){
       this.mount()
    },
    methods: {
        goBack(){
            this.$router.push({path:'/administrator/check_attendance?'+window.location.search.substring(1)})
        },
        mount(){
            axios.post('/show_strand')
        .then(res=>{
            this.data = res.data.status
            this.eventid=window.location.search.substring(1)
        })
        },
        submit(){
            this.loading=true
            axios.post('/add_strand',{
                strand:this.strand
            })
            .then(res=>{
                this.$swal({
				  icon: 'success',
				  title: 'Saved!',
				  showConfirmButton: false,
				  timer: 1500
				})
                this.mount()
                this.loading=false
            })
            .catch(err=>{})
        },
        deleteStrand(id){

            this.$swal({
				title: 'Enter your password',
				input: 'password',
				inputAttributes: {
					autocapitalize: 'off'
				},
				showCancelButton: true,
				confirmButtonText: 'Submit',
				showLoaderOnConfirm: true,
				preConfirm: (login) => {
					axios.post('/get_admin',{
                        password:login,
                        username:localStorage.getItem("username")
                    })
                    .then(res=>{
                        if(res.data.status === 'success'){
                            axios.post('/delete_strand',{
                                    id:id
                                })
                                .then(res=>{
                                    this.mount()
                                    this.$swal({
                                    icon: 'success',
                                    title: 'Your work has been deleted',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })
                                    
                                })
                        }else{
                            this.$swal({
                                    icon: 'error',
                                    title: 'Incorrect Password!',
                                    showConfirmButton: false,
                                    timer: 1500
                                    })

                        }
                    })
                    .then(res=>{

                    })
				},
				allowOutsideClick: () => !Swal.isLoading()
				})
           
           
        },
        nextPage(e) {
            const grade = this.$route.path.split('/')[3]
           
            this.$router.push({ path: "/administrator/check_attendance/" +String(grade)+'/'+e+'?'+this.eventid });
        },
    },
};
</script>
