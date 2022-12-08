<template>
	<div>
		Loading...
	</div>
</template>

<script>
	export default {
		mounted(){
			const grade= window.location.search.substring(1);
			this.$router.push({path:'/teacher/student_list/'+grade})
		}
	}
</script>