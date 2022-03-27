import { ref } from 'vue'
import axios from 'axios'

export function useFriends() {

    const friends = ref([])
    const errorsSearchFriends = ref([])

    const getFriends = async () => {
        axios.get('friends')
            .then(response => {
                friends.value = response.data
            })
            .catch(error => {
                return error
            })
    }

    const searchFriends = async (qParse) => {
        axios.get('friends/search/', {
            params: {
                q: qParse
            }
        })
        .then(response => {
            friends.value = response.data 
            errorsSearchFriends.value = []
        })
        .catch(error => {
            errorsSearchFriends.value = error.response.data.errors.q
        })
    }

    const addToFriends = (friendId) => {
        axios.post(`/friends/add/${friendId}`)
        .then(response => {
            console.log('add to friend', response)
        })
        .catch(error => {
            console.log('cou', error)
        })
    }
    
    return {
        friends,
        errorsSearchFriends,
        getFriends,
        searchFriends,
        addToFriends
    }
}