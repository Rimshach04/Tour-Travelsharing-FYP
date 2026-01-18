<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #FF6B35;
            --secondary: #004E89;
            --accent: #F7B801;
            --dark: #1A1A1A;
            --light: #F5F5F5;
            --success: #2ECC71;
            --danger: #E74C3C;
            --border: #E0E0E0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            animation: slideIn 0.6s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, var(--secondary) 0%, #003d6b 100%);
            color: white;
            padding: 30px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 4px solid var(--accent);
        }

        .header h1 {
            font-family: 'Space Mono', monospace;
            font-size: 32px;
            font-weight: 700;
            letter-spacing: -1px;
        }

        .header-stats {
            display: flex;
            gap: 30px;
        }

        .stat-box {
            text-align: center;
            padding: 10px 20px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }

        .stat-box .number {
            font-size: 28px;
            font-weight: 700;
            font-family: 'Space Mono', monospace;
        }

        .stat-box .label {
            font-size: 12px;
            opacity: 0.9;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 4px;
        }

        .main-content {
            display: flex;
            min-height: calc(100vh - 200px);
        }

        .sidebar {
            width: 250px;
            background: var(--light);
            padding: 30px 0;
            border-right: 2px solid var(--border);
        }

        .nav-item {
            padding: 15px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            border-left: 4px solid transparent;
            font-family: 'Space Mono', monospace;
            font-size: 14px;
        }

        .nav-item:hover {
            background: white;
            border-left-color: var(--primary);
            transform: translateX(5px);
        }

        .nav-item.active {
            background: white;
            border-left-color: var(--secondary);
            color: var(--secondary);
            font-weight: 700;
        }

        .nav-icon {
            font-size: 18px;
        }

        .content-area {
            flex: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .section {
            display: none;
            animation: fadeIn 0.4s ease;
        }

        .section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 30px;
            font-family: 'Space Mono', monospace;
            border-bottom: 3px solid var(--primary);
            padding-bottom: 15px;
            display: inline-block;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--dark);
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input, textarea, select {
            padding: 12px 16px;
            border: 2px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
            font-family: 'DM Sans', sans-serif;
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--secondary);
            box-shadow: 0 0 0 3px rgba(0, 78, 137, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            padding: 14px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Space Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #ff5522;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(255, 107, 53, 0.4);
        }

        .btn-secondary {
            background: var(--secondary);
            color: white;
        }

        .btn-secondary:hover {
            background: #003d6b;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 78, 137, 0.4);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
            padding: 8px 16px;
            font-size: 12px;
        }

        .card {
            background: white;
            border: 2px solid var(--border);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-3px);
            border-color: var(--accent);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--light);
        }

        .card-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            font-family: 'Space Mono', monospace;
        }

        .badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-success {
            background: var(--success);
            color: white;
        }

        .badge-warning {
            background: var(--accent);
            color: var(--dark);
        }

        .badge-danger {
            background: var(--danger);
            color: white;
        }

        .table-container {
            overflow-x: auto;
         
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th {
            background: var(--secondary);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid var(--border);
        }

        tr:hover {
            background: var(--light);
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid var(--light);
        }

        .info-label {
            font-weight: 600;
            color: var(--secondary);
        }

        .info-value {
            color: var(--dark);
        }

        .review-card {
            background: var(--light);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid var(--accent);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .reviewer-name {
            font-weight: 700;
            color: var(--dark);
        }

        .rating {
            color: var(--accent);
            font-size: 18px;
        }

        .review-text {
            color: #555;
            line-height: 1.6;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }

        .empty-state-icon {
            font-size: 64px;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 16px 24px;
            background: var(--success);
            color: white;
            border-radius: 8px;
            font-weight: 600;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
            display: none;
            animation: slideInRight 0.4s ease;
            z-index: 1000;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .toast.show {
            display: block;
        }
    </style>
      <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet" />

      <style>
          /* Quill styling to match your form inputs */
          #packageDescriptionEditor {
              border: 2px solid var(--border);
              border-radius: 8px;
              background: #fff;
  
              min-height: 320px;
              resize: vertical;
              overflow: auto;
          }
  
          #packageDescriptionEditor .ql-toolbar {
              border: none;
              border-bottom: 2px solid var(--border);
              border-radius: 8px 8px 0 0;
          }
  
          #packageDescriptionEditor .ql-container {
              border: none;
              border-radius: 0 0 8px 8px;
              font-family: 'DM Sans', sans-serif;
              font-size: 15px;
  
              min-height: 260px;
          }
  
          #packageDescriptionEditor:focus-within {
              border-color: var(--secondary);
              box-shadow: 0 0 0 3px rgba(0, 78, 137, 0.1);
          }
      </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌍 Tour Admin Dashboard</h1>
            <div class="header-stats">
                <div class="stat-box">
                    <div class="number" id="totalPackages">0</div>
                    <div class="label">Packages</div>
                </div>
                <div class="stat-box">
                    <div class="number" id="totalUsers">0</div>
                    <div class="label">Users</div>
                </div>
                <div class="stat-box">
                    <div class="number" id="totalBookings">0</div>
                    <div class="label">Bookings</div>
                </div>
            </div>
        </div>

        {{-- ************************************************** --}}

        <div class="main-content">
            <div class="sidebar">
                <div class="nav-item active" onclick="showSection('packages')">
                    <span class="nav-icon">📦</span>
                    <span>Tour Packages</span>
                </div>
                <div class="nav-item" onclick="showSection('users')">
                    <span class="nav-icon">👥</span>
                    <span>Users</span>
                </div>
                <div class="nav-item" onclick="showSection('bookings')">
                    <span class="nav-icon">🎫</span>
                    <span>Bookings</span>
                </div>
                <div class="nav-item" onclick="showSection('reviews')">
                    <span class="nav-icon">⭐</span>
                    <span>Reviews</span>
                </div>
            </div>

           {{-- *******************************************  --}}
                
            <div class="content-area">
                <!-- Tour Packages Section -->
                <div id="packages" class="section active">
                    <h2 class="section-title">Tour Packages</h2>
                    
                    <div class="card">
                        <h3 style="margin-bottom: 20px; color: var(--secondary); font-family: 'Space Mono', monospace;">Add New Package</h3>
                        <form id="packageForm" enctype="multipart/form-data">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Package Name</label>
                                    <input type="text" id="packageName" required>
                                </div>
                                <div class="form-group">
                                    <label>Price (PKR)</label>
                                    <input type="number" id="packagePrice" required>
                                </div>
                                <div class="form-group">
                                    <label>Duration (Days)</label>
                                    <input type="number" id="packageDuration" required>
                                </div>
                                <div class="form-group "  >
                                    <label>Package Image</label>
                                    <input type="file"    name="image" id="packageImage" accept="image/*" required>
                                </div>
                              
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" id="packageLocation" required>
                                </div>
                                <div class="form-group full-width">
                                    <label>Description</label>
                                      <!-- Quill editor -->
                                      <div id="packageDescriptionEditor"></div>

                                      <!-- Hidden input (optional, but good for validation/debug) -->
                                      <input type="hidden" id="packageDescription" required>
                                  </div>
  
                                    {{-- <textarea id="packageDescription" required></textarea> --}}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Package</button>
                        </form>
                    {{-- </div> --}}
         
                    <div id="packagesList" class="grid"></div>
                </div>

               <script>
                const packageForm = document.getElementById('packageForm');
packageForm.addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData();
    formData.append('name', document.getElementById('packageName').value);
    formData.append('price', document.getElementById('packagePrice').value);
    formData.append('duration', document.getElementById('packageDuration').value);
    formData.append('location', document.getElementById('packageLocation').value);
    formData.append('description', document.getElementById('packageDescription').value);
    formData.append('image', document.getElementById('packageImage').files[0]);
 
    const descriptionHtml = quill.root.innerHTML;

                        const cleanDesc = (descriptionHtml === '<p><br></p>') ? '' : descriptionHtml;

                        document.getElementById('packageDescription').value = cleanDesc; // keep hidden input updated (optional)
                        formData.append('description', cleanDesc);

                        formData.append('image', document.getElementById('packageImage').files[0]);


    fetch('http://127.0.0.1:8000/api/packages', {
        method: 'POST',
        body: formData   
    })
    .then(res => res.json())
    .then(data => {
        if (data.status) {
            showToast('Package added successfully!');
            packageForm.reset();   
            loadPackages();
        }
    })
    .catch(err => console.log(err));
        
        });
     
        function loadPackages() {
            fetch('http://127.0.0.1:8000/api/getpackages')
        .then(res => res.json())
        .then(result => {
            packages = result.data;     // ✅ IMPORTANT
            renderPackages();
            updateStats();
            updateSelects();
        })
        .catch(err => console.log(err));    
}

function deletePackage(id) {
    if (!confirm('Are you sure you want to delete this package?')) return;

    fetch(`http://127.0.0.1:8000/api/delpackages/${id}`, {
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
    'Authorization': 'Bearer ' + localStorage.getItem('token')
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            packages = packages.filter(pkg => pkg.id !== id);
            updateStats();
            renderPackages();
            updateSelects();
            showToast('Package deleted successfully!');
        } else {
            showToast('Failed to delete package.');
        }
    })
    .catch(err => {
        console.error(err);
        showToast('deleting package.');
    });
}

window.onload = loadPackages;
        function renderPackages() {
            const container = document.getElementById('packagesList');
            if (packages.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">📦</div>
                        <p>No packages added yet</p>
                    </div>
                `;
                return;
            }
            container.innerHTML = packages.map(pkg => `
                <div class="card">          
          <img 
          src="/${pkg.image}" alt="${pkg.name}"
            style="
                width:100%;
                height:180px;
                object-fit:cover;
                border-radius:12px 12px 0 0;
                margin-bottom:10px;
                
            "
      >
                    <div class="card-header">
                        <span class="card-title">${pkg.name}</span>
                        <span class="badge badge-success">PKR ${pkg.price.toLocaleString()}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Location:</span>
                        <span class="info-value">${pkg.location}</span>
                    </div>
                     <div class="info-row">
                         <span class="info-label">Duration:</span>
                       <span class="info-value">${pkg.duration} Days</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Description:</span>
                    </div>
                    
                    <p style="margin-top: 10px; color: #666; overflow-y: auto;   /* vertical scroll agar text barh jaye */
    resize: vertical;   /* user height adjust kar sakta hai, optional */
    white-space: pre-wrap; /* text wrap ho jaye */
    word-wrap: break-word;">${pkg.description}</p>
                    <div class="actions" style="margin-top: 15px;">
                        <button class="btn btn-danger" onclick="deletePackage(${pkg.id})">Delete</button>
                    </div>
                </div>
            `).join('');
        }

        

                 </script>
                    
                <!-- Users Section -->
                <div id="users" class="section">
                    <h2 class="section-title">All Users</h2>

                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    {{-- <th>password</th> --}}
                                    <th>role</th>
                                    <th>Remove data</th>

                                    {{-- <th>Actions</th> --}}
                                </tr>
                            </thead>
                            <tbody id="usersTable"></tbody>
                        </table>
                        <div id="pagination" style="margin-top: 10px;"></div>
                    </div>
                </div>
                      
<script>
    let currentPage = 1;
    const perPage = 5; // Number of users per page
     
    function deleteUser(id) {
    if (!confirm('Are you sure you want to delete this user?')) return;

    const token = localStorage.getItem('token'); // agar auth use kar rahe ho

    fetch(`/api/user/${id}`, {
        method: 'DELETE',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(response => {
        if (response.success) {
            alert('User deleted successfully!');
            fetchUsers(currentPage); // Refresh table
        } else {
            alert('Delete failed: ' + response.message);
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error deleting user.');
    });
}


    function fetchUsers(page = 1) {
        currentPage = page;
        fetch(`/api/users?per_page=${perPage}&page=${page}`)
            .then(res => res.json())
            .then(result => {
                users = result.data.data;   // ✅ Yahan lagao
                 updateStats();
                const tbody = document.getElementById("usersTable");
                tbody.innerHTML = '';
              
                // Loop through users
                result.data.data.forEach(user => {
                    tbody.innerHTML += `
                        <tr>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.phone}</td>
                            <td>${user.role}</td>
                            <td>
            <button class="btn btn-danger" onclick="deleteUser(${user.id})">Delete</button>
        </td>
                        </tr>
                    `;
                });
    
                // Pagination buttons
                const paginationDiv = document.getElementById("pagination");
                paginationDiv.innerHTML = '';
    
                for (let i = 1; i <= result.data.last_page; i++) {
                    const btn = document.createElement("button");
                    btn.innerText = i;
                    btn.disabled = i === result.data.current_page;
                    btn.style.marginRight = "5px";
                    btn.onclick = () => fetchUsers(i);
                    paginationDiv.appendChild(btn);
                }
            })
            .catch(err => {
                console.error("Error fetching users:", err);
            });
    }
    
    // Initial load
    fetchUsers(currentPage);
    // *********************************************
    </script>
                <!-- Bookings Section -->
                <div id="bookings" class="section">
                    <h2 class="section-title">All Bookings</h2>
                    {{-- <div id="bookingsList"></div> --}}
                    <div class="table-container">
                        <table>
                            <thead>
                                <tr>
                                    <th>Tour Title</th>
                                    <th>Date</th>
                                    <th>Adults</th>
                                    <th>Children</th>
                                    <th>Infant</th>
                                    <th>Total Price</th>
                                    <th>name</th>
                                    <th>phone_number</th>
                                    <th>address</th>
                                    <th>user name</th>
                                    <th>Booked</th>
                                    <th >Remove data</th>
                                </tr>
                            </thead>
                            <tbody id="toursTable"></tbody>
                        </table>
                    
                        <div id="tourPagination" style="margin-top: 10px;"></div>
                    </div>
                    
                </div>
                <script>
                    let tourPage = 1;
                    const tourPerPage = 5;

                  


// -------------------
// 1️⃣ Global delete function
// -------------------
function deleteTour(id) {
    if (!confirm('Are you sure you want to delete this booking?')) return;

    const token = localStorage.getItem('token');

    fetch(`/api/deletetour/${id}`, {
        method: 'DELETE',
        headers: {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        }
    })
    .then(res => res.json())
    .then(response => {
        if (response.success) {
            alert('Tour deleted successfully!');
            fetchTours(tourPage); // Refresh table
        } else {
            alert('Delete failed: ' + response.message);
        }
    })
    .catch(err => {
        console.error(err);
        alert('Error deleting tour.');
    });
}

                    
                    function fetchTours(page = 1) {
                        const token = localStorage.getItem('token');
                        fetch(`/api/get-tours?per_page=${tourPerPage}&page=${page}`, {
                        
                                headers: {
            'Authorization': 'Bearer ' + token, // ✅ use the real token
            'Accept': 'application/json'
        }
                           
                        })
                        .then(res => res.json())
                        .then(result => {
                            console.log(result); // DEBUG (zaroor dekho)
                    
                if (!result.success || !result.data || !result.data.data) {
                    console.error("Invalid response");
                    return;
                }
                bookings = result.data.data;  
                 updateStats();
                            const tbody = document.getElementById("toursTable");
                            if (!tbody) {
                    console.error("toursTable not found");
                    return;
                }
     
                            tbody.innerHTML = '';
                    
                            result.data.data.forEach(tour => {
                                tbody.innerHTML += `
                                    <tr>
                                        <td>${tour.tour_title}</td>
                                        <td>${tour.date}</td>
                                        <td>${tour.adult}</td>
                                        <td>${tour.children}</td>
                                        <td>${tour.infant}</td>
                                        <td>${tour.total_price}</td>
                                        <td>${tour.name}</td>
                                        <td>${tour.phone_number}</td>
                                        <td>${tour.address}</td>
                                        
                                        <td>${tour.user ? tour.user.name : ''}</td>

                                        <td>${tour.booked ? 'Yes' : 'No'}</td>
                                        <td>
                <button class="btn btn-danger" onclick="deleteTour(${tour.id})">Delete</button>
            </td>
                                    </tr>
                                `;
                            });
                    
                            // Pagination
                            const paginationDiv = document.getElementById("tourPagination");
                            paginationDiv.innerHTML = '';
                    
                            for (let i = 1; i <= result.data.last_page; i++) {
                                const btn = document.createElement("button");
                                btn.innerText = i;
                                btn.disabled = i === result.data.current_page;
                                btn.onclick = () => fetchTours(i);
                                paginationDiv.appendChild(btn);
                            }
                        })
                        .catch(error => {
                            console.error("Error fetching tours:", error);
                        });
                    }
                    
                    // Page load
                    fetchTours(tourPage);
                    </script>
                    {{-- ************************************************************ --}}
                <!-- Reviews Section -->
                <div id="reviews" class="section">
                    <h2 class="section-title">Package Reviews</h2>
                    
                    <div class="card">
                        <h3 style="margin-bottom: 20px; color: var(--secondary); font-family: 'Space Mono', monospace;">Add New Review</h3>
                        <form id="reviewForm">
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Select User</label>
                                    <select id="reviewUser" required></select>
                                </div>
                                <div class="form-group">
                                    <label>Select Package</label>
                                    <select id="reviewPackage" required></select>
                                </div>
                                <div class="form-group">
                                    <label>Rating (1-5)</label>
                                    <select id="reviewRating" required>
                                        <option value="5">⭐⭐⭐⭐⭐ (5 Stars)</option>
                                        <option value="4">⭐⭐⭐⭐ (4 Stars)</option>
                                        <option value="3">⭐⭐⭐ (3 Stars)</option>
                                        <option value="2">⭐⭐ (2 Stars)</option>
                                        <option value="1">⭐ (1 Star)</option>
                                    </select>
                                </div>
                                <div class="form-group full-width">
                                    <label>Review Text</label>
                                    <textarea id="reviewText" required></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit Review</button>
                        </form>
                    </div>

                    <div id="reviewsList"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="toast" class="toast"></div>

    <script>
        // Data Storage
        let packages = [];
        let users = [];
        let bookings = [];
        let reviews = [];

        // Initialize with sample data
        function initializeSampleData() {
           

            reviews = [
                {
                    id: 1,
                    userId: 1,
                    packageId: 1,
                    rating: 5,
                    text: "Amazing experience! The tour was well organized and the views were breathtaking.",
                    date: "2024-07-01"
                }
            ];

            updateStats();
            renderAll();
        }

        // Navigation
        function showSection(sectionName) {
            document.querySelectorAll('.section').forEach(section => {
                section.classList.remove('active');
            });
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            
            document.getElementById(sectionName).classList.add('active');
            event.target.closest('.nav-item').classList.add('active');
        }

        // Update Stats
        function updateStats() {
            document.getElementById('totalPackages').textContent = packages.length;
            document.getElementById('totalUsers').textContent = users.length;
            document.getElementById('totalBookings').textContent = bookings.length;
        }

        // Show Toast
        function showToast(message) {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.classList.add('show');
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

       



// //         // User Functions
//         document.getElementById('userForm').addEventListener('submit', function(e) {
//             e.preventDefault();
            
//             const newUser = {
//                 id: users.length + 1,
//                 name: document.getElementById('userName').value,
//                 email: document.getElementById('userEmail').value,
//                 phone: document.getElementById('userPhone').value,
//                 city: document.getElementById('userCity').value,
//                 joined: new Date().toISOString().split('T')[0]
//             };

//             users.push(newUser);
//             updateStats();
//             renderUsers();
//             updateSelects();
//             this.reset();
//             showToast('User added successfully!');
//         });

//         function renderUsers() {
//             const tbody = document.getElementById('usersTable');
//             if (users.length === 0) {
//                 tbody.innerHTML = '<tr><td colspan="6" style="text-align: center; padding: 40px;">No users found</td></tr>';
//                 return;
//             }

//             tbody.innerHTML = users.map(user => `
//                 <tr>
//                     <td><strong>${user.name}</strong></td>
//                     <td>${user.email}</td>
//                     <td>${user.phone}</td>
//                     <td>${user.city}</td>
//                     <td>${user.joined}</td>
//                     <td>
//                         <button class="btn btn-danger" onclick="deleteUser(${user.id})">Delete</button>
//                     </td>
//                 </tr>
//             `).join('');
//         }

//         function deleteUser(id) {
//             if (confirm('Are you sure you want to delete this user?')) {
//                 users = users.filter(user => user.id !== id);
//                 updateStats();
//                 renderUsers();
//                 updateSelects();
//                 showToast('User deleted successfully!');
//             }
//         }

        // Booking Functions
        // document.getElementById('bookingForm').addEventListener('submit', function(e) {
        //     e.preventDefault();
            
        //     const newBooking = {
        //         id: bookings.length + 1,
        //         userId: parseInt(document.getElementById('bookingUser').value),
        //         packageId: parseInt(document.getElementById('bookingPackage').value),
        //         date: document.getElementById('bookingDate').value,
        //         people: parseInt(document.getElementById('bookingPeople').value),
        //         status: 'confirmed'
        //     };

        //     bookings.push(newBooking);
        //     updateStats();
        //     renderBookings();
        //     this.reset();
        //     showToast('Booking created successfully!');
        // });

        // function renderBookings() {
        //     const container = document.getElementById('bookingsList');
        //     if (bookings.length === 0) {
        //         container.innerHTML = `
        //             <div class="empty-state">
        //                 <div class="empty-state-icon">🎫</div>
        //                 <p>No bookings yet</p>
        //             </div>
        //         `;
        //         return;
        //     }

        //     container.innerHTML = bookings.map(booking => {
        //         const user = users.find(u => u.id === booking.userId);
        //         const pkg = packages.find(p => p.id === booking.packageId);
                
        //         return `
        //             <div class="card">
        //                 <div class="card-header">
        //                     <span class="card-title">Booking #${booking.id}</span>
        //                     <span class="badge badge-success">${booking.status}</span>
        //                 </div>
        //                 <div class="info-row">
        //                     <span class="info-label">Customer:</span>
        //                     <span class="info-value">${user ? user.name : 'Unknown'}</span>
        //                 </div>
        //                 <div class="info-row">
        //                     <span class="info-label">Package:</span>
        //                     <span class="info-value">${pkg ? pkg.name : 'Unknown'}</span>
        //                 </div>
        //                 <div class="info-row">
        //                     <span class="info-label">Booking Date:</span>
        //                     <span class="info-value">${booking.date}</span>
        //                 </div>
        //                 <div class="info-row">
        //                     <span class="info-label">Number of People:</span>
        //                     <span class="info-value">${booking.people}</span>
        //                 </div>
        //                 <div class="info-row">
        //                     <span class="info-label">Total Price:</span>
        //                     <span class="info-value"><strong>PKR ${pkg ? (pkg.price * booking.people).toLocaleString() : '0'}</strong></span>
        //                 </div>
        //                 <div class="actions" style="margin-top: 15px;">
        //                     <button class="btn btn-danger" onclick="deleteBooking(${booking.id})">Cancel</button>
        //                 </div>
        //             </div>
        //         `;
        //     }).join('');
        // }

        // function deleteBooking(id) {
        //     if (confirm('Are you sure you want to cancel this booking?')) {
        //         bookings = bookings.filter(booking => booking.id !== id);
        //         updateStats();
        //         renderBookings();
        //         showToast('Booking cancelled successfully!');
        //     }
        // }

        // Review Functions
        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const newReview = {
                id: reviews.length + 1,
                userId: parseInt(document.getElementById('reviewUser').value),
                packageId: parseInt(document.getElementById('reviewPackage').value),
                rating: parseInt(document.getElementById('reviewRating').value),
                text: document.getElementById('reviewText').value,
                date: new Date().toISOString().split('T')[0]
            };

            reviews.push(newReview);
            renderReviews();
            this.reset();
            showToast('Review added successfully!');
        });

        function renderReviews() {
            const container = document.getElementById('reviewsList');
            if (reviews.length === 0) {
                container.innerHTML = `
                    <div class="empty-state">
                        <div class="empty-state-icon">⭐</div>
                        <p>No reviews yet</p>
                    </div>
                `;
                return;
            }

            // Group reviews by package
            const reviewsByPackage = {};
            reviews.forEach(review => {
                if (!reviewsByPackage[review.packageId]) {
                    reviewsByPackage[review.packageId] = [];
                }
                reviewsByPackage[review.packageId].push(review);
            });

            container.innerHTML = Object.keys(reviewsByPackage).map(packageId => {
                const pkg = packages.find(p => p.id === parseInt(packageId));
                const packageReviews = reviewsByPackage[packageId];
                
                return `
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title">${pkg ? pkg.name : 'Unknown Package'}</span>
                            <span class="badge badge-warning">${packageReviews.length} Reviews</span>
                        </div>
                        ${packageReviews.map(review => {
                            const user = users.find(u => u.id === review.userId);
                            const stars = '⭐'.repeat(review.rating);
                            
                            return `
                                <div class="review-card">
                                    <div class="review-header">
                                        <span class="reviewer-name">${user ? user.name : 'Anonymous'}</span>
                                        <span class="rating">${stars}</span>
                                    </div>
                                    <p class="review-text">${review.text}</p>
                                    <small style="color: #999; margin-top: 8px; display: block;">Posted on ${review.date}</small>
                                </div>
                            `;
                        }).join('')}
                    </div>
                `;
            }).join('');
        }

        // Update Select Dropdowns
        function updateSelects() {
            // Update user selects
            const userSelects = [document.getElementById('bookingUser'), document.getElementById('reviewUser')];
            userSelects.forEach(select => {
                select.innerHTML = '<option value="">-- Select User --</option>' + 
                    users.map(user => `<option value="${user.id}">${user.name}</option>`).join('');
            });

            // Update package selects
            const packageSelects = [document.getElementById('bookingPackage'), document.getElementById('reviewPackage')];
            packageSelects.forEach(select => {
                select.innerHTML = '<option value="">-- Select Package --</option>' + 
                    packages.map(pkg => `<option value="${pkg.id}">${pkg.name}</option>`).join('');
            });
        }

        // Render All
        function renderAll() {
            renderPackages();
            renderUsers();
            // renderBookings();
            renderReviews();
            updateSelects();
        }

        // Initialize
        // initializeSampleData();
    </script>

<script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>

<script>
    // Initialize Quill
    const quill = new Quill('#packageDescriptionEditor', {
        theme: 'snow',
        placeholder: 'Write package description...',
        modules: {
            toolbar: [
                [{
                    header: [1, 2, 3, false]
                }],
                ['bold', 'italic', 'underline', 'strike'],
                [{
                    color: []
                }, {
                    background: []
                }],
                [{
                    list: 'ordered'
                }, {
                    list: 'bullet'
                }],
                [{
                    align: []
                }],
                ['link', 'blockquote', 'code-block'],
                ['clean']
            ]
        }
    });
</script>
</body>
</html>
