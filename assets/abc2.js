function show(){
    var v2=document.getElementById("para2");
    var v3=document.getElementById("para3");
    if (v3.innerHTML=="SHOW ALL"){
        v2.style.display="none";
        v3.innerHTML="SHOW LESS";
    }
    else{

        v2.style.display="block";
        v3.innerHTML="SHOW ALL";
    }

}
function Enroll(){
    var v1=document.getElementById("t1"),value;
    var v2=document.getElementById("t2"),value;
    var v3=document.getElementById("t3"),value;
    var v4=document.getElementById("t4"),value;
    if(v1==""||v2==""||v3==""||v4==""){
        alert("Please fil out all fields");
    }
    else{
        if(v3!=v4){
            alert ("Password and Repassword don't match");
        }
        else{
            var v5=document.getElementById("t5"),checked;
           var v6 =document.getElementById("t6"),checked;
           var v7=document.getElementById("t7"),checked; 
           if (!v5 && !v6 && !v7) {
                var c = confirm("would you like to choose my options");if (!c){
                    alert("welcome to course");

                }
        }
        else{
            alert ("Thank you!");
        }
    }
}