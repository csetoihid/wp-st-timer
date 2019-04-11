<script>
// Display Timer
var c = new Date();
var show = <?php echo $a['show'];?>;
var Time = c.setTime(c.getTime() + 1000 * 10 * parseInt(show));
//var countDownDate = new Date("Oct 16, 2017 15:37:25").getTime();
var countDownDate = Time;
// Update the count down every 1 second
var x = setInterval(function() {
  // Get todays date and time
  var now = new Date().getTime();
  // Find the distance between now an the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  // document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  // + minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text
  if (distance < 0) {

    clearInterval(x);

    document.getElementById("countDownContent").style.display = 'block';
  }
}, 1000);


// Start Count Down
var c2 = new Date();
var countdown = <?php echo $a['countdown'] ; ?>;
var Time2 = c2.setTime(c2.getTime() + 1000 * 60 * parseInt(countdown));
//var countDownDate = new Date("Oct 16, 2017 15:37:25").getTime();
var countDownDate2 = Time2;
// Update the count down every 1 second
var x2 = setInterval(function() {
  // Get todays date and time
  var now2 = new Date().getTime();
  // Find the distance between now an the count down date
  var distance2 = countDownDate2 - now2;
  // Time calculations for days, hours, minutes and seconds
  var days2 = Math.floor(distance2 / (1000 * 60 * 60 * 24));
  var hours2 = Math.floor((distance2 % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes2 = Math.floor((distance2 % (1000 * 60 * 60)) / (1000 * 60));
  var seconds2 = Math.floor((distance2 % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
  //document.getElementById("demo").innerHTML = days2 + "d " + hours2 + "h "
  + minutes2 + "m " + seconds2 + "s ";

  document.getElementById("days").innerHTML = days2;
  document.getElementById("hours").innerHTML = hours2;
  document.getElementById("minutes").innerHTML = minutes2;
  document.getElementById("second").innerHTML = seconds2;

  // If the count down is finished, write some text
  if (distance2 < 0) {
    clearInterval(x);
	var redirecturl = "<?php echo $redirecturl; ?>";
	
	window.location.replace(redirecturl);

    document.getElementById("countDownContent").style.display = 'none';
  }
}, 1000);

</script>
