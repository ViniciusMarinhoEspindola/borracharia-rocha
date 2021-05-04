window.onload = function() {
    if(window.screen.availWidth < 750) {
        document.getElementById('sidebar').classList.remove('active');
        document.getElementById('page-content').classList.remove('active');
    }
}

document.getElementById('btn-toggle-menu').onclick = function(e) {
    document.getElementById('sidebar').classList.toggle('active');
    document.getElementById('page-content').classList.toggle('active');
}


var dropdown = document.querySelectorAll(".dropdown-toggle");
for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener('click', function(i) {
        let id = dropdown[i].getAttribute('aria-labelledby');

        var menu = document.getElementById(id);
        menu.classList.toggle('active');
  }.bind(this, i));
}