import { ref } from 'vue'
import axios from 'axios'

export function usePigeons() {

    const pigeons = ref([])
    const pigeon = ref([])
    const pigeonParentMother = ref([])
    const pigeonParentFather = ref([])
    const pigeonPartner = ref([])

    const getPigeons = async (id) => {
        axios.get('pigeon/get_user_pigeons/'+id)
            .then(response => {
                pigeons.value = response.data
                //return response
            })
            .catch(error => {
                console.log('getPigeons error', error)
                return error
            })
    }
    
    
    const getPigeon = async (id) => {
        axios.get('pigeon/get_user_pigeon/' + id)
            .then(response => {
                pigeon.value = response.data
            })
            .catch(error => {
                console.log('getPigeon error', error)
                return error
            })
    }

    const getPigeonParent = async (id) => {
        axios.get('pigeon/get_pigeon_parents/' + id)
        .then(response => {
            pigeonParentMother.value = response.data.parent_mother
            pigeonParentFather.value = response.data.parent_father
        })
        .catch(error => {
            console.log('getPigeonParent error', error)
            return error
        })
    }

    const getPigeonPartner = async (id) => {
        axios.get('pigeon/get_pigeon_partner/' + id)
        .then(response => {
            pigeonPartner.value = response.data
        })
        .catch(error => {
            console.log('getPigeonPartner error', error)
            return error
        })
    }


    return {
        pigeons,
        pigeon,
        pigeonParentMother,
        pigeonParentFather,
        pigeonPartner,
        getPigeons,
        getPigeon,
        getPigeonParent,
        getPigeonPartner
    }
}