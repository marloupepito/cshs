<template>
	<div>
		Loading...
	</div>
</template>

<script>
	export default {
		mounted(){
			const grade= window.location.search.substring(1).split(',')[0]
			const strand= window.location.search.substring(1).split(',')[1]
			 this.$router.push({path:'/administrator/teachers/'+grade+'/'+strand})
		}
	}
</script>