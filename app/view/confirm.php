<?php 
    $data = null;
    if( !empty($this->view_data) ){
        $data = $this->view_data;
    }
?> 
<?php include('layout/header.php')?>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Xác nhận</h1>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Xác nhận chuyển tiền ! </h6>
        </div>
        <div class="card-body">
            <form action="<?php base_url('transaction/add') ?>" method="GET">
                <h3 class="confim">  Bạn có chắc muốn chuyển <b style='color:#484747'><?php echo $_GET['money'] ?> </b>tới tài khoản của <b style='color:#484747'><?php echo $data['name'] ?></b>  không ?</h3>
            
                <input name ="reciever" value="<?php echo $_GET['reciever'] ?>" hidden />
                <input name ="money" value="<?php echo $_GET['money'] ?>" hidden />
                <input name ="note" value="<?php echo $_GET['note'] ?>" hidden />
                <input class="btn btn-primary btn-confim" value="đồng ý" type="submit" />
                <a class="btn btn-danger btn-cancel" href="/transaction"  >hủy</a>
            </form>
           
        </div>
    </div>

  </div>
<?php include('layout/footer.php')?>

