@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order Detail</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tổng quan đơn hàng</h6>
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>Tên Người Nhận</th>
                                <th>Email User</th>
                                <th>SDT</th>
                                <th>Địa Chỉ</th>
                                <th>Ghi Chú</th>
                                <th>PTTT</th>
                                <th>Tổng tiền</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Trạng Thái</th>
                                <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $donhang->id }}</td>
                                <td>ID-{{ $donhang->user_id }}: {{ $donhang->ten_nguoi_nhan }}</td>
                                <td>{{ $donhang->email_nguoi_nhan }}</td>
                                <td>{{ $donhang->so_dien_thoai_nguoi_nhan }}</td>
                                <td>{{ $donhang->dia_chi_nguoi_nhan }}</td>
                                <td>{{ $donhang->ghi_chu }}</td>
                                <td>{{ $donhang->phuong_thuc_thanh_toan }}</td>
                                <td>{{ $donhang->tong_tien }}</td>
                                <td>{{ $donhang->created_at }}</td>
                                <td>{{ $donhang->updated_at }}</td>
                                <td>{{ $donhang->trang_thai }}</td>
                                <td class="">
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"
                                            aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('donhangs.update', $donhang) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input class="dropdown-item" type="submit" name="trang_thai" value="đã hủy" id="">
                                            </form>
                                            <form action="{{ route('donhangs.update', $donhang) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input class="dropdown-item" type="submit" name="trang_thai" value="đang vận chuyển"
                                                    id="">
                                            </form>
                                            <form action="{{ route('donhangs.destroy', $donhang) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input class="dropdown-item" type="submit" value="Xóa"
                                                    id="">
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Order Detail</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Hình Ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành Tiền</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($san_phams as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->ten_san_pham }}</td>
                                            <td><img src="{{ Storage::url($item->hinh_anh) }}" width="100"
                                                    alt="IMG"></td>
                                            <td>{{ $item->gia_ctdh }}</td>
                                            <td>{{ $item->so_luong_ctdh }}</td>
                                            <td>{{ $item->thanh_tien }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
            </div>
            <!-- End of Page Wrapper -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        @endsection
