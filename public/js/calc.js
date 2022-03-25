'use strict';

function calc(
  bet,
  refund
) {
  const data = refund / bet * 100;
  document.getElementById('recovery').value = parseFloat(data. toFixed(2));
}
