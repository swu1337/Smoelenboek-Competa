    var popup = document.querySelector('.popup'),
        close = document.querySelector('.popup .close'),
        content = document.querySelector('.content'),
        sureBtn = document.querySelector('.sure'),
        xhttp = new XMLHttpRequest(),
        currentUserData;

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
            currentUserData = JSON.parse(e.target.getAttribute('data-currentuser'));
            console.log(currentUserData);

            if(e.target.classList.contains('add-person')) {
                if(popup.classList.contains('hidden')) {
                    showPopup();
                    var popup_photo = document.querySelector('.popup-userphoto');
                    popup_photo.src = e.target.src;
                    for (var key in currentUserData) {
                        if (currentUserData.hasOwnProperty(key)) {
                            if(key !== "id") {
                                var classes = '.popup-alginment__' + key + ' .inject';
                                document.querySelector(classes).innerHTML = ' ' + currentUserData[key];

                                if(currentUserData[key] === null) {
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
                    console.log('Succeeded!');
                } else {
                    console.log('Something went wrong');
                }
            };
            console.log(currentUserData);
            xhttp.open("POST", "delete_user.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("id=11");
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
