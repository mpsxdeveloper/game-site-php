function createModal(title, content, callback) {

	var modal = document.getElementsByClassName("modal")[0];	
	var header = document.getElementsByClassName("modal-header")[0];	
    var body = document.getElementsByClassName("modal-body")[0];
	var footer = document.getElementsByClassName("modal-footer")[0];
	header.innerHTML = title;	
	if(content !== null) {
    	body.innerHTML = content;
    }
    while(footer.firstChild) {
    	footer.removeChild(footer.firstChild);
	}

	var cancelBtn = document.createElement('button');
	cancelBtn.classList.add('mbutton-md');
	cancelBtn.classList.add('mbutton-alert');
	cancelBtn.innerHTML = 'Cancelar';	
	footer.appendChild(cancelBtn);

	var confirmBtn = document.createElement('button');
	confirmBtn.classList.add('mbutton-md');
	confirmBtn.classList.add('mbutton-confirm');
	confirmBtn.innerHTML = 'Confirmar';	
	footer.appendChild(confirmBtn);
	
	modal.style.display = 'block';

	window.onclick = function(event) {
		if(event.target == modal) {
    		modal.style.display = "none";
  		}
	}

	cancelBtn.onclick = function(event) {
		modal.style.display = "none";
	}

	confirmBtn.onclick = function(event) {
		modal.style.display = "none";
		callback();
	}

}
