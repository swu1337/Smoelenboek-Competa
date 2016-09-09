(function() {
    var popup = document.querySelector('.popup'),
        close = document.querySelector('.popup .close'),
        content = document.querySelector('.content'),
        sureBtn = document.querySelector('.sure'),
        xhttp = new XMLHttpRequest();

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
            var currentUserData = JSON.parse(e.target.getAttribute('data-currentuser'));

            if(e.target.classList.contains('add-person')) {

                xhttp.onreadystatechange = function() {
                    if (this.readyState === 4 && this.status === 200) {
                        console.log('Deleted');
                    } else {
                        console.log('Something went wrong');
                    }
                };

                xhttp.open("GET", "delete_user.php?id=" + currentUserData.id, true);
                xhttp.send();

                if(popup.classList.contains('hidden')) {
                    showPopup();
                    var popup_photo = document.querySelector('.popup-userphoto');
                    popup_photo.src = e.target.src;
                    for (var key in currentUserData) {
                        if (currentUserData.hasOwnProperty(key)) {
                            if(key !== "id") {
                                var classes = '.popup-alginment__' + key + ' .inject';
                                document.querySelector(classes).innerHTML = ' ' + currentUserData[key];
                            }
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
