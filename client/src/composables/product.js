import { ref } from 'vue'
import axios from 'axios'

export function useProducts() {

    const products = ref([])
    const product = ref([])

    const getProducts = async () => {
        axios.get('shop/get_products')
            .then(response => {
                products.value = response.data
            })
            .catch(error => {
                console.log('getProduct error', error)
                return error
            })
    }

    const getProductsByCategory = async (category) => {
        axios.get('shop/get_products_by_category/'+category)
            .then(response => {
                products.value = response.data
            })
            .catch(error => {
                console.log('getProductsByCategory error', error)
                return error
            })
    }
    
    const getProduct = async (id) => {
        axios.get('shop/get_product/' + id)
            .then(response => {
                product.value = response.data
            })
            .catch(error => {
                console.log('getProduct error', error)
                return error
            })
    }

    return {
        products,
        product,
        getProducts,
        getProductsByCategory,
        getProduct,
    }
}