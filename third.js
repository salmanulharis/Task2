// setting count down maximum limit
var seconds = 10;
// getting element by id where to put the time that count down
var el = document.getElementById('seconds-counter');
// function to perform countdown
function decrementSeconds() {
    // decrementing by 1 second
    seconds -= 1;
    // if condition to stop to going negative value while decrementing
    if (seconds >= 0) {
      el.innerText = "0" + seconds;
    } else {
      el.innerText = "00";
    }
}
// setting interval to the function, to repeat in this particular time interval (1000ms = 1s)
var cancel = setInterval(decrementSeconds, 1000);
