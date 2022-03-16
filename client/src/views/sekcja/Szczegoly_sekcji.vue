<template>
  <div>
      <h3 class="text-center">Szczegóły sekcji</h3>
    <hr>
    <div>

        <h3 class="text-center">! Działdowo Loty !</h3>
        <hr>

        <div class="row">
            <div class="col-6">
                Ilość członków: <b>9/10</b> <br>
                Wpisowe: <b>100 zł</b> <br>
                Właścicel: <b>admin</b> <br>
                Członkowie:
                <ol>
                    <li><router-link to="/profil" class="text-center">flaku2012</router-link></li>
                    <li><router-link to="/profil" class="text-center">padlina2012</router-link></li>
                    <li><router-link to="/profil" class="text-center">zuber13</router-link></li>
                </ol>
                <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Opis sekcji</h4>
                <p class="text-justify">Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
                </div>
            </div>
            <div class="col-6">
                <p class="text-center">Wpisowe: 100 zł</p>
                <div class="text-center">
                <div class="form-group">
                        <label for="opis_wniosku">Złoż wniosek o przyjęcia</label>
                        <textarea type="text" class="form-control" rows="2" id="opis_wniosku" placeholder="Opisz wniosek"></textarea>
                        <small id="opis_wniosku" class="form-text text-muted">Informacja dodatkowa.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Złoż wniosek</button>
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