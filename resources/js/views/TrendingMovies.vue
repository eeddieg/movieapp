<template>
    <div class="col-12 p-3">
        <h1>Trending movies</h1>


        <div v-for="movie in trendingMovies" :key="movie.id">
            <div class="d-block text-center">
                <p>{{ movie.title }}</p>
                <img :src="`${imagePath + movie.poster_path}`">
                <div class="text-info text-md-center">
                    <article>{{movie.overview}}</article>
                </div>
            </div>
            <hr>
        </div>




    </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator'

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
export default class TrendingMovies extends Vue {

    //@Prop({ required: true }) readonly trendingMovies: any;

}
</script>
