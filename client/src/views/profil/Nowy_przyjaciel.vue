<template>
  <div>
        <h3 class="text-center">Szukaj przyjaciela</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="przyjaciele" class="btn btn-success btn-sm">Przyjaciele</router-link>
        </div>
        <hr>
        <form>
            <div class="mb-3 row">
                <label for="temat" class="col-sm-2 col-form-label">Nazwa użytkownika</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="temat">
                </div>
            </div>
            <div class="form-group row text-center">
                <div class="col-sm-12">
                <button type="submit" class="btn btn-primary">Szukaj</button>
                </div>
            </div>
        </form>
        <br>
        <div class="alert alert-danger" role="alert">
            Nie znaleziono takiego użytkownika!
        </div>
        <div class="alert alert-success" role="alert">
            Znalazłeś swojego przyjaciela.
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                <td>flaq2015</td>
                <td>DODAJ</td>
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