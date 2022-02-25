<template>
    <header>
        <h2>Sono l'header</h2>
        <a href="admin/home">Dashboard</a>
        <nav>
            <li>
                <router-link :to="{ name:'home'}">Home</router-link>
            </li>
            <li>
                <router-link :to="{ name:'about'}">About</router-link>
            </li>
        </nav>
    </header>
</template>

<script>
export default{
    name: "Header"
}
</script>

<style >

</style>
