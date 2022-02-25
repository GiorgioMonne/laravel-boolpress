<template>
    <div>
        <h2>{{$route.params.slug}}</h2>
    </div>
</template>

<script>

export default{
    name: "SinglePost",
    data(){
        return {
            post: {}
        }
    },
    created(){
        axios.get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                
            });
    }
    
}
</script>

<style >

</style>