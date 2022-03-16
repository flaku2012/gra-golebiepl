<template>
  <div class="container">
        <div class="row">
            <div class="col-3" >
                <div class="list-group text-center">
                    <li class="list-group-item list-group-item-info text-center">
                        <i class="bi bi-arrow-90deg-down"></i>Akcje do wyboru
                    </li>
                    <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Miasto
                    </router-link>
                    <router-link to="/sklep" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Sklep
                    </router-link>
                    <button @click="select_category('food')" class="list-group-item list-group-item-action text-center">Pasze</button>
                    <button @click="select_category('medicines')" class="list-group-item list-group-item-action text-center">Lekarstwa</button>
                    <button @click="select_category('grit')" class="list-group-item list-group-item-action text-center">Gryt</button>
                    <button @click="select_category('ring')" class="list-group-item list-group-item-action text-center">Obrączki</button>
                    <button @click="select_category('waterbucket')" class="list-group-item list-group-item-action text-center">Poidła</button>
                    <button @click="select_category('construction')" class="list-group-item list-group-item-action text-center">Budowlanka</button>
                    <button @click="select_category('tool')" class="list-group-item list-group-item-action text-center">Narzędzia</button>
                </div>
            </div>

            <!-- ŚRODEK -->
            <div class="col-9">
                <h4 class="text-center">Magazyn</h4>
                <hr>
                <div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" width="40%">Nazwa</th>
                            <th scope="col">Całkowita ilość </th>
                            <th scope="col">Akcja</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="storehouse in storehouseProducts" :key="storehouse.index">
                                <td>{{storehouse.product.name}}</td>
                                <td>
                                    <div v-if="storehouse.product.category === 'food' || storehouse.product.category === 'grit'">
                                        {{storehouse.quantity}} kg
                                    </div>
                                    <div v-else>
                                        {{storehouse.quantity}} szt.
                                    </div>
                                </td>
                                <td>
                                    <div v-if="storehouse.product.category === 'waterbucket' || storehouse.product.category === 'tool' || storehouse.product.category === 'construction'">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" :data-bs-target="'#exampleModal'+storehouse.id">
                                        Użyj
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" :id="'exampleModal'+storehouse.id" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{storehouse.product.name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Wybierz gołębnik, do którego chcesz dodać nowe poidło.</p>
                                                <div class="row row-cols-2">
                                                    <div v-for="pigeonHawk in pigeonHawks" :key="pigeonHawk.index">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title">{{pigeonHawk.name}}</h5>
                                                                <p class="card-text">{{pigeonHawk.type}}</p>
                                                                <a href="#" class="btn btn-primary btn-sm" @clikc="useInPigeonHawk(storehouse.id, pigeonHawk.id)">Wybierz</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Koniec modal -->
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import axios from 'axios'
    import { useStorehouse } from '@/composables/storehouse'
    import { usePigeonHawks } from '@/composables/pigeonhawks'
    import { onMounted } from 'vue'

    const { storehouseProducts, getStorehouseByCategory, getStorehouseProducts } = useStorehouse()
    const { pigeonHawks } = usePigeonHawks()


    onMounted( getStorehouseProducts() )

    function select_category(category)
    {
        getStorehouseByCategory(category)
    }

    async function useInPigeonHawk(storehouseProductId, pigeonHawkId)
    {

        try{
            await axios.post('storehouse/product_action',{
                'storehouse_product_id': storehouseProductId,
                'pigeon_hawk_id': pigeonHawkId
            })
            console.log(storehouseProductId)           
        } catch(error){
            console.log(error.response.data)
        }

    }


</script>

<style>

</style>