<template>
	<div>
		Loading...
	</div>
</template>

<script>
	export default {
		mounted(){
			this.$router.push({path:'/student/loading'})
		}
	}
</script>