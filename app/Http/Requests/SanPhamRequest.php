<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ma_san_pham' => 'required|string|max:255|unique:san_phams,ma_san_pham,' . $this->route('sanphams'),
            'ten_san_pham' => 'required|string|max:255',
            'hinh_anh' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'so_luong' => 'required|integer|min:1',
            'gia' => 'required|numeric|min:0|max:99999999',
            'mo_ta' => 'nullable|string',
            'ngay_san_xuat' => 'required|date',
            'trang_thai' => 'required|in:0,1',
            'danh_muc_id' => 'required|exists:danh_mucs,id',
        ];
    }
    public function messages(): array
    {
        return [
            'ma_san_pham.required' => 'Mã sản phẩm là bắt buộc.',
            'ma_san_pham.unique' => 'Mã sản phẩm không được trùng nhau.',
            'ma_san_pham.string' => 'Mã sản phẩm phải là chuỗi ký tự.',
            'ma_san_pham.max' => 'Mã sản phẩm không được vượt quá 255 ký tự.',
            
            'ten_san_pham.required' => 'Tên sản phẩm là bắt buộc.',
            'ten_san_pham.string' => 'Tên sản phẩm phải là chuỗi ký tự.',
            'ten_san_pham.max' => 'Tên sản phẩm không được vượt quá 255 ký tự.',
            
            'hinh_anh.image' => 'Hình ảnh phải là một tập tin hình ảnh.',
            'hinh_anh.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, gif, hoặc svg.',
            'hinh_anh.max' => 'Hình ảnh không được vượt quá 2MB.',
            
            'so_luong.required' => 'Số lượng là bắt buộc.',
            'so_luong.integer' => 'Số lượng phải là số nguyên.',
            'so_luong.min' => 'Số lượng phải ít nhất là 1.',
            
            'gia.required' => 'Giá là bắt buộc.',
            'gia.numeric' => 'Giá phải là một số.',
            'gia.min' => 'Giá không được âm.',
            'gia.max' => 'Giá không được vượt quá 99999999.',
            
            'mo_ta.string' => 'Mô tả phải là chuỗi ký tự.',
            
            'ngay_san_xuat.required' => 'Ngày sản xuất là bắt buộc.',
            'ngay_san_xuat.date' => 'Ngày sản xuất phải là ngày hợp lệ.',
            
            'trang_thai.required' => 'Trạng thái là bắt buộc.',
            'trang_thai.in' => 'Trạng thái phải là 0 hoặc 1.',
            
            'danh_muc_id.required' => 'Danh mục là bắt buộc.',
            'danh_muc_id.exists' => 'Danh mục không tồn tại.',
        ];
    }
}
