@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm Đơn Hàng</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class="col-sm-8">
                            <form action="{{ route('donhangs.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect3">Người dùng</label><select
                                                class="form-control @error('title') is-invalid @enderror"
                                                id="exampleFormControlSelect3" name="user_id">
                                                <option>--Chọn người dùng--</option>
                                                @foreach ($data as $don_hang)
                                                    <option value="{{ $don_hang->id }}">{{ $don_hang->name }}</option>
                                                @endforeach
    
                                            </select>
                                            @error('user_id')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Tổng tiền</label>
                                            <input type="number" name="tong_tien"
                                                class="form-control @error('tong_tien') is-invalid @enderror"
                                                placeholder="">
                                            @error('tong_tien')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Trạng thái</label><select
                                                class="form-control @error('trang_thai') is-invalid @enderror"
                                                id="exampleFormControlSelect1" name="trang_thai">
                                                <option value="" >--Chọn trạng thái</option>
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                            @error('trang_thai')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a class="btn btn-primary" href="{{ route('donhangs.index') }}">Danh Sách Đơn hàng</a>
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
