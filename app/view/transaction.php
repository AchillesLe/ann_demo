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
      <h1 class="h3 mb-0 text-gray-800">Transaction</h1>
      <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addModal">  Add transaction</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="headleft font-weight-bold text-primary">Transaction List </h6>
            <h6 class="totalMoney font-weight-bold text-primary">Total : <?php echo number_format(  $_SESSION['user']['totalMoney'] , 0 , "." , ",")  ?> VNĐ</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered table-tran" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Người chuyển</th>
                        <th>Người nhận</th>
                        <th>Số tiền</th>
                        <th>Ngày</th>
                        <th>Ghi chú</th>
                    </tr>
                </thead>
                 
                <tbody>
                    <?php 
                        if( $data && count( $data ) > 0 ){
                            $index = 1;
                            foreach(  $data as $tran){
                                echo "<tr>";
                                echo    "<td>$index</td>";
                                echo    "<td>".$tran['id_head']."</td>";
                                echo    "<td>".$tran['id_tail']."</td>";
                                echo    "<td>".$tran['amount']."</td>";
                                echo    "<td>".$tran['date']."</td>";
                                echo    "<td>".$tran['note']."</td>";
                                echo "</tr>";
                                $index++;
                            }
                        }else{
                            echo "<tr><td colspan='4' style='text-align:center'>No transaction !</td></tr>";
                        }
                    ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>

  </div>
  <!-- /.container-fluid -->
   <!-- Add Modal-->
    <div class="modal fade" id="addtran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Your Feedback</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <textarea class="form-control" id="note" rows="3" ></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="addTransaction">Add</button>
                </div>
            </div>
        </div>
    </div>
<?php include('layout/footer.php')?>

