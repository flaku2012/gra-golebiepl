<template>
    <div>
        <h3 class="text-center">Ranking hodowców</h3>
        <hr>

        <form class="">
            <div class="form-row">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_pkt_mlode" value="option1">
                <label class="form-check-label" for="wg_pkt_mlode">wg. punktów (młode)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_pkt_dorosle" value="option2">
                <label class="form-check-label" for="wg_pkt_dorosle">wg. punktów (dorosłe)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="form_obraczki" value="option2">
                <label class="form-check-label" for="form_obraczki">Najlepszy lotnik (młode)</label>
                </div>
            </div>
            </form>

       <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Pozycja</th>
                    <th scope="col">Hodowca</th>
                    <th scope="col">Suma</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">padlina2012</router-link></td>
                    <td>147.1455</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">zuber13</router-link></td>
                    <td>34.675</td>
                </tr>
                </tbody>

            </table>
        </div> 
        
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>