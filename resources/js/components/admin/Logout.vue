<template>
	<div>
		Please wait...
	</div>
</template>

<script>
	export default {
		mounted(){

			this.$swal({
            title: 'Are you sure?',
            text: "You want to Logout!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
              this.$swal({
                  icon: 'success',
                  title: 'Logout Success',
                  showConfirmButton: false,
                  timer: 1500
                })
              axios.post('/logout')
      				.then(res=>{
      					window.location='/login'
      					sessionStorage.clear()
      				})
            }else{
            	this.$router.go(-1)
            }
          })
			
		}
	}
</script>