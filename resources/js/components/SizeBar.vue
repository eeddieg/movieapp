<template>
    <div class="container d-flex justify-content-center">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mx-4 px-4" type="button" id="poster-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Backdrop sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="poster-sizes">
                <button v-for="item in imageSizes.backdrop_sizes" :key="item" class="dropdown-item" type="button">
                    <option>{{ item }}</option>
                </button>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mx-4 px-4" type="button" id="logo-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Logo sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="logo-sizes">
                <button v-for="item in imageSizes.logo_sizes" :key="item" class="dropdown-item" type="button">
                    <option>{{ item }}</option>
                </button>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" mx-4 px-4 type="button" id="poster-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Poster sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="poster-sizes">
                <button v-for="item in imageSizes.poster_sizes" :key="item" class="dropdown-item" type="button">
                    <option>{{ item }}</option>
                </button>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mx-4 px-4" type="button" id="profile-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Profile sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="profile-sizes">
                <button v-for="item in imageSizes.profile_sizes" :key="item" class="dropdown-item" type="button">
                    <option>{{ item }}</option>
                </button>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle mx-4 px-4" type="button" id="still-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Still sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="still-sizes">
                <button v-for="item in imageSizes.still_sizes" :key="item" class="dropdown-item" type="button">
                    <option>{{ item }}</option>
                </button>
            </div>
        </div>
    </div>
</template>

<script lang="ts">
import { Component, Vue } from "vue-property-decorator";
@Component({
    props:{
        "image-sizes":{
            type: Object,
            required: true
        },
    }
})
export default  class SizeBar extends Vue {

}
</script>
