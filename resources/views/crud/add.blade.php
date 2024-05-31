<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức thông báo</title>
    <link href={{ asset('assets/clients/css/bootstrap.min.css') }} rel="stylesheet">
    <link href={{ asset('assets/clients/css/admin/add.css') }} rel="stylesheet">
    {{-- eidtor --}}
    <script src="https://cdn.tiny.cloud/1/gjpf1fcmnepdwbxadkqs2aouqo5jpz5c7zv1gcsz0o0g3a3l/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->
    {{-- <script>
      tinymce.init({
        selector: 'textarea#file-picker',
        plugins: 'image code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image | code| media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        
        mergetags_list: [
          { value: 'First.Name', title: 'First Name' },
          { value: 'Email', title: 'Email' },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        /*
          URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
          images_upload_url: 'postAcceptor.php',
          here we add custom filepicker only to Image dialog
        */
        file_picker_types: 'image',
        /* and here's our custom image picker*/
        file_picker_callback: (cb, value, meta) => {
          const input = document.createElement('input');
          input.setAttribute('type', 'file');
          input.setAttribute('accept', 'image/*');
      
          input.addEventListener('change', (e) => {
            const file = e.target.files[0];
      
            const reader = new FileReader();
            reader.addEventListener('load', () => {
              /*
                Note: Now we need to register the blob in TinyMCEs image blob
                registry. In the next release this part hopefully won't be
                necessary, as we are looking to handle it internally.
              */
              const id = 'blobid' + (new Date()).getTime();
              const blobCache =  tinymce.activeEditor.editorUpload.blobCache;
              const base64 = reader.result.split(',')[1];
              const blobInfo = blobCache.create(id, file, base64);
              blobCache.add(blobInfo);
      
              /* call the callback and populate the Title field with the file name */
              cb(blobInfo.blobUri(), { title: file.name });
            });
            reader.readAsDataURL(file);
          });
      
          input.click();
        },
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
      });
    </script> --}}
    <script>
      var editor_config = {
        path_absolute : "/",
        selector: 'textarea.my-editor',
        relative_urls: false,
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table directionality",
          "emoticons template paste textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        file_picker_callback : function(callback, value, meta) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
    
          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
          if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }
    
          tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
              callback(message.content);
            }
          });
        }
      };
    
      tinymce.init(editor_config);
    </script>
    {{-- <script>
      tinymce.init({
          selector: 'textarea.my-editor',
          plugins: 'image code anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',

        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image | code| media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
          tinycomments_author: 'Author name',
          file_picker_callback: function (callback, value, meta) {
              let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
              let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

              let cmsURL = '/laravel-filemanager?editor=' + meta.fieldname;
              if (meta.filetype == 'image') {
                  cmsURL = cmsURL + "&type=Images";
              } else {
                  cmsURL = cmsURL + "&type=Files";
              }

              tinymce.activeEditor.windowManager.openUrl({
                  url: cmsURL,
                  title: 'Filemanager',
                  width: x * 0.8,
                  height: y * 0.8,
                  resizable: "yes",
                  close_previous: "no",
                  onMessage: (api, message) => {
                      callback(message.content);
                  }
              });
          }
      });
  </script> --}}
    {{-- end eidtor --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    {{-- navbar --}}
    <div class="menu">
        <nav class="navbar navbar-expand-sm shadow-sm p-3 fixed-top" style="background-color: #f2f2f2">
            <div class="container-fluid">
                <a href="#" class="back"><i class="fa-solid fa-arrow-left"></i></a>
                <a class="navbar-brand" href="#"><img src="	https://husc.edu.vn/images/logo.png" alt=""> <strong>HUSC</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                  <div class="navbar-nav me-auto"> 
                  </div>
                  {{-- user --}}
                    <div class="dropdown ">
                      <button class=" rounded-pill btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px">
                        Nhật Minh
                      </button>
                      <ul class="dropdown-menu">
                        <div class="us">
                         <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/800px-User_icon_2.svg.png" alt="" style="height: 30px; width: 30px; margin-left: 5px">
                        Trần Hữu Nhật Minh
                        <hr>
                        <a href="" class="text-decoration-none" style="color: #333333; margin-left: 5px"><i class="fa-solid fa-arrow-right-from-bracket"></i> Đăng xuất</a>
                        </div>
                      </ul>
                    </div>
                  {{-- end user --}}
                </div>
              </div>
        </nav>
    </div>
    {{-- end navbar --}}
    
     {{-- sidebar --}}
     <div class="sidebar">
        <div class="img">
            <img src="https://cdn-icons-png.flaticon.com/512/2042/2042895.png" alt="">
        </div>
        <ul class="nav flex-column">
            <hr>
            <li class="text">
                <h4>Creator</h4>
            </li>
            <hr>
            <li class="text">
                <p>Trần Hữu Nhật Minh</p>
            </li>
            <hr>
            <li class="text">
                <p>nminh110702@gmail.com</p>
            </li>
            
        </ul>
    </div>
{{-- endsidebar --}}
    
    {{-- content --}}
    <div class="content">
        <div class="row border border-3 rounded-3">
            <form action="{{ route('save') }}" class="col-12" style="padding: 15px 15px 7px 15px" enctype="multipart/form-data" method="POST">
              @csrf
              {{-- <div class="container">
                <div class="form-group row">
                  <div class="col-sm-12">
                      <input type="text" class="form-control" name="tieude" id="tieude" placeholder="Tiêu đề...">
                  </div>
              </div> --}}
                {{-- <div class="form-group row"> --}}
                    {{-- <label for="chuyenmuc" class="col-sm-3 col-form-label">Chuyên mục</label> --}}
                    {{-- <div class="col" >
                        <select name="chuyenmuc" id="chuyenmuc" class="form-control">
                            <option value="0" selected>--- Chọn chuyên mục ---</option>
                            <option value="2">Saab</option>
                            <option value="3">Mercedes</option>
                            <option value="4">Audi</option>
                        </select>
                    </div>
                </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group"> --}}
                        {{-- <label for="formFile" class="col-form-label">File đính kèm</label> --}}
                        {{-- <div class="">
                            <input class="form-control" type="file" id="formFile" placeholder="chọn file đính kèm">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-check ">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                          Tin nóng
                        </label>
                      </div>
                    </div>
                  </div>
                 --}}
                  
                  
                {{-- editor --}}
                <textarea name="content" class="form-control my-editor"></textarea>
                {{-- end editor --}}
                <div style="margin-top: 5px">
                    <input type="submit" name="save" value="Lưu Bài viết" class="btn btn-outline-success">
                    {{-- <a href="#" class="btn btn-outline-success text-decoration-none">Lưu bài viết</a> --}}
                    {{-- xem trước --}}
                    <!-- Button trigger modal -->
                      {{-- <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Xem trước
                      </button> --}}
                      
                      <!-- Modal -->
                      {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: max-content; width: 1302px;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Tiêu đề</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Nhân dịp Đại lễ Phật Đản, Phật lịch 2568, dương lịch 2024, đồng chí Đặng Trần Minh- Phó Bí thư thường trực Thành ủy đã đi thăm và chúc mừng một số Chùa trên địa bàn Thành phố. Cùng đi có lãnh đạo ban Dân vận Thành ủy, Mặt trận tổ quốc Thành phố.



                              Tại các chùa đến thăm, đồng chí Phó bí thư thường trực Thành ủy đã đã gửi lời chúc an lành và tốt đẹp đến các đại đức tăng, ni trụ trì tại các chùa và đồng bào phật tử địa phương nhân mùa Phật Đản. Đồng chí cũng cảm ơn sự đóng góp của các chùa và Rhật tử trong việc thực hiện các phong trào thi đua phát triển kinh tế- xã hội, đặc biệt là công tác nhân đạo từ thiện; đồng thời mong muốn các chư tôn đức tăng, ni và bà con Phật tử tiếp tục phát huy truyền thống tốt đẹp của Phật giáo, sống “Tốt đời, đẹp đạo”. Đặc biệt, đồng chí mong các chư tôn đức tăng, ni và Phật tử tích cực ủng hộ trong công tác nhân đạo từ thiện và xây dựng nhà đại đoàn kết để Thành phố ngày càng giàu đẹp, văn minh.
                              
                              Thay mặt lãnh đạo Thành ủy, HĐND, UBND thành phố Việt Trì đồng chí Phó bí thư thường trực Thành ủy đã trao tặng các nhà Chùa những phần phần lễ dâng Phật dịp Phật đản.Nhân dịp Đại lễ Phật Đản, Phật lịch 2568, dương lịch 2024, đồng chí Đặng Trần Minh- Phó Bí thư thường trực Thành ủy đã đi thăm và chúc mừng một số Chùa trên địa bàn Thành phố. Cùng đi có lãnh đạo ban Dân vận Thành ủy, Mặt trận tổ quốc Thành phố.
                              <img src="https://viettri.phutho.gov.vn/UserFiles0/image/Data_2020/NAM%202024/THANG%205/tang%20qua%20chua/CAU%20CA_00_01_18_14_Still005.jpg" alt="">
                              
                              
                              Tại các chùa đến thăm, đồng chí Phó bí thư thường trực Thành ủy đã đã gửi lời chúc an lành và tốt đẹp đến các đại đức tăng, ni trụ trì tại các chùa và đồng bào phật tử địa phương nhân mùa Phật Đản. Đồng chí cũng cảm ơn sự đóng góp của các chùa và Rhật tử trong việc thực hiện các phong trào thi đua phát triển kinh tế- xã hội, đặc biệt là công tác nhân đạo từ thiện; đồng thời mong muốn các chư tôn đức tăng, ni và bà con Phật tử tiếp tục phát huy truyền thống tốt đẹp của Phật giáo, sống “Tốt đời, đẹp đạo”. Đặc biệt, đồng chí mong các chư tôn đức tăng, ni và Phật tử tích cực ủng hộ trong công tác nhân đạo từ thiện và xây dựng nhà đại đoàn kết để Thành phố ngày càng giàu đẹp, văn minh.
                              
                              Thay mặt lãnh đạo Thành ủy, HĐND, UBND thành phố Việt Trì đồng chí Phó bí thư thường trực Thành ủy đã trao tặng các nhà Chùa những phần phần lễ dâng Phật dịp Phật đản.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-outline-dark " data-bs-dismiss="modal">Đóng</button>
                              <button type="button" class="btn btn-outline-success">Lưu bài viết</button>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                    {{-- end xem trước --}}
                </div>
            </form>
            
        </div>
        
    </div>
    {{-- end content --}}

</body>
<script href={{asset('assets/clients/js/bootstrap.min.css')}}></script>
<script src="{{asset('assets/clients/js/editor.js')}}"></script>

</html>