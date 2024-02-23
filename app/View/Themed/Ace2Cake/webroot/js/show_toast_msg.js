function coverArrayToToast(arrayObj) {
    var toasts = Array();
    $.each(arrayObj, function (arrayID, msg) {
        toasts.push(new Toast('warning', 'toast-top-right', msg));
    }
    );

   
    return toasts;
}

function Toast(type, css, msg) {
    this.type = type;
    this.css = css;
    this.msg = msg;
}




var i = 0;



function delayToasts(toasts) {
    console.log(toasts.length);
    if (i === toasts.length) {
        i=0;
        return;
    }
    var delay = i === 0 ? 0 : 1500;
    window.setTimeout(function () {
        showToast(toasts);
    }, delay);

    /* re-enable the button        
     if (i === toasts.length - 1) {
     window.setTimeout(function () {
     $('#tryMe').prop('disabled', false);
     i = 0;
     }, delay + 1000);
     }*/
}

function showToast(toasts) {
    var t = toasts[i];
    toastr.options.positionClass = t.css;
    toastr[t.type](t.msg);
    i++;
    delayToasts(toasts);
}

