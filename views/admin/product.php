<section class="content-header">
  <h1>
    <?php echo $title ?>
    <small>Version 2.0</small>
  </h1>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="container" style="margin: 10px 0;">
            <span class="btn btn-primary glyphicon glyphicon-plus btn-sm" id="addBtn"></span>
          </div>
          <div class="container" id="addArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Thêm sản phẩm</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="productName">
              </div>
              <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-label" id="imgProduct">
              </div>
              <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="productPrice">
              </div>
              <div class="form-group">
                <label for="">Bảo hành</label>
                <input type="text" class="form-control" id="product-baohanh">
              </div>
              <div class="form-group">
                <label for="">Lượt mua</label>
                <input type="text" class="form-control" id="luotMua">
              </div>
              <div class="form-group">
                <label for="">Lượt xem</label>
                <input type="text" class="form-control" id="luotXem">
              </div>

              <span class="btn btn-success" id="add2Btn">Thêm</span>
              <span class="btn btn-default" id="cancelAddBtn">Hủy</span>
            </form>
          </div>
          <div class="container" id="editArea" style="width: 100%; display: none; padding-bottom: 10px;">
            <form action="" method="POST" role="form">
              <legend>Sửa sản phẩm</legend>
              <i id="addError" style="color: red"></i>
              <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" id="product4Name">
              </div>
              <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-label" id="img4Product">
              </div>
              <div class="form-group">
                <label for="">Giá</label>
                <input type="text" class="form-control" id="product4Price">
              </div>
              <div class="form-group">
                <label for="">Bảo hành</label>
                <input type="text" class="form-control" id="product-4baohanh">
              </div>
              <div class="form-group">
                <label for="">Lượt mua</label>
                <input type="text" class="form-control" id="luot4Mua">
              </div>
              <div class="form-group">
                <label for="">Lượt xem</label>
                <input type="text" class="form-control" id="luot4Xem">
              </div>

              <span class="btn btn-success" id="edit2Btn">Xong</span>
              <span class="btn btn-default" id="cancelEditBtn">Hủy</span>
            </form>
          </div>
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr id="tbheader">
                <th><input type="checkbox" id="check-all-gd"></th>
                <th>STT</th>
                <th>Mã sp</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh</th>
                <th>Giá</th>
                <th>Bảo hành</th>
                <th>Lượt mua</th>
                <th>Lượt xem</th>
                <th>Ngày nhập</th>
                <th>Hành động</th>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($i = 0; $i < count($data); $i++) { ?>
                <tr>
                  <td><input type="checkbox" class="cbsp" value="<?php echo $data[$i]['masp'] ?>"></td>
                  <td><?php echo $i + 1 ?></td>
                  <td><?php echo $data[$i]['masp'] ?></td>
                  <td><?php echo $data[$i]['tensp'] ?></td>
                  <td><img style="width: 50px" src="<?php echo $data[$i]['anhchinh'] ?>"></td>
                  <td><?php echo $data[$i]['gia'] ?></td>
                  <td><?php echo $data[$i]['baohanh'] ?> tháng</td>
                  <td><?php echo $data[$i]['luotmua'] ?></td>
                  <td><?php echo $data[$i]['luotxem'] ?></td>
                  <td><?php echo $data[$i]['ngay_nhap'] ?></td>
                  <td class="text-center">
                  <span class="btn btn-primary editItemBtn" data-id='<?php echo $data[$i]['masp'] ?>'>Chỉnh sửa</span>
                  <span class="btn btn-danger delItemBtn" data-id='<?php echo $data[$i]['masp'] ?>'>Xóa</span>
                  </td>
                </tr>
              <?php }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<!-- jQuery 3 -->
<script src="views/admin/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="views/admin/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="views/admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="views/admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="views/admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="views/admin/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="views/admin/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="views/admin/AdminLTE/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $('#sptab').addClass('active');
  $(document).ready(function() {
    $('#example1 tr').not($('#tbheader')).click(function(event) {
      if (event.target.type !== 'checkbox') {
        $(':checkbox', this).trigger('');
      }
    })
    $('#example1').addClass('active');
    $('#check-all-gd').click(function() {
      $('input:checkbox').not(this).prop('checked', this.checked);
    });
  })
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>
<script>
  $('#addBtn').on('click', function() {
    $('#addArea').toggle(300);
  })
  $('#cancelAddBtn').on('click', function() {
    $('#addArea').toggle(300);
  })
  $('#add2Btn').on('click', function() {
    action('add', );
  })
  $('#edit2Btn').on('click', function() {
    var id = $(this).data('id');
    action('edit', id);
  })
  $('.delItemBtn').on('click', function() {
    var cf = confirm('Bạn chắc chứ?');
    if (cf) {
      var id = $(this).data('id');
      action('del', id);
    }
  })
  $('.editItemBtn').on('click', function() {
    $('#edit2Btn').attr('data-id', $(this).data('id'));
    $('#example1').toggle();
    $('#editArea').toggle(300);
    $('#product4Name').val($(this).closest('tr').children('td:nth-child(4)').text());
    $('#img4Product').val($(this).closest('tr').children('td:nth-child(5)').text());
    $('#product4Price').val($(this).closest('tr').children('td:nth-child(6)').text());
    $('#product-4baohanh').val($(this).closest('tr').children('td:nth-child(7)').text());
    $('#luot4Mua').val($(this).closest('tr').children('td:nth-child(8)').text());
    $('#luot4Xem').val($(this).closest('tr').children('td:nth-child(9)').text());
  })
  $('#cancelEditBtn').on('click', function() {
    $('#example1').toggle();
    $('#editArea').toggle(300);
  })

  function action(name, id = null) {
    var product4Name = $('#product4Name').val();
    var img4Product = $('#img4Product').val();
    var product4Price = $('#product4Price').val();
    var baohanh4 = $('#product-4baohanh').val();
    var luot4Mua = $('#luot4Mua').val();
    var luot4Xem = $('#luot4Xem').val();
    var pname = pimg = pprice = baohanh = luotmua = luotxem = '';
    if (name == 'add') {
      pname = $('#productName').val();
      pimg = $('#imgProduct').val();
      pprice = $('#productPrice').val();
      baohanh = $('#product-baohanh').val();
      luotmua = $('#luotMua').val();
      luotxem = $('#luotXem').val();
      if (pname == '' || pprice == '' || baohanh == '') {
        alert('Bạn chưa điền tên danh mục!');
        return;
      }
    }
    $.ajax({
      url: 'productadmin/action',
      type: 'GET',
      dataType: 'text',
      data: {
        name,
        id,
        pname,
        pimg,
        pprice,
        baohanh,
        luotmua,
        luotxem,
        product4Name,
        img4Product,
        product4Price,
        baohanh4,
        luot4Mua,
        luot4Xem
      },
      success: function(result) {
        if (result == 'OK') {
          alert("Successful!");
          location.reload();
        } else {
          $('#addError').html(result);
        }
      }
    })
  }
</script>