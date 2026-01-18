{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/tourPage.css')}}">
    <title>tour page</title>
    
    <!-- ✅ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Quill styles (so HTML looks correct) -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />

    <style>
        /* Quill content rendering fixes (no overlap) */
        .tour-description .ql-editor {
            padding: 0 !important;
            line-height: 1.7 !important;
            font-size: 16px;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .tour-description .ql-editor p,
        .tour-description .ql-editor ul,
        .tour-description .ql-editor ol,
        .tour-description .ql-editor h1,
        .tour-description .ql-editor h2,
        .tour-description .ql-editor h3 {
            margin: 0 0 10px 0;
        }

        .tour-description .ql-editor img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Booking overlay (Bootstrap friendly) */
        .form-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 1055;
        }

        .form-overlay.show {
            display: flex;
        }

        .booking-form {
            width: 100%;
            max-width: 560px;
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
            position: relative;
        }

        .close-btn {
            position: absolute;
            right: 14px;
            top: 10px;
            font-size: 28px;
            cursor: pointer;
            line-height: 1;
        }
    </style>
</head>
<body>

  {{-- <h1 id="tour-title"></h1>

  <!-- <img id="tour-image">  -->
    <div class="page_p">
    <p class="ppp"><strong>Duration:</strong> <span id="tour-duration"></span></p>
    <p class="ppp"><strong>Price:</strong> <span id="tour-price"></span></p>
    </div>
    <hr>
    <h4>Description</h4>
    <div class="discrition">
    {{-- <p>{{ request('description') }}</p> --}}
    {{-- <h3>{!! nl2br(e(request('description'))) !!}</h3> --}}
{{-- 
  </div> --}}
  {{-- <div class="package-card">
  <h1>{{ $package->name }}</h1>
 
<p>{{ $package->duration }} Days</p>
<p>PKR {{ $package->price }}</p>

<p>{{ $package->description }}</p>
</div> --}}
{{-- <div class="col-lg-8">
  <div class="card shadow-sm border-0">
      <div class="card-body p-4">
          <h1 class="h3 fw-bold mb-2">{{ $package->name }}</h1>

          <div class="d-flex flex-wrap gap-2 mb-3">
              <span class="badge text-bg-primary">{{ $package->duration }} Days</span>
              <span class="badge text-bg-success">PKR {{ number_format($package->price) }}</span>
              <span class="badge text-bg-dark">{{ $package->location }}</span>
          </div>

          @if ($package->image)
              <img src="{{ asset($package->image) }}" alt="{{ $package->name }}"
                  class="img-fluid rounded-4 mb-3"
                  style="max-height: 360px; object-fit: cover; width: 100%;" />
          @endif

          <!-- ✅ Quill HTML Description -->
          <div class="tour-description">
              <div class="ql-snow">
                  <div class="ql-editor">
                      {!! $package->description !!}
                  </div>
              </div>
          </div>

      </div>
  </div>
</div> --}}


   


        <!-- tour form -->
{{-- 
<div class="detail-container"> --}}
  {{-- <h3 id="form-title" ></h3> --}}
  {{-- <h3>{{ $package->name }}</h3> --}}
  
  <!-- Price Box -->
  {{-- <div class="price-box">
    <h2 id="base-price"></h2>
      {{-- <h4>Prices are inclusive of all taxes.
         Select the number of persons to see the final discounted amount.</h4> --}}
{{-- <label>Date </label>  --}}
    {{-- <input type="date" id="tour-date"  />

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
    </div> --}} 

    <!-- Trip Type -->
    {{-- <span >Select Trip Type:</span>
    <select id="trip-type">
      <option value="public">Public</option>
      <option value="private">Private</option> --}}
    {{-- </select> --}}

    <!-- Total Price -->
    {{-- <h3>Total: <span id="total-price">0</span></h3>

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
</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tour Page</title>

    <!-- ✅ Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ✅ Quill styles (so HTML looks correct) -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />

    <style>
        /* Quill content rendering fixes (no overlap) */
        .tour-description .ql-editor {
            padding: 0 !important;
            line-height: 1.7 !important;
            font-size: 16px;
            white-space: normal;
            overflow-wrap: anywhere;
            word-break: break-word;
        }

        .tour-description .ql-editor p,
        .tour-description .ql-editor ul,
        .tour-description .ql-editor ol,
        .tour-description .ql-editor h1,
        .tour-description .ql-editor h2,
        .tour-description .ql-editor h3 {
            margin: 0 0 10px 0;
        }

        .tour-description .ql-editor img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Booking overlay (Bootstrap friendly) */
        .form-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .55);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 16px;
            z-index: 1055;
        }

        .form-overlay.show {
            display: flex;
        }

        .booking-form {
            width: 100%;
            max-width: 560px;
            background: #fff;
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, .25);
            position: relative;
        }

        .close-btn {
            position: absolute;
            right: 14px;
            top: 10px;
            font-size: 28px;
            cursor: pointer;
            line-height: 1;
        }
    </style>
</head>

<body class="bg-light">

    <div class="container py-4">

        <div class="row g-4">
            <!-- LEFT: Tour Details -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h1 class="h3 fw-bold mb-2">{{ $package->name }}</h1>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <span class="badge text-bg-primary">{{ $package->duration }} Days</span>
                            <span class="badge text-bg-success">PKR {{ number_format($package->price) }}</span>
                            <span class="badge text-bg-dark">{{ $package->location }}</span>
                        </div>

                        @if ($package->image)
                            <img src="{{ asset($package->image) }}" alt="{{ $package->name }}"
                                class="img-fluid rounded-4 mb-3"
                                style="max-height: 360px; object-fit: cover; width: 100%;" />
                        @endif

                        <!-- ✅ Quill HTML Description -->
                        <div class="tour-description">
                            <div class="ql-snow">
                                <div class="ql-editor">
                                    {!! $package->description !!}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- RIGHT: Booking Box -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 position-sticky" style="top: 16px;">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold mb-3" id="form-title">Book this tour</h3>

                        <div class="mb-3">
                            {{-- <div class="fs-4 fw-bold text-success" id="base-price"> --}}
                                <div id="bookingBox"  data-price="{{ $package->price }}">

                                PKR {{ number_format($package->price) }}
                            </div>
                            <small class="text-muted">Select date and number of travelers</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Date</label>
                            <input type="date" class="form-control" id="tour-date" />
                        </div>

                        <!-- Counters -->
                        <div class="border rounded-4 p-3 mb-3">
                            <!-- Adults -->
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <div class="fw-semibold">Adults</div>
                                    <small class="text-muted">(Max 55 yrs)</small>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm minus"
                                        data-type="adult">-</button>
                                    <span id="adult-count" class="fw-bold"
                                        style="min-width: 20px; display:inline-block; text-align:center;">0</span>
                                    <button type="button" class="btn btn-outline-secondary btn-sm plus"
                                        data-type="adult">+</button>
                                </div>
                            </div>

                            <!-- Children -->
                            <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                                <div>
                                    <div class="fw-semibold">Children</div>
                                    <small class="text-muted">(4–8 yrs)</small>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm minus"
                                        data-type="child">-</button>
                                    <span id="child-count" class="fw-bold"
                                        style="min-width: 20px; display:inline-block; text-align:center;">0</span>
                                    <button type="button" class="btn btn-outline-secondary btn-sm plus"
                                        data-type="child">+</button>
                                </div>
                            </div>

                            <!-- Infant -->
                            <div class="d-flex justify-content-between align-items-center py-2">
                                <div>
                                    <div class="fw-semibold">Infant</div>
                                    <small class="text-muted">(0–4 yrs)</small>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <button type="button" class="btn btn-outline-secondary btn-sm minus"
                                        data-type="infant">-</button>
                                    <span id="infant-count" class="fw-bold"
                                        style="min-width: 20px; display:inline-block; text-align:center;">0</span>
                                    <button type="button" class="btn btn-outline-secondary btn-sm plus"
                                        data-type="infant">+</button>
                                </div>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="fw-bold">Total</div>
                            <div class="fs-5 fw-bold">PKR <span id="total-price">0</span></div>
                        </div>

                        <button class="btn btn-primary w-100 py-2 fw-bold" id="bookNowBtn">BOOK NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirm Booking Modal (kept with same IDs for your JS) -->
    <div class="form-overlay" id="formOverlay">
        <div class="booking-form">
            <span class="close-btn" id="closeForm">&times;</span>
            <h2 class="h5 fw-bold mb-3">Confirm Your Booking</h2>

            <div class="mb-2"><strong>Tour:</strong> <span id="confirm-tour"></span></div>
            <div class="mb-2"><strong>Date:</strong> <span id="confirm-date"></span></div>
            <div class="mb-2"><strong>Adults:</strong> <span id="confirm-adults"></span></div>
            <div class="mb-2"><strong>Children:</strong> <span id="confirm-children"></span></div>
            <div class="mb-2"><strong>Infants:</strong> <span id="confirm-infants"></span></div>
            <div class="mb-2"><strong>Trip Type:</strong> <span id="confirm-type"></span></div>
            <div class="mb-3"><strong>Total Price:</strong> <span id="confirm-price"></span></div>

            <hr>

            <div class="row g-2">
                <div class="col-12">
                    <label class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="userName" placeholder="Enter your name">
                </div>
                <div class="col-12">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="userPhone" placeholder="Enter phone number">
                </div>
                <div class="col-12">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" id="userAddress" placeholder="Enter address">
                </div>

                <div class="col-12 mt-2">
                    <button class="btn btn-success w-100 fw-bold" id="finalBooking">Confirm Booking</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ✅ Bootstrap JS (optional, but useful) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Your existing JS -->
    <script type="module" src="{{ asset('js/tourpage.js') }}"></script>
   
   
</body>

</html>


