const sidebar = document.querySelector('.sidebar');
const navItems = document.querySelectorAll('nav .nav-item');
const toggle = document.querySelector('.sidebar .toggle');

toggle.addEventListener('click', () => {

	if (sidebar.className === 'sidebar')
		sidebar.classList.add('open');
	else{
    sidebar.classList.remove('open');
  }
		
});

navItems.forEach(navItem => {

	navItem.addEventListener('click', () => {

		navItems.forEach(navItem => {
			navItem.classList.remove('active');
		});

		navItem.classList.add('active');

	});

});

function myFunction() {
	var x = document.getElementById("myDIV");
	if (x.style.display === "block") {
	  x.style.display = "none";
	} else {
	  x.style.display = "block";
	}
  }

  document.getElementById("chatbot_toggle").onclick = function () {
    if (document.getElementById("chatbot").classList.contains("collapsed")) {
      document.getElementById("chatbot").classList.remove("collapsed")
      document.getElementById("chatbot_toggle").children[0].style.display = "none"
      document.getElementById("chatbot_toggle").children[1].style.display = ""
      setTimeout(addResponseMsg,1000,"Hi")
    }
    else {
      document.getElementById("chatbot").classList.add("collapsed")
      document.getElementById("chatbot_toggle").children[0].style.display = ""
      document.getElementById("chatbot_toggle").children[1].style.display = "none"
    }
  }