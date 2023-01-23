<template>
  <div class="row">
    <vs-card class="col-md-3" type="5" v-for="i in users" :key="i.id">
    <template #title>
      <h3>Advisory Attendance</h3>
    </template>
    <template #img>
      <img :src="'/profile/'+i.profile" alt="">
    </template>
    <template #text>
        <vs-button
        border
        block
        success
        @click="visitAttendace(i.strand,i.grade,i.section)"
      >
        VISIT
        
      </vs-button>
    </template>
    <template #interactions>
      <vs-button success icon>
        <i class='fas fa-users'></i>&nbsp;
        {{i.name}}  {{i.lastname}}
      </vs-button>
      <!-- <vs-button class="btn-chat" shadow primary>
        <i class='bx bx-chat' ></i>
        <span class="span">
          54
        </span>
      </vs-button> -->
    </template>
  </vs-card>
  </div>

</template>

<script>
import axios from 'axios'

export default {
    data:() => ({
        users: [],
        eventId:''
      }),
      methods:{
        visitAttendace(strand,grade,section){
           axios.post('/set_session_attendace',{
            strand:strand,
            grade:grade,
            section:section
           })
           .then(res=>{
            this.$router.push({path:'/administrator/check_attendance_list?'+this.eventId})
           })
        }
      },
    mounted(){
        axios.post('/get_teacher')
        .then(res=>{
            this.users= res.data.status
           this.eventId = window.location.search.substring(1)
        })
        .catch(err=>{

        })
    }
}
</script>