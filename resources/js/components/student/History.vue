
<template>
    <div class="center m-3">
      <vs-table
        v-model="selected"
        >
        <template #header>
          <vs-input v-model="search" border placeholder="Search" />
        </template>
        <template #thead>
          <vs-tr>
        
            <vs-th class="w-25" sort >
              What
            </vs-th>
            <vs-th class="w-25" sort >
              When
            </vs-th>
             <vs-th class="w-25" sort>
              Where
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
            {{ tr.what }}
            </vs-td>
            <vs-td>
            {{ tr.when }}
            </vs-td>
             <vs-td>
            {{ tr.where }}
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
        <template #footer>
          <vs-pagination v-model="page" :length="$vs.getLength($vs.getSearch(events, search), max)" />
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
        mount(){
         axios.post('/get_student_attendance')
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
        max: 5,
        active: 0,
        selected: [],
        events: []
      })
    }
    </script>

