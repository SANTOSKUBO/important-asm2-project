function show(){
    var v2=document.getElementById("para2");
    var v3=document.getElementById("para3");
    if (v3.innerHTML=="SHOW ALL"){
        v2.style.display="block";
        v3.innerHTML="SHOW LESS";
    }
    else{

        v2.style.display="none";
        v3.innerHTML="SHOW ALL";
    }

}