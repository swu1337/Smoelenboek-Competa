(function() {
  var photo = document.getElementById('user_photo');
  var preview = document.querySelector('.photo-viewer-image');

    if(photo) {
      var label = photo.nextElementSibling;
      var labelValue = label.innerHTML;

      photo.addEventListener('change', function(e) {
        var photoName =  "Choose a file ...";
        if(this.files && this.files.length === 1) {
          photoName = e.target.value.split('\\').pop();

          preview.style.backgroundImage = "url("+ window.URL.createObjectURL(this.files[0]) +")";
          if (photoName.length > 17) {
            photoName = photoName.substring(0, 14) + "...";
          }
        } else { preview.style.backgroundImage= "none" }

        if(photoName) {
            label.innerHTML = photoName;
        }
    });
  }
})();
