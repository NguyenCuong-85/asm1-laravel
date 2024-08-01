@extends('clients.thongTinNguoiDung')
@section('info')
    <div class="cart-section text-center mb-5">
        <div class="blog-heading about-heading">
            <h1 class="heading">Chi Tiết Đơn Hàng</h1>
        </div>
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    </div>
    <div class="tab-pane fade show active">
        <div class="cart-section">
            <table class="table-bordered">
                <tbody>
                    <tr class="table-row table-top-row">
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
                    <tr class="table-row ticket-row">
                        <td class="table-wrapper">
                            <div class="table-wrapper">
                                <p>{{ $don_hang->ten_nguoi_nhan }}</p>
                                <p>SDT:{{ $don_hang->so_dien_thoai_nguoi_nhan }}</p>
                                {{-- <p>Gmail:{{ $don_hang->email_nguoi_nhan }}</p> --}}
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper">
                                <p>{{ $don_hang->dia_chi_nguoi_nhan }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <p>{{ $don_hang->phuong_thuc_thanh_toan }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <p>{{ $don_hang->tong_tien }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper">
                                <p>{{ $don_hang->ghi_chu ?: 'Trống' }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper-center">
                                <p>{{ $don_hang->created_at }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <div class="table-wrapper">
                                <p>{{ $don_hang->trang_thai }}</p>
                            </div>
                        </td>
                        <td class="table-wrapper">
                            <form action="{{route('huyDonHang',$don_hang->id)}}" method="post">
                                @csrf
                                <div class="table-wrapper-center">
                                    <button class="btn shop-btn" type="submit">Hủy</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <section class="product-cart product footer-padding">
            <form action="" method="post">
                @csrf
                <div class="container">
                    <div class="cart-section">
                        <table>
                            <tbody>
                                <tr class="table-row table-top-row">
                                    <td class="table-wrapper wrapper-product">
                                        <h5 class="table-heading">PRODUCT</h5>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">PRICE</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">QUANTITY</h5>
                                        </div>
                                    </td>
                                    <td class="table-wrapper wrapper-total">
                                        <div class="table-wrapper-center">
                                            <h5 class="table-heading">TOTAL</h5>
                                        </div>
                                    </td>
                                </tr>
                                @foreach ($chi_tiet_don_hangs as $item)
                                    <tr class="table-row ticket-row">
                                        <td class="table-wrapper wrapper-product">
                                            <div class="wrapper">
                                                <div class="wrapper-img">
                                                    <img src="{{ Storage::url($item->hinh_anh) }}" alt="img">
                                                </div>
                                                <div class="wrapper-content">
                                                    <h5 class="heading">{{ $item->ten_san_pham }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">{{ $item->gia_ctdh }}</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading">{{ $item->so_luong_ctdh }}</h5>
                                            </div>
                                        </td>
                                        <td class="table-wrapper wrapper-total">
                                            <div class="table-wrapper-center">
                                                <h5 class="heading item-total">{{ $item->thanh_tien }}</h5>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
