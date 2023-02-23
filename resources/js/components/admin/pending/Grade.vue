<template>
    <div class="row">
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
                     <span style="  background-color: red;
                          color: white;
                          padding: 4px 8px;
                          text-align: center;
                          border-radius: 5px;">{{grade11}}</span>
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
                     <span style="  background-color: red;
                          color: white;
                          padding: 4px 8px;
                          text-align: center;
                          border-radius: 5px;">{{grade12}}</span>
                </template>
            </vs-card>
        </a>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        nextPage(e){
            this.$router.push({path:'/administrator/pending/'+e})
        }
    },
      data:() => ({
      grade11:'',
       grade12:'',
    }),
    mounted(){


         axios.post('/get_student_pending',{
                grade:'Grade '+this.grade
                })
              .then(res=>{
                  this.grade11= res.data.status3.length
                   this.grade12= res.data.status4.length
                })


    }
}
</script>
