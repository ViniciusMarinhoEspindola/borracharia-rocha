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
