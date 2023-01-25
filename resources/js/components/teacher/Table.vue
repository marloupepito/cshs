
<template>
    <div>
<h3>{{ g }} {{ s }} {{ ss }} </h3>
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
              ID Number
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'strand')">
              Strand
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'contact')">
              Contact
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'grade')">
              Grade
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'section')">
              Approve
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'section')">
              Option
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
              {{ tr.name }} {{ tr.lastname }}
            </vs-td>
            <vs-td edit @click="edit = tr, editProp = 'idnumber', editActive = true">
              {{ tr.username }}
            </vs-td>
            <vs-td >
              {{ tr.idnumber }}
            </vs-td>
            <vs-td>
            {{ tr.strand }}
            </vs-td>
            <vs-td>
            {{ tr.contact }}
            </vs-td>
             <vs-td>
            {{ tr.grade }}
            </vs-td>
             <vs-td>
            <vs-button v-if="tr.access === null" @click="func('approved',tr.id)" block border flat icon>
                   Approve
                  </vs-button>
                  <vs-button v-if="tr.access === 'approved'"  block success color="success" border flat icon>
                   Approved
                  </vs-button>
            </vs-td>

            <template #expand>
              <div class="con-content row">
                <div class="col-md-9">
                  <vs-avatar>
                    <img :src="`/profile/`+tr.profile" alt="">
                  </vs-avatar>
                </div>
                <div class="col-md-3 col-6">  	
          		  {{ tr.section }}
                </div>
               <!--  <div class="col-md-2 col-6">
                  <vs-button @click="func('delete',tr.id)" block border danger>
                    Remove User
                  </vs-button>
                </div> -->
                <div class="col-md-2 col-6">
                Username: {{tr.username}}
                </div>
                 <div class="col-md-2 col-6">
                Gender: {{tr.gender}}
                </div>
                 <div class="col-md-2 col-6">
                Grade: {{tr.grade}}
                </div>
                <div class="col-md-2 col-6">
                Strand: {{tr.strand}}
                </div>
                <div class="col-md-2 col-6">
                ID Number: {{tr.idnumber}}
                </div>
                <div class="col-md-2 col-6">
                Contact #: {{tr.contact}}
                </div>
              </div>
            </template>
             <vs-td>
            <Option :data="tr"/>
            </vs-td>
          </vs-tr>
        </template>
        <template #footer>
          <vs-pagination v-model="page" :length="$vs.getLength($vs.getSearch(users, search), max)" />
        </template>
      </vs-table>

      
    </div>
  </template>
<script>

import Option from './Option.vue'
import axios from 'axios'
    export default {
      components:{
        Option,
        },
      mounted(){
      	  this.grade = window.location.pathname.split('/')[3]
          this.reload()
        },
        methods:{
          
        	func(e,id){
        			axios.post('/option',{
        				option:e,
        				id:id
        				})
        			.then(res=>{
        				this.reload()
                this.$swal({
                  icon: 'success',
                  title: 'Student approved!',
                  showConfirmButton: false,
                  timer: 1500
                })
        			})
        			.catch(err=>{

        			})
        		},
            reload(){
              axios.post('/get_student_advisory',{
              	grade:'Grade '+this.grade
              	})
              .then(res=>{
                  this.users= res.data.status
                  this.s= res.data.strand
                  this.g= res.data.grade
                  this.ss= res.data.section
                })
              .catch(err=>{

                })
            }
          },
      data:() => ({
        s:'',
        g:'',
        ss:'',
      	grade:'',
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

