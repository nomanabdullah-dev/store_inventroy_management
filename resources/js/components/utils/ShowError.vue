<template>
    <div class="col-lg-12" v-if="isErrors">
        <div class="alert alert-danger">
            <ul>
                <li v-for="(item, index) in errors" :key="index">
                    {{ item[0] }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
    export default {
        computed: {
            ...mapGetters({
                isErrors: 'getIsErrors',
                errors: 'getErrors'
            })
        }
    }
</script>

<style lang="scss" scoped>

</style>
