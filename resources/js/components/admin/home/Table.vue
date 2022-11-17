
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
        
            <vs-th sort @click="users = $vs.sortData($event ,users, 'name')">
              Name
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'idnumber')">
              ID Number
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'grade')">
              Grade
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'section')">
              Section
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'Strand')">
              Strand
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'Gender')">
              Gender
            </vs-th>
          </vs-tr>
        </template>
        <template #tbody>
          <vs-tr
            :key="i"
            v-for="(tr, i) in $vs.getPage($vs.getSearch(users, search), page, max)"
            :data="tr"
            :is-selected="!!selected.includes(tr)"
            not-click-selected
            open-expand-only-td
          >
           
            <vs-td edit @click="edit = tr, editProp = 'name', editActive = true">
              {{ tr.name }}
            </vs-td>
            <vs-td>
            {{ tr.idnumber }}
            </vs-td>
            <vs-td>
            {{ tr.grade }}
            </vs-td>
             <vs-td>
            {{ tr.section }}
            </vs-td>
               <vs-td>
            {{ tr.strand }}
            </vs-td>
             <vs-td>
            {{ tr.gender }}
            </vs-td>



            <template #expand>
              <div class="con-content">
                <div>
                  <vs-avatar>
                    <img :src="`/avatars/avatar-${i + 1}.png`" alt="">
                  </vs-avatar>
                  <p>
                    {{ tr.name }}
                  </p>
                </div>
                <div>
                  <vs-button flat icon>
                    <i class='bx bx-lock-open-alt' ></i>
                  </vs-button>
                  <vs-button flat icon>
                    Send Email
                  </vs-button>
                  <vs-button border danger>
                    Remove User
                  </vs-button>
                </div>
              </div>
            </template>
          </vs-tr>
        </template>
        <template #footer>
          <vs-pagination v-model="page" :length="$vs.getLength($vs.getSearch(users, search), max)" />
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
          axios.post('/get_attendance')
          .then(res=>{
            this.users =res.data.status
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
        users: []
      })
    }
    </script>

