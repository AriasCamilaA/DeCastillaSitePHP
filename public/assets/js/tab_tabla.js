function openCity(evt, cityName) {
    var i, x, tablinks;
    x = document.getElementsByClassName("tab_content");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" bg-oscuro", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " bg-oscuro";
  }