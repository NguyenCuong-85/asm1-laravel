@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Chức Vụ</h1>
            </div>
            <div class="col-3">
                {{-- @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Chức Vụ</h6>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Chức Vụ</th>
                                <th>Ngày tạo</th>
                                <th>Cập nhật</th>
                                <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chuc_vus as $index => $chuc_vu)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $chuc_vu->ten_chuc_vu }}</td>
                                    <td>{{ $chuc_vu->created_at }}</td>
                                    <td>{{ $chuc_vu->updated_at }}</td>
                                    <td class="">
                                        <form action="{{ route('chucvus.destroy', $chuc_vu->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa Chức Vụ này không?')">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                        </form>
                                        <a href="{{ route('chucvus.edit', $chuc_vu->id) }}" class="btn btn-outline-warning"><i
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
