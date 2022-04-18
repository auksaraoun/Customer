@extends('layout')
@section('body')
    <div class="container">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <h1 class="mb-3 border-bottom pb-2 mb-0">ลูกค้า</h1>
            <button class="btn btn-sm btn-primary btn-add" type="button">เพิ่มลูกค้า</button>
            <div class="table-responsive">
                <table class="table table-striped w-100" id="dataTable" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalShow" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">ข้อมูลลูกค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-6 mb-2">
                                <label for="firstname">ชื่อ</label>
                                <input type="text" readonly class="form-control" id="show_firstname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="lastname">นามสกุล</label>
                                <input type="text" readonly class="form-control" id="show_lastname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="email">อีเมล์ <span class="text-danger" >*</span></label>
                                <input type="text" readonly class="form-control" id="show_email" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone">เบอร์โทร</label>
                                <input type="text" readonly class="form-control" id="show_phone" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone">วันที่สร้าง</label>
                                <input type="text" readonly class="form-control" id="show_created_at" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone">วันที่แก้ไขล่าสุด</label>
                                <input type="text" readonly class="form-control" id="show_updated_at" value="">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAdd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formAdd" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">เพิ่มลูกค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-6 mb-2">
                                <label for="firstname">ชื่อ</label>
                                <input type="text" class="form-control" id="add_firstname" name="firstname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="lastname">นามสกุล</label>
                                <input type="text" class="form-control" id="add_lastname" name="lastname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="email">อีเมล์ <span class="text-danger" >*</span></label>
                                <input type="text" class="form-control" id="add_email" name="email" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone">เบอร์โทร</label>
                                <input type="text" class="form-control" id="add_phone" name="phone" value="">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="formEdit" >
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">แก้ไขลูกค้า</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <input type="hidden" id="edit_id" value="">

                            <div class="col-md-6 mb-2">
                                <label for="firstname">ชื่อ</label>
                                <input type="text" class="form-control" id="edit_firstname" name="firstname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="lastname">นามสกุล</label>
                                <input type="text" class="form-control" id="edit_lastname" name="lastname" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="email">อีเมล์ <span class="text-danger" >*</span></label>
                                <input type="text" class="form-control" id="edit_email" name="email" value="">
                            </div>

                            <div class="col-md-6 mb-2">
                                <label for="phone">เบอร์โทร</label>
                                <input type="text" class="form-control" id="edit_phone" name="phone" value="">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">

    var dataTable =  $('#dataTable').dataTable({
        "processing": true,
        "serverSide": true,
        "lengthChange": false,
        "pageLength" : 15,
        "language": {
            "aria": {
                "sortAscending": ": เรียงจากน้อยไปมาก",
                "sortDescending": ": เรียงจากมากไปน้อย"
            },
            "emptyTable": "* ไม่มีข้อมูล",
            "info": "แสดงข้อมูล _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
            "infoEmpty": " ",
            "infoFiltered": "",
            "lengthMenu": "_MENU_",
            "search": "ค้นหา : ",
            "zeroRecords": "* ไม่พบข้อมูลที่ค้นหา",
            "paginate": {
                "first":      "หน้าแรก",
                "previous":   "ก่อนนี้",
                "next":       "ถัดไป",
                "last":       "สุดท้าย"
            },
        },
        "ajax": {
            "method": "get",
            "dataType": "json",
            "url": url_gb + "/customer/list",
            "data": function ( d ) {
                // d.myKey = "myValue";
            }
        },
        "columns": [
            {"data" : "DT_RowIndex", "searchable": false, "orderable": false},
            {"data": "firstname", 'visible': false},
            {"data": "lastname", 'visible': false},
            {"data": "fullname"},
            {"data": "action", "className": "text-center", "searchable": false, "orderable": false}
        ],
    });

    $('body').on('click', '.btn-show', function(event) {
        event.preventDefault();
        let id = $(this).data('id');
        let btn = $(this);
        $(btn).prop('disabled', true);
        $.ajax({
            method : "GET",
            url : url_gb + "/customer/" + id,
            dataType : 'json',
        }).done(function(res){
            $(btn).prop("disabled", false);
            $('#show_firstname').val(res.firstname);
            $('#show_lastname').val(res.lastname);
            $('#show_email').val(res.email);
            $('#show_phone').val(res.phone);
            $('#show_created_at').val(res.str_created_at);
            $('#show_updated_at').val(res.str_updated_at);
            $('#modalShow').modal('show');
        }).fail(function(error){
            Swal.fire("Error",error.responseJSON.message,"error");
            $(btn).prop("disabled", false);
        });
    });

    $('body').on('click', '.btn-add', function(event) {
        event.preventDefault();
        $('#modalAdd').modal('show');
    });

    $('#formAdd').validate({
       errorElement: 'div',
       errorClass: 'invalid-feedback',
       validClass: '',
       focusInvalid: false,
       rules: {
           email: {
               required: true,
               email: true
           },
       },
       messages: {
           email: {
               required: 'กรุณาระบุ',
               email: 'รูปแบบอีเมล์ไม่ถูกต้อง',
           },
       },
       highlight: function (e) {
           $(e).addClass('is-invalid');
       },
       errorPlacement: function (error, element) {
           $(error).appendTo($(element).closest('div'));
       },
       success: function(label,element) {
           $(element).removeClass('is-invalid');
       },
       submitHandler: function (form) {
           let btn = $(form).find('[type="submit"]');
           $(btn).prop("disabled", true);
           $.ajax({
               method : "POST",
               url : url_gb + "/customer",
               dataType : 'json',
               data : $(form).serialize()
           }).done(function(rec){
               $(btn).prop("disabled", false);
               if(rec.status==1){
                   Swal.fire( rec.title, rec.content, 'success' )
                   dataTable.api().ajax.reload();
                   $('#modalAdd').modal('hide');
               }else{
                   Swal.fire(rec.title,rec.content,"error");
               }
           }).fail(function(error){
               Swal.fire("Error",error.responseJSON.message,"error");
               $(btn).prop("disabled", false);
           });
       },
   });

   $('#modalAdd, #modalEdit').on('hidden.bs.modal', function () {
       $('#formAdd')[0].reset();
       $('#formAdd').data('validator').resetForm();
       $('.is-invalid').removeClass('is-invalid');
   })

   $('body').on('click', '.btn-edit', function(event) {
       event.preventDefault();
       let id = $(this).data('id');
       let btn = $(this);
       $(btn).prop('disabled', true);
       $.ajax({
           method : "GET",
           url : url_gb + "/customer/" + id,
           dataType : 'json',
       }).done(function(res){
           $(btn).prop("disabled", false);
           $('#edit_firstname').val(res.firstname);
           $('#edit_lastname').val(res.lastname);
           $('#edit_email').val(res.email);
           $('#edit_phone').val(res.phone);
           $('#edit_id').val(res.id);
           $('#modalEdit').modal('show');
       }).fail(function(error){
           Swal.fire("Error",error.responseJSON.message,"error");
           $(btn).prop("disabled", false);
       });
   });

   $('#formEdit').validate({
      errorElement: 'div',
      errorClass: 'invalid-feedback',
      validClass: '',
      focusInvalid: false,
      rules: {
          email: {
              required: true,
              email: true
          },
      },
      messages: {
          email: {
              required: 'กรุณาระบุ',
              email: 'รูปแบบอีเมล์ไม่ถูกต้อง',
          },
      },
      highlight: function (e) {
          $(e).addClass('is-invalid');
      },
      errorPlacement: function (error, element) {
          $(error).appendTo($(element).closest('div'));
      },
      success: function(label,element) {
          $(element).removeClass('is-invalid');
      },
      submitHandler: function (form) {
          let btn = $(form).find('[type="submit"]');
          let id = $('#edit_id').val();
          $(btn).prop("disabled", true);
          $.ajax({
              method : "PUT",
              url : url_gb + "/customer/" + id,
              dataType : 'json',
              data : $(form).serialize()
          }).done(function(rec){
              $(btn).prop("disabled", false);
              if(rec.status==1){
                  Swal.fire( rec.title, rec.content, 'success' )
                  dataTable.api().ajax.reload();
                  $('#modalEdit').modal('hide');
              }else{
                  Swal.fire(rec.title,rec.content,"error");
              }
          }).fail(function(error){
              Swal.fire("Error",error.responseJSON.message,"error");
              $(btn).prop("disabled", false);
          });
      },
  });

  $('body').on('click', '.btn-delete', function(event) {
      event.preventDefault();
      let id = $(this).data('id');
      let btn = $(this);
      Swal.fire({
          title: 'คุณต้องการลบข้อมูลหรือไม่ ?',
          icon: 'warning',
          text: 'ข้อมูลที่ถูกลบไปแล้วจะไม่สามารถนำกลับมาได้ไม่ว่ากรณีใดๆทั้งสิ้นการลบข้อมูลจะทำให้ข้อมูลอื่นๆที่ถูกนำไปใช้ ลบหายไปด้วย',
          confirmButtonText: 'ยืนยันลบ',
          cancelButtonText: 'ยกเลิก ไม่ลบ',
          showCancelButton: true,
          showCloseButton: true
      }).then((result) => {

          if (result.isConfirmed == true) {

              $(btn).prop("disabled", true);

              $.ajax({
                  method : "DELETE",
                  url : url_gb + "/customer/" + id,
                  dataType : 'json',
              }).done(function(rec){
                  $(btn).prop("disabled", false);
                  if(rec.status==1){
                      Swal.fire( rec.title, rec.content, 'success' )
                      dataTable.api().ajax.reload();
                  }else{
                      Swal.fire(rec.title,rec.content,"error");
                  }
              }).fail(function(error){
                  Swal.fire("Error",error.responseJSON.message,"error");
                  $(btn).prop("disabled", false);
              });

          }

      })
  });

</script>
@endsection
