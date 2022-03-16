<template>
    <div>
        <h3 class="text-center">Ostatnie loty</h3>
        <hr>

        <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Nazwa lotu</th>
                    <th scope="col">Dystans [km]</th>
                    <th scope="col">Wylot</th>
                    <th scope="col">Gołebie</th>
                    <th scope="col">Szczegóły</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Berlin</td>
                    <td>538</td>
                    <td>06.12.2021 r., 6:00:00</td>
                    <td>gołębie dorosłe</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Szczegóły</router-link></td>
                </tr>
                <tr>
                    <td>Toruń</td>
                    <td>135</td>
                    <td>10.12.2021 r., 6:00:00</td>
                    <td>gołębie młode</td>
                    <td><router-link to="/sekcja/szczegoly_sekcji" class="text-center">Szczegóły</router-link></td>
                </tr>
                </tbody>

            </table>
        </div>
        
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>