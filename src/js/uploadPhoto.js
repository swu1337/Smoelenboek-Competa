(function() {
  var photo = document.getElementById('user_photo');
    if(photo) {
      var label = photo.nextElementSibling;
      var labelValue = label.innerHTML;

      photo.addEventListener('change', function(e) {
        var photoName =  "";
        if(this.files && this.files.length === 1) {
          photoName = e.target.value.split( '\\' ).pop();

          if (photoName.length > 17) {
            photoName = photoName.substring(0, 14) + "...";
          }
        }

        if(photoName) {
            label.innerHTML = photoName;
        } else {label.innerHTML = labelValue}
    });
  }
})();
