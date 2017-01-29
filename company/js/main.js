$( document ).ready(function() {


 //Bootstrap Stop carousel
    $('#myCarousel').carousel({
       interval: 5000
    });



 //Testimonial owlCarousel
  $("#owl-example").owlCarousel({
          // Most important owl features
    items : 1,
    singleItem: true,
    pagination: false,
    navigation: true,
    rewindNav: false,
    autoWidth:true,
    navigationText : false,});




    //Top menu active link
    $('.navbar-nav li a').each( function(){
        if ($(this).attr('href') == window.location.href)
        {
            $(this).addClass('active').siblings().removeClass('active');
        }
    });



    //Top menu Service Page active link
        $('.services-menu a').each(function() {
            if ($(this).attr('href') == window.location.href)
            {
                $(this).parent().addClass('active').siblings().removeClass('active');
            }
        });



/*
*
*  If IE 11 browser make the certain images responsive
*
* */
   // alert(navigator.userAgent);


    if (navigator.userAgent.search(/rv:11/) > 0) {
        // Response img for '.img-responsive' - ie11
        var maxWidthTopImg;

        $('.img-responsive').each(function () {

            var valRegExp = /^(.*\()([^\)]+)(\).*)/;
            var str = $(this).attr('sizes').match(valRegExp)[2];

            var patternNum = /[0-9]+/g;
            maxWidthTopImg = str.match(patternNum)[0];

        })

        if ($(window).width() < maxWidthTopImg) {
            var realWidthTopImg = $(window).width();
            realWidthTopImg = realWidthTopImg;

            $('#myCarousel').removeAttr('width').removeAttr('height');
            $('.img-responsive').css('width', realWidthTopImg + 'px');
            $('#myCarousel').css('width', realWidthTopImg + 'px');

        } else {

        }
        $(window).resize(function ScaleSizeImg() {
            if ($(window).width() < maxWidthTopImg) {
                var realWidthTopImg = $(window).width();
                realWidthTopImg = realWidthTopImg;

                $('#myCarousel').removeAttr('width').removeAttr('height');

                $('.img-responsive').css('width', realWidthTopImg + 'px');
                $('#myCarousel').css('width', realWidthTopImg + 'px');
            }

        })
        // EndResponse img for '.img-responsive' - ie11


        // Response img for 'p>img' - ie11 for  ('.size-full') on the page
        var maxWidth;

        $('.size-full').each(function () {
            // console.log($(this).attr('sizes'));
            var val2RegExp = /^(.*\()([^\)]+)(\).*)/;
            var str2 = $(this).attr('sizes').match(val2RegExp)[2];
            //console.log(str2);
            var pattern2Num = /[0-9]+/g;
            maxWidth = str2.match(pattern2Num)[0];
            //console.log(maxWidth);
        })

        if ($(window).width() < maxWidth) {
            var realmaxWidth = $(window).width() - 30;
            $('.size-full').css('width', realmaxWidth + 'px');
        } else {

        }
        $(window).resize(function ScaleSizeImg() {
            if ($(window).width() < maxWidth) {
                var realmaxWidth = $(window).width() - 30;
                $('.size-full').css('width', realmaxWidth + 'px');

            } else {

            }

        })
    }
    // End response img for ('.size-full') - ie11

    /*
     *
     * End  If IE 11 browser
     *
     * */




    /*
    * Check out checkbox form contact-us
    * */
    $('.agree').on('click',function () {

        if($(".agree").is(':checked')) {
            $(this).attr('value', 'yes');
            $('.btn-contact-us').removeAttr('disabled');

        }
        if(!$(".agree").is(':checked')) {
            $(this).attr('value', '');
            $('.btn-contact-us').attr('disabled','disabled');

        }
    });


    //remove checked and value==''
    if($('.msg-appear')){
        $('.msg-appear').css('color','red');
        $(".agree").attr('value', '').removeAttr('checked');
    }



    /*
     *Check out checkbox form modal
     * */

    $('.agree-modal').on('click',function () {

        if($(".agree-modal").is(':checked')) {
            $(this).attr('value', 'yes');
            $('.btn-modal').removeAttr('disabled');

        }
        if(!$(".agree-modal").is(':checked')) {
            $(this).attr('value', '');
            $('.btn-modal').attr('disabled','disabled');

        }
    });



    //remove checked and value==''
    if($('.msg-appear')){
        $('.msg-appear').css('color','red');
        $(".agree-modal").attr('value', '').removeAttr('checked');
    }


    //Check out file extension form contact us
    $('#file').on("change",function () {

        if ($('#file').val().length > 0) {
            var ext = '';
            ext = $('#file').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'jpg', 'jpeg']) == -1) {
                $('.help-file').text('Invalid extension of file! Choose file with extension: jpg, jpeg or pdf. Max size of file must be 512Kb!').css('color', 'red');
                $('#file').val('');
            } else {
                $('.help-file').text('Optional field to attach one file. Acceptable file types must be: jpg, jpeg or pdf. Max size of one file must be 512kb.').css('color', '#767373');
            }
        } else {
            $('.help-file').text('Optional field to attach one file. Acceptable file types must be: jpg, jpeg or pdf. Max size of one file must be 512kb.').css('color', '#767373');
        }
    });


    //Check out file extension form modal

    $('#file-modal').on("change",function () {
        if( $('#file-modal').val().length >0 ) {
            var ext = '';
            ext = $('#file-modal').val().split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'jpg', 'jpeg']) == -1) {
                $('.help-file-modal').text('Invalid extension of file! Choose file with extension: jpg, jpeg or pdf. Max size of file must be 512Kb!').css('color', 'red');
                $('#file-modal').val('');
            } else {
                $('.help-file-modal').text('Optional field to attach one file. Acceptable file types must be: jpg, jpeg or pdf. Max size of one file must be 512kb.').css('color', '#767373');
            }
        }else {
            $('.help-file-modal').text('Optional field to attach one file. Acceptable file types must be: jpg, jpeg or pdf. Max size of one file must be 512kb.').css('color', '#767373');
        }

      });

});
//Loader
$(window).load(function() {

    $(".loader_inner").fadeOut();
    $(".loader").delay(400).fadeOut("slow");

});











