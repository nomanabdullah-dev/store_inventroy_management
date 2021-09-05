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
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control" name="name"
                            placeholder="Enter category name" required>
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
    export default {

    }

</script>

<style lang="scss" scoped>

</style>
