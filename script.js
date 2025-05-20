const header = document.querySelector("header")

window.addEventListener ("scroll", function(){
	header.classList.toggle ("sticky", window.scrolly > 0);
});

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
	menu.classList.toggle('bx-x');
	navbar.classList.toggle('open');
};

window.onscroll = () =>{
	menu.classList.remove('bx-x');
	navbar.classList.remove('open');
};

const sr = ScrollReveal ({
	distance: '60px',
	duration: 2500,
	delay: 400,
	reset: true
})

sr.reveal('.home',{delay:200, origin:'top'});
sr.reveal('.p9',{delay:300, origin:'top'});
sr.reveal('.feature, .product, .cta.content, .cta, .cta-Text, .contact',{delay:200, origin:'top'});





function validateForm() {
  var username = document.getElementById("username").value.trim();
  var password = document.getElementById("password").value.trim();
  var error = document.getElementById("error-message");

  if (username === "" || password === "") {
    error.textContent = "Both fields are required.";
    return false;
  }

  return true;
}
