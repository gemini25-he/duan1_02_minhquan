
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Trang chủ</a></span> <span>Thanh toán</span></p>
            <h1 class="mb-0 bread">Thanh toán</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="index.php?act=xac_nhan" class="billing-form" method="post" >
							<h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Họ tên</label>
	                  <input type="text" class="form-control" value="<?=$_SESSION['user']['ten_dang_nhap'] ?>" name="ten_dang_nhap" >
	                </div>
	              </div>
				  <div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Địa chỉ</label>
	                  <input type="text" class="form-control" value="<?=$_SESSION['user']['dia_chi'] ?>" name="dia_chi">
	                </div>
	              </div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" value="<?=$_SESSION['user']['sdt'] ?>"  name="sdt">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" value="<?=$_SESSION['user']['email'] ?>"  name="email">
	                </div>
                </div>
	            </div>
                <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Tổng hóa đơn</h3>
						  <?php 
	$hoa_don = tat_ca_ma_giam_gia();
	?>
	          			<p class="d-flex">
		    						<span>Tổng tạm</span>
		    						<span id="tong_tam"><?= number_format($tong_gio_hang) ?> Đồng</span>
									
		    					</p>
								<span>Mã giảm giá</span>
                                    <select id="discount_code" name="discount_code" onchange="applyDiscount()">
                                        <option value="0" data-amount="0">Chọn mã giảm giá</option>
                                        <?php foreach ($hoa_don as $key => $hd) { ?>
                                            <option value="<?= $hd['id_giam_gia'] ?>" data-amount="<?= $hd['giam_gia'] ?>"><?= $hd['ten_giam_gia'] ?></option>
                                        <?php } ?>
                                    </select>
		    					<hr>
		    					<p class="d-flex total-price">
		    						<span>Tổng</span>
		    						<span id="tong_thanh_toan"><?php 
							if(isset($tong_gio_hang)){ echo number_format($tong_gio_hang) ." Đồng"; }else { $tong_gio_hang = 0; echo $tong_gio_hang ." Đồng";}
							?></span>
		    					</p>
								</div>
	          	</div>
				
	          	<div class="col-md-6">
	          		<div class="cart-detail bg-light p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" value="0" name="thanh_toan" class="mr-2"> Thanh toán khi nhận hàng</label>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-12">
											<div class="radio">
											   <label><input type="radio" value="1" name="thanh_toan" class="mr-2"> Chuyển khoản</label>
											</div>
										</div>
									</div>						  								
                                    <input class="btn btn-primary py-3 px-4" type="submit" name="dat_hang_btn" id="" value="Đặt hàng" >
								</div>
	          	</div>
	          </div>
	          </form><!-- END -->



	        
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->
	<script>
function applyDiscount() {
    var discountSelect = document.getElementById('discount_code');
    var selectedOption = discountSelect.options[discountSelect.selectedIndex];
    var discountAmount = parseFloat(selectedOption.getAttribute('data-amount'));
    var tongTam = <?= $tong_gio_hang ?>;
	var soTienGiam =tongTam*discountAmount/100;
    var tongThanhToan = tongTam - soTienGiam;

    document.getElementById('tong_tam').innerText = tongTam.toLocaleString() + ' Đồng';
    document.getElementById('tong_thanh_toan').innerText = tongThanhToan.toLocaleString() + ' Đồng';
	// console.log(tongThanhToan);
	
}
</script>