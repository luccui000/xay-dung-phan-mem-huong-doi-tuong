<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Core\Session;
use Luccui\Factories\BaiVietFactory;
use Luccui\Helpers\FileUpload;
use Luccui\Models\BaiViet;
use Luccui\Models\DanhMuc;
use Luccui\Models\LuotXem;
use Luccui\Models\TaiKhoan;

class BaiVietController extends BaseController
{
    public function index()
    {
        $baiviets = BaiViet::all();
        $baiviets = $baiviets->map(function ($baiviet) {
            $luotxem = LuotXem::where('baiviet_id', '=', $baiviet->id)->count();
            $tacgia = TaiKhoan::findFirst($baiviet->nguoi_tao);
            $baiviet->luot_xem = $luotxem;
            $baiviet->nguoi_tao = $tacgia;
            return $baiviet;
        });
        return view('admin/baiviet/index.php', [
            'baiviets' => $baiviets
        ]);
    }
    public function create()
    {
        $danhmucs = DanhMuc::all();
        return view('admin/baiviet/create.php', [
            'danhmucs' => $danhmucs
        ]);
    }
    public function store()
    {
        try {
            $formData = BaiVietFactory::make(
                $this->request->all()
            )->toArray();

            if(FileUpload::isImage($this->request->file['hinh_anh'])) {
                $path = FileUpload::save($this->request->file['hinh_anh']);
                $formData['hinh_anh'] = $path;
            } else {
                $formData['hinh_anh'] = '';
            }
            BaiViet::insert($formData);
            set_session('success', 'Thêm mới bài viết thành công');
            redirect('/admin/bai-viet');
        } catch (\Exception $exception) {
            set_session('error', 'Có lỗi: ' . $exception->getMessage());
            Session::back();
        }
    }
    public function edit()
    {
        $baiviet_id = $this->request->query['id'] ?? null;
        if($baiviet_id) {
            $baiviet = BaiViet::findFirst($baiviet_id);
            $danhmucs = DanhMuc::all();
            return view('admin/baiviet/edit.php', [
                'baiviet' => $baiviet,
                'danhmucs' => $danhmucs
            ]);
        }
    }
    public function update()
    {
        $baiviet_id = $this->request->query['id'] ?? null;
        if($baiviet_id) {
            $baiviet = BaiViet::where('id', '=', $baiviet_id);
            $data = BaiVietFactory::make($this->request->all())->toArray();

            if(FileUpload::isImage($this->request->file['hinh_anh'])) {
                $path = FileUpload::save($this->request->file['hinh_anh']);
                $data['hinh_anh'] = $path;
            } else {
                $data['hinh_anh'] = '';
            }

            unset($data['id']);
            unset($data['ngay_tao']);
//            var_dump($data);
            try {
                $baiviet->update($data);
                set_session('success', 'Thêm mới bài viết thành công');
                redirect('/admin/bai-viet');
            } catch (\Exception $exception) {
                set_session('error', 'Có lỗi: ' . $exception->getMessage());
                Session::back();
            }
        }
    }
}
