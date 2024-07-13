@extends('layouts.admin')
@section('content')
    <!-- End of Topbar -->
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Page Heading -->
            <div class="col">
                <h1 class="h3 mb-2 text-gray-800">Danh Mục</h1>
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

            <h6 class="m-0 font-weight-bold text-primary">Danh Sách Danh Mục</h6>


            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Danh Mục</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                                <th>Cập nhật</th>
                                <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($danh_mucs as $key => $danh_muc)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $danh_muc->ten_danh_muc }}</td>
                                    <td>{{ $danh_muc->trang_thai }}</td>
                                    <td>{{ $danh_muc->created_at }}</td>
                                    <td>{{ $danh_muc->updated_at }}</td>
                                    <td class="">
                                        <form action="{{ route('danhmucs.destroy', $danh_muc->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="btn-group me-2" role="group" aria-label="First group">
                                                <button type="submit" class="btn btn-outline-danger"><i
                                                        class="fas fa-trash text-danger"></i></button>
                                        </form>
                                        <button type="button" class="btn btn-outline-warning"><i
                                                class="fas fa-edit text-warning"></i></button>
                                        <a href="{{ route('danhmucs.show', $danh_muc->id) }}"
                                            class="btn btn-outline-info"><i class="fas fa-info text-info"></i></a>

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
