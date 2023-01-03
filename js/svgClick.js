document.querySelectorAll(".backHome").forEach(function (element) {
    element.addEventListener("click", function () {
        window.location.href = "index.html";
    });
});

let Links = [
    "https://www.instagram.com/monexpertproprete/?hl=fr",
    "https://www.facebook.com/profile.php?id=100070651912505",
    "https://www.linkedin.com/in/mon-expert-proprete/",
    "https://twitter.com/FHER_ORG"
];

let Class = [
    "goInstagram",
    "goFacebook",
    "goLinkedin",
    "goTwitter"
];

for (let i = 0; i < Links.length; i++) {
    document.querySelector("." + Class[i]).addEventListener("click", function () {
        window.location.href = Links[i];
    });
}

console.log("js/svgClick.js loaded");