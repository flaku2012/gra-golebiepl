import { ref } from 'vue'
import axios from 'axios'

export function useFriends() {

    const friends = ref([])
    const errorsSearchFriends = ref([])
    const friendship = ref([])
    const hasFriendInvitation = ref(0)

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

    const getFriendship = async (friendId) => {
        axios.get('friends/friendship/', {
            params: {
                friend_id: friendId
            }
        })
        .then( response => {
            friendship.value = response.data
            return response.data
        })
        .catch( error => {
            console.log(error)
        })
    }

    const getHasFriendInvitation = async (friendId) => {
        axios.get('friends/has_friend_invitation/', {
            params: {
                friend_id: friendId
            }
        })
        .then( response => {
            hasFriendInvitation.value = response.data
        })
        .error( error => {
            console.log(error)
        })
    }
    
    return {
        friends,
        errorsSearchFriends,
        friendship,
        hasFriendInvitation,
        getFriends,
        searchFriends,
        getFriendship,
        getHasFriendInvitation
    }
}