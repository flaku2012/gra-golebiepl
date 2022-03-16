<template>
  <div>
    <h3 class="text-center">Trening</h3>
    <hr>
    <div>
        <div class="col-12">
            <div class="row">
                <div class="col-6 text-center">
                    <h6>Kosze transportowe</h6>
                    <img :src="this.$store.state.main_img_url+'systemowe/kosz_transportowy.png'" class="" alt="nie wczytano zdjęcia">
                    <p>
                        Posiadana ilość: 1 <br>
                        Pojemność: 20 gołębi
                    </p>
                </div>
                <div class="col-6 text-center">
                    <h6>Samochód</h6>
                    <img :src="this.$store.state.main_img_url+'systemowe/samochod_1.png'" class="" alt="nie wczytano zdjęcia">
                    <div>(najem)</div>
                    <p>
                        Ładowność: 10 koszy <br>
                        Cena za 1 km: 0,80 zł <br>
                        Cena najmu za 1 km: 1,20 zł
                    </p>
                    <p class="text-danger">Nie posiadasz żadnego samochodu. Wejdź w zakładkę samochód.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <h6 class="text-center">Wybierz gołębie, które chcesz trenować </h6>
                    <fieldset class="row">
                        <legend class="col-form-label col-sm-4 pt-0">Gołębnik 1 (nazwa własna) [lotowy]</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck6">
                                <label class="form-check-label text-warning" for="gridCheck6">
                                    Wszystkie z tego gołębnika (tylko premium)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck1">
                                <label class="form-check-label" for="gridCheck1">
                                    28-04-14021 [potencjał: 125 | samiec | 2 lata]
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck2">
                                <label class="form-check-label" for="gridCheck2">
                                    28-04-14214 [potencjał: 700 | samica | 2 lata]
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="row">
                        <legend class="col-form-label col-sm-4 pt-0">Gołębnik 2 (nazwa własna) [lotowy]</legend>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck5">
                                <label class="form-check-label text-warning" for="gridCheck5">
                                    Wszystkie z tego gołębnika (tylko premium)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck3">
                                <label class="form-check-label" for="gridCheck3">
                                    28-04-14214 [potencjał: 700 | samica | 2 lata]
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck4">
                                <label class="form-check-label" for="gridCheck4">
                                    28-04-14021 [potencjał: 125 | samiec | 2 lata]
                                </label>
                            </div>
                        </div>
                    </fieldset>
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