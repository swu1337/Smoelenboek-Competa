(function (){
	var btn =  document.querySelector('.delete-button'),
		sureBtn = document.querySelector('.sure');

	function showButton() {
		btn.addEventListener('click', function() {
			if(sureBtn.classList.contains('btn-hidden')) {
				sureBtn.classList.remove('btn-hidden');
			}
			else {
				sureBtn.classList.add('btn-hidden');
			}
		}, false);
	}

	if(btn) {
		sureBtn.classList.add('btn-hidden');
		showButton();
	}
})();
