function toggleDivs(div1, div2) {
if (div1.style.display === "none") {
    div1.style.display = "block";
    div2.style.display = "none";
} else {
    div1.style.display = "none";
    div2.style.display = "block";
}
}

function RegisterPage(){
    let div1 = document.getElementById("welcome_page");
    let div2 = document.getElementById("register_page");
    
    toggleDivs(div1, div2);

}

function LoginPage(){
    let div1 = document.getElementById("welcome_page");
    let div2 = document.getElementById("login_page");
    
    toggleDivs(div1, div2);

}

function login_register(){
    let div1 = document.getElementById("register_page");
    let div2 = document.getElementById("login_page");
    
    toggleDivs(div1, div2);

}