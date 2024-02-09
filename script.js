var navLinks = document.getElementById("navLinks");

function showMenu(){
    navLinks.style.right = "0";
}
function hideMenu(){
    navLinks.style.right = "-200px"
}

function SendMail() {
    var params = {
        from_name : document.getElementById("name").value,
        email_address : document.getElementById("email_address").value,
        subject : document.getElementById("subject").value,
        message : document.getElementById("message").value
    }
    emailjs.send("service_kf686do", "template_doiball", params).then(function(res){
        alert("Thanks for contacting us, email received!" + res.status);
    })
}
