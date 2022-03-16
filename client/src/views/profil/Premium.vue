<template>
    <div>
        <h3 class="text-center">Premium</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="kup_punkty_premium" class="btn btn-success btn-sm">Kup punkty premium</router-link>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                Udogodnienia z premium
            </div>
            <div class="card-body">
                <ul>
                    <li>are unaffected by this style</li>
                    <li>will still show a bullet</li>
                    <li>and have appropriate left margin</li>
                </ul>
                <h5>Posiadasz: 240 pkt</h5> 

                <hr>
                <h5>Wybierz opcję dla siebie:</h5>
                <div class="row">
                    <div class="col-6">
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="30">30 dni</option>
                            <option value="1">14 dni</option>
                            <option value="2">7 dni</option>
                            <option value="3">3 dni</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <b>Koszt: </b> 12 pkt.
                    </div>      
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-success">Przedłuż teraz</button>
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