<template>
  <div>
        <h3 class="text-center">Wystaw na bazar</h3>
        <hr>
        <form class="form">
          <div class="form-group row">
            <label for="kwota_aukcji" class="col-sm-2 col-form-label">Kwota:</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="kwota_aukcji">
              <small id="passwordHelpBlock" class="form-text text-muted">
                Kwota minimalna rozpoczynająca aukcję.
              </small>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Wystaw</button>
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