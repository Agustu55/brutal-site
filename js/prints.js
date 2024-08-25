cryptopay
      .Button({
        createPayment: function (actions) {
          return actions.payment.create({
            currency: 'USD',
            amount: 3000,
            description: 'Crypto Print',
            order_id: '000001',
          });
        },
        onClick: function() {
            console.log("on click" + new Date());
            console.log();
            return true
        },
        onApprove: function(data, actions) {

          console.log("new purchase" + new Date());
          console.log(data);
          var purchase_id = data.id;
          var order_id = data.order_id;
          var status = data.status;
          console.log(purchase_id);
          console.log(order_id);
          console.log(status);
          if (status == "succeeded") {
          } else {
          }
        },
        onWindowClose: function() {
          console.log("on close" + new Date());
        },
        defaultLang: 'en-US'
      })
      .render("#pay-crypto");