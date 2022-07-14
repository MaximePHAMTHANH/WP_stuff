
function openCity(evt, cityName) {
  var i, tabcontent, tablinks, num, n;
  tabcontent = document.getElementsByClassName("tabcontent");
  num=0;
  for (i = 0; i < tabcontent.length; i++) {
    n=parseInt(tabcontent[i].innerText);
    if (n > num) {num=n}
    tabcontent[i].style.display = "none";
    tabcontent[i].style.animation = "fadeEffect 1s";
  }

  tablinks = document.getElementsByClassName("tablinks");
  
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  
  document.getElementById(cityName).style.display = "block";
  console.log(cityName.concat('',"_title"));
  document.getElementById(cityName.concat('',"_title")).style.display = "block";
  document.getElementById(cityName).innerText = num+1;  
  evt.currentTarget.className += " active";

}

window.addEventListener("load", function(event) {
  tabcontent = document.getElementsByClassName("tabcontent");
  tabcontent[0].style.display = "block";
  tabcontent[0].style.animation = "none";
  tabcontent[1].style.display = "block";
  tabcontent[1].style.animation = "none";
  });