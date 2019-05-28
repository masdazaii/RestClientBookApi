@extends('layout.detailMain')

@section('content')
<?php
  $ch = curl_init("http://localhost:8000/api/buku");
            // $post = json_encode(array(
            //  "email" => "fikriuli98@gmail.com",
            //  "password" => "12345678"
            // ));
            $authorization = "Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjcxNjgxNTI5NGMwNmM2N2E4YzRiMjhkMGFhNzUxYzYxMDAyZGFhMTBmNDkyNDg4ZjkwYTFiODJiMmEyZGQzNzA4M2ZmNjQ0MWFhMjliZWNiIn0.eyJhdWQiOiIxIiwianRpIjoiNzE2ODE1Mjk0YzA2YzY3YThjNGIyOGQwYWE3NTFjNjEwMDJkYWExMGY0OTI0ODhmOTBhMWI4MmIyYTJkZDM3MDgzZmY2NDQxYWEyOWJlY2IiLCJpYXQiOjE1NTgzMTE1OTksIm5iZiI6MTU1ODMxMTU5OSwiZXhwIjoxNTg5OTMzOTk5LCJzdWIiOiIzIiwic2NvcGVzIjpbXX0.tBtbVh6XFzehXbL-9mPPJ_SZSKi7-Hgu4CLZ-z4uAa4tSu73KDB5-DtOTve4VwRBiHgNAPIFB7GVfMFcMJXwF_DuM0c1m_Z5ptPTSfQSP_RhXcUdYki-HTSLBIhdve0vwzaYsjV6VbCBhEU7yNE6puRjzQwKiSU18sMnmYHTAkBoYvyepfakA0QmsozOFBgWUE0bO2lLxyTeNf5wwEqgzl9AbYfpKrZgVAWFbi9yb-MNkrq08_Oe0k2xr9jxtDR20FUCZSUdt3heGgkqU06LtJVYMZx8C8_lNDau6Z8D_eYbUDphth81mlE0mDL6X9BoHJZj4EG-rDjs7WPElo_UczY2JTgH4VLR1oSxnCBC5MTzp2dEmy7i5E97cMiuWCofMlsReHJZQCSDbZg76ktFP1K5uoT5awOAoEGveMQw5rhphPIjqagRCQh1b5YRt1_GQ3BqZO5YYhMAuw7uRfjPvdBrU8HNBK46bxObzVjgNUhhfO7v7FUc_YfWHUsVyeBhLWlJNVnOJpBlKi-Qw3mCsnZdAMI4ByMHzm1ubQDBOIGslXL8wncKK5vWKCPdGGg6-0k3_r-LR3rwtX4U2Rgk1kfnn1HzJZjxlTjwhUBpXeFHX1GNYH--mrKLLIN_XIVbxLuPSK_FadXwUlEid1jZ2KhULjc10fZKixvP06Id-Rs";
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json', $authorization));
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"GET");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
                //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
            $result =curl_exec($ch);
            curl_close($ch);
            // $url = "http://localhost:8000/api/buku";
            // $file = file_get_contents($url);
             $json = json_decode($result);
             $j=0;

             $idnya= $_GET['id'];
             foreach ($json as $key) {
                $j+=1;
            }


            $all = $j;
?>

<section id="about">

      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="{{$json->Book[$idnya]->thumbnail}}" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <ul class="list-group" style="padding: 10px; max-width: 1000px;">
                <li class="list-group-item disabled">Judul : {{$json->Book[$idnya]->title}} </li>
                <li class="list-group-item">Kategori : {{$json->Book[$idnya]->category->category}} </li>
                <li class="list-group-item">Pengarang : {{$json->Book[$idnya]->publisher->publisher}} </li>
                <li class="list-group-item">Tahun : {{$json->Book[$idnya]->year}} </li>
              </ul>  
            </div>
          </div>
        </div>
      </div>

    </section><!-- #about -->

    <section id="features">
      <div class="container">
        <div class="col-md-12" style="align-content: center;">
          <h1 style="text-align: center;">View PDF</h1>
          <div id="viewpdf" style="margin-left: 20%; height: 600px; width:600px;"></div>
        </div>
      </div>
    </section><!-- #about -->

    <!--==========================
      Team Section
    ============================-->
    
  <!--==========================
    Footer
  ============================-->
  <footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>Rapid</h3>
                    <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
                  </div>

                  <div class="footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem.</p>
                    <form action="" method="post">
                      <input type="email" name="email"><input type="submit"  value="Subscribe">
                    </form>
                  </div>

                </div>

                <div class="col-sm-6">
                  <div class="footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                      <li><a href="#">Home</a></li>
                      <li><a href="#">About us</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="#">Terms of service</a></li>
                      <li><a href="#">Privacy policy</a></li>
                    </ul>
                  </div>

                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>
                      A108 Adam Street <br>
                      New York, NY 535022<br>
                      United States <br>
                      <strong>Phone:</strong> +1 5589 55488 55<br>
                      <strong>Email:</strong> info@example.com<br>
                    </p>
                  </div>

                  <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>

                </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">
              
              <h4>Send us a message</h4>
              <p>Eos ipsa est voluptates. Nostrum nam libero ipsa vero. Debitis quasi sit eaque numquam similique commodi harum aut temporibus.</p>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>

          </div>

          

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Rapid</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
@endsection

@section('script')
  <script type="text/javascript">
    var buku = '{{$json->Book[$idnya]->file}}';
    var viewer = $('#viewpdf');
    PDFObject.embed(buku,viewer);
  </script>
@endsection