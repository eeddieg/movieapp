<template>
    <div class="container d-block">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="poster-sizes" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Poster sizes
            </button>
            <div class="dropdown-menu" aria-labelledby="poster-sizes">
                <button v-for="item in posterSizes" :key="item" class="dropdown-item" type="button">
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
        "poster-sizes":{
            type: Array,
            required: true
        }
    }
})
export default  class SizeBar extends Vue {

}
</script>
