(function (){
	var btn =  document.querySelector('.delete-button'),
		sureBtn = document.querySelector('.sure');

	function showButton() {
		var isClicked = true;
		btn.addEventListener('click', function() {
			if (isClicked) {
				sureBtn.style.display = 'inline-block';
				isClicked = false;
			}
			else {
				console.log("hh");
				sureBtn.style.display = 'none';
				isClicked = true;
			}
		}, false);
	}

	showButton();
})();
