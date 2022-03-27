<template>
    <div>
        <div class="container">

            <div class="row row-cols-4">
        
                <div class="card border shadow-0" v-for="pigeonHawk in pigeonHawks" :key="pigeonHawk.id" >
                    <router-link :to="{ name: 'Golebnik', params: { id: pigeonHawk.id } }">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <img src="https://mdbootstrap.com/img/new/standard/nature/111.jpg" class="img-fluid" />
                        <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                        </a>
                    </div>
                    </router-link>
                    <div class="card-body text-center">
                            <h5 class="card-title">{{ pigeonHawk.name }}<br><small><span class="badge bg-secondary">{{pigeonHawk.type}}</span></small></h5>
                            <div class="card-text">
                                <b>Poziom czystości:</b>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_clean + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_clean}} %
                                    </div>
                                </div>
                                <b>Poziom karmika:</b>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_food + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_food}} %
                                    </div>
                                </div>
                                <b>Poziom poideł:</b>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" :style="{width: (pigeonHawk.level_water/pigeonHawk.max_level_water)*100 + '%'}" aria-valuemin="0" aria-valuemax="5">{{((pigeonHawk.level_water/pigeonHawk.max_level_water)*100).toFixed(0)}} % z {{pigeonHawk.max_level_water}} l
                                    </div>
                                </div>
                                <b>Poziom grytownika:</b>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" :style="{width: pigeonHawk.level_grit + '%'}" aria-valuemin="0" aria-valuemax="100">{{pigeonHawk.level_grit}} %
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>                      
            </div>

        </div>

    </div>
</template>

<script setup>
    import { usePigeonHawks } from '@/composables/pigeonhawks'

    const { pigeonHawks } = usePigeonHawks()



</script>


