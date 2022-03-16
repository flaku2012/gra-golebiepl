<template>
<div class="container">
    <div class="row">
        <div class="col-2" >
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>
                    Akcje do wyboru<br>
                </li>
                <router-link to="/profile/profil" class="list-group-item list-group-item-action text-center" active-class="active">
                    Profil
                </router-link>
                <router-link to="/profile/przyjaciele" class="list-group-item list-group-item-action text-center" active-class="active">
                    <i class="fas fa-user"></i>Przyjaciele
                </router-link>
                <router-link to="/profile/wiadomosci" class="list-group-item list-group-item-action text-center" active-class="active">
                    Wiadomości
                </router-link>
                <router-link to="/profile/premium" class="list-group-item list-group-item-action text-center" active-class="active">
                    Premium
                </router-link>
                <router-link to="/profile/odznaczenia" class="list-group-item list-group-item-action text-center" active-class="active">
                    Odznaczenia
                </router-link>
                <router-link to="/profile/inwentarz" class="list-group-item list-group-item-action text-center" active-class="active">
                    Inwentarz
                </router-link>
                <router-link to="/profile/zadania" class="list-group-item list-group-item-action text-center" active-class="active">
                    Zadania
                </router-link>
                <router-link to="/profile/czat" class="list-group-item list-group-item-action text-center" active-class="active">
                    Czat
                </router-link>
                <router-link to="/profile/testowywidok" class="list-group-item list-group-item-action text-center" active-class="active">
                    Testowy Widok
                </router-link>
            </div>
        </div>

        <!-- ŚRODEK -->
        <div class="col-10">
            <router-view></router-view>
        </div>
    </div>
</div>
</template>

<script>
export default {

}
</script>

<style>

</style>