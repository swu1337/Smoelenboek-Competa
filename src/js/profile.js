(function() {
    var popup = document.querySelector('.popup'),
        close = document.querySelector('.popup .close'),
        content = document.querySelector('.content'),
        sureBtn = document.querySelector('.sure');

    function showPopup() {
        popup.classList.remove('hidden');
    }

    function closePopup() {
        close.addEventListener('click', function() {
            sureBtn.classList.add('btn-hidden');
            popup.classList.add('hidden');
        }, false);
    }

    function manipulateElem () {
        content.addEventListener('click', function(e) {
            if(e.target.classList.contains('add-person')) {
                if(popup.classList.contains('hidden')) {
                    showPopup();
                    var currentUserData = JSON.parse(e.target.getAttribute('data-currentuser'));
                    var popup_photo = document.querySelector('.popup-userphoto');
                    popup_photo.src = e.target.src;
                    for (var key in currentUserData) {
                        if (currentUserData.hasOwnProperty(key)) {
                        var classes = '.popup-alginment__' + key + ' .inject';
                        document.querySelector(classes).innerHTML = ' ' + currentUserData[key];
                        }
                    }
                    closePopup();
                }
            }




        }, false);
    }

    function initPopup() {
        popup.classList.add('hidden');
        manipulateElem();
    }

    if(popup) {
        initPopup();
    }
})();
