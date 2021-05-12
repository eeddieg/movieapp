<template>
    <div class="col-4 p-3">
        <h1>Movie component</h1>
        <div v-for="field in movie" :key="field.id">{{ field }}</div>
        <!-- <div id="movie" class="card">
            <div class="card-header text-center">{{ $movie["title"] ?? '' }}</div>

            <div class="card-body text-xl-center ">
                <a href="/login">
                    <img src="{{ $imagePath . $movie["poster_path"] }}" alt="Poster image">
                </a>
                <article>{{ __($movie["overview"]) }}</article>
            </div>
        </div> -->
    </div>
</template>

<script lang="ts">
import { Component, Vue } from 'vue-property-decorator'
@Component({
    props: ["movie"],
})
export default class Movie extends Vue {

}
</script>
