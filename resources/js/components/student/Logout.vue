<template>
	<div>
		Please wait...
	</div>
</template>

<script>
	export default {
		mounted(){
			axios.post('/logout')
			.then(res=>{
				window.location='/login'
				sessionStorage.clear()
			})
		}
	}
</script>