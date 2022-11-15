
<template>
    <div class="center">
      <div class="row">
          <div class="col-md-4 p-3">
             <Modal />
          </div>
      </div>
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
            <vs-th sort @click="users = $vs.sortData($event ,users, 'username')">
              Username
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'idnumber')">
              Contact
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'contact')">
              Contact
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'id')">
              ID Number
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'grade')">
              Grade
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'section')">
              Section
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
            <vs-td >
              {{ tr.name }}
            </vs-td>
            <vs-td edit @click="edit = tr, editProp = 'idnumber', editActive = true">
              {{ tr.idnumber }}
            </vs-td>
            <vs-td >
              {{ tr.username }}
            </vs-td>
            <vs-td>
            {{ tr.contact }}
            </vs-td>
            <vs-td>
            {{ tr.id }}
            </vs-td>
             <vs-td>
            {{ tr.grade }}
            </vs-td>
             <vs-td>
            {{ tr.section }}
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

import Modal from './Modal.vue'
import axios from 'axios'
    export default {
      mounted(){
        this.reload()
        },
        methods:{
            reload(){
              axios.post('/get_teacher')
              .then(res=>{
                  this.users= res.data.status
                })
              .catch(err=>{

                })
            }
          },
      components:{
        Modal
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

        