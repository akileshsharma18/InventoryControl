/*$(document).ready(function(){
     $(window).scroll(function () {
            if ($(this).scrollTop() > 50) {
                $('#back-to-top').fadeIn();
            } else {
                $('#back-to-top').fadeOut();
            }
        });
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
            $('#back-to-top').tooltip('hide');
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });

});*/

var myVar;
function myFunction() {
    myVar = setTimeout(showPage, 1500);
}

function showPage() {
  //document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

function responsiveTab() {
    var x = document.getElementById("nav");
    if (x.className === "nav-bar") {
        x.className += " responsive";
    } else {
        x.className = "nav-bar";
    }
}

function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
}

/* Close/hide the sidenav */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}

function openTab(evt, cat) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent","tabcontent1");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cat).style.display = "block";
    evt.currentTarget.className += " active";
}

function openBottomTab(evt,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(evt).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
