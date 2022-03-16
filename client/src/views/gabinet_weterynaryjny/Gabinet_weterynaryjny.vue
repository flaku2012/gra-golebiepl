<template>
    <div>
        <div class="row">
            <div class="col-3" >
                <div class="list-group text-center">
                    <li class="list-group-item list-group-item-info text-center">
                        <i class="bi bi-arrow-90deg-down"></i>
                        Akcje do wyboru<br>
                    </li>
                    <router-link to="/dashboard" class="list-group-item list-group-item-success list-group-item-action text-center">
                    Hodowla
                    </router-link>
                    <router-link to="/gabinet_weterynaryjny/informacje_podstawowe" class="list-group-item list-group-item-action text-center" active-class="active">
                    Gabinet
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