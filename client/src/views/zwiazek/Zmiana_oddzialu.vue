<template>
    <div>
        <h3 class="text-center">Zmiana oddziału</h3>
        <hr>

        <form class="text-center">
            <div class="form-group">
                    <label for="wybierz_nowy_oddzial">Wybierz nowy oddział:</label>
                    <select class="form-select" id="wybierz_nowy_oddzial">
                        <option value="1">01 warm-maz</option>
                        <option value="2">02 opolskie</option>
                        <option value="3">03 mazowieckie</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Koszt: 10 pkt. premium</small>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Zmień oddział</button>
        </form>
        
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>