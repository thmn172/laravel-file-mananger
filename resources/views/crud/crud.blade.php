<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.26/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>
    <div class="container" style="margin-top: 30px">
        <h3 class="title">{{$title}}</h3>
        <hr>
        <div class="row">
          <div class="col-9">
            <div >
            <form class="input-group rounded" action="{{ route('search')}}" method="GET">
                <input type="search" name="text" value="{{old('text')}}" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                  <button type="submit" class="btn btn-outline-secondary"><i class="fas fa-search"></i></button>
                  </span>
            </form>
            </div>
          </div>
          <div class="col-3">
            <a href="{{route('add.get')}}" class="btn btn-outline-danger">Thêm</a>
          </div>
        </div>
        <hr>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">stt</th>
                <th scope="col">Mã danh mục</th>
                <th scope="col">Tiêu đề</th>
                <th scope="col">Thứ tự hiển thị</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Video</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Liên kết</th>
                <th scope="col">Danh mục cha</th>
                <th scope="col">Thao tác</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @if ($query == "")
              <div class="alert alert-warning" style="text-align: center" role="alert">
                Dữ liệu không tồn tại!
              </div>
            @else
                
              @foreach ($query as $key=>$item)
                  <tr>
                    <td>{{$stt++}}</td>
                    <td>{{$item->MaDanhMuc}}</td>
                    <td>{{$item->TieuDe}}</td>
                    <td>{{$item->ThuTuHienThi}}</td>
                    <td>{{$item->TrangThai}}</td>
                    <td>{{$item->Video}}</td>
                    <td>{{$item->Anh}}</td>
                    <td>{{$item->LienKet}}</td>
                    <td>{{$item->IDCha}}</td>
                    <td><a href="{{ route('edit.get', [$item->IDDanhMuc]) }}" class="btn btn-outline-success text-decoration-none">sửa</a></td>
                    <td><a href="{{ route('delete.get', [$item->IDDanhMuc]) }}" class="btn btn-outline-warning text-decoration-none" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');">xóa</a>
                    </td>
                  </tr>
              @endforeach
            @endif
            </tbody>
          </table>
         
    </div>
        
</body>
</html>