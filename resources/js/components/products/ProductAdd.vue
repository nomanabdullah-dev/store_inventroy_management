<template>
    <div>
        <div class="card card-primary">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="display: inline; margin:0">Create</h4>
                    <a href="" class="btn btn-outline-warning"><i
                            class="fa fa-chevron-left"></i> Back</a>
                </div>
            </div>
            <!-- form start -->
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <Select2 v-model="form.category_id" :options="categories" :settings="{ placeholder: 'Select Category'}"></Select2>
                    </div>
                    <div class="form-group">
                        <label>Brand Name</label>
                        <Select2 v-model="form.brand_id" :options="brands" :settings="{ placeholder: 'Select Brand'}"></Select2>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                </div>
            </form>
            <!-- ./form end -->
        </div>
    </div>
</template>

<script>
import store from '../../store'
import * as actions from '../../store/action-types'
import { mapGetters } from 'vuex'
import Select2 from 'v-select2-component'

    export default {
        components: {Select2},
        data() {
            return {
                form : {
                    category_id : 0,
                    brand_id : 0,
                }
            }
        },
        computed: {
            ...mapGetters({
                'categories' : 'getCategories',
                'brands' : 'getBrands'
            })
        },
        mounted() {
            //Get categories
            store.dispatch(actions.GET_CATEGORIES)
            //Get brands
            store.dispatch(actions.GET_BRANDS)
        }
    }

</script>

<style lang="scss" scoped>

</style>
