<template>
  <v-app> 
    <div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/pkp"> PKP</router-link> |
      <router-link to="/pkpd"> PKPP</router-link> |
      <router-link to="/pkpd"> PKPD</router-link> |
      <router-link to="/pkpb"> PKPB</router-link> 
    </div>
    <router-view/> 
  </v-app>
</template>

<script>

export default {
  name: 'App',

  data: () => ({
    //
  }),
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>

