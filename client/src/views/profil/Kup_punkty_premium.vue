<template>
    <div>
        <h3 class="text-center">Kupno punktów premium</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="premium" class="btn btn-success btn-sm">Premium</router-link>
        </div>
        <hr>
        
        <div class="row">
            <div class="col-3">
                <div class="card" >
                    <img :src="this.$store.state.main_img_url+'systemowe/premium150.jpg'" class="card-img-top" alt="brak">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-primary">9,99 zł</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" >
                    <img :src="this.$store.state.main_img_url+'systemowe/premium200.jpg'" class="card-img-top" alt="brak">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-primary">14,99 zł</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" >
                    <img :src="this.$store.state.main_img_url+'systemowe/premium300.jpg'" class="card-img-top" alt="brak">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-primary">29,99 zł</a>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card" >
                    <img :src="this.$store.state.main_img_url+'systemowe/premium500.jpg'" class="card-img-top" alt="brak">
                    <div class="card-body text-center">
                        <a href="#" class="btn btn-primary">39,99 zł</a>
                    </div>
                </div>
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