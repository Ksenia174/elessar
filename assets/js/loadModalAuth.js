let formAuth = document.querySelector("[name = 'form-auth']");
document.querySelector('.auth').addEventListener("click", async(e) => {
    e.preventDefault()
    console.log(111)
    let fd = new FormData(formAuth);
    let response = await postFormData(
        "/app/tables/users/auth.check.php",
        fd
    );
    
    if(response != null){
        window.location = '/app/tables/users/profile.php';
    }else{
        window.location = '/';
    }
});