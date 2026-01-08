<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Playwrite+CA:wght@100..400&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

<meta name="csrf-token" content="{{ csrf_token() }}">
    <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
/>
<link rel="stylesheet" href="{{ asset('css/final_project.css') }}">
    <title>travel webApplication</title>
</head>
<body>  
    <!-- header -->
    <header class="zigzag-header">
        <div class="logo">TravelShare</div>
        <nav>
            <input type="checkbox" id="check">
              <label for="check" class="threeline">
                   <i class="uil uil-bars"></i>
               </label>
             <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Plan Tour</a></li>
                <li><a href="/review">reviews</a></li>
                <li><a href="/about">About Us</a></li>
            </ul>
      </nav>
      <div>
        <a href="#" class="login-btn" id="form_open"  style="display:inline-block;">
          <i class="fa fa-user"></i> Login
        </a>
      
        <button class="logout-btn" onclick="logout()" style="display:none;">
          <i class="fa-solid fa-power-off"></i> Logout
        </button>
      </div>
      
      </header>


    <!-- ********************************************************** -->


      <!-- login and sign up -->
      <section class="home">
        <div class="form_container-loup">
          <i class="uil uil-times  form_close"></i>
          <!-- Login form -->
          <div class="form LoginForm">
            {{-- <form action="{{route('login')}}" method="POST"> --}}
            <form >
              @csrf
              <h2>Login</h2>
              <div class="input_bx">
                <input type="email" placeholder="Enter your Email" required>
                <i class="uil uil-envelope-alt email"></i>
              </div>
              <div class="input_bx">
                <input type="password" placeholder="Enter your password" required>
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <label for="role" class="role">Select Your Role:</label>
              <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              <div class="option_field">
                <span class="checkbox">
         <input type="checkbox" id="v">
         <label for="check">Remember me</label>
                </span>
  
              </div>
              <button class="button">Login now</button>
              <div class="login_sigup">
               Don't have an account?
                <a href="#" id="signup" >Sign up</a>
              </div>
            </form>
            </div>
          <!-- sign up -->
          <div class="form SignForm">
            {{-- <form action="{{route('signup')}}"> --}}
            <form >
              <h2>Sign up</h2>
              <div class="input_bx">
                <input type="text" placeholder="Enter your name" required>
                <i class="uil uil-user user"></i>
              </div>
              <div class="input_bx">
                <input type="email" placeholder="Enter your Email" required>
                <i class="uil uil-envelope-alt email"></i>
              </div>
              <div class="input_bx">
                <input type="tel" placeholder="Enter your phone nbr" required>
                <i class="uil uil-phone phone"></i>
              </div>
              <div class="input_bx">
                <input type="password" placeholder="Enter your password" required>
                <i class="uil uil-lock password"></i>
                <i class="uil uil-eye-slash pw_hide"></i>
              </div>
              <label for="role" class="role">Select Your Role:</label>
              <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              <button class="button">Signup now</button>
              <div class="login_sigup">
                Already have an account?
                <a href="#" id="login" >Login</a>
              </div>
            </form>
          </div>
        </div>
      </section>  
              



       <!-- ********************************************************** -->

       
        <!-- Hero Section -->
<section class="hero"> 
    <div class="hero-content">
      <h1 class="animate-title">Tour & Travel Sharing</h1>
      <p class="animate-text">
        Discover new destinations, plan unforgettable tours,  
        and share rides with fellow travelers to make your journey affordable and fun.  
        Connect, explore, and travel smarter with TravelShare!
      </p>
    </div>
  </section>

  <!-- ********************************************************************* -->
  
        <!-- what we  offer section -->
        <section class="features">
            <h2>What We Offer</h2>
            <div class="feature-box">
             <div class="feature">
                <h3>🗺️ Plan Your Tour</h3>
                <p>Create personalized tour plans with budget & time.</p>
              </div>
              <div class="feature">
                <h3>🚗 Ride Sharing</h3>
                <p>Find travel buddies and share rides to save costs.</p>
              </div>
              <div class="feature">
                <h3>🏞️ Book Destinations</h3>
                <p>Discover and book popular travel spots easily.</p>
              </div>
              <div class="feature">
                <h3>⭐ Reviews</h3>
                <p>Read reviews and share your travel experiences.</p>
              </div>
            </div>
          </section>

          <!-- ****************************************************** -->


<section class="tours-slider">
  <h2>🌍 Upcoming Tours</h2>

  <img src="images/back.png" alt="Back" class="backbtn" id="backbtn">

  <div class="slider-container">
    <div class="slider-track" id="packageContainer">
      <!-- Packages API se yahan load honge -->
    </div>
  </div>

  <img src="images/next.png" alt="Next" class="nextbtn" id="nextbtn">
</section>
  
{{-- ******************************************************* --}}

 <h2>Gallery of Memories</h2>
    <div class="gallery">
        <img src="https://picsum.photos/id/1011/400/300" alt="Memory 1">
        <img src="https://picsum.photos/id/1012/400/300" alt="Memory 2">
        <img src="https://picsum.photos/id/1013/400/300" alt="Memory 3">
        <img src="https://picsum.photos/id/1015/400/300" alt="Memory 4">
        <img src="https://picsum.photos/id/1016/400/300" alt="Memory 5">
        <img src="https://picsum.photos/id/1018/400/300" alt="Memory 6">
        <img src="https://picsum.photos/id/1020/400/300" alt="Memory 7">
        <img src="https://picsum.photos/id/1021/400/300" alt="Memory 8">
    </div>

                               <!-- ********************** -->
             <!-- feedback -->
     <button id="feedbackBtn" class="feedback-btn">Feedback</button>

<!-- Feedback Popup -->
<div id="feedbackForm" class="feedback-popup">
  <form class="form-container">
    <h2>Give Your Feedback</h2>

    <input type="text" name="name" placeholder="Your Name" >

    <div class="stars">
      <span data-star="1">&#9733;</span>
      <span data-star="2">&#9733;</span>
      <span data-star="3">&#9733;</span>
      <span data-star="4">&#9733;</span>
      <span data-star="5">&#9733;</span>
    </div>
   <input type="hidden" id="rating" name="rating" value="0">

    <textarea name="message" placeholder="Write your feedback..." required></textarea>

    <button type="submit" class="btn">Submit</button>
    <button type="button" id="closeBtn" class="btn cancel">Close</button>
  </form></div>

                       

   <!-- ************************************************************************* -->
           <!-- contect  -->
            
           <footer class="footer">
            <div class="footer-container">
              
              <!-- About -->
              <div class="footer-col">
                <h3>TravelShare</h3>
                <p>Plan tours, share rides, and explore the world with friends.  
                Affordable, fun, and easy travel experiences await you!</p>
              </div>
          
              <!-- Quick Links -->
              <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                  <li><a href="#home">Home</a></li>
                  <li><a href="#tours">Tours</a></li>
                  <li><a href="#rides">Ride Share</a></li>
                  <li><a href="#contact">Contact</a></li>
                </ul>
              </div>
        
                  
                  <!-- Contact Info -->
                  <div class="footer-col">
                    <h4>Contact</h4>
                    <ul>
                      <li><a href="#" id="callBtn">📞 Call Us</a></li>
                      <li><a href="#" id="whatsappBtn" onclick="openWhatsApp()" >💬 WhatsApp</a></li>
                      <li><a href="#" id="emailBtn" onclick="openEmail()" >✉️ Email</a></li>
                    </ul>
                  </div>
              
                
              
              <!-- Popup: Call -->
              <div class="popup" id="callPopup">
                <div class="popup-content">
                  <span class="close">&times;</span>
                  <h3>Call Us</h3>
                  <p>📞 +92 300 1234567</p>
                </div>
              </div>
              
             

              
              <!-- Social Media -->
              <div class="footer-col">
                <h4>Follow Us</h4>
                <div class="social-links">
                  <a href="#"><i class="fab fa-facebook-f"></i></a>
                  <a href="#"><i class="fab fa-twitter"></i></a>
                  <a href="#"><i class="fab fa-instagram"></i></a>
                  <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
              </div>
          
            </div>
            
          </div>
        </footer>
          
          
           

    <script src="{{asset('js/final_project.js')}}"></script>  
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

</body>
</html>