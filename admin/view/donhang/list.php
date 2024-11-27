 <!-- main page -->
 <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Đơn hàng</h1>



<!-- Content Row -->
<div class="row">

    <!-- Table column -->
    <div class="col-lg-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản lý đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên khách hàng</th>  
                                <th>Mã đơn</th>                                                                             
                                <td>Tổng tiền</td>
                                <th>Thời gian đặt</th>
                                <th>Trạng thái</th>
                                <th>Tình trạng</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach ($don_hang  as $key => $value) {
                               ?>
  <tr>
                                <td><?=$key+1?></td>
                                <td><?=$value['ten_dang_nhap'] ?></td>        
                                <td><?=$value['ma_hoa_don'] ?></td>                                                                         
                                <th><?= number_format($value['tong_don_hang'] )?> Đồng</th>
                                <td><?=$value['ngay_tao_don'] ?></td>
                                <td>
                                <?php
                                $trang_thai = $value['trang_thai_giao_hang'];
                                if ($trang_thai == 0) {
                                    echo "Đang chờ xử lý";
                                } elseif ($trang_thai == 1) {
                                    echo "Đang giao";
                                } elseif ($trang_thai == 2) {
                                    echo "Đã giao hàng";
                                } else {
                                    echo "Đã hủy";
                                }
                                ?>
</td>

<td>
                                <?php
                                $trang_thai = $value['trang_thai_giao_hang'];
                                if ($trang_thai == 0) {
                                    echo "Chưa nhận hàng";
                                } elseif ($trang_thai == 1) {
                                    echo "Đang giao";
                                } elseif ($trang_thai == 2) {
                                    echo "Đã nhận hàng";
                                } else {
                                    echo "Đã hủy";
                                }
                                ?>
</td>
<td><?=$value['trang_thai_thanh_toan'] ?></td>
                                <td>
                                    <!-- View details link with icon -->
                                    <a href="index.php?act=chi_tiet_don&id_don=<?=$value['id_don_hang'] ?>&id_tk=<?=$value['id_tai_khoan'] ?>" class="btn btn-info btn-sm viewDetails" data-id="1">
                                        <i class="fas fa-eye"></i>
                                    </a></td>
                            </tr>
                               <?php
                            }
                            ?>

                            <!-- Add more rows dynamically here using JavaScript -->
                        </tbody>
                    </table>

                    
                    
                </div>
         
                
            </div>
        </div>

    </div>

</div>

</div>