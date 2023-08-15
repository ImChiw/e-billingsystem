<?php
session_start();

if(isset($_SESSION['userid'])){
    header("Location: home.php?error=click");
	exit();
}else if(isset($_SESSION['adminid'])){
  header("Location: admin/adminmain.php?error=click");
exit();
}
else{
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Billing System</title>

    <!-- bootstrap cdn link  -->
    
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/try.css">
</head>
<body>
    


<nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">E - Billing System</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <span class="logo-name">Billing System</span>
          <i class='bx bx-x'></i>
        </div>
        <ul class="links">
        <li><a href="#home">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#blogs">Tips</a></li>
          <li><a href="#experts">Partners</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#developer">Developers</a></li>
          <li>
            <a href="#">Log in As</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="loginform.php">Customer</a></li>
              <li><a href="admin/admi.php">Admin</a></li>             
            </ul>
          </li>
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div>
    </div>
  </nav>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="container">

        <div class="row min-vh-100 align-items-center pt-5">

            <div class="col-md-6">
                <img src="icon/12.gif" class="w-100" alt="">
            </div>

            <div class="col-md-6 content text-center text-md-start pl-md-5">
                <h1>E - Billing</h1>
                <h3>Electronic Billing System with Built in Payment </h3>
                <br><br>

            </div>

        </div>

    </div>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <div class="container">

        <div class="row align-items-center flex-wrap-reverse">

            <div class="col-md-6 content">
                <h3>About E - Billing </h3>
                <p>We want to keep you updated to all your bills and provide our customer an efficient way of payment.</p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolorum aliquid consequuntur suscipit maxime rem ipsam beatae distinctio molestias. Odit aspernatur doloremque commodi laudantium repellat omnis accusantium officiis ex corporis minus.
                </p>
                <a href="#" class="link-btn">learn more</a>
            </div>  <br><br>

            <div class="col-md-6">
                <img src="icon/g.webp" class="w-100" alt="">
            </div>

        </div>

    </div>

</section>

<!-- about section ends -->
<br><br><br><br>


<!-- blogs section starts  -->

<section class="blogs" id="blogs">

    <h1 class="heading"> E - Billing  <span>Tips</span> </h1>
    
        <div class="container">
    
            <div class="d-flex justify-content-center flex-wrap">
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/mode.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Mode of payement? </h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/data.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Data Security?</h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/update.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Updated Records?</h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    

                
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/efficiency.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Efficiency?</h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    
                
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/responsive.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Responsiveness?</h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    
                
    
                <div class="box p-3 m-2">
                    <div class="image">
                        <img src="icon/affordable.webp" class="w-100 h-100"  alt="">
                    </div>
                    <div class="content p-2">
                        <h3>Affordable?</h3>
                        <a href="#" class="link-btn">read more</a>
                        <div class="icons">
                            <a href="#"><i class="fas fa-user"></i>by admin</a>
                            <a href="#"><i class="fas fa-calendar"></i>04 april, 2022</a>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </div>
    
    </section>
    
    <!-- blogs section ends -->
    
    <br><br><br><br>
<!-- Guidance section starts  -->

<section class="experts" id="experts">

    <h1 class="heading"> meet our <span>Business</span> Partners </h1>
    
        <div class="container">
    
            <div class="d-flex justify-content-center flex-wrap">
    
                <div class="box">
                    <img src="icon/manager.jpg" alt="">
                    <h3>Adult Hitler</h3>
                    <span>Stock Holder</span>
                    <br>
                    <span>Business Partner</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="icon/manager3.jpg" alt="">
                    <h3>Moana Lizard</h3>
                    <span>Stock Holder</span>
                    <br>
                    <span>Business partner</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="icon/manager1.jpg" alt="">
                    <h3>Donald Trunks</h3>
                    <span>Stock Holder</span>
                    <br>
                    <span>Business partner</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
    
                <div class="box">
                    <img src="icon/manager2.webp" alt="">
                    <h3>Queenie Eliza</h3>
                    <span>Stock Holder</span>
                    <br>
                    <span>Business Partner</span>
                    <div class="share">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
    

                
            </div>
    
    </section>
    <!-- Guidance section ends -->
    
    <br><br><br><br>

<!-- contact section starts  -->

<section class="contact" id="contact">

<h1 class="heading"> <span>contact</span> for Appointment </h1>
    <div class="container">
 
        <div class="row flex-wrap-reverse">
 
            <div class="col-md-7 p-2">
                
                <form >
                <input type="date" id="txtDate"  class="box" name="date">
                    <input type="time" id="appt" name="time"class="box">
                    <textarea name="" placeholder="Enter Message (Optional)" id="" cols="30" rows="10"></textarea>
     
                    <a href="#" class="link-btn">Send</a>
                </form>

            </div>

            <div class="col-md-5 p-2">
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2298.6246150283723!2d121.02463077695216!3d14.38883607318899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d1047d11d4fb%3A0x672c55f2cba8880!2sPamantasan%20ng%20Lungsod%20ng%20Muntinlupa!5e1!3m2!1sen!2sph!4v1638349211241!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>

        </div>

    </div>

</section>

<!-- contact section ends -->
<br><br><br><br><br>
<!-- Developer Section starts -->



<h1 class="heading"> <span>Developer</span> Team </h1>
      
<section class="developer" id="developer">

    
            <div class="card">
                <div class="bg-image">
                <img src="icon/blue.jpg">
                </div>
                <div class="pic">
                    <img src="icon/dev1.jpg">
                </div>
                <div class="info">
                    <h3>Developer 1.</h3>
                    <span><i class="fas fa-code"></i> BS Computer Science </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur assumenda eaque, cum corporis dolor neque quod sequi eligendi a qui.
                    <div class="icons">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-google"></a>
                    </div>
                </div> 
            </div>

            
            <div class="card">
                <div class="bg-image">
                    <img src="icon/blue.jpg">
                </div>
                <div class="pic">
                    <img src="icon/dev2.png">
                </div>
                <div class="info">
                    <h3>Developer 2</h3>
                    <span><i class="fas fa-code"></i> BS Computer Science </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur assumenda eaque, cum corporis dolor neque quod sequi eligendi a qui.
                    <div class="icons">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-google"></a>
                    </div>
                </div> 
            </div>

            
            <div class="card">
                <div class="bg-image">
                <img src="icon/blue.jpg">
                </div>
                <div class="pic">
                    <img src="icon/dev3.webp">
                </div>
                <div class="info">
                    <h3>Developer 3</h3>
                    <span><i class="fas fa-code"></i> BS Computer Science </span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur assumenda eaque, cum corporis dolor neque quod sequi eligendi a qui.
                    <div class="icons">
                        <a href="#" class="fab fa-facebook"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-google"></a>
                    </div>
                </div> 
                </div>
</section>
<!-- Developer Section Ends -->
<!-- footer section starts  -->
<section class="footer">

    <div class="container">

        <div class="d-flex flex-wrap justify-content-center text-center text-sm-start">

            <div class="box p-3 m-2">
                <h3>Secret</h3>
                <a >Secret</a>
                <a >Secret</a>
                <a >Secret</a>
                <a >Secret</a>
                <a >Secret</a>
            </div>

            <div class="box p-3 m-2">
                <h3>quick links</h3>
                <a href="#home">home</a>
                <a href="#about">about</a>
                <a href="#tips">Tips</a>
                <a href="#contact">contact</a>
                <a href="#developer">Developer</a>
            </div>

            <div class="box p-3 m-2">
                <h3>follow us</h3>
                <a href ="https://facebook.com/qwertyuiop031400"target="popup"onclick="window.open('https://facebook.com/qwertyuiop031400','name','width=800,height=800')">Facebook</a>
                <a href ="https://www.instagram.com/im_marbin/" target="popup"onclick="window.open('https://www.instagram.com/im_marbin/','name','width=800,height=800')">Instagram</a>
                <a href="#">Website</a>
                <a href="#">twitter</a>
            </div>

            <div class="box p-3 m-2">
                <h3>contact info</h3>
                <a >Line 1: 01-1234556</a>
                <a >secret@gmail.com</a>
                <a >123 Di mahanap Street bulok City</a>
               <a> &#169; Copyright</a>

            </div>
                
        </div>
    </div>
 
</section>
<?php
}
?>
  <script src="js/try.js"></script>
</body>
</html>