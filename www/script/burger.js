// Récupération des blocs
var burgerMenu = document.querySelector("#buttonMenu");
var sousMenus = document.querySelector("#sousMenusHeader");


angle = 0;
console.log("load");

/*===============================*/
/*=== Clic sur le menu burger ===*/
/*===============================*/
// Vérifie si l'événement touchstart existe et est le premier déclenché
var clickedEvent = "click"; // Au clic si "touchstart" n'est pas détecté
window.addEventListener('touchstart', function detectTouch() {
	clickedEvent = "touchstart"; // Transforme l'événement en "touchstart"
	window.removeEventListener('touchstart', detectTouch, false);
}, false);

// Créé un "toggle class" en Javascrit natif (compatible partout)
burgerMenu.addEventListener(clickedEvent, function(evt) {
	console.log(clickedEvent);
	// Modification du menu burger
	openMenusHeader();
	if(!this.getAttribute("class")) {
		this.setAttribute("class", "clicked");
	} else {
		this.removeAttribute("class");
	}
}, false);


function openMenusHeader() {
		if(angle == 0){
				angle = 90;
				console.log("openMenus");

				sousMenus.style.display = "block";
		}else{
				this.angle = 0;
				console.log("closeMenus");

				sousMenus.style.display = "none";
		}
		//this._buttonMenu.style.transform = "rotate(" + this.angle + "deg)";

}
