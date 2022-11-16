<template>
	<div>
		Loading...
	</div>
</template>

<script>
	export default {
		mounted(){
			const grade= window.location.search.substring(1);
			this.$router.push({path:'/administrator/grade/'+grade})
		}
	}
</script>