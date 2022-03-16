import { onMounted, ref } from 'vue'
import axios from 'axios'

export function usePigeonHawks() {

    const pigeonHawks = ref([])
    const pigeonHawk = ref([])

    const getPigeonHawks = async () => {
        axios.get('pigeonhawks/get_user_pigeon_hawks')
            .then(response => {
                pigeonHawks.value = response.data
                //return response
            })
            .catch(error => {
                console.log('getPigeonHawks error', error)
                return error
            })
    }
    
    // 
    const getPigeonHawk = async (id) => {
        axios.get('pigeonhawks/get_user_pigeon_hawk/' + id)
            .then(response => {
                pigeonHawk.value = response.data
            })
            .catch(error => {
                console.log('getPigeonHawk error', error)
                return error
            })
    }

    onMounted( getPigeonHawks() )


    return {
        pigeonHawks,
        pigeonHawk,
        getPigeonHawks,
        getPigeonHawk
    }
}