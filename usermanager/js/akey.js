document.addEventListener("DOMContentLoaded",function(){
    const rolselect=document.getElementById("rolselect");
    const adminkey=document.getElementById("adminkey");

    if(!rolselect || !adminkey) return;
    function checkrol(){
        if(rolselect.value==="admin"){
            adminkey.style.display="block";
        } else{
            adminkey.style.display="none";
        }
    }
    rolselect.addEventListener("change",checkrol);
    checkrol();
});