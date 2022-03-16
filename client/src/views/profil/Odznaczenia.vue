<template>
    <div>
        <h3 class="text-center">Odznaczenia</h3>
        <hr>
        
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card mb-3 border-success">
                    <div class="row g-0">
                        <div class="col-md-3">
                        <img :src="this.$store.state.main_img_url+'systemowe/odznaczenie1.jpg'" class="rounded" alt="...">
                        </div>
                        <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Początkujący hodowca</h5>
                            <p class="card-text"><small>Badź w posiadaniu conajmniej 5 gołębi.</small></p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3 border-success">
                    <div class="row g-0">
                        <div class="col-md-3">
                        <img :src="this.$store.state.main_img_url+'systemowe/odznaczenie1.jpg'" class="rounded" alt="...">
                        </div>
                        <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Raczkujący hodowca</h5>
                            <p class="card-text"><small>Bądź w posiadaniu conajmniej 15 gołębi.</small></p>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-light mb-3 border-danger">
                    <div class="row g-0">
                        <div class="col-md-3">
                        <img :src="this.$store.state.main_img_url+'systemowe/odznaczenie1.jpg'" class="rounded" alt="...">
                        </div>
                        <div class="col-md-9">
                        <div class="card-body">
                            <h5 class="card-title">Dośwadczony hodowca</h5>
                            <p class="card-text"><small>Bądź w posiadaniu conajmniej 50 gołębi.</small></p>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="50">25 szt.</div>
                            </div>
                        </div>
                        </div>
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