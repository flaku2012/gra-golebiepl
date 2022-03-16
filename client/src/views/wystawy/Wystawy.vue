<template>
<div class="container">
    <div class="row">
        <div class="col-3">
            <h4 class="text-center">Wystawy</h4>
            <div class="list-group text-center">
                <li class="list-group-item list-group-item-info text-center">
                    <i class="bi bi-arrow-90deg-down"></i>
                    Akcje do wyboru<br>
                </li>
                <router-link to="/miasto" class="list-group-item list-group-item-secondary list-group-item-action text-center">
                Miasto
                </router-link>
                <router-link to="/wystawy/informacje_podstawowe" class="list-group-item list-group-item-action text-center" active-class="active">
                Informacje podstawowe
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

</script>

<style scoped>

</style>