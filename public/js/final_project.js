// login sign up
//*************************** */
const home=document.querySelector(".home"),
formCantainer=document.querySelector(".form_container-loup"),
formCloseBtn=document.querySelector(".form_close"),
 formOpenBtn=document.querySelector("#form_open"),
signupBtn=document.querySelector("#signup"),
 LoginBtn=document.querySelector("#login"),
 pwShowHide=document.querySelectorAll(".pw_hide");
  
 formOpenBtn.addEventListener("click",()=>
        home.classList.add("show"))

    formCloseBtn.addEventListener("click",()=>
        home.classList.remove("show"))

       signupBtn.addEventListener("click",(e)=>{
        e.preventDefault();
        formCantainer.classList.add("active");
       });
       LoginBtn.addEventListener("click",(e)=>{
        e.preventDefault();
        formCantainer.classList.remove("active");
       });

          pwShowHide.forEach((icon)=>{  
        icon.addEventListener("click",()=>{
            let getPwInput=icon.parentElement.querySelector("input");
            if(getPwInput.type==="password"){
                getPwInput.type="text";
                icon.classList.replace("uil-eye-slash","uil-eye");
            }else{
                getPwInput.type="password";
               icon.classList.replace("uil-eye","uil-eye-slash"); 
            }
        });
    });

   
 const apiBase = "http://127.0.0.1:8000/api";

//  Signup
document.querySelector(".SignForm form").addEventListener("submit", async (e) => {
  e.preventDefault();

  const name = e.target.querySelector('input[placeholder="Enter your name"]').value;
  const email = e.target.querySelector('input[placeholder="Enter your Email"]').value;
  const phone = e.target.querySelector('input[placeholder="Enter your phone nbr"]').value;
  const password = e.target.querySelector('input[placeholder="Enter your password"]').value;
  const role = e.target.querySelector("#role").value.trim();

  if (!name || !email || !phone || !password || !role) {
    alert("Please fill all fields including role");
    return;
  }

  try {
    const res = await fetch(`${apiBase}/signup`, {
      method: "POST",
      headers: { "Content-Type": "application/json", "Accept": "application/json" },
      body: JSON.stringify({ name, email, phone, password, role }),
    });

    const data = await res.json();

    if (res.ok) {
      alert(data.message || "Signup successful!");
      console.log("✅ Signup response:", data);
      // Optionally switch back to login form
      document.querySelector(".form_container-loup").classList.remove("active");
    } else {
      alert(data.message || "Signup failed!");
    }
  } catch (err) {
    console.error("Signup error:", err);
    alert("Something went wrong! Please try again.");
  }
});



// 🔹 Login
document.querySelector(".LoginForm form").addEventListener("submit", async (e) => {
  e.preventDefault();

  const email = e.target.querySelector('input[placeholder="Enter your Email"]').value;
  const password = e.target.querySelector('input[placeholder="Enter your password"]').value;
  const role = e.target.querySelector('#role').value;

  if (!email || !password || !role) {
    alert("Please enter both email and password.");
    return;
  }

  try {
    const res = await fetch(`${apiBase}/login`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
      },
      body: JSON.stringify({ email, password,role}),
    });

    const data = await res.json();
    console.log(data);

    if (res.ok && data.access_token) {
      // ✅ Store access token for later API calls
      localStorage.setItem("token", data.access_token);
      alert("Login successful!");
       window.location.href = data.redirect_to;
    } else {
      alert(data.message || "Invalid credentials");
    }

  } catch (err) {
    alert("Error logging in");
    console.error(err);
  }
});
          //logout 
document.addEventListener("DOMContentLoaded", function () {
  const token = localStorage.getItem("token");

  const loginBtn = document.querySelector(".login-btn");
  const logoutBtn = document.querySelector(".logout-btn");

  if (token) {
    // User logged in → show Logout
    loginBtn.style.display = "none";
    logoutBtn.style.display = "inline-block";
  } else {
    // User not logged in → show Login
    loginBtn.style.display = "inline-block";
    logoutBtn.style.display = "none";
  }
});
function logout() {
  localStorage.removeItem("token");
  window.location.href = "/"; // redirect to login page
}





    // *********************************************************
                //    tour list

                // arrow next back
             const nextBtn = document.getElementById("nextbtn");
             const backBtn = document.getElementById("backbtn");
             const sliderContainer = document.querySelector(".slider-container");
             
             nextBtn.addEventListener("click", () => {
               sliderContainer.scrollBy({ left: 320, behavior: "smooth" });
             });
             
             backBtn.addEventListener("click", () => {
               sliderContainer.scrollBy({ left: -320, behavior: "smooth" });
             });

                // Slider logic
let currentSlide = 0;
const track = document.querySelector(".slider-track");
const dots = document.querySelectorAll(".dot");

function moveSlide(slideIndex) {
  currentSlide = slideIndex;
  const slideWidth = document.querySelector(".tour-card").offsetWidth + 20; // card + margin
  track.style.transform = `translateX(-${slideWidth * slideIndex * 3}px)`;

  dots.forEach(dot => dot.classList.remove("active"));
  dots[slideIndex].classList.add("active");
}

         
document.addEventListener("DOMContentLoaded", function () {
  
  fetch('/api/getpackages')
      .then(response => response.json())
      .then(result => {

          let packages = result.data;
          let container = document.getElementById('packageContainer');
          let html = '';
          console.log("result:", result);
          packages.forEach(pkg => {
            html += `
  <div class="tour-card">
      <img src="/${pkg.image}" alt="Tour Image">
      <h3>${pkg.name}</h3>
      <p>🕒 ${pkg.duration} Days | Per head ${pkg.price}</p>
      <button class="btn-tour" onclick="viewDetails(${pkg.id})">
          View Details
      </button>
  </div>
`;
              // html += `
              //     <div class="tour-card"
              //         data-title="${pkg.name}"
              //         data-duration="${pkg.duration} Days"
              //         data-price="PKR ${pkg.price}"
              //         data-description="${pkg.description}"
              //         data-image="images${pkg.image}"
              //     >
              //     <img src="/${pkg.image}" alt="Tour Image">
                  
              //         <h3>${pkg.name}</h3>
              //         <p>🕒 ${pkg.duration} Days | PKR ${pkg.price}</p>
                    
              //         <button class="btn-tour">View Details</button>
              //     </div>
              // `;
          });
      
          container.innerHTML = html;
      })
      .catch(error => {
          console.error('Error loading packages:', error);
      });

});
function viewDetails(id) {
  window.location.href = `/tourpage/${id}`;
}

// document.addEventListener("click", function (e) {

//     let card = e.target.closest(".tour-card");
//     if (!card) return;

//     let title = encodeURIComponent(card.dataset.title);
//     let duration = encodeURIComponent(card.dataset.duration);
//     let price = encodeURIComponent(card.dataset.price);
//     let description = encodeURIComponent(card.dataset.description);
//     console.log("Description:", description);

//     window.location.href = `/tourpage?title=${title}&duration=${duration}&price=${price}&description=${description}`;
// });

                   
  
                    // *******************************************
                    // feedback 
            const feedbackBtn = document.getElementById("feedbackBtn");
            const feedbackForm = document.getElementById("feedbackForm");
            const closeBtn = document.getElementById("closeBtn");
            const stars = document.querySelectorAll(".stars span");
            const ratingInput = document.getElementById("rating");
         
            feedbackBtn.addEventListener("click", () => {
              feedbackForm.classList.add("active");
            });
            

            closeBtn.addEventListener("click", () => {
              feedbackForm.classList.remove("active");
            });
            
            stars.forEach(star => {
              star.addEventListener("click", () => {
                const value = star.getAttribute("data-star");
                ratingInput.value = value;
            
                // update stars UI
                stars.forEach(s => {
                  if (s.getAttribute("data-star") <= value) {
                    s.classList.add("active");
                  } else {
                    s.classList.remove("active");
                  }
                });
              });
            });
          
            // Handle form submission feedback intigration
const form = document.querySelector(".form-container"); 

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const name = form.name.value;  
  const rating = ratingInput.value;
  const message = form.message.value;
  const token = localStorage.getItem("token");
  if (!token) {
    alert("Please login first!");
    return;
  }

  try {
    const response = await fetch("http://127.0.0.1:8000/api/feedback", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "Authorization": `Bearer ${token}`
      },
      body: JSON.stringify({ name, rating, message })
    });

    const data = await response.json();

    if (response.ok) {
      alert("Feedback submitted successfully!");
      feedbackForm.classList.remove("active");
      form.reset();
      ratingInput.value = 0;
      stars.forEach(s => s.classList.remove("active"));
    } else {
      alert(data.message || "Error submitting feedback");
    }

  } catch (err) {
    console.error(err);
    alert("Something went wrong!");
  }
});


          //********************************************************** */
        //  contect        

        // Buttons
const callBtn = document.getElementById("callBtn");
// const whatsappBtn = document.getElementById("whatsappBtn");
// const emailBtn = document.getElementById("emailBtn");

const callPopup = document.getElementById("callPopup");
// const whatsappPopup = document.getElementById("whatsappPopup");
// const emailPopup = document.getElementById("emailPopup");


const closeBtns = document.querySelectorAll(".close");


callBtn.addEventListener("click", () => {
  callPopup.classList.add("show");
});

// whatsappBtn.addEventListener("click", () => {
//   whatsappPopup.classList.add("show");
// });

// emailBtn.addEventListener("click", () => {
//   emailPopup.classList.add("show");
// });

closeBtns.forEach(btn => {
  btn.addEventListener("click", () => {
    btn.parentElement.parentElement.classList.remove("show");
  });
});

function openWhatsApp() {
  // Yahan apna WhatsApp number daalo
  let phone = "923001234567";  

  // Direct WhatsApp open karega (no message, only chat)
  let url = `https://wa.me/${phone}`;

  window.open(url, "_blank");  // new tab me open karega
}
function openEmail() {
  // Yahan apna email add karo
  let email = "rimshachoudhary.7614@gmail.com";

  let url = `mailto:${email}`;

  window.location.href = url;
}



