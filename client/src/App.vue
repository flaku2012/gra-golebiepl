<template>
<div class="container">
  <div class="row">
    <div class="col-12">
      <div id="app">
        <TheNavigation/>
        <br>
        <router-view/>     
      </div>
    </div>
  </div>
  <!-- <notifications /> -->
</div>

  
</template>

<script>
import TheNavigation from "@/components/TheNavigation"
export default{
  components: {
    TheNavigation
  }
}
</script>

<style>
body{
  background-image: url('http://www.gra-golebie.pl/api/public/storage/images/systemowe/tlo.png'); 
}
</style>
