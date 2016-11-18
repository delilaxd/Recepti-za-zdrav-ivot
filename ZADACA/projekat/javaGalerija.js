
var modal = document.getElementById("myModal");


var img = document.getElementById("s1");
var modalImg = document.getElementById("img01");

img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = "love.jpg";
}

var img2 = document.getElementById("s2");
img2.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img3 = document.getElementById("s3");
img3.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img4 = document.getElementById("s4");
img4.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img5 = document.getElementById("s5");
img5.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img6 = document.getElementById("s6");
img6.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img7 = document.getElementById("s7");
img7.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var img8 = document.getElementById("s8");
img8.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}

var span = document.getElementsByClassName("close")[0];
span.onclick = function() {
    modal.style.display = "none";
}

document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
       
        modal.style.display = 'none';
    }
};
