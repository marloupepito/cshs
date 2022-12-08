<template>
    <qrcode-stream :camera="camera" @decode="onDecode" @init="onInit" style="height:100vh">
  
    </qrcode-stream>
</template>


<script>
	import axios from 'axios'
export default {

  data () {
    return {
      camera: 'auto',
      result: null,
      showScanConfirmation: false,
      verify:false,
      event:[],
      eventid:''
    }
  },
  mounted(){
    this.eventid = window.location.search.substring(1)
  
  },
  methods: {

    async onInit (promise) {
      try {
        await promise
      } catch (e) {
        console.error(e)
      } finally {
        this.showScanConfirmation = this.camera === "off"
      }
    },

    async onDecode (content) {
    	this.pause()

      const credentials = content
     this.verify = false
    
      axios.post('/get_event',{
          verify:'scanner',
          eventid:this.eventid,
          qr:String(credentials)
        })
          .then(res =>{
            if(res.data.status === null){
                this.$swal({
                          icon: 'error',
                          title: 'Error QR!',
                          showConfirmButton: false,
                          timer: 1500
                        })
                 this.$router.go(-1)
              }else if(res.data.status.status === 'co1' || res.data.status.status === 'co2' || res.data.status.status === 'co3'){
            this.$swal({
                icon: 'error',
                title: 'The event is already cut off!',
                showConfirmButton: false,
                timer: 1500
              })
             this.$router.go(-1)
                }else if(res.data.status.status === 'Finish'){
                  this.$swal({
                icon: 'error',
                title: 'The event is already end!',
                showConfirmButton: false,
                timer: 1500
              })
                  this.$router.go(-1)
              }else{
                  axios.post('/add_attendance',{
                    event_id:this.eventid,
                    status:res.data.status.status
                    })
                    .then(res=>{
                        this.$swal({
                          icon: 'success',
                          title: 'Attendance Check!',
                          showConfirmButton: false,
                          timer: 1500
                        })
                      this.$router.push({path:'/student/my_attendance'})
                  })
                    .catch(err=>{
                      this.unpause()
                           this.$swal({
                          icon: 'error',
                          title: 'Error QR!',
                          showConfirmButton: false,
                          timer: 1500
                        })
                      })
             
              }
          })
    },

    unpause () {
      this.camera = 'auto'
    },

    pause () {
      this.camera = 'off'
    },

    timeout (ms) {
      return new Promise(resolve => {
        window.setTimeout(resolve, ms)
      })
    }
  }
}
</script>
