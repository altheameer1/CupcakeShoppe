var cake1 = document.getElementById("cake1");
var cake2 = document.getElementById("cake2");
var cake3 = document.getElementById("cake3");

var form = document.forms[0];

cake1.addEventListener("change", total);
cake2.addEventListener("change", total);
cake3.addEventListener("change", total);

form.addEventListener("submit", receipt);

function total() {

  var qt1 = cake1.value;
  var qt2 = cake2.value;
  var qt3 = cake3.value;

  console.log(qt1, qt2, qt3);

  var sub1 = document.getElementById("sub1");
  var sub2 = document.getElementById("sub2");
  var sub3 = document.getElementById("sub3");

  var total = document.getElementById("total");

  var subtotal1 = parseFloat(qt1) * 3.00;
  var subtotal2 = parseFloat(qt2) * 3.50;
  var subtotal3 = parseFloat(qt3) * 3.00;

  var grandTotal = subtotal1 + subtotal2 + subtotal3;

  console.log(grandTotal);

  sub1.value = subtotal1.toFixed(2);
  sub2.value = subtotal2.toFixed(2);
  sub3.value = subtotal3.toFixed(2);

  total.value = grandTotal.toFixed(2);
}

function receipt(e) {
  e.preventDefault();

  var output = document.getElementById("receipt");

  var len = form.elements.length;
  var elements = form.elements;
  var receiptText = "";

  var qt1 = parseInt(cake1.value);
  var qt2 = parseInt(cake2.value);
  var qt3 = parseInt(cake3.value);
  var total = parseFloat(document.getElementById("total").value);
  var shipping = document.getElementById("shipping").value;
  var shipCost = 0;

  if (shipping == "standard") {
    shipCost = 2.00;
  }

  else if (shipping == "two") {
    shipCost = 3.50;
  }

  else if (shipping == "one") {
    shipCost = 5.00;
  }

  receiptText += "Here is your receipt:<br><br>";
  receiptText += "Cupcake Quantity: " + (qt1 + qt2 + qt3) + "<br>";
  receiptText += "Total Price: $" + total.toFixed(2) + "<br>";
  receiptText += "Total with Shipping: $" + (total + shipCost).toFixed(2) + "<br><br>";


  for (var i=1; i<len-2; i++) {
    console.log(i, elements[i].name);
  }

  for (var i=1; i<len-2; i++) {

    if ((elements[i].value == "" || elements[i].value == null) && (i < 6 || i > 9)) {
      alert("Please provide input for " + elements[i].name);
      elements[i].focus();
      elements[i].select();
      return;
    }

    else if (i == 2 && (elements[i].value.indexOf("@") == -1 || elements[i].value.indexOf(".") == -1 )){
      alert("Invalid email. Please include @ and . ");
	    elements[i].focus();
	    elements[i].select();
	    return;
    }

    else if (i > 6 && i < 10) {
      if (elements[i].checked) {
        receiptText += elements[i].name + ": " + elements[i].value;
        receiptText += "<br>"
      }
    }

    else if (i == 10) {
      if (elements[i].value.length != 16) {
        alert("Please provide a 16-digit credit card number.");
  	    elements[i].focus();
  	    elements[i].select();
  	    return;
      }

      else {
        receiptText += elements[i].name + ": xxxxxxxxxxxx";
        receiptText += String(elements[i].value).substr(12,16);
        receiptText += "<br>";
      }
    }

    else if (i != 6) {
      receiptText += elements[i].name + ": " + elements[i].value;
      receiptText += "<br>";
    }

  }



  output.innerHTML = receiptText;

}


// var nav = document.getElementById("nav");
//
// var newItem = document.createElement("li");
// var newText = document.createTextNode("Products");
// newItem.appendChild(newText);
// newItem.className = "link";
// nav.appendChild(newItem);
//
// var newItem2 = document.createElement("li");
// var newText2 = document.createTextNode("About");
// newItem2.appendChild(newText2);
// newItem2.className = "link";
// nav.appendChild(newItem2);
//
// console.log(nav.length);
//
// var navList = document.querySelectorAll("li");
//
// for (var j=0; j<navList.length; j++) {
//   console.log("got here");
//   navList[j].className = "navs";
// }
