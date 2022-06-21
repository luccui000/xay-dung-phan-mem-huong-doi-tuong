<?php

namespace Luccui\Http\Controllers\Admin;

use Luccui\Core\Session;
use Luccui\Helpers\FileUpload;
use Luccui\Models\DanhMuc;

class DanhMucController extends BaseController
{
    public function index()
    {
        $danhmucs = DanhMuc::orderBy('thu_tu', 'asc')->get();
        $q = $this->request->query['id'] ?? null;
        if($q) {
            $danhmuc = DanhMuc::findFirst($q);
        }
        return view('admin/danhmuc/index.php', [
            'danhmucs' => $danhmucs,
            'danhmuc' => !is_null($q) ? $danhmuc : null
        ]);
    }
    public function store()
    {
        if($this->request->hasFile()) {
            if(FileUpload::isImage($this->request->file['hinh_anh'])) {
                $path = FileUpload::save($this->request->file['hinh_anh']);
                DanhMuc::insert([
                    'ten_danh_muc' => $this->request->ten_danh_muc,
                    'hinh_anh' => $path,
                    'thu_tu' => $this->request->thu_tu,
                    'noi_bat' => isset($this->request->noi_bat) ? 1 : 0
                ]);
                set_session('success', 'Thêm mới danh mục thành công');
            } else {
                set_session('error', 'Có lỗi xảy ra');
            }
            Session::back();
        }
    }
}
