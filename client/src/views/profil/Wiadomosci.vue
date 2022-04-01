<template>
    <div>
        <h3 class="text-center">Wiadomości</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="nowa_wiadomosc" class="btn btn-success btn-sm">Nowa wiadomość</router-link>
            <router-link to="wiadomosc_grupowa" class="btn btn-success btn-sm">Wiadomość grupowa</router-link>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nadawca</th>
                <th scope="col">Temat</th>
                <th scope="col">Treść</th>
                <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="message in messages" :key="message.index">
                    <th>
                        <input class="form-check-input" type="checkbox" :value="message.id" v-model="deleteArray" name="alld_delete">
                    </th>
                    <td>
                    <router-link to="#" class="link-dark">{{message.user.name}}</router-link>
                    </td>
                    <td>{{message.thema}}</td>
                    <td>{{message.message}}</td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm" @click="deleteMsg(message.id)">Usuń</button>
                    </td>
                </tr>
            </tbody>
        </table>

            <button class="btn btn-sm btn-danger" @click="deleteSelectMessage()">Skasuj zaznaczone</button>
        
    </div>
</template>

<script setup>
    import { onMounted, ref } from 'vue'
    import { useProfileMessages } from '@/composables/profile/messages'

    const { messages, getMessages, deleteMessage } = useProfileMessages()

    const deleteArray = ref([])

    onMounted( getMessages() )

    function deleteMsg(id)
    {
        deleteMessage([id])
        getMessages()
        deleteArray.value = []
    }

    function deleteSelectMessage()
    {
        deleteMessage(deleteArray.value)
        getMessages()
        deleteArray.value = []
    }


</script>

<style>

</style>