	</div><!-- /.container -->
</section><!-- / #ccr-main-section -->

<footer id="ccr-footer">
	<div class="container">
	 	<div class="copyright">
	 		<?php copyrights(); ?>
	 	</div> <!-- /.copyright -->

	</div> <!-- /.container -->
    <a href="#" class="scrollToTop"><i class="fa fa-2x fa-arrow-circle-up"></i></a>
</footer>  <!-- /#ccr-footer -->
<script src="<?php echo asset_url(); ?>js/jquery-1.11.3.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.social-buttons.js"></script>

<script src="<?php echo asset_url(); ?>js/bootstrap.min.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.newsTicker.js"></script>
<script src="<?php echo asset_url(); ?>js/custom.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.prettyPhoto.js"></script>
<script src="<?php echo asset_url(); ?>js/jquery.share.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	var t;

var start = $('#addsCarousel').find('.active').attr('data-interval');
t = setTimeout("$('#addsCarousel').carousel({interval: 1000});", start-1000);

$('#addsCarousel').on('slid.bs.carousel', function () {  
     clearTimeout(t);  
     var duration = $(this).find('.active').attr('data-interval');
    
     $('#addsCarousel').carousel('pause');
     t = setTimeout("$('#addsCarousel').carousel();", duration-1000);
})

$('.carousel-control.right').on('click', function(){
    clearTimeout(t);   
});

$('.carousel-control.left').on('click', function(){
    clearTimeout(t);   
});


    $('#mydiv').share({
        networks: ['facebook','googleplus','twitter']
    });
    ShowTime();
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	$("body").on("click",".postReporter",function(){
		//console.log('submit');
		var message="";
		if($('#username').val()==""){message+="Please Enter Your name<br>"; }
		if($('#emailaddress').val()==""){message+="Please Enter Your email<br>"; }
		if($('#phonenumber').val()==""){message+="Please Enter Your phonenumber<br>"; }
		if(message!=""){
			$('.errormsgs').html(message);
			return false;
		}else{
			$('.errormsgs').html("");
			$.ajax({
	            type: "POST",
	            url: "<?php echo base_url(); ?>home/sendMessage", //process to mail
	            data: $('form.contact').serialize(),
	            success: function(msg){
	            	if(msg==1){
	            		alert("Thanks for your submit");
						$("#myModal").modal("hide");
	            	}
	            },
	            error: function(){
	                alert("failure");
	            }
	        });
		}
		console.log($('form.contact').serialize());
        /*
*/    });
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	 $("[rel^='lightbox']").prettyPhoto();
	 
	
});
	function ShowTime() {
		var date = new Date();
		document.getElementById("currentTime").innerHTML = getFormattedDate(date);
		window.setTimeout("ShowTime()", 1000); // Here 1000(milliseconds) means one 1 Sec  
	}
	function getFormattedDate(date) {
		var weekdays = new Array(7);
			weekdays[0] = "Sunday";
			weekdays[1] = "Monday";
			weekdays[2] = "Tuesday";
			weekdays[3] = "Wednesday";
			weekdays[4] = "Thursday";
			weekdays[5] = "Friday";
			weekdays[6] = "Saturday";
	  var year = date.getFullYear();
	  var month = (1 + date.getMonth()).toString();
	  month = month.length > 1 ? month : '0' + month;
	  var day = date.getDate().toString();
	  day = day.length > 1 ? day : '0' + day;
	  var hours = date.getHours().toString();
	  hours = hours.length > 1 ? hours : '0' + hours;
	  var min = date.getMinutes().toString();
	  min = min.length > 1 ? min : '0' + min;
	  var sec = date.getSeconds().toString();
	  sec = sec.length > 1 ? sec : '0' + sec;
	  var weekday_value=date.getDay();
	  return day + '/' + month + '/' + year+" "+hours+":"+min+":"+sec+"  "+weekdays[weekday_value];
	}
	setInterval(function(){ 
		var colors = ["crimson","darkgreen","darkred", "blueviolet", "purple"];;                
  		var rand = Math.floor(Math.random()*colors.length);           
		$('.comingsoon').css("background-color", colors[rand]);
   }, 2000);

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-82048506-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>