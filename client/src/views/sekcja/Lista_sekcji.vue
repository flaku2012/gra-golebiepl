<template>
  <div>
      <h3 class="text-center">Lista sekcji</h3>
    <hr>
    <div>

        <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Nazwa sekcji</th>
                    <th scope="col">Liczba członków</th>
                    <th scope="col">Wpisowe</th>
                    <th scope="col">Szczegóły</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>! Działdowo Loty !</td>
                    <td>9/10</td>
                    <td>100 zł</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Sprawdź</router-link></td>
                </tr>
                <tr>
                    <td>! PZHGP Wysoka !</td>
                    <td>8/15</td>
                    <td>brak wpisowego</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Sprawdź</router-link></td>
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