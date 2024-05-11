if (document.readyState == "loading") {
    document.addEventListener("DOMContentLoaded", ready)
} else {
    ready()
}

function ready() {
    var removeBasketItems = document.getElementsByClassName("btn-danger")
    console.log(removeBasketItems)
    for (var i = 0; i < removeBasketItems.length; i++) {
        var button = removeBasketItems[i]
        button.addEventListener('click', removeBasketItems)
    }
    
    var QuantityInputs = document.getElementsByClassName("basket-quantity-input")
    for (var i = 0; i < QuantityInputs.length; i++) {
        var input = QuantityInputs[i]
        input.addEventListener("change", quantityChanged)     
    }

    var addToBasket = document.getElementsByClassName('shop-item-button')
    for (var i = 0; i < addToBasket.length; i++) {
        var button = addToBasket[i]
        button.addEventListener("click", addToBasketClicked)
}


}

//////////////////////////////////
function removeBasketItems(event) {
    var buttonClicked = event.target
            buttonClicked.parentElement.parentElement.remove()
            updateBasketTotal()
}

//////////////////////////////////
function quantityChanged(event) {
    var input = event.target
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 1
    }
    updateBasketTotal()
}

function addToBasketClicked(event){
    var button = event.target
    var shopItem = button.parentElement.parentElement
    var title = shopItem.getElementsByClassName("shop-item-title")[0].innerText
    var price = shopItem.getElementsByClassName("shop-item-price")[0].innerText
    var imageSrc = shopItem.getElementsByClassName("shop-item-image")[0].src
    console.log(title, price, imageSrc)
    addItemToBasket(title, price, imageSrc)

}


/////////////////////////////////

/////////////////////////////////


    var removeBasketItems = document.getElementsByClassName("btn-danger")
    console.log(removeBasketItems)
    for (var i = 0; i < removeBasketItems.length; i++) {
        var button = removeBasketItems[i]
        button.addEventListener('click', function(event) {
            var buttonClicked = event.target
            buttonClicked.parentElement.parentElement.remove()
            updateBasketTotal()
        })
    }

    //////////////////////////////////////////////////////////////////////
function updateBasketTotal() {
    var basketItemContainer = document.getElementsByClassName("basket-items")[0]
    var basketRows = basketItemContainer.getElementsByClassName("basket-row")
    var total = 0
    for (var i = 0; i < basketRows.length; i++) {
        var basketRow = basketRows[i]
        var priceElement = basketRow.getElementsByClassName("basket-price")[0]
        var quantityElement = basketRow.getElementsByClassName("basket-quantity-input")
        [0]
        var price = parseFloat(priceElement.innerText.replace("£", ""))
        var quantity = quantityElement.value
        total = total + (price * quantity)
    }
    total = Math.round(total * 100) / 100
    document.getElementsByClassName("basket-total-price")[0].innerText = "£" + total
}
