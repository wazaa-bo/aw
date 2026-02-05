document.addEventListener("DOMContentLoaded", function(){
    const form=document.querySelector("form");

    if (!form) return; 
    form.addEventListener("submit",function(event) {
        const name=form.name.value.trim();
        const email=form.email.value.trim();
        const age=form.age.value.trim();
        const rol=form.rol.value;
        const passinput=form.pass;
        const pass=passinput?passinput.value:"";

        let error=[]

        if (name.lenght<2){
            error.push("Name must have at least 2 characters")
        }
        const emailRegex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)){
            error.push=("Input a valid email")
        }
        if(isNaN(age) || age<1 || age>420) {
            error.push("Age must be between 1 and 420");
        }
        if (rol !=="user" && rol !=="admin") {
            error.push("Select a valid role");
        }
        if(passinput && pass.lenght>0) {
            if(pass.lenght<6) {
                error.push("Password must be at least 6 characters")
            }
        }
        if (error.length>0){
            event.preventDefault();
            alert(error.join("\n"));

        }
    });
});