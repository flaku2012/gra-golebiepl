<template>
    <div>
        <h3 class="text-center">Inwentarz</h3>
        <hr>
        
            <div class="row">
                <div class="col">
                    <div class="row row-cols-1 row-cols-md-3 g-4">
                        <div class="col"> 
                            <div class="text-center">
                                <img :src="this.$store.state.main_img_url+'systemowe/inwentarz1.jpg'" class="card-img-top img-fluid" alt="...">
                            </div> 
                        </div>
                        <div class="col">     
                                <div class="text-center">
                                    <img :src="this.$store.state.main_img_url+'systemowe/inwentarz0.jpg'" class="card-img-top img-fluid" alt="...">
                                </div>                   
                        </div>
                        <div class="col">                  
                                <div class="text-center">
                                    <img :src="this.$store.state.main_img_url+'systemowe/inwentarz0.jpg'" class="card-img-top img-fluid" alt="...">
                                </div>                
                        </div>
                    </div>
                </div>
                <div class="col">

                    <div class="card">
                        <div class="card-header text-center">
                            <strong>Asystent hodowcy</strong>
                        </div>
                        <div class="card-body text-center">
                            <p class="card-text">Asystent automatyczenie dosypie karmy i doleje wody.</p>
                            <p class="card-text">Czas trwania: 24h</p>
                            <a href="#" class="btn btn-primary">Użyj</a>
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
.card-img-top {
    width: 150px;
    height: 150px;
}

</style>
