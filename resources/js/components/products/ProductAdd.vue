<template>

    <!-- form start -->
    <form @submit.prevent="submitForm" role="form" method="POST">
        <div class="row">
            <show-error></show-error>
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Create</h4>
                            <a href="" class="btn btn-outline-warning"><i class="fa fa-chevron-left"></i> Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Category Name <span class="text-danger">*</span></label>
                            <Select2 v-model="form.category_id" :options="categories"
                                :settings="{ placeholder: 'Select Category'}"></Select2>
                        </div>
                        <div class="form-group">
                            <label>Brand Name <span class="text-danger">*</span></label>
                            <Select2 v-model="form.brand_id" :options="brands"
                                :settings="{ placeholder: 'Select Brand'}"></Select2>
                        </div>
                        <div class="form-group">
                            <label>SKU <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.sku" placeholder="SKU">
                        </div>
                        <div class="form-group">
                            <label>Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.name" placeholder="Product name">
                        </div>
                        <div class="form-group">
                            <label>Image <span class="text-danger">*</span></label>
                            <input @change="selectImage" type="file" class="form-control" placeholder="Product image">
                        </div>
                        <div class="form-group">
                            <label>Cost Price($) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.cost_price"
                                placeholder="Product cost price">
                        </div>
                        <div class="form-group">
                            <label>Retail Price($) <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.retail_price"
                                placeholder="Product retail price">
                        </div>
                        <div class="form-group">
                            <label>Year <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.year"
                                placeholder="Product year [Ex: 2020]">
                        </div>
                        <div class="form-group">
                            <label>Description <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" v-model="form.desc"
                                placeholder="Product description [max:200]">
                        </div>
                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" v-model="form.status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Product Size</h4>
                        </div>
                    </div>
                    <hr>

                    <div class="row mb-1" v-for="(item, index) in form.items" :key="index">
                        <div class="col-sm-4">
                            <select class="form-control" v-model="item.size_id">
                                <option value="">Select Size</option>
                                <option v-for="(size, index) in sizes" :key="index" :value="size.id">{{ size.size }}
                                </option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" v-model="item.location" placeholder="Location">
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" v-model="item.quantity" placeholder="Quantity">
                        </div>
                        <div class="col-sm-2">
                            <button @click="deleteItem(index)" type="button" class="btn-danger btn-sm"><i
                                    class="fa fa-trash"></i></button>
                        </div>
                    </div>
                    <button @click="addItem" type="button" class="btn btn-sm btn-primary mt-2"><i
                            class="fa fa-plus"></i> Add Item</button>
                </div>
            </div>
        </div>
    </form>
    <!-- ./form end -->
</template>

<script>
    import store from '../../store'
    import * as actions from '../../store/action-types'
    import { mapGetters } from 'vuex'
    import Select2 from 'v-select2-component'
    import ShowError from '../utils/ShowError'

    export default {
        components: {
            Select2,
            ShowError
        },
        data() {
            return {
                form: {
                    category_id: 0,
                    brand_id: 0,
                    sku: '',
                    name: '',
                    image: '',
                    cost_price: 0,
                    retail_price: 0,
                    year: '',
                    desc: '',
                    status: 1,
                    items: [{
                        size_id: '',
                        location: '',
                        quantity: 0
                    }]
                }
            }
        },
        computed: {
            ...mapGetters({
                'categories': 'getCategories',
                'brands': 'getBrands',
                'sizes': 'getSizes'
            })
        },
        mounted() {
            //Get categories
            store.dispatch(actions.GET_CATEGORIES)
            //Get brands
            store.dispatch(actions.GET_BRANDS)
            //Get sizes
            store.dispatch(actions.GET_SIZES)
        },
        methods: {
            selectImage(e){
                this.form.image = e.target.files[0]
            },
            addItem() {
                let item = {
                    size_id: '',
                    location: '',
                    quantity: 0
                }
                this.form.items.push(item)
            },
            deleteItem(index) {
                this.form.items.splice(index, 1)
            },
            submitForm() {
                let data = new FormData();
                data.append('category_id', this.form.category_id)
                data.append('brand_id', this.form.brand_id)
                data.append('sku', this.form.sku)
                data.append('name', this.form.name)
                data.append('image', this.form.image)
                data.append('cost_price', this.form.cost_price)
                data.append('retail_price', this.form.retail_price)
                data.append('year', this.form.year)
                data.append('desc', this.form.desc)
                data.append('status', this.form.status)
                data.append('items', this.form.items)
                store.dispatch(actions.ADD_PRODUCT, data)
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>
