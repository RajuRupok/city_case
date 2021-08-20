$(document).ready(function($) {
    function mediaSize() {
        // var wSize = $(window).width();
        /* Set the matchMedia */

        /*===============================================
        ==========< Device Maximum 575.98px >============
        =================================================*/
        if (window.matchMedia('(max-width: 575.98px)').matches) {

        }


        /*=============================================================
        ==========< Device Size Between 576px to 767.98px >============
        =============================================================*/
        else if (window.matchMedia('(min-width: 576px)' && '(max-width: 768px)').matches) {

        }


        /*=============================================================
        ==========< Device Size Between 768px to 991.98px >============
        ===============================================================*/
        else if (window.matchMedia('(min-width: 768.1px)' && '(max-width: 991.98px)').matches) {

        }


        /*==============================================================
        ==========< Device Size Between 992px to 1199.98px >============
        ================================================================*/
        else if (window.matchMedia('(min-width: 992px)' && '(max-width: 1199.98px)').matches) {
            if($('.table').hasClass('table-responsive'))
                $('.table').removeClass('table-responsive');
        }


        /*================================================================
        ==========< Device Size Between 1200px to infinty :p >============
        ================================================================*/
        else if (window.matchMedia('(min-width: 1200px)').matches) {
            if($('.table').hasClass('table-responsive'))
                $('.table').removeClass('table-responsive');
        }


        /*==========================================================
        ==========< Device Size if those are not match >============
        ==========================================================*/
        else {

        }
    };

    /* Call the function */
    mediaSize();
    /* Attach the function to the resize event listener */
    window.addEventListener('resize', mediaSize, false);

});
