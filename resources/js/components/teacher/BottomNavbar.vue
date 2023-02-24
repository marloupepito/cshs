<template>
  
  <CurvedBottomNavigation
  style="z-index:100 !important"
 foreground-color='#F7F7F8'
  badge-color='#F40101'
  background-color='rgb(64, 191, 128)'
  icon-color='#0000008A'
   :options="options" v-model="selected" />
</template>

<script>

  export default {
    data: () => ({
      selected: 1,
      pending:'',
      options: [
           { 
          id: 1, 
          icon: "text-white fas fa-user-circle", 
          title: "Profile",
          path:"/teacher/profile"
        },
        {
          id: 2,
          icon: "text-white fas fa-home",
          title: "News Feed",
          path:"/teacher/newsfeed",
        },
        { 
          id: 3, 
          icon: "text-white fas fa-users", 
          title: "Grade 11",
          path:"/teacher/loading?11", badge: 15 
        },
     
         { 
          icon: "text-white fas fa-sign-out-alt", 
          title: "Grade 12",
          path:"/teacher/logout",
        },
     
      ],
    }),
    methods:{
      logoutClick(){
        alert('ss')
      }
      },
    mounted(){
     const grade = window.location.pathname.split('/')[2]

          axios.post('/get_student_advisory',{
                grade:'Grade '+grade
                })
              .then(res=>{
                  this.options[2].badge = res.data.pending.length
                })
              .catch(err=>{

                })
    //  
        if(grade==='profile'){
          this.selected = 1
        }else if(grade==='newsfeed'){
          this.selected = 2
        }else if(grade==='student_list'){
          this.selected = 3
        }
      },
    methods:{

    }
  };
</script>
