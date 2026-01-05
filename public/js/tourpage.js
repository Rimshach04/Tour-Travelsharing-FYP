// tour book box part(2)
// Get values from URL
const params = new URLSearchParams(window.location.search);
document.getElementById("tour-title").innerText = params.get("title");
document.getElementById("tour-duration").innerText = params.get("duration");
document.getElementById("tour-price").innerText = params.get("price");

// Tour page form
document.getElementById("form-title").innerText = params.get("title");
const basePrice = parseInt(params.get("price").replace(/\D/g, "")) || 0;
document.getElementById("base-price").innerText = "Rs " + basePrice.toLocaleString();

let adults = 0, children = 0, infants = 0;

function updatePrice() {
  let totalPersons = adults + children;
  let total = basePrice * totalPersons;

  // const tripType = document.getElementById("trip-type").value;
  // if (tripType === "private" && totalPersons < 7) {
  //   document.getElementById("total-price").innerText = "Need min 7 persons for private";
  // } else {
   document.getElementById("total-price").innerText = "Rs " + total.toLocaleString();
  // }
}

// Counter buttons
document.querySelectorAll(".plus").forEach(btn => {
  btn.addEventListener("click", () => {
    const type = btn.dataset.type;
    if (type === "adult") adults++;
    if (type === "child") children++;
    if (type === "infant") infants++;
    document.getElementById(type + "-count").innerText =
      type === "adult" ? adults : type === "child" ? children : infants;
    updatePrice();
  });
});

document.querySelectorAll(".minus").forEach(btn => {
  btn.addEventListener("click", () => {
    const type = btn.dataset.type;
    if (type === "adult" && adults > 0) adults--;
    if (type === "child" && children > 0) children--;
    if (type === "infant" && infants > 0) infants--;
    document.getElementById(type + "-count").innerText =
      type === "adult" ? adults : type === "child" ? children : infants;
    updatePrice();
  });
});

// document.getElementById("trip-type").addEventListener("change", updatePrice);

// Modal user form
const formOverlay = document.getElementById("formOverlay");
const bookNowBtn = document.getElementById("bookNowBtn");
const closeForm = document.getElementById("closeForm");

bookNowBtn.addEventListener("click", () => {
  document.getElementById("confirm-tour").innerText = document.getElementById("tour-title").innerText;
  document.getElementById("confirm-date").innerText = document.getElementById("tour-date").value;
  document.getElementById("confirm-adults").innerText = adults;
  document.getElementById("confirm-children").innerText = children;
  document.getElementById("confirm-infants").innerText = infants;
  // document.getElementById("confirm-type").innerText = document.getElementById("trip-type").value;
  document.getElementById("confirm-price").innerText = document.getElementById("total-price").innerText;

  formOverlay.style.display = "flex";
});

closeForm.addEventListener("click", () => {
  formOverlay.style.display = "none";
});

// Final Booking & API call
document.getElementById("finalBooking").addEventListener("click", async () => {
  formOverlay.style.display = "none";

  const tourTitle = document.getElementById("tour-title")?.innerText.trim();
  const tourDate = document.getElementById("tour-date")?.value || "";
  const tripType = document.getElementById("trip-type")?.value || "shared";
  const totalPrice = parseInt(document.getElementById("total-price")?.innerText.replace(/\D/g, "")) || 0;

  // Use basePrice if per-head-price field is missing
  const perHeadPrice = parseInt(document.getElementById("per-head-price")?.value || basePrice) || basePrice;

  const userName = document.getElementById("userName")?.value || "";
  const userPhone = document.getElementById("userPhone")?.value || "";
  const userAddress = document.getElementById("userAddress")?.value || "";

  const adultCount = adults || 0;
  const childCount = children || 0;
  const infantCount = infants || 0;

  const formData = {
    tour_title: tourTitle,
    date: tourDate,
    adult: adultCount,
    children: childCount,
    infant: infantCount,
    per_head_price: perHeadPrice,
    trip_type: tripType,
    total_price: totalPrice,
    booked: true,
    name: userName,
    phone_number: userPhone,
    address: userAddress
  };
  const token = localStorage.getItem("token");
  if (!token) {
    alert("Please login first!");
    return;
  }
  try {
    const token = localStorage.getItem("token");
    const response = await fetch("http://127.0.0.1:8000/api/create-tour", {
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json",
        "Authorization": `Bearer ${token}`
      },
      body: JSON.stringify(formData)
    });

    const data = await response.json();
    console.log("API Response:", data);

    if (data.success) {
      alert("Booking Confirmed!");
    } else {
      alert(data.message || "Booking failed!");
    }

  } catch (err) {
    console.error(err);
    alert("Something went wrong!");
  }
});
