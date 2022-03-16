import { getCurrentInstance, ref } from "vue";

export function Zegar(timer)
{

    const czas = ref(0)
    const { emit } = getCurrentInstance()

    czas.value = timer

    if( czas.value <= 10 )
    {
        emit('czasczas', 'Test wysyłku emita3')
    }



    return { czas }

}