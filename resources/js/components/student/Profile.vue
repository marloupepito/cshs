<template>
	<div >
		<div class="container mb-4 d-flex p-0 justify-content-center" style="width:100%;height:90vh !important"> 
			<div class="card p-4"> <div class="d-flex flex-column justify-content-center align-items-center"> 
         
				
                 <vs-card style="width:100%">
                    
                    <template #img>
                    <img :src="'/profile/'+data.profile"  alt="">
                    </template>
                    
                    <template #interactions>
                        <input hidden id="uploadpp" @change="uploadPP2" ref="uploadpp" type="file"   accept="image/png, image/gif, image/jpeg"/>
                    <vs-button :loading="loading" danger icon  @click="editProfile(data.id)">
                        <i class='bx bx-camera'></i>
                    </vs-button>
                    
                    </template>
                </vs-card>

				 <table class="table table-striped mt-3">
                    <tbody>
                        <tr>
                        <th>Name</th>
                        <td>{{data.name}}</td>
                        </tr>
                        <tr>
                        <th>ID Number</th>
                        <td>{{data.idnumber}}</td>
                        </tr>
                        <tr>
                        <th>Grade</th>
                        <td>{{data.grade}}</td>
                        </tr>
                        <tr>
                        <th>Section</th>
                        <td>{{data.section}}</td>
                        </tr>
                        <tr>
                        <th>Strand</th>
                        <td>{{data.strand}}</td>
                        </tr>
                        <tr>
                        <th>Username</th>
                        <td>{{data.username}}</td>
                        </tr>
                    </tbody>
                    </table>
				 </div>
			 </div>
</div>
	</div>
</template>

<script>
import axios from 'axios'

	export default {
	data: () => ({
      data: 1,
      profile:'',
      pp:'',
      id:'',
      loading:false
    }),
		mounted(){
			this.mount()
		},
		methods:{
            editProfile(){
                this.$refs.uploadpp.click()
                
            },
            uploadPP2(event){
                this.profile = event.target.files[0]
                var fd = new FormData();
                this.loading=true
		    	fd.append("profile", this.profile);
                fd.append("id", this.id);
                axios.post('/edit_student_image',fd)
                .then(res=>{
                    this.mount()
                    this.loading=false
                })
                .catch(err=>{
                    this.loading=false
                })
            },
			mount(){
				axios.get('/user')
				.then(res=>{
					this.data =res.data
                    this.id =res.data.id
				})
			}
		}
	}
</script>

<style>
* {
    margin: 0;
    padding: 0
}

body {
    background-color: white
}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 10%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>