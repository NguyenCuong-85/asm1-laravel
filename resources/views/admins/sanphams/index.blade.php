@extends('layouts.admin')
@section('content')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Product</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mã sản phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Ảnh Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Giá</th>
                                    {{-- <th>Mô tả</th> --}}
                                    <th>Ngày sản xuất</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Danh mục</th>
                                    <th>Trạng thái</th>
                                    <th style="text-align: center;"><i class="fas fa-fw fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                    @foreach($data as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->ma_san_pham}}</td>
                        <td>{{$item->ten_san_pham}}</td>
                        <td><img src="{{$item->hinh_anh}}" height="50" width="100" alt="Lỗi"></td>
                        <td>{{$item->so_luong}}</td>
                        <td>{{$item->gia}}</td>
                        {{-- <td>{{$item->mo_ta}}</td> --}}
                        <td>{{$item->ngay_san_xuat}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td>{{$item->ten_danh_muc}}</td>
                        <td>{{$item->trang_thai}}</td>
                        <td class="">
                            <form action="{{ route('sanphams.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có muốn xóa Danh Mục này không?')">
                                @csrf
                                @method('DELETE')
                                <div class="btn-group me-2" role="group" aria-label="First group">
                                    <button type="submit" class="btn btn-outline-danger"><i
                                            class="fas fa-trash text-danger"></i></button>
                            </form>
                            <a href="{{ route('sanphams.edit', $item->id) }}" class="btn btn-outline-warning"><i
                                    class="fas fa-edit text-warning"></i></a>
                            <a href="{{ route('sanphams.show', $item->id) }}"
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
