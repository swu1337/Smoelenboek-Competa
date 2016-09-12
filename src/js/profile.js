(function() {
    var popup = document.querySelector('.popup'),
        close = document.querySelector('.popup .close'),
        content = document.querySelector('.content'),
        sureBtn = document.querySelector('.sure'),
        errorMsg = document.querySelector('.error-message'),
        currentUserData = {},
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
            if(e.target.classList.contains('add-person')) {
                currentUserData = JSON.parse(e.target.getAttribute('data-currentuser'));
                
                if(popup.classList.contains('hidden')) {
                    showPopup();
                    var popup_photo = document.querySelector('.popup-userphoto');
                    popup_photo.src = e.target.src;
                    for (var key in currentUserData) {
                        if (currentUserData.hasOwnProperty(key)) {
                            if(key !== "id") {
                                var classes = '.popup-alginment__' + key + ' .inject';
                                document.querySelector(classes).innerHTML = ' ' + currentUserData[key];

                                if(currentUserData[key] === null || currentUserData[key] === "") {
                                    document.querySelector(classes).innerHTML = ' -';
                                } else {
                                    document.querySelector(classes).innerHTML = ' ' + currentUserData[key];
                                }
                            }
                        }
                    }
                    closePopup();
                }
            }
        }, false);
    }

    function deleteUser() {
        sureBtn.addEventListener("click", function() {
            xhttp.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                    location.reload();
                } else {
                    errorMsg.innerHTML = "Something went wrong";
                }
            };

            xhttp.open("POST", "delete_user.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + currentUserData.id);
        }, false);
    }

    function initPopup() {
        popup.classList.add('hidden');
        manipulateElem();
        deleteUser();
    }

    if(popup) {
        initPopup();
    }
})();
