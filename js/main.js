function toggleSidenav() {
  if(document.getElementById("sidenav").classList.contains('close_sidenav')){
    document.getElementById("sidenav").classList.remove('close_sidenav')
  } else {
    document.getElementById("sidenav").classList.add('close_sidenav')
  }
}
