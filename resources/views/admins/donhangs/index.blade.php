@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Order</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Order List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>ID-{{$item->user_id}}: {{ $item->ten_nguoi_nhan }}</td>
                                    <td>{{ $item->email_nguoi_nhan }}</td>
                                    <td>{{ $item->so_dien_thoai_nguoi_nhan }}</td>
                                    <td>{{ $item->dia_chi_nguoi_nhan }}</td>
                                    <td>{{ $item->ghi_chu }}</td>
                                    <td>{{ $item->phuong_thuc_thanh_toan }}</td>
                                    <td>{{ $item->tong_tien }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>{{ $item->trang_thai }}</td>
                                    <td class="">
                                        <form action="" method="POST"
                                            onsubmit="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                        </form>
                                        <a href=""
                                            class="btn btn-outline-warning"><i class="fas fa-edit text-warning"></i></a>
                                        <a href="" class="btn btn-outline-info"><i
                                                class="fas fa-info text-info"></i></a>
                                                <a href="" class="btn btn-outline-success"><i class="fas fa-fw fa-cog"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
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
    </div>
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
