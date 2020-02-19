<template>
    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Quản lý người dùng
                        </h3>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <router-link :to="{name: 'label.create'}" class="btn btn-success">Thêm mới</router-link>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NO.</th>
                                <th>User name</th>
                                <th>Email</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user, index in users">
                                    <td v-text="++index"></td>
                                    <td v-text="user.name"></td>
                                    <td v-text="user.email"></td>
                                    <td v-text="user.created_at"></td>
                                    <td>
                                        <router-link :to="{name: 'user-edit', params: {id: user.id}}" class="btn btn-xs btn-primary">
                                            Sửa
                                        </router-link>
                                        <button
                                           class="btn btn-xs btn-danger"
                                           v-on:click="deleteItem(user.id, index)">
                                            Xóa
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                users: []
            }
        },
        mounted() {
            var self = this;
            axios.get('/users/load-data-items')
                .then(function (resp) {
                    self.users = resp.data;
                })
                .catch(function (resp) {
                    alert("Lỗi khi load dữ liệu");
                });
        },
        methods: {
            deleteItem(id, index) {
                var self = this;
                event.preventDefault();

                event.preventDefault();
                if (confirm("Bạn có chắc muốn xóa người dùng này?")) {
                    var self = this;
                    axios.post('/users/delete',{id:id})
                        .then(function (resp) {
                            // self.users.splice(--index, 1);
                            self.users = resp.data;
                        })
                        .catch(function (resp) {
                            alert("Xảy ra lỗi!");
                        });
                }
            }
        }
    };
</script>
