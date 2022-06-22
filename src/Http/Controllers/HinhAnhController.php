<?php

namespace Luccui\Http\Controllers;

use Luccui\Core\Request;
use Luccui\Helpers\FileUpload;
use Luccui\Models\HinhAnh;

class HinhAnhController extends Controller
{
    public function index()
    {
        $hinhanhs = HinhAnh::all()->chunk(6);
        return view('admin/hinhanh/index.php', [
            'hinhanhs' => $hinhanhs
        ]);
    }
    public function store()
    {
        $files = app(Request::class)->file['hinh_anh'];
        $files = $this->reArrayFiles($files);
        foreach ($files as $file) {
            if(FileUpload::isImage($file)) {
                $imagePath = FileUpload::save($file);
                HinhAnh::insert([
                    'duong_dan' => $imagePath,
                    'ngay_tao' => date('Y/m/d')
                ]);
            }
        }
        redirect('/admin/hinh-anh');
    }
    public function reArrayFiles(&$file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }
}
