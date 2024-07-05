
    // VARS
    const productsContainer = document.querySelector("#grid");
    const cartContainer = document.querySelector("#shopping-cart");
    const cartContent = document.querySelector("#cart-content");
    const toggleCartBtn = document.querySelector("#toggle-cart-btn");
    const clearCartBtn = document.querySelector("#clear-cart");
    const checkoutBtn = document.querySelector("#checkout-btn");
    const totalPriceContainer = document.querySelector("#total-price");

    console.log("Call it");
    console.log(cartContent);
    console.log(toggleCartBtn);
    console.log(clearCartBtn);
    console.log(checkoutBtn);
    console.log(totalPriceContainer);
  
    // FUNCTIONS
  
    function toggleCart() {
      // toggle shopping cart visibility
      cartContainer.classList.toggle("open");
    }
  
    function getLSContent() {
      // get contents from local storage.
      // if nothing is there, create an empty array
      const lsContent = JSON.parse(localStorage.getItem("products")) || [];
      return lsContent;
    }
  
    function setLSContent(lsContent) {
      // save content inside local storage
      localStorage.setItem("products", JSON.stringify(lsContent));
    }
  
    function calculateTotal(prices) {
      // calculate the total price in the cart
      return prices.reduce(function(prev, next) {
        return prev + next;
      }, 0);
    }
  
    function getCartItemPrices() {
      // extract the price numbers from the cart items to calculate total
      const prices = [];
      // retrieve the td element in the cart where the product price is stored
      // for each product in the cart
      let nums = cartContent.querySelectorAll("tr td:nth-child(3)");
  
      // iterate over each td node and extract the price
      // strip the $ sign from the text, turn the string into
      // a number and push the number into the prices array
      if (nums.length > 0) {
        for (let cell = 0; cell < nums.length; cell++) {
          let num = nums[cell].innerText;
          num = num.replace(/[^\d]/g, "");
          num = parseFloat(num);
          prices.push(num);
        }
        // return the prices array
        return prices;
      } else {
        return;
      }
    }
  
    function displayCartTotal() {
      // display the total cost in the cart
      const prices = getCartItemPrices();
      let total = 0;
      if (prices) {
        total = calculateTotal(prices);
        totalPriceContainer.innerHTML = `<span class="total">Total: LKR ${total.toFixed(
          2
        )}</span>`;
      } else {
        totalPriceContainer.innerHTML = '<span class="total">Total: LKR 0</span>';
      }
    }

    function displayCartTotalClear() {
        totalPriceContainer.innerHTML = '<span class="total">Total: LKR 0</span>';
    }
  
    function displayProducts() {
      // display all products in the cart
  
      // get contents from local storage
      const lsContent = getLSContent();
      let productMarkup = "";
      // if local storage is not empty, build the
      // cart items markup and the appropriate details
      if (lsContent !== null) {
        for (let product of lsContent) {
          productMarkup += `
            <tr>
            <td><img class="cart-image" src="${product.image}" alt="${
            product.name
          }" width="120"></td>
            <td>
              ${product.name}
            </td>
            <td>${product.price}</td>
            <td><a href="#" data-id="${product.id}" class="remove">X</a></td>
            </tr>
          `;
        }
      } else {
        // if no content is in local storage, alert user
        productMarkup = "Your cart is empty.";
      }
      // add markup to DOM
      cartContent.querySelector("tbody").innerHTML = productMarkup;
    }


    function saveProduct(clickedBtn) {
      // Get product information from the clicked button's parent element
      const productId = clickedBtn.getAttribute("data-id").toString();
      const card = clickedBtn.parentElement.parentElement;
      const cardInfo = clickedBtn.parentElement;
      const prodImage = card.querySelector("img").src;
      const prodName = cardInfo.querySelector("h4").textContent;
      const prodPriceElement  = cardInfo.querySelector(".card__price");
      const prodPriceText = prodPriceElement.textContent;

  // Extract the numeric value from the price string
  const prodPrice = parseFloat(prodPriceText.replace(/[^\d.]/g, ''));
      
      let isProductInCart = false;
    
      // Get local storage array
      const lsContent = getLSContent();
    
      // Check if the product is already in the cart
      lsContent.forEach(function(product) {
        if (product.id === productId) {
          alert("This product is already in your cart.");
          isProductInCart = true;
        }
      });
    
      // Only add the product to the cart if it's not already in it
      if (!isProductInCart) {
        // Construct the product object
        const product = {
          id: productId,
          image: prodImage,
          name: prodName,
          price: prodPrice
        };

        // Save the product to local storage
        saveProductToLocalStorage(product);
    
        // Update the display of products in the shopping cart
        displayProducts();
      }  
    }
    
    function saveProductToLocalStorage(product) {
      // Get the current cart items from local storage
      let cartItems = JSON.parse(localStorage.getItem("products")) || [];
    
      // Add the new product to the cart items
      cartItems.push(product);
    
      // Save the updated cart items back to local storage
      localStorage.setItem("products", JSON.stringify(cartItems));
    }
    
    
  
    function removeProduct(productId) {
      // remove product from cart (and from local storage)
  
      // retrieve list of products from LS
      const lsContent = getLSContent();
  
      // get the index of the product item to remove
      // inside the local storage content array
      let productIndex;
      lsContent.forEach(function(product, i) {
        if (product.id === productId) {
          productIndex = i;
        }
      });
  
      // modify the items in local storage array
      // to remove the selected product item
  
      lsContent.splice(productIndex, 1);
      // update local storage content
      setLSContent(lsContent);
  
      displayProducts();
    }
  
    function clearCart() {
      // clear all products from cart (and local storage)
  
      // retrieve list of products from LS
      const lsContent = getLSContent();
      // empty array in local storage
      lsContent.splice(0, lsContent.length);
      // update local storage
      setLSContent(lsContent);
      // display cart content again
      displayProducts();
      
    }
    
    
//lio ses
    function clickPayHere() {
      const prices = getCartItemPrices();
      let total = 0;
      if (prices) {
        total = calculateTotal(prices);
      }
      var xhr = new XMLHttpRequest();
      xhr.open("POST", "../../Order/function/payment/createSes.php", true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
      xhr.onreadystatechange = function() {
          if (xhr.readyState === 4) {
              if (xhr.status === 200) {
                  //alert("Value saved to session: " + total);
                  paymentgateway();
              } else {
                  alert("Error occurred while saving to session. Status code: " + xhr.status);
              }
          }
      };
      xhr.send("value=" + encodeURIComponent(total));
    }
 
    // BIND EVENTS AND CALL FUNCTIONS
  
    // Page load:
    document.addEventListener("DOMContentLoaded", function(e) {
      // display list of products in cart, if any, on page load
      displayProducts();
      // display cart total
      displayCartTotal();
    });
  
    // open and close shopping cart
    // when cart button is clicked
    toggleCartBtn.addEventListener("click", function(e) {
      e.preventDefault();
      toggleCart();
    });
  
    // Save product in cart and Local Storage
    // when add to cart button is clicked
    productsContainer.addEventListener("click", function(e) {
      if (e.target.classList.contains("add-to-cart")) {
        e.preventDefault();
        const clickedBtn = e.target;
        saveProduct(clickedBtn);
      }
    });
  
    productsContainer.addEventListener("click", function(e) {
      if (e.target.classList.contains("add-to-cart")) {
        displayCartTotal();
      }
    });
  
    // bind removeProduct to click event of the cartContent table
    cartContent.querySelector("tbody").addEventListener("click", function(e) {
      e.preventDefault();
      // identify the button that was clicked
      const clickedBtn = e.target;
      // if it's a remove button
      if (e.target.classList.contains("remove")) {
        // get the value of the data-id property, which contains the
        // id of the selected product
        const productId = clickedBtn.getAttribute("data-id");
        // use the id to remove the selected product
        removeProduct(productId);
        // display products in the cart again,
        // now the list should be displayed with 1 less product
        // or empty if no products are left in the cart
  
        // adjust the total
        displayCartTotal();
      }
    });
  
    // bind the button to clear the cart both to the function that
    // clears the cart and to the function that adjusts the total price
    clearCartBtn.addEventListener("click", function(e) {
      e.preventDefault();
      clearCart();
    });
    clearCartBtn.addEventListener("click", displayCartTotal);
  
    // bind the button that does the checkout both to the function that
    // controls the checkout and and to the function that adjusts the total price
    checkoutBtn.addEventListener("click", function(e) {
      e.preventDefault();
      clickPayHere();
    });
    checkoutBtn.addEventListener("click", displayCartTotal);

    console.log("Call it");