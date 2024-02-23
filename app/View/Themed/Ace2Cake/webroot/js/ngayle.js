/* 
 * Lưu trữ các ngày lễ trong năm của Việt Nam
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function getNgayLe(year_no) {
    /*Tết dương lịch 1/1*/
    var TETDUONGLICH = moment();
    TETDUONGLICH.date(1);
    TETDUONGLICH.month(0);
    TETDUONGLICH.year(year_no);
    /*Giỗ tổ Hùng Vương*/
    /*Tính ngày dương của ngày 10/3 âm dựa vào thư viện amlich-aa98.js*/
    var ngaygiotoduonglich = convertLunar2Solar(10, 3, year_no, 0, 7);

    var gioto = new Date(ngaygiotoduonglich[2], ngaygiotoduonglich[1] - 1, ngaygiotoduonglich[0]);
    var GIOTOHUNGVUONG = moment(gioto);

    /*30 tháng 4*/
    var NGAY30THANG4 = moment(new Date(year_no, 3, 30));

    /* 1 THÁNG NĂM*/
    var NGAYQUOCTELAODONG = moment(new Date(year_no, 4, 1));

    /* QUOC KHANH*/
    var NGAYQUOCKHANH = moment(new Date(year_no, 8, 2));

    /* NHA GIAO VIET NAM*/
    var NGAYNHAGIAO = moment(new Date(year_no, 10, 20));


    var NGAYLE = [
        {ngay: TETDUONGLICH, ten: "Tết dương lịch"},
        {ngay: GIOTOHUNGVUONG, ten: "Giỗ tổ Hùng Vương"},
        {ngay: NGAY30THANG4, ten: "Giải phóng Miền Nam"},
        {ngay: NGAYQUOCTELAODONG, ten: "Ngày Quốc tế Lao động"},
        {ngay: NGAYQUOCKHANH, ten: "Quốc khánh Việt Nam"},
        {ngay: NGAYNHAGIAO, ten: "Ngày nhà giáo Việt Nam"}
    ];
    return NGAYLE;
}