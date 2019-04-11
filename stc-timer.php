<?php
/**
* Plugin Name: stc timer
* Plugin URI: http:bdstore24.com/
* Description: Count Down for special offer.
* Author: STC
* Author URI: http:bdstore24.com/
* Version: 1.0
*/
add_action('init', 'register_script');
function register_script() {
// wp_register_script( 'stc-timer-jquery', plugins_url('js/timer.js', __FILE__), array('jquery'), '1.0.0' );
	wp_register_style( 'stc-timer-style', plugins_url('css/style.css', __FILE__), false, '1.0.0', 'all');
}
// use the registered jquery and style above
add_action('wp_enqueue_scripts', 'enqueue_style');
function enqueue_style(){
// wp_enqueue_script('stc-timer-jquery');
	wp_enqueue_style( 'stc-timer-style' );
}
function create_timer($atts, $content = null){  ob_start();  
	$a = shortcode_atts( array(
		'show' => '10',
		'countdown' => '14',
		'offerurl' => 'https://www.digistore24.com/product/104759?voucher=50prozentrabatt',
		'redirecturl' => 'https://trading-heroes24.com'
		), $atts );
	$redirecturl = $a['redirecturl'];
	?>
	<div id="loading" style="display:none;"></div>
	<div id="countDownContent" style="display:none;" >
		<div class="heading row">
			<div class="timeBoxPartial"><span class="timePromotion timeOffer">50% Rabatt endet in: </span></div>
			<div id="timeCounter" class="timeBoxPartial timerContainer">
				<div class="timeBox">
						<div class="timinghead">
							<div class="timeHead">Days</div>
							<div id="days" class="timeCount">10</div>
						</div>
						<div class="timinghead">
							<div class="timeHead">Hours</div>
							<div id="hours" class="timeCount">10</div>
						</div>
						<div class="timinghead">
							<div class="timeHead">Mins</div>
							<div id="minutes" class="timeCount">10</div>
						</div>
						<div class="timinghead">
							<div class="timeHead">Secs</div>
							<div id="second" class="timeCount">10</div>
						</div>											
				</div>
			</div>
			<div class="timeBoxPartial" style="margin-top: 9px;"><a  href="<?php echo $a['offerurl'] ; ?>"><img src="<?php echo plugin_dir_url( __FILE__ ).'images/paymentSpecialBtn.png'; ?>"></a></div>
		</div>
	</div>
	<script>
// Display Timer
var c = new Date();
var showTime = <?php echo $a['show'];?>;
var show = parseInt(showTime);
var Time = c.setTime(c.getTime()+1000*60*show);
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
	if (distance < 0) {
		clearInterval(x);
		document.getElementById("countDownContent").style.display = 'block';
	}
}, 1000);
// Start Count Down
var c2 = new Date();
var countdownTime = <?php echo $a['countdown'] ; ?>;
var countdown = parseInt(countdownTime) + show;
var Time2 = c2.setTime(c2.getTime()+1000*60*countdown);
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
	+ minutes2 + "m " + seconds2 + "s ";
	document.getElementById("days").innerHTML = days2;
	document.getElementById("hours").innerHTML = hours2;
	document.getElementById("minutes").innerHTML = minutes2;
	document.getElementById("second").innerHTML = seconds2;
	// If the count down is finished, write some text
	if (distance2 < 0) {
		document.getElementById("loading").style.display = 'block';
		clearInterval(x2);
		document.getElementById("countDownContent").style.display = 'none';
		var redirecturl = "<?php echo $redirecturl; ?>";
		window.location.replace(redirecturl);
}
}, 1000);
</script>
<?php	
return ob_get_clean();
}
add_shortcode('stc','create_timer');
?>