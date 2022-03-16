<template>
  <div>
        <h3 class="text-center">Rodzice</h3>
        <hr>
        <div>
        <div class="row">
            <div class="col-6">
              <p class="text-center">{{pigeonParentMother.name}}</p>
              <p class="text-center"><img :src="this.$store.state.main_img_url+'systemowe/wyszwanc1.jpg'" class="img-thumbnail" alt="#"></p>
            </div>
            <div class="col-6">
              <p class="text-center">{{pigeonParentFather.name}}</p>
              <p class="text-center"><img :src="this.$store.state.main_img_url+'systemowe/wyszwanc1.jpg'" class="img-thumbnail" alt="#"></p>
            </div>
        </div>
    </div>
  </div>
</template>

<script setup>
  import { usePigeons } from '@/composables/pigeon'
  import { onMounted } from 'vue'
  import { useRoute } from 'vue-router'

  const route = useRoute()
  const { pigeonParentMother, pigeonParentFather, getPigeonParent } = usePigeons()

  onMounted( getPigeonParent(route.params.id) )



</script>

<style>

</style>