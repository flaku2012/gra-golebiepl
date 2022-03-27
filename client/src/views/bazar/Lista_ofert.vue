<template>
  <div>
      <h3 class="text-center">Bazar - Lista ofert</h3>
    <hr>
    <div>

        <div class="table-responsive text-center">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">Gołąb</th>
                    <th scope="col">Obecna wartość</th>
                    <th scope="col">Cena Kup Teraz</th>
                    <th scope="col">Do końca</th>
                    <th scope="col">Szczegóły</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="auction in auctions" :key="auction.id">
                    <td>{{auction.pigeon.name}} [potencjał: {{auction.pigeon.level_potential}} | {{auction.pigeon.sex === 'f' ? 'samica' : 'samiec'}} | {{auction.pigeon.age}} dni]</td>
                    <td>{{auction.current_price}} zł</td>
                    <td>{{auction.buy_now_price}} zł</td>
                    <td>{{auction.end_time_auction}}</td>
                    <td><router-link :to="{ name: 'Bazar_Szczegoly_oferty', params: { id: auction.id } }">Zobacz!!</router-link></td>
                    <td><router-link :to="'szczegoly_oferty/'+auction.id" class="text-center">Podgląd</router-link></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>
  </div>
</template>

<script setup>
    import { onMounted } from "vue";
    import useMarketplace from '@/composables/marketplace'

    const { auctions, getAuctions } = useMarketplace()
    
    onMounted( getAuctions() )


</script>

<style>

</style>