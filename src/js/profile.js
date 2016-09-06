var popup = $('.popup'),
    elem = $('.photo-folder img');

function showPopup() {
    popup.removeClass('hidden');
    console.log('inside showPopup');
}
function closePopup() {
    $('.popup .close').click(function (){popup.addClass('hidden')});
}

function manipulateElem (element) {
    element.click(function () {
        if(popup.hasClass('hidden') ) {
            showPopup();
            var currentUserdata = $(this).data().currentuser;
            $('.popup-alginment__name .inject').html(" "+ currentUserdata.fullname);
            $('.popup-alginment__email .inject').html(" "+ currentUserdata.email);
            $('.popup-alginment__description .inject').html(" "+ currentUserdata.description);
            closePopup();
        }
    });
}

function initPopup() {
    console.log('inside init')
    popup.addClass('hidden');
    manipulateElem(elem);
}


if (popup){
    initPopup();
}

