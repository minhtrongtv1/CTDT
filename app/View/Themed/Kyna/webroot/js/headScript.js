$( window ).load(function() {
    var dataLayer =  window.dataLayer = window.dataLayer || [];
    var user_id = $('head').attr('data-user-id');
    dataLayer.push({
        'userID' : user_id
    });
   //  var gtmUA = new GTMUA();
   // (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
   //          new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
   //      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
   //      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
   //  })(window,document,'script','dataLayer','GTM-TVZVN3');
    // <!-- Facebook Pixel Code -->
    setTimeout(function(){
        var script = document.createElement("script");
        script.setAttribute("type", "text/javascript");
        script.innerHTML = "var fbPixel = new FBPIXEL()";
        document.body.appendChild(script);
    }, 300);
});