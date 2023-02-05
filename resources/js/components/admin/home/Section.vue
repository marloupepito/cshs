<
<template>
    <div class="center">
      <div class="col-md-12 p-3">
            <h4><a href="#" @click="goBack">BACK</a></h4>
          </div>
      <vs-table
        v-model="selected"
        >
        <template #header>
          <vs-input v-model="search" border placeholder="Search" />
        </template>
        <template #thead>
          <vs-tr>
        
            <vs-th class="w-25" sort >
            Fullname
            </vs-th>
            <vs-th class="w-25" sort >
              ID NUmber
            </vs-th>
            <vs-th class="w-25" sort >
              Grade
            </vs-th>
             <vs-th class="w-25" sort>
              Strand
            </vs-th>
            <vs-th class="w-25" sort>
              Section
            </vs-th>
            <vs-th class="w-25" sort>
              Morning Start
            </vs-th>
            <vs-th class="w-25" sort>
              Morning End
            </vs-th>
            <vs-th class="w-25" sort>
              Afternoon Start
            </vs-th>
            <vs-th class="w-25" sort>
              Afternoon End
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
            {{ tr.name }}
            </vs-td>
            <vs-td>
            {{ tr.idnumber }}
            </vs-td>
             <vs-td>
            {{ tr.grade }}
            </vs-td>
             <vs-td>
            {{ tr.strand }}
            </vs-td>
             <vs-td>
            {{ tr.section }}
            </vs-td>
              <vs-td>
            {{ tr.ms }}
            </vs-td>
              <vs-td>
            {{ tr.me }}
            </vs-td>
              <vs-td>
            {{ tr.ass }}
            </vs-td>
              <vs-td>
            {{ tr.ae }}
            </vs-td>
          </vs-tr>
        </template>
      </vs-table>
<br /><br /><br />
     
    </div>
  </template>
<script>
import axios from 'axios'
    export default {
      mounted(){
        this.mount();
        },
      methods:{
        goBack(){
          
        this.$router.push('/administrator/check_attendance/'+window.location.pathname.split('/')[3]+'/'+window.location.pathname.split('/')[4]+'?'+window.location.search.substring(1))
        },
        mount(){
         axios.post('/get_advisory_attendance2',{
         	id:window.location.search.substring(1),
             grade:'Grade '+window.location.pathname.split('/')[3],
             strand:window.location.pathname.split('/')[4].replace(/_/g,' '),
             section:window.location.pathname.split('/')[5].replace(/_/g,' '),
         	})
          .then(res =>{
            this.events =Object.values(res.data.status)
            console.log('waa',res.data.status)
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
        max: 5000,
        active: 0,
        selected: [],
        events: []
      })
    }
    </script>

>