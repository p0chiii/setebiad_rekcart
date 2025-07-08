<?php
// home.php — Enhanced layout for Diabetes Tracker
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Diabetes Tracker Home</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f4f6f8;
      color: #333;
      line-height: 1.6;
    }

    /* Header Navigation */
    header {
      background-color: #0069d9;
      color: #fff;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.8rem;
      font-weight: bold;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 1.5rem;
    }

    .nav-links a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: #cce6ff;
    }

    /* Hero Section */
    .hero {
      background: #e8f0fe;
      padding: 2rem 2rem 3rem;
      text-align: center;
    }

    .hero h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .hero p {
      font-size: 1.1rem;
      color: #555;
    }

    /* Main Section Layout */
    .container {
      max-width: 1200px;
      margin: auto;
      padding: 2rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
    }

    /* Card Styles */
    .card {
      background-color: #fff;
      border-radius: 10px;
      padding: 1.5rem;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h2 {
      font-size: 1.2rem;
      margin-bottom: 0.75rem;
      color: #0056b3;
    }

    .card ul, .card p {
      font-size: 0.95rem;
      color: #444;
      margin-bottom: 0.5rem;
    }

    .card ul {
      padding-left: 1.2rem;
      list-style: disc;
    }

    .link {
      margin-top: auto;
      text-decoration: none;
      color: #0069d9;
      font-size: 0.9rem;
      font-weight: 500;
    }

    .link:hover {
      text-decoration: underline;
    }

    footer {
      text-align: center;
      font-size: 0.85rem;
      padding: 1rem;
      background-color: #ffffff;
      margin-top: 2rem;
      color: #888;
      border-top: 1px solid #ddd;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <div class="logo">Diabetes Tracker</div>
    <ul class="nav-links">
      <li><a href="#">Home</a></li>
      <li><a href="#">Log</a></li>
      <li><a href="#">Reminders</a></li>
      <li><a href="#">Settings</a></li>
    </ul>
  </header>

  <!-- Hero Banner -->
  <section class="hero">
    <h1>Welcome to Your Diabetes Tracker</h1>
    <p>Monitor your health, stay on track with medications, meals, and reports — all in one place.</p>
  </section>

  <!-- Main Dashboard Cards -->
  <main class="container">

    <!-- Insulin Reminder -->
    <div class="card">
      <h2>Insulin Reminders</h2>
      <ul>
        <li>Morning Dose: 8:00 AM</li>
        <li>Afternoon Dose: 2:00 PM</li>
        <li>Night Dose: 9:00 PM</li>
      </ul>
      <a href="#" class="link">Edit Reminder</a>
    </div>

    <!-- Food Tracker -->
    <div class="card">
      <h2>Food Tracker (7 Days)</h2>
      <ul>
        <li>Monday: 150g carbs</li>
        <li>Tuesday: 135g carbs</li>
        <li>Wednesday: 140g carbs</li>
        <li>Thursday: Not logged</li>
      </ul>
      <a href="#" class="link">Add/Review Meals</a>
    </div>

    <!-- Fitness Tracker -->
    <div class="card">
      <h2>Fitness Tracker</h2>
      <ul>
        <li>Monday: Walked 3km</li>
        <li>Tuesday: Yoga 30 mins</li>
        <li>Wednesday: Light Weights</li>
        <li>Thursday: Rest Day</li>
      </ul>
      <a href="#" class="link">Update Activity</a>
    </div>

    <!-- Blood Sugar Log -->
    <div class="card">
      <h2>Blood Sugar Log</h2>
      <ul>
        <li>Monday: 105 mg/dL</li>
        <li>Tuesday: 110 mg/dL</li>
        <li>Wednesday: 98 mg/dL</li>
      </ul>
      <a href="#" class="link">Log New Reading</a>
    </div>

    <!-- Medication Schedule -->
    <div class="card">
      <h2>Medication Schedule</h2>
      <p>Next Refill: July 15</p>
      <ul>
        <li>Metformin: 2x daily</li>
        <li>Insulin: 3x daily</li>
      </ul>
      <a href="#" class="link">Update Meds</a>
    </div>

    <!-- Doctor Reports -->
    <div class="card">
      <h2>Doctor Reports</h2>
      <p>Last Visit: June 28</p>
      <p>Next Visit: July 20</p>
      <a href="#" class="link">Upload/Share Report</a>
    </div>

  </main>

  <!-- Footer -->
  <footer>
    &copy; 2025 Diabetes Tracker. All rights reserved.
  </footer>

</body>
</html>
