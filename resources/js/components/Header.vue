<template>
    <header>
        <h2>Sono l'header</h2>
        <ul v-if="!autenticato" >
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Registrazione</a></li>
        </ul>
        <a v-else href="admin/home">Dashboard</a>
    </header>
</template>

<script>
export default{
    name: "Header",
    computed: {
        eAutenticato: function(){
            return window.autenticato;
        }

    }
}
</script>

<style >

</style>
