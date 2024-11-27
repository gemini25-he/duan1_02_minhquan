<style>
	.rating {
    font-size: 24px; /* Kích thước sao */
}

.rating .ion-ios-star,
.rating .ion-ios-star-half {
    color: #ffcc00; /* Màu vàng cho sao đầy và sao nửa */
}

.rating .ion-ios-star-outline {
    color: #cccccc; /* Màu xám cho sao rỗng */
}
.panel-heading .panel-title a::after {
        display: none !important; /* Loại bỏ dấu mũi tên */
    }
    
    /* Nếu dùng Bootstrap 4 hoặc 5, có thể là thuộc tính CSS cho collapse */
    .accordion-button::after {
        display: none !important; /* Loại bỏ dấu mũi tên trong Bootstrap Accordion */
    }
</style>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Trang chủ</a></span> <span>Cửa hàng</span></p>
            <h1 class="mb-0 bread">Cửa hàng</h1>
          </div>
        </div>
      </div>
    </div>
<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                    <?php 
foreach ($san_pham as $key => $sp) {

?>
   			<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
    				<div class="product d-flex flex-column">
    					<a href="index.php?act=chi_tiet_san_pham&id_ctsp=<?=$sp['id_san_pham'] ?>" class="img-prod"><img class="img-fluid" src="uploads/<?=$sp['hinh_anh'] ?>" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3">
    						<div class="d-flex">
    							<div class="cat">
		    						<span><?=$sp['ten_danh_muc'] ?></span>
		    					</div>
		    					<?php 
								$id_san_pham = $sp['id_san_pham'];
								$sao = lay_diem_danh_gia($id_san_pham);
								$so_luong_danh_gia = count($sao);
								$tong_diem = 0;
								foreach ($sao as $s) {
									$tong_diem += $s['diem_danh_gia'];
								}
								if ($so_luong_danh_gia > 0) {
									$diem_trung_binh = $tong_diem / $so_luong_danh_gia;
								} else {
									$diem_trung_binh = 0; 
								}
								?>
		    				<div class="rating">
   							 <?php
    							// Làm tròn điểm trung bình và hiển thị sao
    							$fullStars = floor($diem_trung_binh);
    							$halfStar = ($diem_trung_binh - $fullStars) >= 0.5 ? 1 : 0;
    							$emptyStars = 5 - $fullStars - $halfStar;

    							// Hiển thị sao đầy
    							for ($i = 0; $i < $fullStars; $i++) {
        							echo '<span class="ion-ios-star"></span>';
    							}
    							// Hiển thị sao nửa
    							if ($halfStar) {
        							echo '<span class="ion-ios-star-half"></span>';
    							}
    							// Hiển thị sao rỗng
    							for ($i = 0; $i < $emptyStars; $i++) {
    							    echo '<span class="ion-ios-star-outline"></span>';
    							}
    ?>
</div>
	    					</div>
    						<h3><a href="#"><?=$sp['ten_san_pham'] ?></a></h3>
    					
	    				
    					</div>
    				</div>
    			</div>
<?php 
}
?>

		    		</div>

		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								<h2 class="heading">Danh mục</h2>
								<div class="fancy-collapse-panel">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="">
                             <h4 class="panel-title">
                             <a href="index.php?act=cua_hang" >Tất cả</a>
                                <?php 
                                foreach ($danh_muc as $key => $dm) {
                                ?>
                                    <a href="index.php?act=cua_hang&iddm=<?=$dm['id_danh_muc'] ?>" ><?=$dm['ten_danh_muc'] ?>
                                    </a>
                                <?php
                                }
                                ?>
                             
                             </h4>
                         </div>
                     </div>
           
                  </div>
               </div>
							</div>

						</div>
    			</div>
    		</div>
    	</div>
    </section>