<template>
  <div>
      <h1 class="text-center">CZAT</h1>
      <hr>
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <ul class="list-group">

                    <div class="position-relative">
                        <li class="list-group-item" v-for="(message, index) in messages" :key="index" >
                            {{message['message']}}
                        <!-- <small class="bagde position-absolute bottom-0 end-0" >{{message.user.name}}</small> -->
                        </li>
                    </div>
                    <input type="text" v-model="newMessage" @keyup.enter="sendMessage()" class="form-control" placeholder="Treść wiadomości...">


                </ul>
            </div>
            <div class="col-4">
                
            </div>
        </div>
       

  </div>
</template>

<script>
import { ref } from '@vue/reactivity'
import { onMounted } from '@vue/runtime-core'
import axios from 'axios'
import { useStore } from 'vuex'
export default {
    name: 'czat',
    setup()
    {

        const store = useStore();
        const logged_user = ref(store.getters['auth/user']);

        const messages = ref([])
        const newMessage = ref('')

   
        function fetchMessages(){
            axios.get('czat/messages').then(response =>{
                messages.value = response.data
            })
        }
        
        

        function sendMessage()
        {
            messages.value.push({
                user: logged_user.value,
                message: newMessage.value
            })

            axios.post('czat/messages', { 
                message: newMessage.value 
            })

            newMessage.value = ''


        }



        onMounted(() => {

            fetchMessages()

            //console.log('mounted chat.vue echo headers', window.Echo.options.auth.headers)
            console.log(window.Echo.channel('chatcourse'))
            window.Echo.private('chatcourse')
                .listen('.App\\Events\\MessageSent', (event) => {
                    messages.value.push(event.message)
                    console.log("Event: ",event.message);
            })
     
        });


        return {
            store,
            messages,
            newMessage,
            logged_user,
            fetchMessages,
            sendMessage
        }
    }

}
</script>

<style>

</style>