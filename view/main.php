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



</style>
<section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="images/bg_1.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm mới</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">Giày thể thao nam</h1>
				            <p class="mb-4">
								Một dòng sông nhỏ tên Duden chảy ngang qua nơi này và mang lại nguồn cung cấp cần thiết. Đây là một thiên đường tráng lệ.</p>
				            
				            <p><a href="index.php?act=cua_hang" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight">
	      	<div class="overlay"></div>
	        <div class="container-fluid p-0">
	          <div class="row d-flex no-gutters slider-text align-items-center justify-content-end" data-scrollax-parent="true">
	          	<img class="one-third order-md-last img-fluid" src="images/bg_2.png" alt="">
		          <div class="one-forth d-flex align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
		          	<div class="text">
		          		<span class="subheading">#Sản phẩm mới</span>
		          		<div class="horizontal">
				            <h1 class="mb-4 mt-3">HUNTER</h1>
				            <p class="mb-4">Một dòng sông nhỏ tên Duden chảy ngang qua nơi này và mang lại nguồn cung cấp cần thiết. Đây là một thiên đường tráng lệ.</p>
				            
				            <p><a href="index.php?act=cua_hang" class="btn-custom">Khám phá ngay</a></p>
				          </div>
		            </div>
		          </div>
	        	</div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-bag"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Miễn phí vận chuyển</h3>
                <p>Để mang lại trải nghiệm mua sắm tốt nhất cho khách hàng, chúng tôi cung cấp dịch vụ vận chuyển miễn phí, giúp bạn tiết kiệm chi phí và thời gian. Hãy khám phá ngay!.</p>
              </div>
            </div>      
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Hỗ trợ 24/7</h3>
                <p>Chúng tôi cam kết hỗ trợ khách hàng 24/7, luôn sẵn lòng giải đáp mọi thắc mắc và cung cấp sự giúp đỡ mọi lúc, mọi nơi. Đừng ngần ngại liên hệ với chúng tôi, chúng tôi luôn ở đây để hỗ trợ bạn!</p>
              </div>
            </div>    
          </div>
          <div class="col-lg-4 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services p-4 py-md-5">
              <div class="icon d-flex justify-content-center align-items-center mb-4">
            		<span class="flaticon-payment-security"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Thanh toán an toàn</h3>
                <p>Hệ thống thanh toán của chúng tôi được mã hóa mạnh mẽ và tuân thủ nghiêm ngặt các tiêu chuẩn bảo mật, giúp bảo vệ thông tin cá nhân và tài khoản của bạn. Bạn có thể yên tâm mua sắm trên trang web của chúng tôi mà không phải lo lắng về vấn đề bảo mật.</p>
              </div>
            </div>      
          </div>
        </div>
			</div>
		</section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Top 8 sản phẩm được yêu thích nhất</h2>
          
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
 
<?php 
foreach ($san_pham as $key => $sp) {

?>
   			<div class="col-sm-12 col-md-6 col-lg-3  ftco-animate d-flex">
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
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row">
        	<div class="col-lg-5">
        		<div class="services-flow">
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-bag"></span>
        				</div>
        				<div class="text">
	        				<h3>Miễn phí vận chuyển</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
        				</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-heart-box"></span>
        				</div>
        				<div class="text">
	        				<h3>Rinh ngay quà xịn</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-payment-security"></span>
        				</div>
        				<div class="text">
	        				<h3>Hỗ trợ 24/7</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        			<div class="services-2 p-4 d-flex ftco-animate">
        				<div class="icon">
        					<span class="flaticon-customer-service"></span>
        				</div>
        				<div class="text">
	        				<h3>Bảo mật thanh toán</h3>
	        				<p class="mb-0">Separated they live in. A small river named Duden flows</p>
	        			</div>
        			</div>
        		</div>
        	</div>
          <div class="col-lg-7">
          	<div class="heading-section ftco-animate mb-5">
	            <h2 class="mb-4">Khách hàng của chúng tôi nói</h2>
	           
	          </div>
            <div class="carousel-testimony owl-carousel">  
				<?php 
				$binh_luan = show_binh_luan();
				foreach ($binh_luan as $key => $value) {
					?>
					   <div class="item">
                <div class="testimony-wrap">
                  <div class="user-img mb-4" style="background-image: url(uploads/<?=$value['hinh_anh'] ?>)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-4 pl-4 line"><?=$value['noi_dung'] ?>.</p>
                    <p class="name"><?=$value['ten_dang_nhap'] ?></p>
                    <span class="position"><?=$value['email'] ?></span>
                  </div>
                </div>
              </div>
					<?php
				}
				?>     
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-gallery">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-8 heading-section text-center mb-4 ftco-animate">
            <h2 class="mb-4">Theo dõi chúng tôi trên facebook</h2>
           
          </div>
    		</div>
    	</div>
    	<div class="container-fluid px-0">
    		<div class="row no-gutters">
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-1.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-1.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-2.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-2.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-3.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-3.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-4.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-4.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-5.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-5.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
					<div class="col-md-4 col-lg-2 ftco-animate">
						<a href="images/gallery-6.jpg" class="gallery image-popup img d-flex align-items-center" style="background-image: url(images/gallery-6.jpg);">
							<div class="icon mb-4 d-flex align-items-center justify-content-center">
    						<span class="icon-instagram"></span>
    					</div>
						</a>
					</div>
        </div>
    	</div>
    </section>
	