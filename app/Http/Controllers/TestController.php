<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\danhmuc;
use App\Models\Anh;
use DB;
class TestController extends Controller
{
    // public function showformlogin(Request $request){
    //     //$name = $request->old('txttendn');
    //     return view('test');
    // }
    // public function login(Request $request){
    //     // if(!empty($_POST['txttendn'])&&!empty($_POST['txtpw'])){
    //     //     $usn = $_POST['txttendn'];
    //     //     $pw = $_POST['txtpw'];
    //     // //    return $usn . " " . $pw ;
    //     // return 'tên đăng nhập: '.$usn;
    //     // }
    //     // return view('test');
        
    //     if($request->has('txttendn')){
    //         $name = $request->txttendn;
    //         $request->flash();
    //        return redirect(route('showlogin'));
    //     }else return 'không có gì';
    // }
    // public function demo(){
    //     $title = 'minh đẹp trai';
    //     return view('demo')-> with('title', $title);
    // }
    // public function test(){
    //     return 'API Middleware';
    // }
    // public function download(Request $request){
    //     if(!empty($request->imge)){
    //         $imge = trim($request->imge);
    //         $name = 'img'. date('d/m/Y-H:i:s').'.jpg';
    //         return response()->download($imge, $name);
    //         // echo $img;
    //         // return response()->streamDownload(function() use ($img){
    //         //     $imgContent = file_get_contents($img);
    //         // }, $name);
    //         // dd($request->img);

    //     }
    // }
    // public function downloaddoc(Request $request){
    //     if(!empty($request->file)){
    //         $file = trim($request->file);
    //         $name = 'tailieu'. uniqid().'.pdf';
    //         $header = ['Content-Type' => 'application/pdf'];
    //         return response()->download($file, $name, $header);
    //         // echo $img;
    //         // return response()->streamDownload(function() use ($img){
    //         //     $imgContent = file_get_contents($img);
    //         // }, $name);
    //         // dd($request->img);

    //     }
    // }
    public function __construct() {
        $this->danhmuc = new danhmuc();
        $this->anh = new Anh();
    }
    public function crud(){
        $title = "Danh sách danh mục";
        $stt = 1;
        $danhmuc = new danhmuc();
        $query = $danhmuc->getAll();
        return view('crud.crud', compact('query', 'title', 'stt'));
    } 
    public function add(){
        $title = "Thêm danh mục";
            $danhmucID = $this->danhmuc->getDetail(0);
        return view('crud.add',compact('title','danhmucID'));
    } 
    
    public function postAdd(Request $request){
        $dataAdd = [
            'MaDanhMuc' => $request->input('ma_danh_muc'),
            'TieuDe' => $request->input('tieu_de'),
            'ThuTuHienThi' => $request->input('thu_tu_hien_thi'),
            'TrangThai' => $request->input('trang_thai'),
            'Video' => $request->input('video'),
            'Anh' => $request->input('anh'),
            'LienKet' => $request->input('lien_ket'),
            'IDCha' => $request->input('danh_muc_cha')
        ];
        
        $this->danhmuc->addDanhMuc($dataAdd);
        return redirect()->route('crud');
        
    } 
    
    public function edit($id){
        $title = "Sửa danh mục";
        if(!empty($id)){
            if(!empty($this->danhmuc->getDetail($id))){
                $danhmucID = $this->danhmuc->getDetail($id);
            }
        } else{
            return redirect()->route('crud');
        }
        
        return view('crud.add',compact('title','danhmucID'));
    } 
    public function editPut($id, Request $request){
        if(!empty($this->danhmuc->getDetail($id))){
            $dataEdit = [
                'MaDanhMuc' => $request->input('ma_danh_muc'),
                'TieuDe' => $request->input('tieu_de'),
                'ThuTuHienThi' => $request->input('thu_tu_hien_thi'),
                'TrangThai' => $request->input('trang_thai'),
                'Video' => $request->input('video'),
                'Anh' => $request->input('anh'),
                'LienKet' => $request->input('lien_ket'),
                'IDCha' => $request->input('danh_muc_cha')
            ];
            $edit = $this->danhmuc->edit($id, $dataEdit);
            return redirect()->route('crud');
        }
        return 'lỗi';
    }
    public function delete($id){
        if(!empty($id)){
            $this->danhmuc->deleteDanhMuc($id);
            return redirect()->route('crud');
        }return 'không tìm thấy';
        // return 'đã xóa';
    }
    public function searchDanhMuc(Request $request){
        $title = 'Danh sách danh mục';
        $stt = 1;
        $query = $this->danhmuc->getAll();
        if(!empty($request->input('text'))){
            $query = $this->danhmuc->searchDanhMuc($request->input('text'));
            return view('crud.crud',compact('query', 'title', 'stt'));
        }
        return view('crud.crud',compact('query', 'title', 'stt'));
    }
    
    // public function getsave(Request $request){
    //     return view('crud.add');
    // }
    public function upload(Request $request){
        return view('crud.upload');
    }
    public function save(Request $request){
        if($request->hasFile('anh')){
            $file = $request->file('anh');
            $extension = $file->getClientOriginalExtension(); // lay ten mo rong .jpg, .png,....
            $filename = now()->format('YmdHis') . '.' . $extension;
            $file->move('uploads/anh/', $filename); // upload len thu muc uploads/students
            $data['anh'] = $filename;
            $this->anh->add($data);
            return redirect()->route('test');
        }
        return 'chưa lưu được ảnh';
    }
    
}
