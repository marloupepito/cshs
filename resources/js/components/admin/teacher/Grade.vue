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
                        Calatrava Nation High School
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
                        Calatrava Nation High School
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
    methods:{
        nextPage(e){
            this.$router.push({path:'/administrator/teachers/'+e})
        }
    }
}
</script>
