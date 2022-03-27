import { onMounted, ref } from 'vue'
import axios from 'axios'

export default function useMarketplace() {

    const auctions = ref([])
    const auction = ref({})

    const isLoading = ref(false)

    const getAuctions = async () => {
        axios.get('marketplace')
            .then(response => {
                auctions.value = response.data
            })
            .catch(error => {
                console.log('error', error)
                return error
            })
    }
    
    const getAuction = async (id) => {
        isLoading.value = true

        axios.get('marketplace/details_auction/', {
            params: {
                auction_id: id
            }
            })
            .then(response => {
                auction.value = response.data 
                return response.data
            })
            .catch(error => {
                console.log(' error', error)
                return error
            })
            .finally(() => isLoading.value = false)
    }

    onMounted( getAuctions() )


    return {
        auctions,
        auction,
        getAuctions,
        getAuction,
        isLoading
    }
}