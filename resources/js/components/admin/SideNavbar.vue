
<template>
    <div class="hidden sideNavbar">
      <vs-sidebar
      color="rgb(64, 191, 128)" 
        absolute
        hover-expand
        reduce
        v-model="active"
        open
        >
        <template #logo>
          Logo
        </template>
        <vs-sidebar-item to="/administrator"  color='black' id="administrator">
          <template #icon>
            <i class='bx bx-home'></i>
          </template>
          Home
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
        <vs-sidebar-group>
          <template #header>
            <vs-sidebar-item  color='black' arrow>
              <template #icon>
                <i class='bx bx-group'></i>
              </template>
              Students
            </vs-sidebar-item>
          </template>

          <vs-sidebar-item to="/administrator/grade/7" color='black' id="Instagram">
            <template #icon>
              <i class='bx bxl-instagram'></i>
            </template>
            Grade 7
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/grade/8" id="twitter">
            <template #icon>
              <i class='bx bxl-twitter' ></i>
            </template>
            Grade 8
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/grade/9" id="Facebook">
            <template #icon>
              <i class='bx bxl-facebook' ></i>
            </template>
            Grade 9
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/grade/10" id="Facebook">
            <template #icon>
              <i class='bx bxl-facebook' ></i>
            </template>
            Grade 10
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/grade/11" id="Facebook">
            <template #icon>
              <i class='bx bxl-facebook' ></i>
            </template>
            Grade 11
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/grade/12" id="Facebook">
            <template #icon>
              <i class='bx bxl-facebook' ></i>
            </template>
            Grade 12
          </vs-sidebar-item>
        </vs-sidebar-group>


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
      this.active = window.location.pathname.split('/')[2] === undefined?'administrator':window.location.pathname.split('/')[2]
    }
  }
  </script>

        