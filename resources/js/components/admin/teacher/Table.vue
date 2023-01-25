
<template>
    <div class="center">
      <div class="col-md-4 p-3">
            <h4><a href="#" @click="goBack">BACK</a></h4>
          </div>
      <h3>Grade {{ g }}  {{ s }}  </h3>
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
            <vs-th sort @click="users = $vs.sortData($event ,users, 'strand')">
              Strand
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'username')">
              Username
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'idnumber')">
              ID Number
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'contact')">
              Contact
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'grade')">
              Grade
            </vs-th>
            <vs-th sort @click="users = $vs.sortData($event ,users, 'section')">
              Section
            </vs-th>
            <vs-th sort>
              Show Student
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
            <vs-td>
              {{ tr.lastname }} {{ tr.name }}
            </vs-td>
            <vs-td>
              {{ tr.strand }}
            </vs-td>
            <vs-td edit @click="edit = tr, editProp = 'idnumber', editActive = true">
              {{ tr.username }}
            </vs-td>
            <vs-td >
              {{ tr.idnumber }}
            </vs-td>
            <vs-td>
            {{ tr.contact }}
            </vs-td>
             <vs-td>
            {{ tr.grade }}
            </vs-td>
             <vs-td>
            {{ tr.section }}
            </vs-td>

            <vs-td>
              <vs-button
			 icon
			 size="small"
		      @click="showStudent(tr.section)"
		      >
		        STUDENTS
		      </vs-button>
            </vs-td>

             <vs-td>
            <Option :data="tr"/>
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
          </vs-tr>
        </template>
       
      </vs-table><br /><br /><br /><br />

      
    </div>
  </template>
<script>

  import Option from './Option.vue'
import Modal from './Modal.vue'
import axios from 'axios'
    export default {
      mounted(){
        this.reload()
        },
        methods:{
          goBack(){
            const grade = this.$route.path.split('/')[3]
            this.$router.push('/administrator/teachers/'+grade)
          },
          showStudent(section){
            const grade = this.$route.path.split('/')[3]
              const strand = this.$route.path.split('/')[4]
              this.$router.push('/administrator/teachers/'+grade+'/'+strand+'/students?'+section.replace(/ /g,'_'))
          },
            reload(){
              const grade = this.$route.path.split('/')[3]
              const strand = this.$route.path.split('/')[4]
              axios.post('/get_teacher',{
                strand:strand,
                grade:'Grade '+grade
              })
              .then(res=>{
                  this.users= res.data.status
                })
              .catch(err=>{

                })
            }
          },
      components:{
        Modal,
        Option
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

        