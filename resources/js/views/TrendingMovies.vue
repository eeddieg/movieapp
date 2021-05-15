<template>
    <div class="container">

        <!-- <div v-for="movie in trendingMovies" :key="movie.id">
            <div class="d-block text-center">
                <p>{{ movie.title }}</p>
                <img :src="`${imagePath + movie.poster_path}`">
                <div class="text-info text-md-center">
                    <article>{{movie.overview}}</article>
                </div>
            </div>
            <hr>
        </div> -->

        <div class="row justify-content-center pt-5">
            <h1>Trending now</h1>
        </div>

        <section class="card-group">
            <div v-for="movie in trendingMovies" :key="movie.id" class="col-4">
                <div id="movie" class="card my-3" style="max-width: 300px">
                    <div class="card-header text-md-center">{{ movie.title ? movie.title : " "}}</div>

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
        "trending-movies": {
            type: Array,
            required: true
        },
        "image-path": {
            type: String,
            required: true
        }
    }
})
export default class TrendingMovies extends Vue {}
</script>
