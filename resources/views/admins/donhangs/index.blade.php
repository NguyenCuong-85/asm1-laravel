@extends('layouts.admin')
@section('content')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="row">
            <div class="col">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>
            </div>
            <div class="col-3">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
            </div>
            </div>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Người dùng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($order as $key => $don_hang)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$don_hang->name}}</td>
                        <td>{{$don_hang->tong_tien}}</td>
                        <td>{{$don_hang->trang_thai}}</td>
                        <td>{{$don_hang->created_at}}</td>
                        <td>{{$don_hang->updated_at}}</td>  
                        <td class="">
                            <form action="{{ route('donhangs.destroy',$don_hang->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa sản phẩm này không?')">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="submit" class="btn btn-outline-danger"><i
                                            class="fas fa-trash text-danger"></i></button>
                            </form>
                            <a href="{{ route('donhangs.edit',$don_hang->id) }}" class="btn btn-outline-warning"><i
                                    class="fas fa-edit text-warning"></i></a>
                            <a href="{{ route('donhangs.show',$don_hang->id) }}"
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
</div>
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
@endsection
