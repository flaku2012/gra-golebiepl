<template>
  <div>
      <h3 class="text-center">Zarządzenie sekcją</h3>
    <hr>
    <div>
      <div>
          <router-link to="/sekcja/zarzadzanie_sekcja" class="btn btn-success">Wiadomość grupowa</router-link>
      </div>
      <hr>

      <div>
        <form class="form">
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Widoczność:</label>
          <div class="col-sm-10">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="customSwitch1">
              <label class="custom-control-label" for="customSwitch1">Czy twoja sekcja ma być widoczna w wyszukiwarce sekcji?</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Zmiana nazwy sekcji:</label>
          <div class="col-sm-9">
            <input type="password" class="form-control" id="inputPassword">
            <small id="passwordHelpBlock" class="form-text text-muted">
              Koszt: 100 zł.
            </small>
          </div>
          <div class="col-sm-1">
            <button class="btn btn-success">Zapisz</button>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Opis sekcji:</label>
          <div class="col-sm-9">
            <textarea type="password" class="form-control" id="inputPassword" placeholder="Tu wpisz opis swojej sekcji." rows="4"></textarea>
          </div>
          <div class="col-sm-1">
            <button class="btn btn-success">Zapisz</button>
          </div>
        </div>
        <div class="form-group row">
          <label for="staticEmail" class="col-sm-2 col-form-label">Czesne:</label>
          <div class="col-sm-10">
            <div class="custom-control custom-switch">
              <input type="checkbox" class="custom-control-input" id="czesne">
              <label class="custom-control-label" for="czesne">Czy w twojej sekcji należy płacić cotygodniowe czesne?</label>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-2 col-form-label">Wysokość czesnego:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword" placeholder="Wysokość czesne w złotówkach.">
          </div>
        </div>
        </form>
      </div>

      <hr>
      <h4 class="text-center">Członkowie</h4>
      <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Lp.</th>
                    <th scope="col">Członek</th>
                    <th scope="col">Profil</th>
                    <th scope="col">Usuń z sekcji</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>flaku2012</td>
                    <td width="10%"><router-link to="/sekcja/zarzadzanie_sekcja" class="text-center">Profil</router-link></td>
                    <td width="15%"><router-link to="/sekcja/zarzadzanie_sekcja" class="text-center">Usuń</router-link></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>padlina2012</td>
                    <td width="10%"><router-link to="/sekcja/zarzadzanie_sekcja" class="text-center">Profil</router-link></td>
                    <td width="15%"><router-link to="/sekcja/zarzadzanie_sekcja" class="text-center">Usuń</router-link></td>
                </tr>
                </tbody>

            </table>
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