<!doctype html>
<html>
<head>
 
<script src="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/3.13.0/adyen.js"
integrity="sha384-cMH19I9HPj31iL3b/lcBcpsqbieCGSLyNef+RzjS7g3h5DhP2BI6j68/ogKSQCAh"
crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://checkoutshopper-test.adyen.com/checkoutshopper/sdk/3.13.0/adyen.css"
integrity="sha384-AtxcD/Ax9ZRBLJ63s/bwCMrfe/mXWt4TF7F+Vltoxo0WgAwWjVNDsfyMAgY+9nBi"
crossorigin="anonymous">

 
  <div id="dropin-container"></div>
</head>
    <script>
const configuration = {
 paymentMethodsResponse: {
  "groups": [
    {
      "name": "Credit Card",
      "types": [
        "mc",
        "visa",
        "amex",
        "diners",
        "discover"
      ]
    }
  ],
  "paymentMethods": [
    {
      "brands": [
        "mc",
        "visa",
        "amex",
        "diners",
        "discover"
      ],
      "details": [
        {
          "key": "encryptedCardNumber",
          "type": "cardToken"
        },
        {
          "key": "encryptedSecurityCode",
          "type": "cardToken"
        },
        {
          "key": "encryptedExpiryMonth",
          "type": "cardToken"
        },
        {
          "key": "encryptedExpiryYear",
          "type": "cardToken"
        },
        {
          "key": "holderName",
          "optional": true,
          "type": "text"
        }
      ],
      "name": "Credit Card",
      "type": "scheme"
    }
  ]
}, // The `/paymentMethods` response from the server.
 clientKey: "test_BLVHEIVTOZHRBEJYRNZYCMJQCUHFH7WP", // Web Drop-in versions before 3.10.1 use originKey instead of clientKey.
 locale: "en-US",
 environment: "test",
 amount: { value: 100000, currency: 'USD' },
 onSubmit: (state, dropin) => {
 //alert("HELLO");
var response11 = (JSON.stringify(state.data));
var EXECUTE_URL = 'CPayServer.php';

      
               $.ajax({
                    type: 'POST',
                    url: EXECUTE_URL,
                    data: {
paymentID:JSON.stringify(state.data.paymentMethod)
}
                })
                    .then(function (response1) {
                    alert('The response is : ' + response1);
                    });
 
   },
 paymentMethodsConfiguration: {
   card: { 
     hasHolderName: true,
     holderNameRequired: true,
     enableStoreDetails: true,
     hideCVC: false, 
     name: 'Credit or debit card'
   }
 }
};


   const checkout = new AdyenCheckout(configuration);
const dropin = checkout.create('dropin').mount('#dropin-container');
    </script>

<body>

<br>

    

  </div>
</body>
</html>



