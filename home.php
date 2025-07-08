<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diabetes Tracker</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #0069d9;
      --primary-light: #e8f0fe;
      --secondary: #4CAF50;
      --danger: #e74c3c;
      --text: #333;
      --text-light: #555;
      --bg: #f4f6f8;
      --card-bg: #fff;
      --shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', system-ui, sans-serif;
      background-color: var(--bg);
      color: var(--text);
      line-height: 1.6;
    }

    header {
      background-color: var(--primary);
      color: #fff;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .hero {
      background: var(--primary-light);
      padding: 2rem;
      text-align: center;
    }

    .hero h1 {
      font-size: 1.8rem;
      margin-bottom: 1rem;
      color: var(--primary);
    }

    .hero p {
      font-size: 1rem;
      color: var(--text-light);
      margin-bottom: 1.5rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 0.5rem;
      padding: 0.8rem 1.5rem;
      border-radius: 50px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
      cursor: pointer;
      border: none;
      font-family: inherit;
      font-size: 0.95rem;
    }

    .btn-primary {
      background-color: var(--primary);
      color: white;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0 1rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 1.5rem;
    }

    .card {
      background-color: var(--card-bg);
      border-radius: 8px;
      padding: 1.2rem;
      box-shadow: var(--shadow);
      border-top: 4px solid var(--primary);
    }

    .card:nth-child(2) {
      border-top-color: var(--secondary);
    }

    .card:nth-child(3) {
      border-top-color: #9b59b6;
    }

    .card:nth-child(4) {
      border-top-color: var(--danger);
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .card h2 {
      font-size: 1.1rem;
      color: var(--primary);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .card ul {
      padding-left: 1.2rem;
      list-style: none;
      font-size: 0.9rem;
      color: var(--text-light);
    }

    .card ul li {
      position: relative;
      padding-left: 1.2rem;
      margin-bottom: 0.5rem;
    }

    .card ul li::before {
      content: "•";
      position: absolute;
      left: 0;
      color: var(--primary);
    }

    .card-footer {
      margin-top: 1rem;
      display: flex;
      justify-content: flex-end;
    }

    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.5);
      z-index: 1000;
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background-color: white;
      padding: 1.5rem;
      border-radius: 8px;
      width: 90%;
      max-width: 400px;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1rem;
    }

    .modal-close {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      color: var(--text-light);
    }

    .form-group {
      margin-bottom: 1rem;
    }

    .form-group label {
      display: block;
      margin-bottom: 0.3rem;
      font-weight: 500;
    }

    .form-control {
      width: 100%;
      padding: 0.6rem;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-family: inherit;
    }

    @media (max-width: 768px) {
      .container {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

  <header>
    <div class="logo">
      <i class="fas fa-heartbeat"></i>
      <span>Diabetes Tracker</span>
    </div>
  </header>

  <section class="hero">
    <div class="hero-content">
      <h1>Your Diabetes Tracker</h1>
      <p>Monitor your health and stay on track</p>
      <button class="btn btn-primary" id="logReadingsBtn">
        <i class="fas fa-plus"></i>
        Log Today's Readings
      </button>
    </div>
  </section>

  <main class="container">
    <!-- Blood Sugar Card -->
    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-tint"></i> Blood Sugar</h2>
      </div>
      <ul>
        <li><strong>Morning:</strong> 105 mg/dL</li>
        <li><strong>After Lunch:</strong> 128 mg/dL</li>
        <li><strong>Avg. Week:</strong> 112 mg/dL</li>
      </ul>
      <div class="card-footer">
        <button class="btn btn-primary btn-sm" id="newReadingBtn">
          <i class="fas fa-plus"></i>
          Add Reading
        </button>
      </div>
    </div>

    <!-- Medication Card -->
    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-pills"></i> Medications</h2>
      </div>
      <ul>
        <li><strong>Metformin:</strong> 2x daily</li>
        <li><strong>Insulin:</strong> 3x daily</li>
        <li><strong>Last Taken:</strong> Today 8:05 AM</li>
      </ul>
    </div>

    <!-- Food Card -->
    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-utensils"></i> Food</h2>
      </div>
      <ul>
        <li><strong>Today's Carbs:</strong> 150g</li>
        <li><strong>Target:</strong> 180g</li>
      </ul>
      <div class="card-footer">
        <button class="btn btn-primary btn-sm" id="addMealBtn">
          <i class="fas fa-plus"></i>
          Add Meal
        </button>
      </div>
    </div>

    <!-- Activity Card -->
    <div class="card">
      <div class="card-header">
        <h2><i class="fas fa-running"></i> Activity</h2>
      </div>
      <ul id="activityData">
        <li><strong>Loading activity data...</strong></li>
      </ul>
      <div class="card-footer">
        <button class="btn btn-primary btn-sm" id="connectFitBtn">
          <i class="fas fa-sync-alt"></i>
          Refresh Data
        </button>
      </div>
    </div>
  </main>

  <!-- Blood Sugar Modal -->
  <div class="modal" id="bloodSugarModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Log Blood Sugar</h3>
        <button class="modal-close">&times;</button>
      </div>
      <form id="bloodSugarForm">
        <div class="form-group">
          <label for="bloodSugarValue">Blood Sugar (mg/dL)</label>
          <input type="number" id="bloodSugarValue" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="readingTime">Time</label>
          <input type="time" id="readingTime" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Meal Modal -->
  <div class="modal" id="mealModal">
    <div class="modal-content">
      <div class="modal-header">
        <h3>Log Meal</h3>
        <button class="modal-close">&times;</button>
      </div>
      <form id="mealForm">
        <div class="form-group">
          <label for="carbsAmount">Carbohydrates (grams)</label>
          <input type="number" id="carbsAmount" class="form-control" required>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Save
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    // DOM Elements
    const modals = {
      bloodSugar: document.getElementById('bloodSugarModal'),
      meal: document.getElementById('mealModal')
    };

    const buttons = {
      logReadings: document.getElementById('logReadingsBtn'),
      newReading: document.getElementById('newReadingBtn'),
      addMeal: document.getElementById('addMealBtn'),
      connectFit: document.getElementById('connectFitBtn')
    };

    const activityDataElement = document.getElementById('activityData');

    // Google Fit API integration
    const GOOGLE_FIT_CLIENT_ID = '668736236743-1u8jrlmfke4s2q0e2hbrfq24oih5jhuq.apps.googleusercontent.com';
    const GOOGLE_FIT_SCOPES = 'https://www.googleapis.com/auth/fitness.activity.read';
    
    // Initialize Google API client - assuming user is already authenticated
    function initClient() {
      gapi.client.init({
        clientId: GOOGLE_FIT_CLIENT_ID,
        scope: GOOGLE_FIT_SCOPES
      }).then(() => {
        console.log('Google API client initialized');
        // Automatically fetch data after initialization
        fetchActivityData();
      }).catch(err => {
        console.error('Error initializing Google API client:', err);
        activityDataElement.innerHTML = `
          <li><strong>Error initializing Google Fit</strong></li>
          <li>Please refresh the page</li>
        `;
      });
    }

    // Load Google API client
    function loadGoogleFitAPI() {
      gapi.load('client:auth2', {
        callback: initClient,
        onerror: function() {
          console.error('Failed to load Google API client');
          activityDataElement.innerHTML = `
            <li><strong>Failed to load Google Fit</strong></li>
            <li>Please check your connection</li>
          `;
        },
        timeout: 5000, // 5 seconds timeout
        ontimeout: function() {
          console.error('Timeout loading Google API client');
          activityDataElement.innerHTML = `
            <li><strong>Connection timeout</strong></li>
            <li>Please try again later</li>
          `;
        }
      });
    }

    // Fetch activity data from Google Fit
    async function fetchActivityData() {
      try {
        activityDataElement.innerHTML = '<li><strong>Loading activity data...</strong></li>';
        
        // Get today's date range
        const now = new Date();
        const startOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate());
        const endTime = now.toISOString();
        const startTime = startOfDay.toISOString();

        // Fetch steps data
        const stepsResponse = await gapi.client.fitness.users.dataset.aggregate({
          userId: 'me',
          resource: {
            aggregateBy: [{
              dataTypeName: 'com.google.step_count.delta',
              dataSourceId: 'derived:com.google.step_count.delta:com.google.android.gms:estimated_steps'
            }],
            bucketByTime: { durationMillis: 86400000 }, // 1 day
            startTimeMillis: new Date(startTime).getTime(),
            endTimeMillis: new Date(endTime).getTime()
          }
        });

        // Fetch activity segments
        const activityResponse = await gapi.client.fitness.users.sessions.list({
          userId: 'me',
          startTime: startTime,
          endTime: endTime
        });

        // Process the data
        const steps = stepsResponse.result.bucket?.[0]?.dataset?.[0]?.point?.[0]?.value?.[0]?.intVal || 0;
        const activities = activityResponse.result.session || [];

        // Update the UI
        updateActivityUI(steps, activities);
        
      } catch (error) {
        console.error('Error fetching Google Fit data:', error);
        activityDataElement.innerHTML = `
          <li><strong>Error loading activity data</strong></li>
          <li>${error.message || 'Please try again'}</li>
        `;
      }
    }

    // Update the activity card UI with fetched data
    function updateActivityUI(steps, activities) {
      let html = '';
      
      // Add steps data
      html += `<li><strong>Today's Steps:</strong> ${steps.toLocaleString()}</li>`;
      
      // Add activities if any
      if (activities.length > 0) {
        const activityMinutes = activities.reduce((total, session) => {
          return total + (session.endTimeMillis - session.startTimeMillis) / 60000;
        }, 0);
        
        html += `<li><strong>Activity Time:</strong> ${Math.round(activityMinutes)} minutes</li>`;
        
        // List activities
        const activityTypes = activities.map(session => {
          // Convert activity type numbers to human-readable names
          const typeMap = {
            1: 'Walking',
            2: 'Running',
            3: 'Biking',
            8: 'Sleeping',
            9: 'Treadmill',
            72: 'Swimming',
            // Add more mappings as needed
          };
          return typeMap[session.activityType] || `Activity ${session.activityType || 'unknown'}`;
        }).filter((value, index, self) => self.indexOf(value) === index);
        
        html += `<li><strong>Activities:</strong> ${activityTypes.join(', ')}</li>`;
      } else {
        html += `<li><strong>No recorded activities today</strong></li>`;
      }
      
      // Add weekly goal progress (example)
      html += `<li><strong>Weekly Goal:</strong> 5/7 days active</li>`;
      
      activityDataElement.innerHTML = html;
    }

    // Modal functions
    function openModal(modal) {
      modal.style.display = 'flex';
    }

    function closeModal(modal) {
      modal.style.display = 'none';
    }

    // Event listeners for modals
    window.addEventListener('click', (e) => {
      if (e.target.classList.contains('modal')) {
        closeModal(e.target);
      }
    });

    document.querySelectorAll('.modal-close').forEach(btn => {
      btn.addEventListener('click', () => {
        closeModal(btn.closest('.modal'));
      });
    });

    // Button event listeners
    buttons.logReadings.addEventListener('click', () => {
      openModal(modals.bloodSugar);
    });

    buttons.newReading.addEventListener('click', () => {
      openModal(modals.bloodSugar);
    });

    buttons.addMeal.addEventListener('click', () => {
      openModal(modals.meal);
    });

    buttons.connectFit.addEventListener('click', () => {
      fetchActivityData();
    });

    // Form submissions
    document.getElementById('bloodSugarForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const value = document.getElementById('bloodSugarValue').value;
      alert(`Blood sugar reading of ${value} mg/dL logged!`);
      closeModal(modals.bloodSugar);
      e.target.reset();
    });

    document.getElementById('mealForm').addEventListener('submit', (e) => {
      e.preventDefault();
      const carbs = document.getElementById('carbsAmount').value;
      alert(`Meal with ${carbs}g carbs logged!`);
      closeModal(modals.meal);
      e.target.reset();
    });

    // Load Google Fit API when page loads
    window.onload = function() {
      // Load the Google API client library
      const script = document.createElement('script');
      script.src = 'https://apis.google.com/js/api.js';
      script.onload = function() {
        loadGoogleFitAPI();
      };
      script.onerror = function() {
        activityDataElement.innerHTML = `
          <li><strong>Failed to load Google API</strong></li>
          <li>Please check your connection</li>
        `;
      };
      document.body.appendChild(script);
    };
  </script>
</body>
</html>