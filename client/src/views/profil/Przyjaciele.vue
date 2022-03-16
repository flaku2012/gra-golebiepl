<template>
    <div>
        <h3 class="text-center">Twoi przyjaciele</h3>
        <router-link to="nowy_przyjaciel" class="btn btn-success btn-sm">Dodaj przyjaciela</router-link>
        <hr>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Lp.</th>
                <th scope="col">Nazwa</th>
                <th scope="col">Ranking globalny</th>
                <th scope="col">Odznaczenia</th>
                <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>flaq2015</td>
                <td>2</td>
                <td>2</td>
                <td>USUN</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>padlina2012</td>
                <td>32</td>
                <td>40</td>
                <td>USUN</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>wiesiek2022</td>
                <td>134</td>
                <td>10</td>
                <td>USUN</td>
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