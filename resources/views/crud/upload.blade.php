<form action="{{route('save')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="anh">
    <input type="submit" value="Thêm">
</form>