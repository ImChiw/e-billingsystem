function makePage(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
    if(xmlhttp.readyState==4 && xmlhttp.status==200)
    alert("Press OK!");
    }
    var content ="";
    content +="<?php%0D";
    content +="require \"../table.php\";%0D";
    content +="?>%0D";
    xmlhttp.open("GET","makepage.php?content=" + content,true);
    xmlhttp.send();
}