document.addEventListener('DOMContentLoaded', function(){
	document.getElementById('import-plugins-activated').addEventListener('click', 
		function(e, button){
			if ( e.target.checked ) {
				document.getElementById('import-plugins-button').removeAttribute('disabled');
			} else {
				document.getElementById('import-plugins-button').setAttribute('disabled', 'disabled');
			}
		});
});