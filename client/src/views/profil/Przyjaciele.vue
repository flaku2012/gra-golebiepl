<template>
    <div>
        <h3 class="text-center">Twoi przyjaciele</h3>
        <router-link to="nowy_przyjaciel" class="btn btn-success btn-sm">Dodaj przyjaciela</router-link>
        <hr>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Ranking globalny</th>
                <th scope="col">Odznaczenia</th>
                <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="friend in friends" :key="friend.id">
                    <th scope="row">{{friend.key}}</th>
                    <td>{{friend.name}}</td>
                    <td>---</td>
                    <td>---</td>
                    <td>USUN</td>
                </tr>
            </tbody>
        </table>  
    </div>
</template>

<script setup>
    import { onMounted } from 'vue'
    import { useFriends } from '@/composables/friends'

    const { friends, getFriends } = useFriends()

    onMounted( getFriends() )

</script>

<style>

</style>