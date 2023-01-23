<template>
    <div class="row" style="margin-bottom:70px;">
        <div class="col-md-4 col-6">
            <a @click="nextPage('STEM')">
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>STEM</b></h3>
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
        <div class="col-md-4 col-6">
            <a @click="nextPage('TVL')">
                <vs-card>
                    <template #title>
                        <h3><b>TVL</b></h3>
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
        <div class="col-md-4 col-6">
            <a @click="nextPage('GAS')">
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>GAS</b></h3>
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
        <div class="col-md-4 col-6">
            <a @click="nextPage('TVL')">
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>TVL</b></h3>
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
        <div class="col-md-4 col-6">
            <a @click="nextPage('HUMSS')">
                <vs-card style="float: right !important">
                    <template #title>
                        <h3><b>HUMSS</b></h3>
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
export default {
    mounted(){
        
    },
    methods: {
        nextPage(e) {
            const grade = this.$route.path.split('/')[3]
           
            this.$router.push({ path: "/administrator/teachers/" +String(grade)+'/'+e });
        },
    },
};
</script>
