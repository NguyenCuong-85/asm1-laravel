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
                            <form action="{{ route('sanphams.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Mã Sản Phẩm</label>
                                            <input type="text" name="ma_san_pham" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tên Sản Phẩm</label>
                                            <input type="text" name="ten_san_pham" class="form-control" placeholder="">

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Số Lượng Sản
                                                Phẩm</label>
                                            <input type="number" name="so_luong" class="form-control" min="0"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Giá Sản Phẩm</label>
                                            <input type="number" name="gia" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <label for="exampleFormControlInput1" class="form-label">Ảnh Sản Phẩm</label>
                                        <div class="input-group mb-3">
                                            <input type="file" accept="image/*" name="hinh_anh" class="form-control"
                                                id="inputGroupFile02" onchange="showImage(event)">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="input-group mb-3">
                                            <img id="image_san_pham" src="" alt="Lỗi"
                                                style="height: 100;display: none;">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="input-group">
                                                <span class="input-group-text">Mô tả</span>
                                                <textarea class="form-control" name="mo_ta" aria-label="With textarea"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Trạng thái</label><select
                                                class="form-control" id="exampleFormControlSelect1" name="trang_thai">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Ngày sản xuất</label>
                                            <input type="date" name="ngay_san_xuat" class="form-control"
                                                id="inputGroupFile02">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Danh Mục</label><select
                                                class="form-control" id="exampleFormControlSelect1" name="danh_muc_id">
                                                <option>--Chọn danh mục--</option>
                                                @foreach ($data as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a class="btn btn-primary" href="{{ route('sanphams.index') }}">Danh Sách Sản Phẩm</a>
                        </div>
                        </form>
                </div>
                </table>
                <div class="">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
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

    </div>
    <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
<script>
    function showImage(event) {
        const image_san_pham = document.getElementById('image_san_pham');

        const file = event.target.files[0];

        const render = new FileReader();

        render.onload = function() {
            image_san_pham.src = render.result;
            image_san_pham.style.display = 'block';
        }

        if (file) {
            render.readAsDataURL(file);
        }
    }
</script>
