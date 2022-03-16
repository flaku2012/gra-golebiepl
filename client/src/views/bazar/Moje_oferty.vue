<template>
  <div>
      <h3 class="text-center">Bazar - Moje oferty</h3>
    <hr>
    <div>
        <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Gołąb</th>
                    <th scope="col">Obecna wartość</th>
                    <th scope="col">Do końca</th>
                    <th scope="col">Szczegóły</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Bocian [potencjał: 200 | samica | roczniak]</td>
                    <td>10</td>
                    <td>1h 20 min</td>
                    <td><router-link to="/bazar/szczegoly_oferty" class="text-center">Sprawdź</router-link></td>
                </tr>
                <tr>
                    <td>Wyszwanc [potencjał: 125 | samiec | 2 lata]</td>
                    <td>25</td>
                    <td>0h 25 min</td>
                    <td><router-link to="/bazar/szczegoly_oferty" class="text-center">Sprawdź</router-link></td>
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