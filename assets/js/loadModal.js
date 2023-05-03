let form = document.querySelector("[name = 'form-registration']");
document.querySelector('.registration').addEventListener("click", async(e) => {
    e.preventDefault()
    let fd = new FormData(form);
    let response = await postFormData(
        "/app/tables/users/insert.php",
        fd
    );

    if(response != null){
        window.location = '/app/tables/users/profile.php';
    }else{
        window.location = '/';
    }
});


