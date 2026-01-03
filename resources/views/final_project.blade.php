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
            <form action="{{route('login')}}" method="POST">
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
            <form action="{{route('signup')}}">
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
                <option value="driver">Driver</option>
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

          <!-- tour list -->
          <!-- Tours Slider Section -->
{{-- <section class="tours-slider">
  <h2>🌍 Upcoming Tours</h2>

  <img src="images/back.png" alt="" class="backbtn"  id="backbtn"    >
  <div class="slider-container">
    <div class="slider-track">
      <!-- Tour Card 1 -->
      
        @foreach($packages as $package)
      <div class="tour-card"
      data-title="3 Days Trip to Swat – Kalam – Mahodand Lake"
      data-duration="3 Days & 2 Nights"
      data-price="Rs 36,000"
      >
        <img src="images/image.jpg" alt="Hunza Tour">
        <h3> 3 Days Trip to Swat – Kalam   – Mahodand Lake</h3>
        <p>🕒 3 Days & 2 Nights <strong> |</strong> PKR 36,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>

      <!-- Tour Card 2 -->
      <div class="tour-card" 
      data-title="3 Days Tour to Naran–Shogran–Siri Paye–Babusar"
      data-duration="3 Days & 2 Nights"
      data-price="Rs 26,000"
      >
        <img src="images/water.avif" alt="Skardu Tour">
        <h3>3 Days Tour to Naran–Shogran–Siri Paye–Babusar</h3>
        <p>3 Days & 2 Nights <strong> |</strong> PKR 26,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>

      <!-- Tour Card 3 -->
      <div class="tour-card"
      data-title="3 Days Trip to Murree  – Patriata – Gilgit"
      data-duration="3 Days & 2 Nights"
      data-price="Rs 20,000"
      >
        <img src="images/8-days-hunza-swat-tour-package-2.webp" alt="Fairy Meadows">
        <h3>3 Days Trip to Murree  – Patriata – Gilgit</h3>
        <p>3 Days & 2 Nights<strong> |</strong> PKR 20,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>

      <!-- Tour Card 4 -->
      <div class="tour-card"
      data-title="5 Days Trip to Hunza – Attabad Lake – Khunjerab Pass"
      data-duration="5 Days & 4 Nights"
      data-price="Rs 30,000"
      >
        <img src="images/road.jpg" alt="Swat Tour">
        <h3>5 Days Trip to Hunza – Attabad Lake – Khunjerab Pass</h3>
        <p>5 Days & 4 Nights <strong> |</strong> PKR 30,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>
          
         <!-- Tour Card 5 -->
      <div class="tour-card"
      data-title=" 5 Days Tour to Ratti Gali Lake – Taobat – Arang Kel"
      data-duration="5 Days & 4 Nights"
      data-price="Rs 30,000"
      >
        <img src="images/water.avif" alt="Swat Tour">
        <h3>5 Days Tour to Ratti Gali Lake – Taobat – Arang Kel</h3>
        <p>5 Days & 4 Nights <strong> |</strong> PKR 30,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>
            
          <!-- Tour Card 6 -->
          <div class="tour-card"
          data-title="5 Days Trip To Fairy Meadows–Nanga Parbat BaseCamp"
                      data-duration="5 Days & 4 Nights"
                      data-price="Rs 30,000"
          >
            <img src="images/road.jpg" alt="Swat Tour">
            <h3>5 Days Trip To Fairy Meadows–Nanga Parbat BaseCamp</h3>
            <p>5 Days & 4 Nights <strong> |</strong> PKR 30,000 / Head</p>
            <button class="btn-tour">View Details</button>
          </div>

              <!-- Tour Card 7 -->
      <div class="tour-card"
      data-title="5 Days Trip to Hunza – Attabad Lake – Khunjerab Pass"
      data-duration="5 Days & 4 Nights"
      data-price="Rs 30,000"
      >
        <img src="images/image2.jpg" alt="Swat Tour">
        <h3>5 Days Trip to Hunza – Attabad Lake – Khunjerab Pass</h3>
        <p>5 Days & 4 Nights <strong> |</strong> PKR 30,000 / Head</p>
        <button class="btn-tour">View Details</button>
      </div>
      @endforeach
    </div>
  </div>
  <img src="images/next.png" alt="" class="nextbtn" id="nextbtn">
  <!-- Slider Dots -->
  <div class="slider-dots">
    <span class="dot active" onclick="moveSlide(0)"></span>
    <span class="dot" onclick="moveSlide(1)"></span>
    <span class="dot" onclick="moveSlide(2)"></span>
  </div>
</section> --}}

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

<script>
   document.addEventListener("DOMContentLoaded", function () {
  
  fetch('/api/getpackages')
      .then(response => response.json())
      .then(result => {

          let packages = result.data;
          let container = document.getElementById('packageContainer');
          let html = '';

          packages.forEach(pkg => {
              html += `
                  <div class="tour-card"
                      data-title="${pkg.name}"
                      data-duration="${pkg.duration} Days"
                      data-price="PKR ${pkg.price}"
                      data-description="${pkg.description}"
                      data-image="images${pkg.image}"
                  >
                  <img src="/${pkg.image}" alt="Tour Image">
                  
                      <h3>${pkg.name}</h3>
                      <p>🕒 ${pkg.duration} Days | PKR ${pkg.price}</p>
                    
                      <button class="btn-tour">View Details</button>
                  </div>
              `;
          });
      
          container.innerHTML = html;
      })
      .catch(error => {
          console.error('Error loading packages:', error);
      });

});

document.addEventListener("click", function (e) {

    let card = e.target.closest(".tour-card");
    if (!card) return;

    let title = encodeURIComponent(card.dataset.title);
    let duration = encodeURIComponent(card.dataset.duration);
    let price = encodeURIComponent(card.dataset.price);
    let description = encodeURIComponent(card.dataset.description);

    window.location.href = `/tourpage?title=${title}&duration=${duration}&price=${price}&description=${description}`;
});

  </script>
    
  

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
  </form>
</div>
                           <!-- **************************************************** -->


                <!-- rides avaible -->

                <div class="ride-heading">
                  <h1>Avaible Rides</h1>
                </div>
                  <div class="ride_cantainer"  id="ridesContainer">
                <div class="ride-card"  class="ride_container">
                  <img src="images/download.jpg" alt="Car" class="ride-image">
                  <div class="ride-details">
                    <h2>BWP → hasilpur</h2>
                    <p><strong>Car:</strong> Toyota Corolla (ABC-789)</p>
                    <p><strong>Driver:</strong> Ahmed Raza</p>
                    <p><strong>Phone:</strong> 0301-9876543</p>
                    <p><strong>Payment:</strong> Rs. 1500 / seat</p>
                    <p><strong>Departure:</strong> 08:30 AM, 15 Sept</p>
                    <div class="seats-info">✅ 2 Seats Booked | &#129681; 2 Seats Left</div>
                    <button class=" book-btn">&#128663; Book Your Seat</button>
                  </div>
               
                  <div class="view-map-btn  map-btn" >Map</div>
                </div>
              
               
                <div class="overlay form-overlay " id="bookingModal">
                  <div class="booking-form">
                    <span class="close-btn" id="closeBooking">&times;</span>
                    <h2>Book Your Ride</h2>
                    <form id="rideBookingForm"  >
                      @csrf
                      <input type="hidden" name="ride_id" id="ride_id">
                      <label>Full Name</label>
                      <input type="text" name="full_name" placeholder="Enter your name" required>
                      
                      <label>Address</label>
                      <textarea rows="3" name="address" placeholder="Enter your address" required></textarea>
                      
                      <label>Phone Number</label>
                      <input type="tel" name="phone" placeholder="03xx-xxxxxxx" required>
              
                      <label>Seats to Book</label>
                      <select  name="seats"  required>
                        <option value="">Select Seats</option>
                        <option value="1">1 Seat</option>
                        <option value="2">2 Seats</option>
                      </select>
                      
                      <button type="submit">Confirm Booking</button>
                    </form>
                    
                  </div>
                </div>
              
                <!-- Map Overlay -->
                <div class="overlay map-overlay" >
                  <div class="map-popup">
                    <span class="close-btn" >&times;</span>
                    <h2>Route: Hasilpur → Bahawalpur</h2>
             
                    <iframe 
                      src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d13634.299844871889!2d72.5411026!3d29.6939349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1sHasilpur%2C%20Bahawalpur%2C%20Punjab!2s!3m2!1d29.6922!2d72.5453!4m5!1sBahawalpur%2C%20Punjab!2s!3m2!1d29.3956!2d71.6833!5e0!3m2!1sen!2s!4v1694505555555"
                      width="600"
                      height="400"
                      style="border:0; border-radius:12px;"
                      allowfullscreen=""
                      loading="lazy">
                    </iframe>
                  </div>
                </div>
  
                          <!-- 2nd car ride  -->
                  <!-- Ride Card -->
  <div class="ride-card" class="ride_container" id="ridesContainer">
    <img src="images/download.jpg" alt="Car" class="ride-image">
    <div class="ride-details">
      <h2>BWP → hasilpur</h2>
      <p><strong>Car:</strong> Toyota Corolla (ABC-789)</p>
      <p><strong>Driver:</strong> Ahmed Raza</p>
      <p><strong>Phone:</strong> 0301-9876543</p>
      <p><strong>Payment:</strong> Rs. 1500 / seat</p>
      <p><strong>Departure:</strong> 08:30 AM, 15 Sept</p>
      <div class="seats-info">✅ 2 Seats Booked | 🪑 2 Seats Left</div>
      <button class=" book-btn" >🚗 Book Your Seat</button>
    </div>
   
    <div class="view-map-btn  map-btn" >Map</div>
  </div>

  <!-- Booking Form Overlay -->
  <div class="overlay form-overlay" >
    <div class="booking-form">
      <span class="close-btn" >&times;</span>
      <h2>Book Your Ride</h2>
      <form id="rideBookingFormTwo"   >
        @csrf
        <label>Full Name</label>
        <input type="text"name="full_name" placeholder="Enter your name" required>
        
        <label>Address</label>
        <textarea rows="3" name="address" placeholder="Enter your address" required></textarea>
        
        <label>Phone Number</label>
        <input type="tel" name="phone" placeholder="03xx-xxxxxxx" required>

        <label>Seats to Book</label>
        <select  name="seats"  required>
          <option value="">Select Seats</option>
          <option value="1">1 Seat</option>
          <option value="2">2 Seats</option>
        </select>
        
        <button type="submit">Confirm Booking</button>
      </form>
    </div>
  </div>

  <!-- Map Overlay -->
  <div class="overlay map-overlay">
    <div class="map-popup">
      <span class="close-btn" >&times;</span>
      <h2>Route: Hasilpur → Bahawalpur</h2>
    
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d13634.299844871889!2d72.5411026!3d29.6939349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1sHasilpur%2C%20Bahawalpur%2C%20Punjab!2s!3m2!1d29.6922!2d72.5453!4m5!1sBahawalpur%2C%20Punjab!2s!3m2!1d29.3956!2d71.6833!5e0!3m2!1sen!2s!4v1694505555555"
        width="600"
        height="400"
        style="border:0; border-radius:12px;"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </div>
                         </div>

                       

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>