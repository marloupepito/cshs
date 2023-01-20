<template>
	<div >
		<div class="container mb-4 d-flex p-0 justify-content-center" style="width:100%;height:90vh !important"> 
			<div class="card p-4"> <div class="d-flex flex-column justify-content-center align-items-center"> 
                <img :src="'/profile/'+data.profile" height="200" class="mt-3" width="90%" />
				 <span class="name mt-3">{{data.name}}</span> <span class="idd">{{data.grade}} {{data.section}}</span> 
				<div class="d-flex flex-row justify-content-center align-items-center gap-2">
				 <span class="idd1">{{data.strand}}</span> 
				</div> 
				<div class="d-flex flex-row justify-content-center align-items-center mt-3">
				 <span class="number">{{data.idnumber}} <span class="follow">ID Number</span></span> 
				</div>
				<div class="text mt-3"> <span>Username:{{data.username}}</span>
				 </div>
				 
				 </div>
			 </div>
</div>
	</div>
</template>

<script>
	export default {
	data: () => ({
      data: 1,
    }),
		mounted(){
			this.mount()
		},
		methods:{
			mount(){
				axios.get('/user')
				.then(res=>{
					this.data =res.data
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