@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Bình luận</h1>
            </div>
            <div class="col-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Bình Luận</h6>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nội dung</th>
                             
                                <th>Thời gian</th>
                                <th>Trạng thái</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Sản phẩm</th>
                                <th>Người dùng</th>
                                <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $binh_luan)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $binh_luan->noi_dung}}</td>
                                    <td>{{ $binh_luan->thoi_gian}}</td>
                                    <td>{{ $binh_luan->trang_thai}}</td>
                                    <td>{{ $binh_luan->created_at }}</td>
                                    <td>{{ $binh_luan->updated_at }}</td>
                                    <td>{{ $binh_luan->ten_san_pham}}</td>
                                    <td>{{ $binh_luan->name}}</td>
                                   
                                    <td class="">
                                        <form action="{{ route('binhluans.destroy', $binh_luan->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa Chức Vụ này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                        </form>
                                        <a href="{{ route('binhluans.edit', $binh_luan->id) }}" class="btn btn-outline-warning"><i
                                                class="fas fa-edit text-warning"></i></a>
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

    <!-- End of Page Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
@endsection
