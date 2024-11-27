<style>
.alert-info {
    padding: 15px;
    margin: 20px 0;
    border-radius: 5px;
    background-color: #d9edf7; /* Màu nền xanh nhạt */
    color: #31708f; /* Màu chữ xanh đậm */
    border: 1px solid #bce8f1; /* Đường viền xanh nhạt */
}
.form-control {
    background-color: #ffffff; /* Màu nền trắng cho các phần tử có thể chọn */
    color: #000000; /* Màu chữ đen cho các phần tử có thể chọn */
    border: 1px solid #ced4da; /* Viền mặc định */
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out; /* Hiệu ứng chuyển màu viền và bóng */
}

/* Hiệu ứng khi chọn vào trường select */
.form-control:focus {
    border-color: #28a745; /* Màu viền xanh lá cây khi chọn vào trường select */
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); /* Hiệu ứng viền sáng xanh lá cây */
}

/* Phần tử select khi bị disabled */
.form-control:disabled {
    background-color: #e9ecef; /* Màu nền mờ cho phần tử disabled */
    color: #6c757d; /* Màu chữ mờ cho phần tử disabled */
    border-color: #ced4da; /* Viền nhạt cho phần tử disabled */
    cursor: not-allowed; /* Con trỏ mờ khi hover vào phần tử disabled */
}

/* Pseudo-element cho phần tử disabled */
.form-control:disabled::after {
    content: ""; /* Nội dung trống */
    background: rgba(0, 0, 0, 0.1); /* Màu nền mờ để tạo hiệu ứng bị disable */
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    pointer-events: none; /* Vô hiệu hóa các sự kiện chuột */
}
</style>

<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Chi tiết đơn hàng</h1>

<!-- Product Details -->
<div class="row">
    <div class="col-lg-12">
    <?php 
 
if(isset($hoa_don) && !empty($hoa_don)){
    
    // Hiển thị thông tin chung của đơn hàng
    $first_don_hang = reset($hoa_don); // Lấy đơn hàng đầu tiên trong mảng
?>   
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Tên người nhận:</div>
                    <div class="col-sm-10"><?=$first_don_hang['ten_dang_nhap']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Mã đơn hàng:</div>
                    <div class="col-sm-10"><?=$first_don_hang['ma_hoa_don']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Địa chỉ:</div>
                    <div class="col-sm-10"><?=$first_don_hang['dia_chi']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Email:</div>
                    <div class="col-sm-10"><?=$first_don_hang['email']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">SDT:</div>
                    <div class="col-sm-10"><?=$first_don_hang['sdt']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Ngày tạo đơn:</div>
                    <div class="col-sm-10"><?=$first_don_hang['ngay_tao_don']?></div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Phương thức thanh toán:</div>
                    <div class="col-sm-10"><?=$first_don_hang['phuong_thuc_thanh_toan']?></div>
                </div>
                <div class="row mb-4">
    <div class="col-sm-2 font-weight-bold">Trạng thái giao hàng:</div>
    <div class="col-sm-10">
    <form action="index.php?act=thay_doi_trang_thai_don" method="POST" class="d-flex align-items-center">
    <select class="form-control form-control-sm w-50 mr-2" name="trang_thai_giao_hang" id="trang_thai_giao_hang" <?= $first_don_hang['trang_thai_giao_hang'] == 2 ? 'disabled' : '' ?>>
        <option value="">Trạng thái</option>
        <option value="0" <?= $first_don_hang['trang_thai_giao_hang'] == 0 ? 'selected' : '' ?> <?= $first_don_hang['trang_thai_giao_hang'] > 0 ? 'disabled' : '' ?>>Đang chờ xử lý</option>
        <option value="1" <?= $first_don_hang['trang_thai_giao_hang'] == 1 ? 'selected' : '' ?> <?= $first_don_hang['trang_thai_giao_hang'] == 0 ? '' : 'disabled' ?>>Đang giao</option>
        <option value="2" <?= $first_don_hang['trang_thai_giao_hang'] == 2 ? 'selected' : '' ?> <?= $first_don_hang['trang_thai_giao_hang'] == 1 ? '' : 'disabled' ?>>Đã giao</option>
        <option value="3" <?= $first_don_hang['trang_thai_giao_hang'] == 3 ? 'selected' : '' ?> <?= $first_don_hang['trang_thai_giao_hang'] == 0 ? '' : 'disabled' ?>>Đã hủy</option>
    </select>
    <input type="hidden" name="trang_thai_hien_tai" value="<?= $first_don_hang['trang_thai_giao_hang'] ?>">
    <input type="hidden" name="id_don_hang" value="<?= $first_don_hang['id_don_hang'] ?>">
    <input type="hidden" name="ten_dang_nhap" value="<?= $first_don_hang['ten_dang_nhap'] ?>">
    <input type="hidden" name="email" value="<?= $first_don_hang['email'] ?>">
    <button type="submit" class="btn btn-primary" <?= $first_don_hang['trang_thai_giao_hang'] == 2 ? 'disabled' : '' ?>>Thay đổi</button>
</form>


    </div>
</div>


            
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Trạng thái thanh toán:</div>
                    <div class="col-sm-10"><?=$first_don_hang['trang_thai_thanh_toan']?></div>
                </div>
                
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
            </div> 
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Ảnh</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stt = 1;
                            foreach ($hoa_don as $value) {
                                $thanh_tien = $value['tong_gia_bien_the'];
                                $gia_ban = $thanh_tien / $value['so_luong'] ;
                                echo "<tr>
                                    <td>{$stt}</td>
                                    <td>{$value['ten_san_pham']}</td>
                                    <td><img src='../uploads/{$value['hinh_anh_san_pham']}' alt='Ảnh sản phẩm' style='width: 50px;'></td>
                                    <td>".number_format($gia_ban)." đồng</td>
                                    <td>{$value['so_luong']}</td>
                                    <td>".number_format($thanh_tien)." đồng</td>
                                </tr>";
                                $stt++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-2 font-weight-bold">Tổng giá:</div>
                    <div class="col-sm-10"><?=number_format($first_don_hang['tong_don_hang'])?> đồng</div>
                </div>
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Lịch sử thay đổi</h6>
            </div> 
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên người sửa</th>
                                <th>Thời gian sửa</th>
                                <th>Nội dung</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $stt = 1;
                            $id_don = $first_don_hang['id_don_hang'];
                            $lich_su = show_lich_su($id_don);
                            if($lich_su != false){
                                foreach ($lich_su as $ls) {                         
                                    echo "<tr>
                                        <td>{$stt}</td>
                                        <td>{$ls['ten_nguoi_thay_doi']}</td>                                   
                                        <td>{$ls['thoi_gian']}</td>
                                        <td>{$ls['noi_dung']}</td>
                                    </tr>";
                                    $stt++;
                                }
                            }else{
                               $thong_bao = "Chưa có bất kỳ thay đổi gì cho đơn hàng này";
                            }
                          
                            ?>
                           
                        </tbody>                    
                    </table>
                    <?php if (isset($thong_bao)) : ?>
    <div class="alert alert-info" role="alert">
        <?= $thong_bao ?>
    </div>
<?php endif; ?>
                </div>     
                <div class="row">
                    <div class="col-sm-10 offset-sm-2">
                        <a href="index.php?act=don_hang" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
} else {
    echo "Không tìm thấy đơn hàng.";
}
?>
    </div>
</div>
</div>
