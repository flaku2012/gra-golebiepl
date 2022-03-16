<template>
    <div>
        <h3 class="text-center">Ranking gołębi</h3>
        <hr>

        <form class="">
            <div class="form-row">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="najlepszy_lotnik_d" value="option1">
                <label class="form-check-label" for="najlepszy_lotnik_d">Najlepszy lotnik (dorosłe)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="najlepszy_lotnik_r" value="option2">
                <label class="form-check-label" for="najlepszy_lotnik_r">Najlepszy lotnik (roczne)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="najlepszy_lotnik_m" value="option3">
                <label class="form-check-label" for="najlepszy_lotnik_m">Najlepszy lotnik (młode)</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_doswiadczenia_d" value="option4">
                <label class="form-check-label" for="wg_doswiadczenia_d">wg. doświadczenia (dorosłe)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_doswiadczenia_m" value="option52">
                <label class="form-check-label" for="wg_doswiadczenia_m">wg. doświadczenia (młode)</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_potencjalu_d" value="option4">
                <label class="form-check-label" for="wg_potencjalu_d">wg. potencjału (dorosłe)</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="wg_potencjalu_m" value="option42">
                <label class="form-check-label" for="wg_potencjalu_m">wg. potencjału (młode)</label>
                </div>
            </div>
            </form>

       <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Pozycja</th>
                    <th scope="col">Gołąb</th>
                    <th scope="col">Hodowca</th>
                    <th scope="col">Suma</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Gołąb 123</router-link></td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">padlina2012</router-link></td>
                    <td>147.1455</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Gołąb 657</router-link></td>
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