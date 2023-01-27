
<template>
    <div class="center">
      <vs-table
        v-model="selected"
        >
        <template #header>
          <vs-input v-model="search" border placeholder="Search" />
        </template>
        <template #thead>
          <vs-tr>
        
            <vs-th class="w-25" sort @click="events = $vs.sortData($event ,events, 'idnumber')">
             WHAT
            </vs-th>
            <vs-th class="w-25" sort @click="events = $vs.sortData($event ,events, 'grade')">
              WHEN
            </vs-th>
            <vs-th class="w-25" sort @click="events = $vs.sortData($event ,events, 'section')">
              WHERE
            </vs-th>
            <vs-th class="w-25" sort @click="events = $vs.sortData($event ,events, 'Gender')">
              <center>ATTENDANCE</center>
            </vs-th>
          </vs-tr>
        </template>
        <template #tbody>
          <vs-tr
            :key="i"
            v-for="(tr, i) in $vs.getPage($vs.getSearch(events, search), page, max)"
            :data="tr"
            :is-selected="!!selected.includes(tr)"
            not-click-selected
            open-expand-only-td
          >
           
            <vs-td>
            {{ tr.what }}
            </vs-td>
            <vs-td>
            {{ tr.when }}
            </vs-td>
             <vs-td>
            {{ tr.where }}
            </vs-td>
               <vs-td>
                 <vs-button color="rgb(64, 191, 128)" @click="checkAttendance(tr.id)" class="btn-chat" block size="small" >
                  CHECK ATTENDANCE
                  </vs-button>
            </vs-td>
          </vs-tr>
        </template>
      </vs-table>

     
    </div>
  </template>
<script>
import axios from 'axios'
    export default {
      mounted(){
        this.mount();
        },
      methods:{
        checkAttendance(id){
          this.$router.push({path:'/administrator/check_attendance?'+id})
          },
        mount(){
         axios.post('/get_event')
          .then(res =>{
            this.events =res.data.status
            console.log(res.data.status)
          })
        }
      },
      data:() => ({
        editActive: false,
        edit: null,
        editProp: {},
        search: '',
        allCheck: false,
        page: 1,
        max: 500000,
        active: 0,
        selected: [],
        events: []
      })
    }
    </script>

