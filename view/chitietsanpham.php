<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .form-check-input {


    width: 0;
    height: 0;
}

.form-check-label {
    display: inline-block;
    padding: 10px 20px;
    margin: 5px;
    border-radius: 0;
    cursor: pointer;
}

.form-check-input:checked + .form-check-label {
    background-color: #DBCC8F;
    color: white;
    border-color: #007bff;
}
.userr-img {
            width: 80px; /* Chiều rộng hình vuông */
            height: 80px; /* Chiều cao hình vuông */
            
            background-size: cover; /* Đảm bảo hình ảnh bao phủ toàn bộ phần tử */
            background-position: center; /* Căn giữa hình ảnh */
            background-repeat: no-repeat; /* Không lặp lại hình ảnh */
            border-radius: 8px; /* Bo tròn các góc */
            border: 2px solid #ddd; /* Viền cho phần tử */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bóng đổ cho phần tử */
            display: inline-block; /* Hiển thị phần tử dưới dạng khối nội tuyến */
            overflow: hidden; /* Ẩn các phần hình ảnh ngoài khung */
        }
        .desc {
            display: inline-block; /* Hiển thị phần mô tả bên cạnh hình ảnh */
            vertical-align: top; /* Căn chỉnh phần mô tả với hình ảnh */
            max-width: calc(100% - 80px); /* Đảm bảo phần mô tả không quá rộng */
        }

        .desc h4 {
            margin: 0; /* Xóa khoảng cách mặc định trên và dưới tiêu đề */
            font-size: 16px; /* Kích thước font chữ cho tiêu đề */
            font-weight: bold; /* Làm đậm tiêu đề */
        }

        .desc h4 span {
            display: inline-block; /* Hiển thị các phần tử span trên cùng một dòng */
            vertical-align: middle; /* Căn chỉnh theo chiều dọc */
        }

        .desc h4 .text-left {
            float: left; /* Căn chỉnh văn bản về bên trái */
        }

        .desc h4 .text-right {
            float: right; /* Căn chỉnh văn bản về bên phải */
        }

        .desc p {
            margin: 10px 0 0; /* Khoảng cách trên và dưới đoạn văn bản */
            font-size: 14px; /* Kích thước font chữ cho nội dung */
            line-height: 1.5; /* Độ cao dòng để văn bản dễ đọc hơn */
        }
        .stars {
            font-size: 24px; /* Kích thước của sao */
        }

        .stars .fa-star {
            color: #cccccc; /* Màu mặc định của sao (chưa được đánh giá) */
        }

        .stars .fa-star.checked {
            color: #ffcc00; /* Màu cho sao đã được đánh giá */
        }


</style>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Chi tiết</span></p>
                <h1 class="mb-0 bread">Chi tiết</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <?php if (!empty($one_san_pham['anh_san_pham'])) : ?>
                    <a href="uploads/<?=$one_san_pham['anh_san_pham'][0] ?>" class="image-popup prod-img-bg">
                        <img src="uploads/<?=$one_san_pham['anh_san_pham'][0] ?>" class="img-fluid" alt="">
                    </a>
                <?php endif; ?>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?=$one_san_pham['ten_san_pham'] ?></h3>
                <div class="rating d-flex">
                    <!-- Điểm đánh giá sao -->
                </div>
                <form method="post" action="index.php?act=them_vao_gio_hang">
                <div class="row mt-4">
                    <div class="col-md-6">
                    <div class="form-group d-flex ">
    <!-- Kích thước sản phẩm -->
    <?php foreach ($one_san_pham['sizes'] as $sz) : ?>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input size-radio" type="radio" name="id_size" id="size_<?= $sz['id_size'] ?>" value="<?= $sz['id_size'] ?>">
                        
                        <label class="form-check-label btn btn-outline-secondary" for="size_<?= $sz['id_size'] ?>"><?= $sz['size_name'] ?></label>
                        
                    </div>
                    <input type="hidden"  value="<?=$sz['gia_ban'] ?>" >
                    
                    <input type="hidden"  value="<?=$sz['so_luong_ton'] ?>" >
                <?php endforeach; ?>
</div>

                    </div>
                    <div class="row mt-4">
    <div class="col-md-4 mb-4">
        <!-- Giá sản phẩm -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Giá sản phẩm</h5>
                <span id="selected-size-price">Chọn size để xem giá</span>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <!-- Số lượng tồn kho -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Số lượng tồn kho</h5>
                <span id="selected-size-quantity">Chọn size để xem số lượng</span>
            </div>
        </div>
    </div>

</div>              
                </div>
                <div class="form-group row">
                        <label for="quantity" class="col-sm-2 col-form-label">Số lượng</label>
                        <div class="col-sm-10">
                            <input type="number" id="quantity" name="so_luong" class="form-control" min="1" value="1">
                            <input type="hidden" name="gia_size" value="<?=$gia_size?>">
                        </div>
                    </div>

   
    <input type="hidden" name="id_tai_khoan" id="" value="<?php if(isset($_SESSION['user'])) {echo $_SESSION['user']['id_tai_khoan'] ; } ?>" >
    <input type="hidden" name="id_san_pham" id="" value="<?=$one_san_pham['id_san_pham'] ?>" >
    <?php if(isset($_SESSION['user'])){
        ?>
            <input class="btn btn-black py-3 px-5 mr-2" type="submit" name="them_gio_btn" id="" value="Thêm vào giỏ hàng" >
            <input class="btn btn-primary py-3 px-5" type="submit" name="mua_ngay_btn" id="" value="Mua ngay" >
        <?php
    }else {
     ?> 
         <a onclick="yeu_cau_dn()" class="btn btn-black py-3 px-5 mr-2" >Thêm vào giỏ hàng</a>
         <a onclick="yeu_cau_dn()"  class="btn btn-primary py-3 px-5" >Mua ngay</a>
     <?php
    }
     ?>

   
                </form>
                <span style="color:red;"><?php if(isset($_SESSION['thong_bao'])): ?>
    <span style="color: red;"><?=$_SESSION['thong_bao']?></span>
    <?php unset($_SESSION['thong_bao']); // Xóa thông báo sau khi hiển thị ?>
<?php endif; ?>
</span>
            </div>
        </div>

        <div class="row mt-5">
            <!-- Tabs Mô tả, Thương hiệu, Bình luận -->
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex   text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Mô tả</a>
                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Bình luận</a>
                </div>
            </div>
            <div class="col-md-12 tab-wrap">
                <div class="tab-content bg-light" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <!-- Tab Mô tả -->
                        <div class="p-4">
                            <h3 class="mb-4"><?=$one_san_pham['ten_san_pham'] ?></h3>
                            <p><?=$one_san_pham['mo_ta'] ?></p>
                        </div>
                    </div>
              
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <!-- Tab Bình luận -->
                        <div class="row p-4">
                            <div class="col-md-7">
                                <?php 
                                $so_luot_danh_gia = count($binh_luan);
                                ?>
                                <h3 class="mb-4"><?= $so_luot_danh_gia ?> Lượt đánh giá</h3>
                
                             
                                <!-- Đánh giá và bình luận sản phẩm -->                   
                                    <div class="review">
                                        <?php 
                                        foreach ($binh_luan  as $key => $bl) {
                                         ?>
                                            <div class="userr-img" style=" background-image: url(uploads/<?=$bl['hinh_anh'] ?>);" ></div>
    <div class="desc">
        <h4>
            <span class="text-left"><?=$bl['ten_dang_nhap'] ?></span>
            <span class="text-right"><?=$bl['date'] ?></span>
        </h4>
        <p><?=$bl['noi_dung'] ?></p>
        <div class="stars">
    <?php 
    $diem_danh_gia = isset($bl['diem_danh_gia']) ? $bl['diem_danh_gia'] : 0;
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $diem_danh_gia) {
            echo '<span class="fa fa-star checked"></span>';
        } else {
            echo '<span class="fa fa-star"></span>';
        }
    }
    ?>
</div>
    </div>
                                         <?php
                                        }
                                        ?>
                                        
                                    </div>
                               
                            </div>
                     
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const sizeRadios = document.querySelectorAll('.size-radio');

    sizeRadios.forEach(function(radio) {
        radio.addEventListener('click', function() {
            const selectedSizeId = this.value; // Lấy ID của size được chọn

            // Tìm thông tin chi tiết của size được chọn từ mảng sizes (được truyền từ PHP)
            const sizes = <?= json_encode($one_san_pham['sizes']) ?>; // Dữ liệu kích thước từ PHP
            const selectedSize = sizes.find(sz => sz.id_size == selectedSizeId);

            // Cập nhật thông tin chi tiết trên giao diện
            if (selectedSize) {
                document.getElementById('selected-size-price').textContent = selectedSize.gia_ban + " VNĐ"; // Cập nhật giá
                document.getElementById('selected-size-quantity').textContent = selectedSize.so_luong_ton + " sản phẩm"; // Cập nhật số lượng tồn kho
                document.getElementById('selected-size-sale').textContent = selectedSize.sale + " %";
            } else {
                document.getElementById('selected-size-price').textContent = "Chọn size để xem giá"; // Hiển thị thông báo khi không có size được chọn
                document.getElementById('selected-size-quantity').textContent = "0 sản phẩm"; // Hiển thị thông báo khi không có size được chọn
                document.getElementById('selected-size-sale').textContent = "0 %";
            }
        });
    });
});
</script>

