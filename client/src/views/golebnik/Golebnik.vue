<template>
  <div>
      <div class="row">
        <!-- LEWA -->
        <div class="col-2" >
        <div>
            <div>{{pigeonHawk.name}}</div>
            <div>
                <b>Poziom czystości:</b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_clean + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_clean}} %
                    </div>
                </div>
            </div>
            <div>
                <b>Poziom karmnika:
                  </b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_food + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_food}} %
                    </div>
                </div>
            </div>
            <div>
                <b>Poziom poideł:
                  </b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: (pigeonHawk.level_water/pigeonHawk.max_level_water)*100 + '%'}" aria-valuemin="0" aria-valuemax="5">{{((pigeonHawk.level_water/pigeonHawk.max_level_water)*100).toFixed(0)}} % z {{pigeonHawk.max_level_water}} l
                    </div>
                </div>
            </div>
            <div>
                <b>Poziom grytownika:
                  </b>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_grit + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_grit}} %
                    </div>
                </div>
            </div>
            <hr>
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">Akcje do wyboru</li>
                <button class="list-group-item list-group-item-action text-center" @click="cleanHawk">Wyczyść gołębnik</button>
                <button type="button" class="list-group-item list-group-item-action text-center" data-bs-toggle="modal" data-bs-target="#ModalAddFood" @click="getStoreHouse()">Uzupełnij karmik</button>
                <button class="list-group-item list-group-item-action text-center" @click="addWater">Uzupełnij poidło</button>
                <button type="button" class="list-group-item list-group-item-action text-center" data-bs-toggle="modal" data-bs-target="#ModalAddGrit" @click="showUpgradeHawk()">Uzupełnij grytownik</button>
                <button type="button" class="list-group-item list-group-item-action text-center" data-bs-toggle="modal" data-bs-target="#ModalUpgradeHawk" @click="showUpgradeHawk()">Ulepsz gołębnik</button>
                
                <!-- Modal ADD FOOD-->
                <div class="modal fade" id="ModalAddFood" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Uzupełnianie karmy w: <b>{{pigeonHawk.name}}</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="addFood">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Wybierz karmę:</label>
                                    <select class="form-select" v-model="formAddFood.storehouseId">
                                        <option :value="storehouseItem.id" v-for="storehouseItem in storehouseProducts" :key="storehouseItem.index" >{{storehouseItem.product.name}} || Twoja ilość: {{storehouseItem.quantity}} kg</option>
                                    </select>
                                    <p class="text-danger" v-if="errorsAddFood.storehouse_id">{{errorsAddFood.storehouse_id[0]}}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="count" class="form-label">Ilość [w kg]</label>
                                    <input type="text" class="form-control" id="count" v-model.number="formAddFood.count">
                                    <p class="text-danger" v-if="errorsAddFood.count">{{errorsAddFood.count[0]}}</p>
                                    <p class="text-primary">Pozostałe miejsce: {{pigeonHawk.max_level_food-pigeonHawk.level_food-formAddFood.count}} kg</p>
                                    <p class="text-danger" v-if="errorsAddFood.otherError">{{errorsAddFood.otherError}}</p>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Uzupełnij</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Modal UPGRADE HAWK-->
                <div class="modal fade" id="ModalUpgradeHawk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ulepsz gołębnik: <b>{{pigeonHawk.name}}</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="upgradeHawk">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Wybierz ulepszenie:</label>
                                    <select class="form-select" v-model="fromUpgradeHawk.storehouseId">
                                        <option :value="storehouseItem.id" v-for="storehouseItem in storehouseProducts" :key="storehouseItem.index" >{{storehouseItem.product.name}} || Twoja ilość: {{storehouseItem.quantity}} szt.</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Ulepsz</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

                <!-- Modal ADD GRIT-->
                <div class="modal fade" id="ModalAddGrit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Dodawanie grytu: <b>{{pigeonHawk.name}}</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form @submit.prevent="addGrit">
                                <div class="mb-3">
                                    <p><strong>W magazynie: </strong>14 kg</p>
                                    <p>
                                        Naciśnij przycisk poniżej, aby uzupełnić gryt na maksa w gołębniku.
                                    </p>
                                </div>
                                <div class="mb-3">
                                    
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Dosyp</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- End Modal -->

            </div>
        </div>
        </div>

        <!-- ŚRODEK -->
        <div class="col-10 border">

            <Pigeons/>      

        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <router-link to="">
                <img :src="this.$store.state.main_img_url+'systemowe/trenuj.jpg'" class="" alt="nie wczytano zdjęcia" data-toggle="modal" data-target="#staticBackdrop">
            </router-link>
            <router-link to="/trening/informacje_podstawowe" class="btn btn-sm btn-secondary">Trening</router-link>
        </div>
    </div>
  </div>
</template>

<script setup>
import axios from 'axios'
import { usePigeonHawks } from '@/composables/pigeonhawks'
import { useStorehouse } from '@/composables/storehouse'
import { onMounted, reactive, ref } from 'vue'
import { useRoute } from 'vue-router'
import Pigeons from '@/components/pigeonHawks/Pigeons'

    const route = useRoute()

    const route_id = route.params.id

    const { pigeonHawk, getPigeonHawk } = usePigeonHawks()
    const { storehouseProducts, getStorehouseByCategory } = useStorehouse()

    const formAddFood = reactive({
        storehouseId: Number,
        count: 1
    })

    const fromUpgradeHawk = reactive({
        storehouseId: Number,
    })

    const errorsAddFood = ref([])
    
    onMounted( getPigeonHawk(route_id) )

    function getStoreHouse()
    {
        getStorehouseByCategory(['food'])
    }

    function cleanHawk()
    {
        axios.post('pigeonhawks/clean_hawk', {
            id: route_id
        })
        getPigeonHawk(route_id)
    }

    function addWater()
    {
        axios.post('pigeonhawks/add_level_water_to_hawk', {
            id: route_id
        })
        getPigeonHawk(route_id)
    }

    function showUpgradeHawk()
    {
        getStorehouseByCategory(['waterbucket', 'construction'])
        getPigeonHawk(route_id)
    }

    async function addFood()
    {
        try{
            await axios.post('pigeonhawks/add_food_to_hawk',{
                'storehouse_id': formAddFood.storehouseId,
                'count':  formAddFood.count,
                'pigeonhawk_id': pigeonHawk.value.id
            })
            errorsAddFood.value = []
            getPigeonHawk(route_id)
        } catch(error){
            errorsAddFood.value = error.response.data.errors
        }
    }

    async function upgradeHawk()
    {
        try{
            await axios.post('pigeonhawks/upgrade_hawk', {
                'storehouse_id' : fromUpgradeHawk.storehouseId,
                'pigeonhawk_id': pigeonHawk.value.id
            })
            getPigeonHawk(route_id)
            showUpgradeHawk()
        }catch(error){
            console.log(error)
        }
    }

    async function addGrit()
    {
        try{
            await axios.post('pigeonhawks/add_grit', {
                'pigeonhawk_id': pigeonHawk.value.id
            })
            getPigeonHawk(route_id)
        }catch(error){
            console.log(error)
        }
    }


</script>

<style>

</style>