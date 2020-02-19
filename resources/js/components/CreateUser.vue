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

                <!--begin::Form-->
                <form v-on:submit="saveForm()">
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            <label>Tên</label>
                            <input v-model="user.name" name="name" type="text"
                                   class="form-control" placeholder="Nhập tên...">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input v-model="user.email" name="email" type="email"
                                   class="form-control" aria-describedby="emailHelp"
                                   placeholder="Nhập email...">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mật khẩu</label>
                            <input v-model="user.password" name="password"
                                   type="password" class="form-control"
                                   id="exampleInputPassword1" placeholder="Nhập mật khẩu...">
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <router-link :to="{name: 'user-index'}" class="btn btn-secondary">Quay lại</router-link>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</template>
<script>
    export default {
        data: function () {
            return {
                userId: null,
                user: {
                    email: '',
                    name: '',
                    password: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var self = this;
                var userInfo = self.user;
                axios.post('/users/store', userInfo)
                    .then(function (resp) {
                        self.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Errors");
                    });
            }
        }
    };
</script>
