<?php

switch ($status) {
    
    case PROJECT_LUU_NHAP:
        echo '<span class="badge badge-warning">Nháp</span>';

        break;
    
    case PROJECT_DA_GUI:
        echo '<span class="badge badge-info">Đã gửi</span>';

        break;
    
    case PROJECT_DA_DUOC_CHON:
        echo '<span class="badge badge-success">Đã được chọn</span>';

        break;
    
    case PROJECT_DA_DUYET:
        echo '<span class="badge badge-info">Đã duyệt</span>';

        break;
    case PROJECT_DANG_THUC_HIEN:
        echo '<span class="badge badge-success">Đang nghiên cứu</span>';

        break;
    case PROJECT_DA_HOAN_THANH:
        echo '<span class="badge badge-primary">Đã hoàn thành</span>';
        break;
     case PROJECT_DA_CHUYEN_GIAO:
        echo '<span class="badge badge-primary">Đã chuyển giao</span>';
        break;
}
