<?php 
#thêm sản phẩm
function them_san_pham($ten_san_pham,$mo_ta,$danh_muc){
$sql = "INSERT INTO san_pham(id_danh_muc,ten_san_pham,mo_ta,luot_xem,trang_thai_san_pham) VALUES('$danh_muc','$ten_san_pham','$mo_ta','0','0')";
pdo_execute($sql);
}

#thêm biến thể sản phẩm 
function them_bien_the_san_pham($id_san_pham,$size,$gia_nhap,$gia_ban,$so_luong){
    $sql = "INSERT INTO chi_tiet_san_pham(id_san_pham,id_size,gia_nhap,gia_ban,so_luong_ton) VALUES('$id_san_pham','$size','$gia_nhap','$gia_ban','$so_luong')";
    pdo_execute($sql);
}

#thêm ảnh sản phẩm
function them_anh_san_pham($id_san_pham,$hinh_anh){
$sql ="INSERT INTO  anh_san_pham(id_san_pham,hinh_anh) VALUES('$id_san_pham','$hinh_anh')";
pdo_execute($sql);
}

#hàm tìm id sản phẩm lớn nhất, nghĩa là sản phẩm vừa đc thêm vào
function tim_idsp() {
    $sql = "SELECT id_san_pham FROM san_pham ORDER BY id_san_pham DESC LIMIT 1";
    $id_san_pham = pdo_query_one($sql);
    return $id_san_pham['id_san_pham'];
}


#show tất cả sản phẩm 
function tat_ca_san_pham($iddm) {
    if ($iddm != 0) {
        $sql = "SELECT 
                     san_pham.*, 
                    danh_muc.ten_danh_muc,
                    MIN(anh_san_pham.hinh_anh) as hinh_anh,
                    SUM(DISTINCT  chi_tiet_san_pham.so_luong_ton) AS tong_so_luong                 
                FROM 
                    san_pham 
                JOIN 
                    danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc
                LEFT JOIN 
                    chi_tiet_san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham
                LEFT JOIN 
                    anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id_san_pham
                WHERE 
                    san_pham.trang_thai_san_pham = 0 AND danh_muc.trang_thai = 0 AND san_pham.id_danh_muc = '$iddm'
                GROUP BY 
                   san_pham.id_san_pham, san_pham.ten_san_pham, san_pham.mo_ta, danh_muc.id_danh_muc
                   ORDER BY 
                 san_pham.id_san_pham DESC
                   ";
    } else {
        $sql = "SELECT 
                     san_pham.*, 
                    danh_muc.ten_danh_muc,
                    MIN(anh_san_pham.hinh_anh) as hinh_anh,
                    SUM(DISTINCT  chi_tiet_san_pham.so_luong_ton) AS tong_so_luong                 
                FROM 
                    san_pham
                JOIN 
                    danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc
                LEFT JOIN 
                    chi_tiet_san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham
                LEFT JOIN 
                    anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id_san_pham
                WHERE 
                    san_pham.trang_thai_san_pham = 0 AND danh_muc.trang_thai = 0
                GROUP BY 
                    san_pham.id_san_pham, san_pham.ten_san_pham, san_pham.mo_ta, danh_muc.id_danh_muc
                    ORDER BY 
                    san_pham.id_san_pham DESC
                    ";
    }

    $san_pham = pdo_query($sql);
    return $san_pham;
}

#sản phẩm lượt xem cao 
function tat_ca_san_pham_view($iddm) {
    $sql = "SELECT 
                san_pham.*, 
                danh_muc.ten_danh_muc,
                MIN(anh_san_pham.hinh_anh) as hinh_anh
            FROM 
                san_pham
            JOIN 
                danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc
            LEFT JOIN 
                anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id_san_pham
            WHERE 
                san_pham.trang_thai_san_pham = 0 AND danh_muc.trang_thai = 0";

    // Nếu có id danh mục, thêm điều kiện vào câu truy vấn
    if ($iddm != 0) {
        $sql .= " AND san_pham.id_danh_muc = '$iddm'";
    }

    // Sắp xếp theo lượt xem và lấy 8 sản phẩm hàng đầu
    $sql .= " GROUP BY san_pham.id_san_pham
              ORDER BY san_pham.luot_xem DESC
              LIMIT 8";

    $san_pham = pdo_query($sql);
    return $san_pham;
}

#xóa sản phẩm
function xoa_san_pham($id_san_pham){
    $sql = "UPDATE san_pham SET trang_thai_san_pham = 1 WHERE id_san_pham = '$id_san_pham'";
    pdo_execute($sql);
}

#khôi phục sản phẩm
function khoi_phuc_san_pham($id_san_pham){
    $sql = "UPDATE san_pham SET trang_thai_san_pham = 0 WHERE id_san_pham = '$id_san_pham'";
    pdo_execute($sql);
}

#sản phẩm đã xóa 
function san_pham_da_xoa(){
    $sql = "SELECT 
                    DISTINCT san_pham.*, 
                    danh_muc.ten_danh_muc,
                    MIN(anh_san_pham.hinh_anh) as hinh_anh,
                    SUM(DISTINCT  chi_tiet_san_pham.so_luong_ton) AS tong_so_luong                 
                FROM 
                    san_pham
                JOIN 
                    danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc
                LEFT JOIN 
                    chi_tiet_san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham
                LEFT JOIN 
                    anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id_san_pham
                WHERE 
                    san_pham.trang_thai_san_pham = 1 AND danh_muc.trang_thai = 0
                GROUP BY 
                    san_pham.id_san_pham";
        
    $san_pham = pdo_query($sql);
    return $san_pham;
}

#show 1 sản phẩm theo id
function show_1_san_pham($id_san_pham){
    $sql = "SELECT 
                san_pham.id_san_pham,
                san_pham.ten_san_pham,
                san_pham.mo_ta,
                san_pham.luot_xem,
                san_pham.id_danh_muc,
                danh_muc.ten_danh_muc,
                danh_muc.id_danh_muc,
                size_bien_the.id_size,
                size_bien_the.size_name,
                chi_tiet_san_pham.so_luong_ton,
                chi_tiet_san_pham.gia_nhap,
                chi_tiet_san_pham.id_chi_tiet,
                chi_tiet_san_pham.gia_ban,
                anh_san_pham.hinh_anh
            FROM 
                san_pham
            JOIN 
                danh_muc ON san_pham.id_danh_muc = danh_muc.id_danh_muc
            LEFT JOIN 
                chi_tiet_san_pham ON chi_tiet_san_pham.id_san_pham = san_pham.id_san_pham
            LEFT JOIN 
                size_bien_the ON chi_tiet_san_pham.id_size = size_bien_the.id_size
            LEFT JOIN 
                anh_san_pham ON anh_san_pham.id_san_pham = san_pham.id_san_pham
            WHERE 
                san_pham.trang_thai_san_pham = 0 
                AND danh_muc.trang_thai = 0 
                 AND size_bien_the.trang_thai = 0 
                AND san_pham.id_san_pham = '$id_san_pham'";

    $results = pdo_query($sql);

    if (!$results) {
        return false;
    }

    // Tạo một mảng để lưu trữ thông tin chi tiết sản phẩm và ảnh sản phẩm
    $one_san_pham = array(
        'id_san_pham' => $results[0]['id_san_pham'],
        'id_danh_muc' => $results[0]['id_danh_muc'],
        'ten_san_pham' => $results[0]['ten_san_pham'],
        'mo_ta' => $results[0]['mo_ta'],
        'luot_xem' => $results[0]['luot_xem'],
        'ten_danh_muc' => $results[0]['ten_danh_muc'],
        'sizes' => array(),
        'anh_san_pham' => array() 
    );

    // Dùng một mảng tạm để theo dõi các id_size đã xuất hiện, để đảm bảo mỗi biến thể của sản phẩm chỉ đc thêm vào bảng size 1 lần
    $seen_sizes = array();

    // Lặp qua các dòng kết quả để lấy thông tin chi tiết của từng biến thể
    foreach ($results as $row) {
        // Kiểm tra xem id_size đã được lấy chưa
        if (!in_array($row['id_size'], $seen_sizes)) {
            $seen_sizes[] = $row['id_size'];

            // Thêm thông tin biến thể vào mảng sizes
            $one_san_pham['sizes'][] = array(
                'id_size' => $row['id_size'],
                'size_name' => $row['size_name'],
                'so_luong_ton' => $row['so_luong_ton'],
                'gia_nhap' => $row['gia_nhap'],
                
                'gia_ban' => $row['gia_ban']
            );
        }

        // Thêm đường dẫn ảnh vào mảng anh_san_pham (nếu chưa có)
        if (!empty($row['hinh_anh']) && !in_array($row['hinh_anh'], $one_san_pham['anh_san_pham'])) {
            $one_san_pham['anh_san_pham'][] = $row['hinh_anh'];
        }
    }

    return $one_san_pham;
}

#sửa sản phẩm
function sua_san_pham($id_san_pham, $ten_san_pham, $mo_ta, $danh_muc) {
    $sql = "UPDATE san_pham SET
                id_danh_muc = '$danh_muc',
                ten_san_pham = '$ten_san_pham',
                mo_ta = '$mo_ta',
                trang_thai_san_pham = '0'
               
            WHERE id_san_pham = '$id_san_pham'";
    
    pdo_execute($sql);
}

#sửa biến thể sản phẩm
function sua_bien_the_san_pham($id_san_pham, $size, $gia_nhap, $gia_ban, $so_luong) {
    $sql = "UPDATE chi_tiet_san_pham SET
                id_size = '$size',
                gia_nhap = '$gia_nhap',
                gia_ban = '$gia_ban',
                so_luong_ton = '$so_luong'
            WHERE id_san_pham = '$id_san_pham' AND id_size = '$size'";
    pdo_execute($sql);
}
// Hàm kiểm tra biến thể đã tồn tại
function bien_the_da_ton_tai($id_san_pham, $size) {
    $sql = "SELECT * FROM chi_tiet_san_pham WHERE id_san_pham = '$id_san_pham' AND id_size = '$size'";
    $result = pdo_query_one($sql);
    return $result != false;
}

#hàm lấy giá biến thể
function tim_gia_bien_the($id_san_pham,$id_size){
    $sql ="SELECT gia_ban FROM chi_tiet_san_pham WHERE id_san_pham = '$id_san_pham' AND id_size = '$id_size'";
    $bien_the = pdo_query_one($sql);
    return $bien_the['gia_ban'];
}

#hàm lấy số lượng biến thể
function tim_so_luong_bien_the($id_san_pham,$id_size){
    $sql ="SELECT so_luong_ton FROM chi_tiet_san_pham WHERE id_san_pham = '$id_san_pham' AND id_size = '$id_size'";
    $bien_the = pdo_query_one($sql);
    return $bien_the['so_luong_ton'];
}

#lấy id biến thể
function tim_id_bien_the($id_san_pham,$id_size){
    $sql ="SELECT id_chi_tiet FROM chi_tiet_san_pham WHERE id_san_pham = '$id_san_pham' AND id_size = '$id_size'";
    $bien_the = pdo_query_one($sql);
    return $bien_the['id_chi_tiet'];
}



#lấy ảnh sản phẩm 
function tim_anh_san_pham($id_san_pham){
    $sql ="SELECT hinh_anh FROM san_pham 
    INNER JOIN anh_san_pham ON san_pham.id_san_pham = anh_san_pham.id_san_pham
    WHERE san_pham.id_san_pham = '$id_san_pham'";
    $bien_the = pdo_query_one($sql);
    return $bien_the['hinh_anh'];
}

#lấy ra tên biến thể
function tim_ten_san_pham($id_bien_the){
    $sql ="SELECT ten_san_pham 
    FROM chi_tiet_san_pham 
    INNER JOIN san_pham ON san_pham.id_san_pham = chi_tiet_san_pham.id_san_pham 
    WHERE chi_tiet_san_pham.id_chi_tiet =  '$id_bien_the'";
    $ten_san_pham = pdo_query_one($sql);
    return $ten_san_pham['ten_san_pham'];
}

#cập nhật lại số lượng sau khi thanh toán thành công
function cap_nhat_so_luong($id_bien_the,$so_luong){
    $sql ="UPDATE chi_tiet_san_pham SET so_luong_ton = so_luong_ton - '$so_luong' WHERE id_chi_tiet = '$id_bien_the'";
    pdo_execute($sql);
}

#tăng view
function update_view($id_san_pham){
    $sql = "UPDATE san_pham SET luot_xem = luot_xem + 1 WHERE id_san_pham = '$id_san_pham'";
    pdo_execute($sql);
}
?>