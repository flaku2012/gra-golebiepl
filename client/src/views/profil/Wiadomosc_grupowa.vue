<template>
    <div>
        <h3 class="text-center">Wiadomość grupowa</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="wiadomosci" class="btn btn-success btn-sm">Wiadomości</router-link>
        </div>
        <hr>

        <form>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Grupa odbiorców</label>
                <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="temat" class="col-sm-2 col-form-label">Temat</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="temat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tresc" class="col-sm-2 col-form-label">Treść</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="tresc" rows="4"></textarea>
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Wyślij</button>
                </div>
            </div>
        </form>
        
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>