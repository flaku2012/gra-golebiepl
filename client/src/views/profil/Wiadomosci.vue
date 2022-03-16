<template>
    <div>
        <h3 class="text-center">Wiadomości</h3>
        <div class="btn-group" role="group" aria-label="Basic example">
            <router-link to="nowa_wiadomosc" class="btn btn-success btn-sm">Nowa wiadomość</router-link>
            <router-link to="wiadomosc_grupowa" class="btn btn-success btn-sm">Wiadomość grupowa</router-link>
        </div>
        <hr>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Temat</th>
                <th scope="col">Nadawca</th>
                <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </th>
                    <td>Witaj w nowej grze !</td>
                    <td>
                    <router-link to="#" class="link-dark">administracja</router-link>
                    </td>
                    <td>ZOBACZ USUN WIADOMOSC</td>
                </tr>
                <tr>
                    <th>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </th>
                    <td>Kupiłeś konto premium !</td>
                    <td>
                    <router-link to="#" class="link-dark">administracja</router-link>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Zobacz
                        </button>
                        ZOBACZ USUN WIADOMOSC
                    </td>
                </tr>
            </tbody>
        </table>
            <button class="btn btn-sm btn-danger">Skasuj zaznaczone</button>

            <!-- Modal ZOBACZ WIADOMOŚĆ -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kupiłeś konto premium</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Konto premium zostało aktywowane do dnia 13.12.2022 r.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zamknij</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Usuń</button>
                    </div>
                    </div>
                </div>
            </div>
            <!-- KONIEC MODAL -->
        
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>