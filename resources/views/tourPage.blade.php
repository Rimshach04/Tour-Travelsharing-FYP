<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/tourPage.css')}}">
    <title>tour page</title>
</head>
<body>

  <h1 id="tour-title"></h1>

  <!-- <img id="tour-image">  -->
    <div class="page_p">
    <p class="ppp"><strong>Duration:</strong> <span id="tour-duration"></span></p>
    <p class="ppp"><strong>Price:</strong> <span id="tour-price"></span></p>
    </div>
    <hr>
         
   


        <!-- tour form -->

<div class="detail-container">
  <h3 id="form-title" ></h3>
  
  <!-- Price Box -->
  <div class="price-box">
    <h2 id="base-price"></h2>

    <label>Date (put date if choose private trip)</label>
    <input type="date" id="tour-date"  />

    <div class="counter">
      <div>
        <strong>Adults</strong> <small>(Max 55 yrs)</small>
        <div class="controls">
          <button class="minus" data-type="adult">-</button>
          <span id="adult-count">0</span>
          <button class="plus" data-type="adult">+</button>
        </div>
      </div>

      <div>
        <strong>Children</strong> <small>(4–8 yrs)</small>
        <div class="controls">
          <button class="minus" data-type="child">-</button>
          <span id="child-count">0</span>
          <button class="plus" data-type="child">+</button>
        </div>
      </div>

      <div>
        <strong>Infant</strong> <small>(0–4 yrs)</small>
        <div class="controls">
          <button class="minus" data-type="infant">-</button>
          <span id="infant-count">0</span>
          <button class="plus" data-type="infant">+</button>
        </div>
      </div>
    </div>

    <!-- Trip Type -->
    <span >Select Trip Type:</span>
    <select id="trip-type">
      <option value="public">Public</option>
      <option value="private">Private</option>
    </select>

    <!-- Total Price -->
    <h3>Total: <span id="total-price">0</span></h3>

    <button class="book-btn" id="bookNowBtn">BOOK NOW</button>
  </div>
</div>

<!-- Confirm Booking Modal -->
<div class="form-overlay" id="formOverlay">
  <div class="booking-form">
    <span class="close-btn" id="closeForm">&times;</span>
    <h2>Confirm Your Booking</h2>
    
    <p><strong>Tour:</strong> <span id="confirm-tour"></span></p>
    <p><strong>Date:</strong> <span id="confirm-date"></span></p>
    <p><strong>Adults:</strong> <span id="confirm-adults"></span></p>
    <p><strong>Children:</strong> <span id="confirm-children"></span></p>
    <p><strong>Infants:</strong> <span id="confirm-infants"></span></p>
    <p><strong>Trip Type:</strong> <span id="confirm-type"></span></p>
    <p><strong>Total Price:</strong> <span id="confirm-price"></span></p>
           <div class="seprate">....................</div>
    <!-- User Info -->
    <div class="usercantainer">
   <div class="user_form">
    <label >Your Name:</label>
    <input type="text" id="userName" placeholder="Enter your name">
</div>
<div class="user_form">
    <label>Phone Number:</label>
    <input type="text" id="userPhone" placeholder="Enter phone number">
</div>
<div class="user_form">
    <label>Address:</label>
    <input type="text" id="userAddress" placeholder="Enter address">
 </div>
    <button id="finalBooking">Confirm Booking</button>
  </div>
</div>
</div>
   





<script  
   type="module" src="{{asset('js/tourpage.js')}}">
  </script>  
     

    
</body>
</html>
