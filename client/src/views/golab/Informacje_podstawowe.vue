<template>
  <div>
    <h3 class="text-center">Informacje podstawowe</h3>
    <img :src="this.$store.state.main_img_url+'systemowe/choroba.png'" class="" alt="nie wczytano zdjęcia" data-toggle="modal" data-target="#staticBackdrop">
    <hr>
    <div>
        <strong>PARTNER: </strong>{{pigeonPartner.name}}
    </div>
    <div>
        <div class="row">
            <div class="col-6">
                <p class="text-center"><img :src="this.$store.state.main_img_url+'systemowe/wyszwanc1.jpg'" class="img-thumbnail" alt="#"></p>
            </div>
            <div class="col-6">
                <b>Samopoczucie:</b> {{pigeon.level_comfort}} <br>
                <b>Potencjał:</b> {{pigeon.level_potential}} <br>
                <b>Wiek:</b> {{pigeon.age}} (w dniach) <br>
                <b>Doświadczenie:</b> {{pigeon.level_experience}} <br>
                <b>Przebyty dystans:</b> {{pigeon.odometr}} <br>
                <b>Ukończone loty:</b> ??? <br>
                <b>Zdobyte konkursy:</b> ??? <br>
                <b>Ilość lęgów:</b> ??? <br>
                <b>Płeć:</b> {{ pigeon.sex=='m' ? 'Samiec' : 'Samica' }} <br>
                <b>Głód:</b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: (pigeon.level_food/pigeon.max_level_food)*100 + '%'}" aria-valuemin="0" aria-valuemax="5">{{(pigeon.level_food/pigeon.max_level_food)*100}} %</div>
                </div>
                <b>Pragnienie:</b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: (pigeon.level_water/pigeon.max_level_water)*100 + '%'}" aria-valuemin="0" aria-valuemax="5">{{(pigeon.level_water/pigeon.max_level_water)*100}} %</div>
                </div>
                <b>Zdrowie:</b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: (pigeon.level_health/pigeon.max_level_health)*100 + '%'}" aria-valuemin="0" aria-valuemax="5">{{(pigeon.level_health/pigeon.max_level_health)*100}} %</div>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>


<script setup>

import { useRoute } from 'vue-router'
import { usePigeons } from '@/composables/pigeon'
import { onMounted } from 'vue'

    const route = useRoute()
    const { pigeon, pigeonPartner, getPigeon, getPigeonPartner } = usePigeons()

    onMounted( 
        getPigeon(route.params.id),
        getPigeonPartner(route.params.id)
    )

</script>

<style>

</style>