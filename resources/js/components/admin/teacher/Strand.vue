<template>
    <div class="row" style="margin-bottom:70px;">
        <div class="col-md-5 offset-md-7">
            <div class="row">
                <div class="col-md-9">
                    <vs-input v-model="strand" block class="mb-3"  placeholder="Strand"/>
                </div>
                <div class="col-md-3">
                    <vs-button block color="rgb(64, 191, 128)" :disabled="strand===''?true:false" :loading="loading" @click="submit">Add Strand</vs-button>
                </div>
            </div>
           
        </div>


        <div class="col-md-4 col-6 mt-5" v-for="i in data" :key="i.id">
            <a @click="nextPage('STEM')">
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>{{i.strand}}</b></h3>
                    </template>
                    <template #img>
                        <img src="/images/logo2.png" alt="" />
                    </template>
                    <template #text>
                        <p>Calatrava Nation High School</p>
                    </template>
                    <template #interactions> </template>
                </vs-card>
            </a>
        </div>
    
   
        
       
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data:() => ({
		 strand:"",
         loading:false,
         data:[]
      }),
    mounted(){
       this.mount()
    },
    methods: {
        mount(){
            axios.post('/show_strand')
        .then(res=>{
            this.data = res.data.status
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
        nextPage(e) {
            const grade = this.$route.path.split('/')[3]
           
            this.$router.push({ path: "/administrator/teachers/" +String(grade)+'/'+e });
        },
    },
};
</script>
