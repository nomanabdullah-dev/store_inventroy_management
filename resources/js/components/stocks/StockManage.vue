<template>

    <!-- form start -->
    <form @submit.prevent="submitForm" role="form" method="POST">
        <div class="row">
            <show-error></show-error>
            <div class="col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 style="display: inline; margin:0">Product  Manage</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Product <span class="text-danger">*</span></label>
                            <Select2 @change="selectedProduct" v-model="form.product_id" :options="products"
                                :settings="{ placeholder: 'Select Product'}"></Select2>
                        </div>
                        <div class="form-group">
                            <label>Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" v-model="form.date">
                        </div>
                        <div class="form-group">
                            <label>Stock Type <span class="text-danger">*</span></label>
                            <select v-model="form.stock_type" class="form-control">
                                <option value="in">In</option>
                                <option value="out">Out</option>
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
                    <div class="card-body">
                        <table class="table table-sm">
                            <tr v-for="(item, index) in form.items" :key="index">
                                <td>{{ item.size }}</td>
                                <td>
                                    <input v-model="item.quantity" class="form-control">
                                </td>
                            </tr>
                        </table>
                    </div>
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
                    data: '',
                    stock_type: 'in',
                    product_id: '',
                    items: []
                }
            }
        },
        computed: {
            ...mapGetters({
                'products': 'getProducts'
            })
        },
        mounted() {
            //Get products
            store.dispatch(actions.GET_PRODUCTS)
        },
        methods: {
            selectedProduct(id){
                this.form.items = []
                let product = this.products.filter(product=>product.id == id)

                product[0].product_stocks.map(stock=>{
                    let item = {
                        size: stock.size.size,
                        size_id: stock.size_id,
                        quantity: ''
                    }
                    this.form.items.push(item)
                })
            },
            submitForm(){
                store.dispatch(actions.SUBMIT_STOCK, this.form)
            }
        }
    }

</script>

<style lang="scss" scoped>

</style>
