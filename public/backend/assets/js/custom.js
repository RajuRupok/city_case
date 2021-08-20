/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

$(document).ready(function(){
    $('.confirmation').confirm({
        type: 'dark',
        typeAnimated: true,
        title: 'Confirmation Alert',
        content: 'Are You Sure...?',
        confirmButtonClass: 'btn-info',
        cancelButtonClass: 'btn-danger',
        confirmButton: 'Yes',
        cancelButton: 'NO',
        animation: 'zoom',
        closeAnimation: 'scale',
        confirm: function(){
            alert('Confirmed!');
        },
        cancel: function(){
            alert('Canceled!')
        }
    });
});
