import { ref } from 'vue'
import axios from 'axios'

export function useStorehouse() {

    const storehouseProducts = ref([])

    const getStorehouseProducts = async () => {
        axios.get('storehouse/get_storehouse')
            .then(response => {
                storehouseProducts.value = response.data
            })
            .catch(error => {
                return error
            })
    }

    const getStorehouseByCategory = async (category) => {
        axios.get('storehouse/get_storehouse_by_category/'+category)
            .then(response => {
                storehouseProducts.value = response.data
            })
            .catch(error => {
                return error
            })
    }
    
    return {
        storehouseProducts,
        getStorehouseProducts,
        getStorehouseByCategory
    }
}