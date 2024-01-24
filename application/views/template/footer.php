<!-- Footer -->
<footer id="footer" class="footer bg-black-222">
  <div class="container pt-70 pb-40">
    <div class="row">
      <div class="col-sm-6 col-md-5">
        <div class="widget dark">
          <img class="mt-10 mb-15" alt="" src="<?php echo base_url(); ?>assets/images/MCE_logo.png">
          <ul class="list-border">
            <li><a href="https://goo.gl/maps/AhEM9xDFprnpgoku5" class="lineheight-20" target=_blank>No 21, Salagame Rd, Rangoli Halla, Hassan, Karnataka 573202</a>
            </li>
            <li><a href="tel:+08172-245317">08172-245317</a></li>
            <li><a href="mailto:office@mcehassan.ac.in">office@mcehassan.ac.in</a></li>
          </ul>
          <ul class="styled-icons icon-dark mt-20">
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".1s" data-wow-offset="10"><a href="#" data-bg-color="#3B5998"><i class="fa fa-facebook"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".2s" data-wow-offset="10"><a href="#" data-bg-color="#02B0E8"><i class="fa fa-twitter"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".3s" data-wow-offset="10"><a href="#" data-bg-color="#05A7E3"><i class="fa fa-skype"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".4s" data-wow-offset="10"><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus"></i></a></li>
            <li class="wow fadeInLeft" data-wow-duration="1.5s" data-wow-delay=".5s" data-wow-offset="10"><a href="#" data-bg-color="#C22E2A"><i class="fa fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 col-md-3">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Useful Links</h5>
          <ul class="list angle-double-right list-border">
            <li><a href="Institute">About Us</a></li>
            <li><a href="Contactss">Contact US</a></li>
            <li><a href="Gallerys">Gallery</a></li>
            <li><a href="https://accounts.google.com/v3/signin/identifier?dsh=S-1727063973%3A1686560896993296&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&hd=mcehassan.ac.in&osid=1&sacu=1&service=mail&flowName=GlifWebSignIn&flowEntry=AddSession" target=_blank>Staff Mail Login</a></li>
            <li><a href="http://3.109.253.64/auth/login.php" target=_blank>Mce Leave Application</a></li>
          </ul>
        </div>
      </div>
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/flipclock.css">
      <div class="col-sm-6 col-md-4">
        <div class="widget dark">
          <h5 class="widget-title line-bottom">Working Hours</h5>
          <ul class="list angle-double-right list-border">
            <li><a>Mon - Fri : 09.30 am - 05.30 pm</a></li>
            <!-- <li><a href="#">Donor Privacy Policy</a></li> -->
            <li><a>Saturday : 09.30 am - 01.30 pm</a></li>
            <!-- <li><a href="#">Terms of Use</a></li> -->
            <li><a>Sunday : Closed</a> </li><?php $visitCount = updateVisitCounter();
// echo "You are visitor number: $visitCount";
 ?>

<li><a><b>Website Visitors : <?=$visitCount;?></b></a></li>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/flipclock.js"></script>
<!-- <div class="flip-counter" id="myCounter"></div> -->

<script>
  $(document).ready(function () {
    // Set your target number
    var targetNumber = <?=$visitCount;?>;
    var minValue = 8000;
    var speed = 10;
    // Create a FlipClock instance
    var clock = $('#myCounter').FlipClock({
        clockFace: 'Counter',
        autoStart: true,
        speed : speed,
        minimumDigits: Math.max(targetNumber, minValue).toString().length
    });
    

    // Function to start the counter animation
    function startCounter() {
        clock.setTime(0);
        clock.setCountdown(false);
        clock.start();
    }

    // Start the counter when the document is ready
    startCounter();

    // You can stop the counter or restart it as needed
    // To stop: clock.stop();
    // To restart: startCounter();
});

</script>
<!-- <a href='http://www.freevisitorcounters.com'>freevisitorcounters</a> <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=90860a6a034d074625e5a67e909e723ff09a7580'></script>
<script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/1124528/t/2"></script> -->

</div>
        </ul>
      </div>
    </div>
    <!-- <div class="col-sm-6 col-md-3">
            <div class="widget dark">
              <h5 class="widget-title line-bottom">Working Hours</h5>
              <ul class="list text-gray angle-double-right list-border">
                <li><a href="#">09.30 am - 05.30 pm</a></li>
                <li><a href="#">Donor Privacy Policy</a></li>
                <li><a href="#">09.30 am - 01.30 pm</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Closed</a></li>
              </ul>
            </div>
          </div> -->
    <style>
      .footer-counter a {
        display: none !important;
        height: 0px;
        width: 0px;
        overflow: hidden;
      }
    </style>

  </div>
  </div>
  <div class="footer-bottom bg-black">
    <div class="container pt-20 pb-20">
      <div class="row">
        <div class="col-md-6">
          <p class="font-12 text-gray-lightgray m-0"> 2023 &copy; Malnad College of Engineering. All Rights Reserved
          </p>
        </div>
        <div class="col-md-6 text-right">
          <div class="widget no-border m-0">
            <p class="font-12 m-0"> Designed by <a href="https://medhatech.in/" target="_blank">MEDHA TECH</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
  // $(document).ready(function() {
  //   $('#myModal').modal('show');
  // });
</script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.js" integrity="sha512-VqCeCECsaE2fYTxvPQk+OJ7+SQxzI1xZ6IqxuWd0GPKaJoeSFqeakVqNpMbx1AArieciBF71poL0dYTMiNgVxA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function printDiv(divId) {
                var printContents = document.getElementById(divId).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
           <script>
        // Function to trigger the PDF download
  //       function downloadAsPDF() {

            
  //           // Create a new jsPDF instance
  //           const pdf = new jsPDF();

  //           var specialElementHandlers = {
  //   '#editor': function (element, renderer) {
  //     return true;
  //   } };

  //           // Get the content of the div
  //           var content = document.getElementById('printableArea');

  //           // Add the HTML content to the PDF
  //         //  pdf.fromHTML(content, 15, 15);
  //         pdf.fromHTML(content, 15, 15, {
  //       'width': 170,
  //       'elementHandlers':specialElementHandlers
	//     }
  // );

  //           // Save the PDF with a specific name 
  //           pdf.save('downloaded-pdf.pdf');
  //       }

  //       // Attach the function to the button click event
  //       document.getElementById('downloadBtn').addEventListener('click', downloadAsPDF);

    </script>
       <script>
        // Function to convert HTML to PDF
        function convertToPDF() {
            const content = document.getElementById('printableArea');
            content.style.width = '100%';
            // content.style.marginTop = '10mm';
// content.style.marginBottom = '10mm';
content.style.marginLeft = '5mm';
// content.style.marginRight = '5mm';
const elementsToHide = document.querySelectorAll('.no-print');

elementsToHide.forEach((element) => {
  element.style.display = 'none';
});

            // Use html2pdf library
            
            html2pdf(content).from(content).outputPdf();
        }
    </script>
<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
      
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>
</body>

</html>