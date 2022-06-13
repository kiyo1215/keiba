'use strict';

function calc(
  bet,
  refund
) {
  const data = refund / bet * 100;
  document.getElementById('recovery').value = parseFloat(data. toFixed(2));
}

function drawer() {
  document.getElementById('line1').classList.toggle('line_1');
  document.getElementById('line2').classList.toggle('line_2');
  document.getElementById('line3').classList.toggle('line_3');
  document.getElementById('menu').classList.toggle('action');
}
document.getElementById('menu_button').addEventListener('click', function () {
  drawer(), false;
});