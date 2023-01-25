
<template>
    <div class="hidden sideNavbar">
      <vs-sidebar
      style="z-index:100 !important;position: fixed !important;"
      color="rgb(64, 191, 128)" 
        absolute
        hover-expand
        reduce
        v-model="active"
        open
        >
        <template #logo>
          <img src="/images/logo2.png">
        </template>
        <vs-sidebar-item to="/administrator"  color='black' id="administrator">
          <template #icon>
            <i class='bx bx-list-ol'></i>
          </template>
          Event List
        </vs-sidebar-item>
        <vs-sidebar-item to="/administrator/events"  color='black' id="events">
          <template #icon>
            <i class='bx bx-calendar-event'></i>
          </template>
          Event
        </vs-sidebar-item>
        <vs-sidebar-item color='black' to="/administrator/teachers" id="teachers">
          <template #icon>
            <i class='bx bxs-user-badge'></i>
          </template>
          Teachers
        </vs-sidebar-item>

        <!-- <vs-sidebar-item color='black' to="/administrator/loading2?11" id="11">
          <template #icon>
            <i class='bx bx-group'></i>
          </template>
          Grade 11
        </vs-sidebar-item>

        <vs-sidebar-item color='black' to="/administrator/loading2?12" id="12">
          <template #icon>
            <i class='bx bx-group'></i>
          </template>
          Grade 12
        </vs-sidebar-item> -->

 


        <vs-sidebar-item color='black' to="/administrator/logout" id="logout">
            <template #icon>
              <i class='bx bx-log-out-circle'></i>
            </template>
            Logout
          </vs-sidebar-item>
       
      </vs-sidebar>
    </div>
  </template>
<script>
  export default {
    data:() => ({
      active: 'administrator',
    }),
    mounted(){

      const path = this.$route.path.split('/')[2]
      const path2 = this.$route.path.split('/')[3]
      
      if(path === undefined){
        this.active ='administrator'
      }else if(path === "events"){
        this.active =path
      }else if(path === "teachers"){
        this.active =path
      }else if(path === "grade" && path2 === '11'){
        this.active =path2
      }else if(path === "grade" && path2 === '12'){
        this.active =path2
      }
      
    }
  }
  </script>

        