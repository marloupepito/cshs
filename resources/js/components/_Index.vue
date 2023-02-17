
<template>
      <div class="col-md-12">
         <!-- <router-view></router-view> -->
         <button @click="clickMe">Click Me</button>
      </div>
</template>

<script>

import axios from 'axios'
    export default {
      components:{

        },
        methods:{
          clickMe(){


          let key = "";
          const aa = ['CYq3JVybPw7vYqkAIBRRl:APA91bH3zRLsFBUnn9F88K-z_X3yK1BxrwvMCJVNo1YdYB1VTP5qa5wRhhfXlgP9I2xdcSFaEASKlDeLIGNBka5opxuGHYsrfMIGm2osneebBwB87W23aMy5ObrFcH13O9trNjOr3XHo','d4WvmX-yWtSRFPzUx0cJRG:APA91bG8ZYsUJje4PH_uAaBcK8n5y8_-UpSOxWkxAaNwffDX23Lh_8cqE3U9gaqjBmwd-X3EepNKgjklrXkuaGREGUw9WVpBciSzQL5tCl0URH4twpe0VcOtJj23nF7PHm79CsN0yx_D']
          aa.forEach(myFunction);
          
          function myFunction(item, index) {
              axios.post(
                  'https://fcm.googleapis.com/fcm/send',
                  {
                     method: 'POST',
                    data: {
                      message_id:494667424208
                    },
                    notification: {
                      title: "Sample text1",
                      body: "Sample text2",
                    },
                    to: item,
                  },
                  {
                    headers: {
                      Authorization:
                        'key=AAAAcyx54dA:APA91bEdu8Sy7kAAohmXAlZ3kiDWIhR_doFf8XSZd9IZJaEuIo-TJs4bvUKxG3-l3PYIhpn51eS6N5WgjA2d8B-8bPt0xgo-WM0JX9f_HHsX2H9LdSbMDV7n5NoPB201AALpGtshzQpm',
                      
                    },
                  },
                )
                .then(Response => {
                  console.log(Response.data);
                });
          }

          myFunction()

       


          }
        },
        mounted(){

         
          const loading = this.$vs.loading({
            text: 'Loading...',
            type:'circles'
          })
          axios.get('/user')
          .then(res=>{
            loading.close()
            })
          .catch(err=>{
            loading.close()
            })
          },
      data:() => ({
        active: true
      })
    }
  </script>

        