<template>
  <div>
        <h3 class="text-center">Szukaj przyjaciela</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="przyjaciele" class="btn btn-success btn-sm">Przyjaciele</router-link>
        </div>
        <hr>
        <form @submit.prevent="submit">
            <div class="mb-3 row">
                <label for="search_user_name" class="col-sm-2 col-form-label">Nazwa użytkownika</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="search_user_name" v-model="searchQuery">
                <p class="text-danger" v-if="errorsSearchFriends">{{errorsSearchFriends[0]}}</p>
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </div>
        </form>
        <hr>
        <table class="table" v-if="friends != ''">
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
                    <td>
                        || {{friend}} ||
                        <form>
                            <button type="submit">Zaproś do znajomych</button>
                        </form>
                        <form>
                            <button type="submit">Przyjmij zaproszenie</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="text-info text-center" v-else>Brak wyników wyszukiwania!</p>
        ||  ||

  </div>
</template>

<script setup>
    import { ref } from "vue";
    import { useFriends } from '@/composables/friends'

    const { friends, errorsSearchFriends, getFriendship, searchFriends } = useFriends()
    const searchQuery = ref('')

    async function submit()
    {
        searchFriends(searchQuery.value)
    }

    console.log(getFriendship(2))
    


</script>

<style>

</style>