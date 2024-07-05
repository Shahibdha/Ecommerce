function paymentgateway() {
    var xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange=()=>{
        if(xhttp.readyState==4 && xhttp.status==200){
           
           //alert(xhttp.responseText);

           var obj=JSON.parse(xhttp.responseText);

                // Payment completed. It can be a successful failure.
        payhere.onCompleted = function onCompleted(orderId) {
            console.log("Payment completed. OrderID:" + orderId);
            checkout();
            alert("Payment Successful");
            
            // Note: validate the payment and show success or failure page to the customer
        };

        // Payment window closed
        payhere.onDismissed = function onDismissed() {
            // Note: Prompt user to pay again or show an error page
            console.log("Payment dismissed");
        };

        // Error occurred
        payhere.onError = function onError(error) {
            // Note: show an error page
            console.log("Error:"  + error);
        };

        // Put the payment variables here
        var payment = {
            "sandbox": true,
            "merchant_id": obj["merchant_id"],    // Replace your Merchant ID
            "return_url": undefined,     // Important
            "cancel_url": undefined,     // Important
            "notify_url": "http://sample.com/notify",
            "order_id": obj["order_id"],
            "items": obj["order_id"],
            "amount": obj["amount"],
            "currency":obj["currency"],
            "hash": obj["hash"], 
            "first_name": obj["name"],
            "last_name": "",
            "email": obj["email"],
            "phone": obj["phone"],
            "address": obj["address"],
            "city": "",
            "country": "Sri Lanka",
            "delivery_address": obj["address"],
            "delivery_city": "",
            "delivery_country": "Sri Lanka",
            "custom_1": "",
            "custom_2": ""
        };

        // Show the payhere.js popup, when "PayHere Pay" is clicked
            payhere.startPayment(payment);
    
        }
    }
    xhttp.open("GET","../../order/function/payment/payhereProcess.php",true);
    xhttp.send();
}



function checkout() {
    const cartItems = JSON.parse(localStorage.getItem("products")) || [];
  
   
    if (cartItems.length > 0) {

      const cartData = cartItems.map(item => {
        return `Product ID: ${item.id}, Name: ${item.name}, Price: ${item.price}`;
      }).join('\n');
      //alert("Checkout details:\n" + cartData);

      fetch('../../Order/handler/checkout.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(cartItems),
      })
      .then(response => {
        if (response.ok) {
          clearCart();
          alert('Thank You For Choosing Us!');
          displayCartTotalClear();
        } else {
          alert('Checkout failed. Please try again.');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        alert('An error occurred. Please try again later.');
      });
    } else {
      alert('Cart is Empty');
      return;
    }
  }
  