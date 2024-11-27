<style>
            .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            margin-bottom: 10px;
        }

        .list-group-item:hover {
            background-color: #f8f9fa; /* Màu sáng khi hover */
        }
        .list-group-item.active {
            background-color: #343a40; /* Màu tối khi active */
            color: #fff;
        }
        .btn-custom {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 15px;
    margin-bottom: 10px;
    background-color: #f8f9fa;
    color: #333;
    border: 1px solid #ddd;
    border-radius: 4px;
    text-decoration: none;
    font-size: 16px;
}

.btn-custom:hover {
    background-color: #e2e6ea;
    color: #007bff;
    text-decoration: none;
}

.btn-custom .badge {
    font-size: 14px;
}

    </style>
<div class="container-fluid">
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Thống kê bán hàng</h1>

</div>
<div class="row">
        <!-- Đơn Hàng Lẻ -->
        <div class="col-md-4">
            <div class="btn-group-vertical btn-group-lg w-100">
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-clock text-warning"></i> Chưa Xử Lý
                    <span class="badge badge-light">
                        <?php echo isset($chua_xu_ly) ? htmlspecialchars($chua_xu_ly) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-check text-info"></i> Đã Xử Lý
                    <span class="badge badge-light">
                        <?php echo isset($da_xu_ly) ? htmlspecialchars($da_xu_ly) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-truck text-primary"></i> Đang Giao
                    <span class="badge badge-light">
                        <?php echo isset($da_xu_ly) ? htmlspecialchars($da_xu_ly) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-box text-success"></i> Đã Giao
                    <span class="badge badge-light">
                        <?php echo isset($da_giao) ? htmlspecialchars($da_giao) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-times text-danger"></i> Đã Hủy
                    <span class="badge badge-light">
                        <?php echo isset($da_huy) ? htmlspecialchars($da_huy) : '0'; ?>
                    </span>
                </a>
            </div>
        </div>

        <!-- Đơn Hàng Dự Án -->
        <div class="col-md-4">
            <div class="btn-group-vertical btn-group-lg w-100">
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-trophy text-warning"></i> Top 8 sản phẩm được yêu thích
                    <span class="badge badge-light">7</span>
                </a>
            </div>
        </div>

        <!-- Sản Phẩm -->
        <div class="col-md-4">
            <div class="btn-group-vertical btn-group-lg w-100">
                <a href="index.php?act=san_pham_da_xoa" class="btn btn-custom">
                    <i class="fas fa-lock text-secondary"></i> Sản Phẩm Ngừng kinh doanh
                    <span class="badge badge-light">
                        <?php echo isset($san_pham_da_xoa) ? htmlspecialchars($san_pham_da_xoa) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-exclamation-triangle text-danger"></i> Sản Phẩm Hết Hàng
                    <span class="badge badge-light">
                        <?php echo isset($san_pham_het_hang) ? htmlspecialchars($san_pham_het_hang) : '0'; ?>
                    </span>
                </a>
                <a href="#" class="btn btn-custom">
                    <i class="fas fa-ticket-alt"></i> Voucher hết hạn
                    <span class="badge badge-light">7</span>
                </a>
            </div>
        </div>
    </div>
</div>

