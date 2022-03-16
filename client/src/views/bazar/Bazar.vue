<template>
  <div class="container">
    <div class="row">
        <div class="col-3" >
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>
                    Akcje do wyboru<br>
                </li>
                <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center" active-class="active" >
                    Miasto
                </router-link>
                <router-link to="/bazar/lista_ofert" class="list-group-item list-group-item-action text-center" active-class="active">
                Aktualne oferty
                </router-link>
                <router-link to="/bazar/moje_oferty" class="list-group-item list-group-item-action text-center" active-class="active">
                Moje oferty
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