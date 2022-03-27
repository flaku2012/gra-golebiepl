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
                    <router-link to="/magazyn" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Magazyn
                    </router-link>
                    <button @click="select_category(['food'])" class="list-group-item list-group-item-action text-center">Pasze</button>
                    <button @click="select_category(['medicines'])" class="list-group-item list-group-item-action text-center">Lekarstwa</button>
                    <button @click="select_category(['grit'])" class="list-group-item list-group-item-action text-center">Gryt</button>
                    <button @click="select_category(['ring'])" class="list-group-item list-group-item-action text-center">Obrączki</button>
                    <button @click="select_category(['waterbucket'])" class="list-group-item list-group-item-action text-center">Podiła</button>
                    <button @click="select_category(['construction'])" class="list-group-item list-group-item-action text-center">Budowlanka</button>
                    <button @click="select_category(['tool'])" class="list-group-item list-group-item-action text-center">Narzędzia</button>
                 </div>
            </div>

            <!-- PRAWA STRONA -->
            <div class="col-9"> 
                <h4 class="text-center">Sklep</h4>
                <hr>
                <div>
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col" width="40%">Nazwa</th>
                            <th scope="col">Cena za szt.</th>
                            <th scope="col">Ilość</th>
                            <th scope="col">Razem</th>
                            <th scope="col">KUP</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(product, i) in products" :key="product.index" :class="product.id == errorBuy.errorProductId ? 'table-danger' : ''">
                                <td>
                                    {{ product.name }}
                                    <p class="text-danger" v-if="product.id == errorBuy.errorProductId">{{errorBuy.errorValue}}</p>
                                    <div id="product_description" class="form-text text-justify">{{ product.description }}</div>
                                </td>
                                <td>{{ product.price }} zł</td>
                                <td><input type="text" class="form-control form-control-sm" v-model="form.count[i]"></td>
                                <td>{{ (form.count[i] > 0) ? product.price * form.count[i]+'zł' : '' }}</td>
                                <td><button @click="submit(product.id, form.count[i])" class="btn btn-sm btn-sm btn-success" :disabled="!form.count[i]">KUP</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
    import { useProducts } from '@/composables/product'
    import { useStore } from 'vuex'
    import axios from 'axios'
    import { onMounted, reactive, ref } from 'vue'

    const { products, getProductsByCategory, getProducts } = useProducts()
    const store = useStore()

    const form = reactive({
        count: [],
    })

    const errorBuy = ref('')

    onMounted( getProducts() )

    function select_category(category_product)
    {
        getProductsByCategory(category_product)
    }

    async function submit(productId, count)
    {
        try{
            await axios.post('shop/buy_product',{
                'product_id': productId,
                'count': count
            })
            getProducts()
            errorBuy.value = ''
            store.dispatch('auth/getUser');
        } catch(error){
            errorBuy.value = error.response.data
            console.log(error.response.data)
        }

    }



</script>

<style>

</style>