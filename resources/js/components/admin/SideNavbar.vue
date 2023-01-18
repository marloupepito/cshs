
<template>
    <div class="hidden sideNavbar">
      <vs-sidebar
      style="z-index:1 !important"
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
        <vs-sidebar-group>
          <template #header>
            <vs-sidebar-item  color='black' arrow>
              <template #icon>
                <i class='bx bx-group'></i>
              </template>
              Students
            </vs-sidebar-item>
          </template>

          <vs-sidebar-item to="/administrator/loading2?11" id="11">
            <template #icon>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='bx bx-user-plus' ></i>
            </template>
            Grade 11
          </vs-sidebar-item>
          <vs-sidebar-item to="/administrator/loading2?12" id="12">
            <template #icon>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class='bx bx-user-plus' ></i>
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

        