@extends('layouts.admin')
@section('content')
<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <div class="col-sm-8">
                        <form action="<?= route('category/creat') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Tên Danh Mục</label>
                                        <input type="text" name="category_name" class="form-control" placeholder="abc">
                                        <p style="color: red;"><?= $mess['category_name']['required'] ?? "" ?><?= $mess['category_name']['min'] ?? "" ?></p>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Trạng Thái</label>
                                        <input type="text" name="status" class="form-control" min="0" placeholder="">
                                        <p style="color: red;"><?= $mess['status']['required'] ?? "" ?><?= $mess['status']['min'] ?? "" ?></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a class="btn btn-primary" href="<?= route('categoryList') ?>">Danh Sách Danh Mục</a>
                                <p style="color: red;"><?= $mess['success'] ?? "" ?></p>
                            </div>
                        </form>
                    </div>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection