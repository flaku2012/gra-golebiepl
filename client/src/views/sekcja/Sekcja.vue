<template>
<div class="container">
    <div class="row">
        <div class="col-3">
            <h4 class="text-center">Sekcja</h4>
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>Akcje do wyboru
                </li>
                <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Miasto
                </router-link>
                <router-link to="/sekcja/lista_sekcji" class="list-group-item list-group-item-action text-center">
                Lista sekcji
                </router-link>
                <router-link to="/sekcja/nowa_sekcja" class="list-group-item list-group-item-action text-center">
                Nowa sekcja
                </router-link>
                <router-link to="/sekcja/zarzadzanie_sekcja" class="list-group-item list-group-item-warning list-group-item-action text-center">
                Zarządzenie sekcją
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