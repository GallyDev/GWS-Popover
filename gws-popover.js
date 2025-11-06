const popoverlinks = document.querySelectorAll(popoverlinkselector);
// if there are popover links on the page create a modal dialog with a close button and an empty iframe
if (popoverlinks.length > 0) {
  // create a modal dialog
  const dialog = document.createElement('dialog');
  dialog.id = 'popover';
  dialog.innerHTML = `
  	<div>	
		<button id="close">&times;</button>
		<iframe id="popoveriframe" src=""></iframe>
		${popover_svg}
	</div>
  `;
  document.body.appendChild(dialog);
  dialog.iFrame = dialog.querySelector('#popoveriframe');
  dialog.spinner = dialog.querySelector('#spinner');
  dialog.iFrame.addEventListener('load', () => {
	dialog.spinner.classList.add('d-none');
  });
  dialog.querySelector('#close').addEventListener('click', () => {
	dialog.setAttribute('closing',null);
	setTimeout(() => {
		dialog.removeAttribute('closing');
		dialog.close()
		dialog.iFrame.src = 'about:blank';
		dialog.spinner.classList.remove('d-none');
	}, 500);
  });
  // add an event listener to each popover link
  popoverlinks.forEach(link => {
	link.addEventListener('click', (event) => {
	  event.preventDefault();
	  dialog.spinner.classList.remove('d-none');
	  if(link.href.indexOf(('?')) > -1) 
	  	dialog.iFrame.src = link.href+"&whitelabel";
	  else
	  	dialog.iFrame.src = link.href+"?whitelabel";
	  dialog.showModal();
	});
  });
}

