export function modalWindowFunction() {
    let modalWrapper = document.querySelector(".modal-wrapper-reg");
    let btnModalClose = document.querySelector(".modal__close");
    let user = document.querySelector("#user");


    function closeModal() {
        modalWrapper.style.display = "none";
    }

    modalWrapper.addEventListener("click", (event) => {
        if (event.target === event.currentTarget) {
            closeModal();
        }
    });

    document.addEventListener("keydown", (event) => {
        if (event.code === "Escape") {
            closeModal();
        }
    });

    btnModalClose.onclick = function () {
        closeModal();
    };


    
    if (user != null) {
        user.addEventListener("click", (e) => {
            modalWrapper.style.display = "block";
        });
    }

     
    // if (auth != null) {
    //     auth.addEventListener("click", (e) => {
    //         modalWrapper.style.display = "block";
    //     });
    // }
}
