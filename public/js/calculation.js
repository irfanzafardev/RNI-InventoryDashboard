$(".input").on('input', function(){
  var x = document.getElementById('quantity').value;
  x = parseFloat(x);

  var y = document.getElementById('unit_price').value;
  y = parseFloat(y);

  document.getElementById('value').value=x+y;
})