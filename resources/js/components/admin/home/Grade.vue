<template>
    <div class="row">
        <div class="col-md-12 p-3">
            <h4><a href="#" @click="goBack">BACK</a></h4>
          </div>
        <div class="col-md-6 col-6">
            <a @click="nextPage(11)">
            <vs-card style="float:right !important">
                <template #title>
                    <h3><b>Grade 11</b></h3>
                </template>
                <template #img>
                    <img src="/images/logo2.png" alt="" />
                </template>
                <template #text>
                    <p>
                       Calatrava Senior High-SA
                    </p>
                </template>
                <template #interactions>
                    
                </template>
            </vs-card>
        </a>
        </div>
        <div class="col-md-6 col-6">
            <a @click="nextPage(12)">
            <vs-card>
                <template #title>
                    <h3><b>Grade 12</b></h3>
                </template>
                <template #img>
                    <img src="/images/logo2.png" alt="" />
                </template>
                <template #text>
                    <p>
                       Calatrava Senior High-SA
                    </p>
                </template>
                <template #interactions>
                    
                </template>
            </vs-card>
        </a>
        </div>
    </div>
</template>

<script>
export default {
    data:() => ({
		 eventid:"",
      }),
      mounted(){
        this.eventid=window.location.search.substring(1)
      },
    methods:{
        goBack(){
            this.$router.push({path:'/administrator/'})
        },
        nextPage(e){
            this.$router.push({path:'/administrator/check_attendance/'+e+'?'+this.eventid})
        }
    }
}
</script>
