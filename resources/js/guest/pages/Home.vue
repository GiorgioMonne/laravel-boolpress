<template>
  <div>
    <h1>Home Page</h1>
    <Post/>
  </div>
</template>

<script>

import Post from '../components/Posts.vue';

export default {
    name: "Home",
    components: {
      Post
    }
}
</script>

<style>

</style>