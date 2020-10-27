<template>
  <div id="app">
    <jumbotron/>
    <formCadastro/>
  </div>
</template>

<script>
export default {
  name: 'App',
  components: {
    formCadastro: ()=> import("@/views/formCadastro"),
    jumbotron: ()=> import("@/components/jumbotron")
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>
