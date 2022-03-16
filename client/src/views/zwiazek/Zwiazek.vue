<template>
<div class="container">
    <div class="row">
        <div class="col-3" >
            <h4 class="text-center">Związek</h4>
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>
                    Akcje do wyboru<br>
                </li>
                <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Miasto
                </router-link>
                <router-link to="/zwiazek/informacje_podstawowe" class="list-group-item list-group-item-action text-center" active-class="active">
                Informacje podstawowe
                </router-link>
                <router-link to="/zwiazek/lista_golebi_doroslych" class="list-group-item list-group-item-action text-center" active-class="active">
                Zgłoś liste gołębi dorosłych
                </router-link>
                <router-link to="/zwiazek/lista_golebi_mlodych" class="list-group-item list-group-item-action text-center" active-class="active">
                Zgłoś liste gołębi młodych
                </router-link>
                <router-link to="/zwiazek/najblizsze_loty" class="list-group-item list-group-item-action text-center" active-class="active">
                Najbliższe loty
                </router-link>
                <router-link to="/zwiazek/ostatnie_loty" class="list-group-item list-group-item-action text-center" active-class="active">
                Ostatnie loty
                </router-link>
                <router-link to="/zwiazek/ranking_golebi" class="list-group-item list-group-item-action text-center" active-class="active">
                Rankingi gołębi
                </router-link>
                <router-link to="/zwiazek/ranking_hodowcow" class="list-group-item list-group-item-action text-center" active-class="active">
                Rankingi hodowców
                </router-link>
                <router-link to="/zwiazek/zmiana_oddzialu" class="list-group-item list-group-item-action text-center" active-class="active">
                Zmiana oddziału
                </router-link>
            </div>
        </div>

        <!-- ŚRODEK -->
        <div class="col-9">
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