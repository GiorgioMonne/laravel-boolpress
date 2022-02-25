<template>
    <div>
        <h2>Lista Posts</h2>
        <ul>
            <li v-for="post in posts" :key="post.id">
                {{post.title}}
            </li>
        </ul>
    </div>
</template>

<script>


export default{
    name: "Post",
    data() {
        return {
            posts: []
        }
    },
    created(){
        axios.get("/api/posts")
            .then((response) => {
                this.posts = response.data;
            });
    }
    
}
</script>

<style >

</style>