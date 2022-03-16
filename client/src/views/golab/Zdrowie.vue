<template>
  <div>
        <h3 class="text-center">Zdrowie</h3>
        <hr>
        <div class="alert alert-success text-center" role="alert">
          Twój gołąb nie jest chory.
        </div>
        <div class="alert alert-danger text-center" role="alert">
          <h4 class="alert-heading">Niedobrze, twój gołąb jest chory!</h4>
          <p>Czym prędzej udaj się do weteryniarza, który pomoże zdiagnozować co mu dolega, klikając poniższy przycisk!</p>
          <hr>
          <p class="mb-0">
            <button class="btn btn-warning">Diagnozuj</button>
          </p>
        </div>
        <h5>Lista zdiagnozowanych chorób:</h5>
        <p>
          <a class="btn btn-outline-danger" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
            Kokcydioza [choroba: pasożytnicza]
          </a>
        </p>
        <div class="collapse" id="collapseExample">
          <div class="card card-body">
            <p>Zwana inaczej krwawą biegunką gołębi. Wywołana przez pierwotniaki, a zarażenie następuje przez przewód pokarmowy.</p>
            <p><b>Leczenie:</b> podaj lek o nazwie</p>
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