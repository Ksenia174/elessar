let main = document.getElementById("basket");

if (main.childNodes.length <= 1) {
    main.textContent = "Корзина пуста";
    document.querySelector(".design").disabled = true;
}

async function outOnBasketPage(productId, action) {
    let { productInBasket, totalPrice, totalCount } = await postJSON(
        "/app/tables/basket/save.basket.php",
        productId,
        action
    );

    if (totalPrice == 0) {
        main.textContent = "Корзина пуста";
        document.querySelector(".design").disabled = true;
        document.querySelector(".totalPrice").textContent = totalPrice;
        document.querySelector(".totalCount").textContent = totalCount;
    } else {
        //проверим что не удалено
        if (productInBasket != "delete") {
            document.getElementById(
                `count-${productId}`
            ).innerHTML = `${productInBasket.amount}`;
            document.querySelector(
                `[data-price-position="${productId}"]`
            ).textContent = `${productInBasket.price_position}`;
        }
        document.querySelector(".totalPrice").textContent = totalPrice;
        document.querySelector(".totalCount").textContent = totalCount;
    }
}

document.addEventListener("click", async (event) => {

    if (event.target.classList.contains("plus")) {
        await outOnBasketPage(event.target.dataset.productId, "add");
    }
    if (event.target.classList.contains("minus")) {
        outOnBasketPage(event.target.dataset.productId, "minus");
    }
    if (event.target.classList.contains("delete")) {
        outOnBasketPage(event.target.dataset.productId, "delete");
        event.target.closest(".basket-position").remove();
    }
    if (event.target.classList.contains("clear")) {
        outOnBasketPage("", "clear");
        document.querySelectorAll(".basket-position").forEach((item) => {
            item.remove();
        });
    }
});
