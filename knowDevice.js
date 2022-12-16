/* @returns {String}*/

var userAgent = navigator.userAgent || navigator.vendor || window.opera;
let balise_a = document.querySelectorAll('.download');
if (/android/i.test(userAgent)) {
    link = "https://play.google.com/store/apps/details?id=com.afise.monexpertproprete&pli=1"
} else if (/iPad|iPhone|iPod/.test(userAgent) && !window.MSStream) {
    link = "https://apps.apple.com/fr/app/mon-expert-propret%C3%A9/id1548270762"
} else{
    link = "https://play.google.com/store/apps/details?id=com.afise.monexpertproprete&pli=1"
}

balise_a.forEach(element => {
    element.href = link;
});