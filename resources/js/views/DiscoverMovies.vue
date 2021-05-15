<template>
    <div class="container">

        <div class="row justify-content-center pt-5 ">
            <h1>Discover now</h1>
        </div>

    <div>
        <size-bar-inside :poster-sizes="posterSizes"></size-bar-inside>
    </div>

    <section class="card-group">
        <div v-for="movie in discoverMovies" :key="movie.id" class="col-4" style="max-width: 300px">
            <div id="movie" class="card my-3" style="max-width: 300px">
                <div class="card-header text-md-center">{{ movie.title }}</div>

                <div class="card-body text-xl-center ">
                    <a href="/login">
                        <img class="img-thumbnail" :src="`${imagePath + movie.poster_path}`">
                    </a>
                    <article>{{movie.overview}}</article>
                </div>
            </div>
        </div>
    </section>


    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'

@Component({
    props: {
        "discover-movies": {
            type: Array,
            required: true
        },
        "image-path": {
            type: String,
            required: true
        },
        // "backdrop-sizes": {
        //     type: Array,
        //     required: true
        // },
        // "logo-sizes": {
        //     type: Array,
        //     required: true
        // },
        "poster-sizes": {
            type: Array,
            required: true
        },
        // "profile-sizes": {
        //     type: Array,
        //     required: true
        // },
        // "still-sizes": {
        //     type: Array,
        //     required: true
        // },
    }
})
export default class DiscoverMovies extends Vue {}
</script>
