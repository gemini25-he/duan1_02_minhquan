<?php 
#them hoa don
function them_hoa_don($id_tai_khoan,$tong_gio_hang,$ten_dang_nhap,$ma_hoa_don,$email,$sdt,$dia_chi,$trang_thai_giao_hang,$trang_thai_thanh_toan,$ngay_tao_don,$phuong_thuc_thanh_toan){
    $sql = "INSERT INTO don_hang(id_tai_khoan,tong_don_hang,ten_dang_nhap,ma_hoa_don,email,sdt,dia_chi,trang_thai_giao_hang,trang_thai_thanh_toan,ngay_tao_don,phuong_thuc_thanh_toan)
            VALUES('$id_tai_khoan','$tong_gio_hang','$ten_dang_nhap','$ma_hoa_don','$email','$sdt','$dia_chi','$trang_thai_giao_hang','$trang_thai_thanh_toan','$ngay_tao_don','$phuong_thuc_thanh_toan');
            
    ";
    pdo_execute($sql);
}

#lấy id đơn hàng vừa tạo
function tim_id(){
    $sql = "SELECT id_don_hang FROM don_hang ORDER BY id_don_hang DESC LIMIT 1";
    $tim = pdo_query_one($sql);
    return $tim['id_don_hang'] ;
}

#thêm hóa đơn chi tiết
function them_hoa_don_chi_tiet($id_don_hang,$id_chi_tiet_san_pham,$ten_san_pham,$so_luong,$hinh_anh_san_pham,$size_name,$gia_tong_bien_the,$tong_gio_hang){
$sql = "INSERT INTO chi_tiet_don_hang (id_don_hang, id_chi_tiet_san_pham,ten_san_pham,so_luong, hinh_anh_san_pham,size_name,tong_gia_bien_the, tong_don_hang)
                VALUES ('$id_don_hang','$id_chi_tiet_san_pham','$ten_san_pham','$so_luong','$hinh_anh_san_pham','$size_name','$gia_tong_bien_the','$tong_gio_hang')";
pdo_execute($sql);
}

#lấy id đơn hàng
function tim_id_don(){
    $sql = "SELECT * FROM don_hang ORDER BY id_don_hang DESC LIMIT 1
";
$id_don_hang = pdo_query_one($sql);
return $id_don_hang['id_don_hang'];
}
#show hóa đơn theo id tk
function show_hoa_don($id_don_hang){
   $sql ="SELECT don_hang.* ,tai_khoan.ten_dang_nhap ,tai_khoan.email, chi_tiet_don_hang.ten_san_pham,chi_tiet_don_hang.hinh_anh_san_pham,chi_tiet_don_hang.size_name,chi_tiet_don_hang.tong_don_hang,chi_tiet_don_hang.so_luong,chi_tiet_don_hang.tong_gia_bien_the,chi_tiet_don_hang.id_chi_tiet_san_pham
    FROM don_hang
    INNER JOIN chi_tiet_don_hang ON don_hang.id_don_hang = chi_tiet_don_hang.id_don_hang
    INNER JOIN tai_khoan ON don_hang.id_tai_khoan= tai_khoan.id_tai_khoan
     WHERE don_hang.id_don_hang = '$id_don_hang' ";
   $don_hang = pdo_query($sql);
   return $don_hang;
}

#lấy id_san_pham từ id_chi_tiet
function tim_san_pham($id_chi_tiet_san_pham) {
    // Lấy thông tin chi tiết sản phẩm từ bảng chi_tiet_san_pham
    $sql_chi_tiet = "SELECT * FROM chi_tiet_san_pham WHERE id_chi_tiet = '$id_chi_tiet_san_pham'";
    $chi_tiet = pdo_query_one($sql_chi_tiet);
    if ($chi_tiet) {
        $id_san_pham = $chi_tiet['id_san_pham'];      
        // Lấy thông tin sản phẩm từ bảng san_pham
        $sql_san_pham = "SELECT * FROM san_pham WHERE id_san_pham = '$id_san_pham'";
        $san_pham = pdo_query_one($sql_san_pham);
        // Trả về thông tin sản phẩm
        return $san_pham;
    }
    return null;
}   
function show_all_hoa_don(){
    $sql ="SELECT * 
    FROM don_hang
    ORDER BY id_don_hang DESC
    ";
   $don_hang = pdo_query($sql);
   return $don_hang;
}

#Đổi trạng thái đơn hàng
function thay_doi_trang_thai_don($id_don_hang,$trang_thai_giao_hang){
    $sql = "UPDATE don_hang SET trang_thai_giao_hang = '$trang_thai_giao_hang' WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#thêm lịch sử thay đổi
function luu_lich_su($id_tai_khoan, $id_don_hang, $ten_nguoi_thay_doi,$thoi_gian, $noi_dung_thay_doi){
    $sql = "INSERT INTO lich_su_thay_doi(id_tai_khoan,id_don_hang,ten_nguoi_thay_doi,thoi_gian,noi_dung)
     VALUES('$id_tai_khoan','$id_don_hang','$ten_nguoi_thay_doi','$thoi_gian','$noi_dung_thay_doi') ";
     pdo_execute($sql);
}

#show lịch sử
function show_lich_su($id_don_hang){
    $sql = "SELECT  *FROM lich_su_thay_doi WHERE id_don_hang = '$id_don_hang'";
    $lich_su = pdo_query($sql);
    return $lich_su;
}

#đếm đơn hàng chưa xử lý
function dem_don_chu_xu_ly(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 0;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  xử lý
function dem_don_da_xu_ly(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 1;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  giao
function dem_don_da_giao(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 2;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}

#đếm đơn đã  hủy
function dem_don_da_huy(){
    $sql = "SELECT COUNT(*) AS so_luong
    FROM don_hang
    WHERE trang_thai_giao_hang = 3;
    ";
    $so_luong_chua_xu_ly = pdo_query($sql);
    return $so_luong_chua_xu_ly[0]['so_luong'];
}
#đếm sản phảm đã khóa 
function san_pham_da_khoa(){
    $sql = "SELECT COUNT(*) AS so_luong
FROM san_pham
WHERE trang_thai_san_pham = 1
";
$san_pham_da_xoa = pdo_query($sql);
return $san_pham_da_xoa[0]['so_luong'];
}

#sản phẩm hết hàng
function san_pham_het_hang(){
    $sql = "SELECT COUNT(*) AS so_luong
FROM chi_tiet_san_pham
WHERE so_luong_ton = 0;
";
$san_pham_da_het = pdo_query($sql);
return $san_pham_da_het[0]['so_luong'];
}

#show hóa đơn user
function show_all_hoa_don_user($id_tai_khoan){
    $sql = "SELECT dh.id_don_hang, dh.ngay_tao_don, dh.phuong_thuc_thanh_toan, dh.ma_hoa_don, dh.tong_don_hang,dh.trang_thai_giao_hang,
            SUM(ctdh.so_luong) AS tong_so_luong_san_pham
            FROM don_hang dh
            LEFT JOIN chi_tiet_don_hang ctdh ON dh.id_don_hang = ctdh.id_don_hang
            WHERE  dh.id_tai_khoan = '$id_tai_khoan'
            GROUP BY dh.id_don_hang, dh.ngay_tao_don, dh.phuong_thuc_thanh_toan, dh.ma_hoa_don, dh.tong_don_hang
            ORDER BY dh.id_don_hang DESC
            ";
            
    $don_hang = pdo_query($sql);
    return $don_hang;
}

#update trạng thái thanh toán
function update_da_thanh_toan($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_thanh_toan = 'Đã thanh toán' WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#trạng thái hủy
function update_huy_don($id_don_hang){
    $sql = "UPDATE don_hang SET trang_thai_giao_hang = 3 WHERE id_don_hang = '$id_don_hang'";
    pdo_execute($sql);
}

#tim hóa đơn online mới nhẩt
function tim_id_don_ol(){
    $sql  = "SELECT id_don_hang
FROM don_hang 
WHERE phuong_thuc_thanh_toan = 'Thanh toán online' 
ORDER BY id_don_hang DESC 
LIMIT 1";
$hoa_don_moi = pdo_query($sql);
return $hoa_don_moi[0]['id_don_hang'];
}

#lấy đơn hàng theo id mới 
function tim_hoa_don_ol($id_don_hang){
    $sql = "SELECT *FROM don_hang WHERE id_don_hang = '$id_don_hang'";
    $don_hang = pdo_query_one($sql);
    return $don_hang;
}
?>

