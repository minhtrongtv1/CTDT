/*
 * This is the plugin
 */
(function (a) {
    a.createModal = function (b) {
        defaults = {title: "", message: "Your Message Goes Here!", closeButton: true, scrollable: false};
        var b = a.extend({}, defaults, b);
        var c = (b.scrollable === true) ? 'style="max-height: 900px;overflow-y: auto;"' : "";
        html = '<div class="modal fade" id="myModal">';
        html += '<div class="modal-dialog">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';

        if (b.title.length > 0) {
            html += '<h4 class="modal-title">' + b.title + "</h4>"
        }
        html += "</div>";
        html += '<div class="modal-body" ' + c + ">";
        html += b.message;
        html += "</div>";
        html += '<div class="modal-footer">';

        html += "</div>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        a("body").prepend(html);
        a("#myModal").modal().on("hidden.bs.modal", function (e) {
            
            a(this).remove();
        });
    }
})(jQuery);
function confirmDelete(delUrl)
{
    if (confirm('Bạn có muốn xóa thật không?') == true)
    {
        if (confirm('Tất cả các dữ liệu con của nó cũng sẽ bị xóa. Bạn có muốn thao tác tiếp') == true)
        {
            document.location = delUrl;
        }
    }
}
function get_alias() {
    var str = (document.getElementById("idtitle").value);
    str = str.toLowerCase();
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/!|@|\$|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\'| |\"|\&|\#|\[|\]|~/g, "-");
    str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
    str = str.replace(/^\-+|\-+$/g, "");//cắt bỏ ký tự - ở đầu và cuối chuỗi
    document.getElementById("idalias").value = str;
    return str;
}
function BrowseServer()
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField;
    finder.popup();
}

function SetFileField(fileUrl)
{
    document.getElementById('xFilePath').value = fileUrl;
}

function BrowseServer2()
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField2;
    finder.popup();
}

function SetFileField2(fileUrl)
{
    document.getElementById('xFilePath2').value = fileUrl;
}

function BrowseServer3()
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField3;
    finder.popup();
}

function SetFileField3(fileUrl)
{
    document.getElementById('xFilePath3').value = fileUrl;
}

function BrowseServer4()
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField4;
    finder.popup();
}

function SetFileField4(fileUrl)
{
    document.getElementById('xFilePath4').value = fileUrl;
}

function BrowseServer5()
{
    var finder = new CKFinder();
    finder.basePath = 'ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
    finder.selectActionFunction = SetFileField5;
    finder.popup();
}

function SetFileField5(fileUrl)
{
    document.getElementById('xFilePath5').value = fileUrl;
}


$(document).ready(function () {
    $('#checkall:checkbox').change(function () {
        if ($(this).attr("checked"))
            $('input:checkbox').attr('checked', 'checked');
        else
            $('input:checkbox').removeAttr('checked');
    });
})