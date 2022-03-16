<template>
  <div>
      <div>{{label}} : {{user.name}}</div>
      <div>{{ description }}</div>

        <button @click="submit">Submit</button>
        <hr/>
        <slot/>
  </div>
</template>

<script>
import { toRefs } from '@vue/reactivity'
import { computed } from '@vue/runtime-core'
export default {
    props: {
        label: {
            type: String,
            default: ''
        },
        user: {
            type: Object,
            default: () => {}
        }
    },

    setup(props, { emit })
    {
        const { label, user } = toRefs(props)
        const description = computed( () => {
            return `${label.value} : ${user.value.name}`
        })
        
        // onMounted(()=>{
        //     console.log(attrs)
        //     console.log(slots)
        // })

        const submit = () =>{
            emit('submit', 'init algafd hłagmarb')
        }


        return{
            description,
            submit
        }

    }

}
</script>

<style>

</style>