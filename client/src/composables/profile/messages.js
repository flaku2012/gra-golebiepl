import { ref } from 'vue'
import axios from 'axios'

export function useProfileMessages() {

    const messages = ref([])

    const getMessages = async () => {
        axios.get('messages/')
            .then(response => {
                messages.value = response.data
            })
            .catch(error => {
                return error
            })
    }

    const deleteMessage = async (arrayId) => {
        axios.delete('messages/', {
            params: {
                id: arrayId
            }
        })
    }

    return {
        messages,
        getMessages,
        deleteMessage
    }
}