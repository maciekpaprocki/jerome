var b = document.getElementById('body');
function addClass(className){
	b.className += ' '+className; 
}
function removeClass(className){
	b.className.replace(' '+className);
}