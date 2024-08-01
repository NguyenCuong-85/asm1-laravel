@extends('clients.thongTinNguoiDung')
@section('info')
<div class="tab-pane fade show active">
<div class="cart-section">
    <table class="table-bordered">
        <tbody>
            <tr class="table-row table-top-row">
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">#</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Người Nhận</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Địa Chỉ</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">PTTT</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Tổng Tiền</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Ghi Chú</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Ngày đặt</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">Trạng Thái</h5>
                    </div>
                </td>
                <td class="table-wrapper wrapper-total">
                    <div class="table-wrapper-center">
                        <h5 class="table-heading">ACTION</h5>
                    </div>
                </td>
            </tr>
            @foreach ($don_hangs as $key => $item)
                <tr class="table-row ticket-row">
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <p>{{ $key + 1 }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper">
                            <p>{{ $item->ten_nguoi_nhan }}</p>
                            <p>SDT:{{ $item->so_dien_thoai_nguoi_nhan }}</p>
                            {{-- <p>Gmail:{{ $item->email_nguoi_nhan }}</p> --}}
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper">
                            <p>{{ $item->dia_chi_nguoi_nhan }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <p>{{ $item->phuong_thuc_thanh_toan }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <p>{{ $item->tong_tien }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper">
                            <p>{{ $item->ghi_chu ?: 'Trống' }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <p>{{ $item->created_at }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper">
                            <p>{{ $item->trang_thai }}</p>
                        </div>
                    </td>
                    <td class="table-wrapper">
                        <div class="table-wrapper-center">
                            <a href="{{route('chiTietDonHang',$item->id)}}" class="btn shop-btn">Chi Tiết</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection