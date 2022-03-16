<template>
  <div>
    <h3 class="text-center">Bazar - Szczegóły oferty</h3>
    <hr>

    <table class="table table-bordered">
    <tbody>
        <tr class="text-center">
            <td colspan="3">
                <h4>Potencjał 279, samica, młodziak</h4>
            </td>
        </tr>
        <tr>
            <td>Obecność wartość: <strong>200 zł</strong></td>
            <td rowspan="4" width="50%">
                <div class="text-center">
                    <h5>Licytuj</h5>
                    <label for="kwota_licytacji" class="col-form-label text-md-right">Pieniądze:</label>
                    <input id="kwota_licytacji" type="kwota_licytacji" class="form-control" name="kwota_licytacji" v-model="email">
                    <small id="kwota_licytacji" class="form-text text-muted">
                        Dpuszczalna oferta: od 201 zł do 250 zł.
                    </small>
                    <router-link to="/bazar/szczegoly_oferty" class="btn btn-primary">Licytuj</router-link>
                    <p>
                        Krótka informacja.
                    </p>
                </div>
            </td>
        </tr>
        <tr>
            <td>Prowadzi: <strong>maciek25</strong></td>
        </tr>
        <tr>
            <td>Zakończenie aukcji: 
                <strong>za 8 minut <br>
                28.11.2021, 15:00:00
                </strong> 
            </td>
        </tr>
        <tr>
            <td>Ilość ofert: <strong>6</strong></td>
        </tr>
        <tr>
            <td colspan="2">
                <p class="text-center"><img :src="this.$store.state.main_img_url+'systemowe/golebie/bocian.jpg'" class="img-thumbnail" alt="#"></p>
                <div class="text-center">
                Potencjał: <b>256</b> <br>
                Wiek: <b>1 (roczniak)</b> <br>
                Doświadczenie: <b>20</b> <br>
                Przebyty dystans: <b>20</b> <br>
                Ukończone loty: <b>20</b> <br>
                Zdobyte konkursy: <b>20</b> <br>
                Ilość lęgów: <b>20</b> <br>
                </div>
            </td>
        </tr>
    </tbody>
    </table>
  </div>
</template>

<script>
export default {

}
</script>

<style>

</style>