<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Ketinggian Air</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    body {
      margin: 0;
      font-family: "Segoe UI", sans-serif;
      background: #f5f7fa;
      color: #333;
    }
    header {
      background: #2b3a67;
      color: white;
      padding: 15px 25px;
      font-size: 20px;
      font-weight: bold;
    }
    .dashboard {
      display: grid;
      grid-template-columns: 2fr 1fr;
      gap: 20px;
      padding: 20px;
    }
    .card {
      background: white;
      border-radius: 12px;
      padding: 15px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    .card h3 {
      margin: 0 0 10px;
      font-size: 16px;
      color: #2b3a67;
    }
    .highlight {
      font-size: 28px;
      font-weight: bold;
      margin-top: 5px;
    }
    .status-normal { color: #28a745; }
    .status-warning { color: #ffc107; }
    .status-danger { color: #dc3545; }
    .alarms {
      width: 100%;
      border-collapse: collapse;
    }
    .alarms th, .alarms td {
      padding: 8px;
      border-bottom: 1px solid #eee;
      font-size: 13px;
      text-align: left;
    }
    .badge {
      padding: 3px 8px;
      border-radius: 6px;
      font-size: 12px;
      font-weight: bold;
    }
    .critical { background: #f8d7da; color: #721c24; }
    .minor { background: #fff3cd; color: #856404; }
  </style>
</head>
<body>

<header>
  🌊 Dashboard Monitoring Ketinggian Air
</header>

<div class="dashboard">

  <!-- Grafik -->
  <div class="card">
    <h3>Grafik Ketinggian Air (cm)</h3>
    <canvas id="chartAir"></canvas>
  </div>

  <!-- Data ringkas -->
  <div class="card">
    <h3>Ringkasan</h3>
    <p>Aktual: <span class="highlight" id="aktual">0 cm</span></p>
    <p>Status: <span class="highlight status-normal" id="status">Normal</span></p>
  </div>

  <!-- Alarm list -->
  <div class="card" style="grid-column: span 2;">
    <h3>Meteran</h3>
    <table class="alarms">
      <thead>
        <tr>
          <th>ID</th>
          <th>Device ID</th>
          <th>Hasil Pembacaan</th>
          
        </tr>
      </thead>
      <tbody>
            <tbody>
            @foreach ($meteran as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->device_id }}</td>
                    <td>{{ $item->reading_value }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
        </tbody>
    </table>
  </div>

</div>

<script>
  const waktu = ["10:00","10:05","10:10","10:15","10:20"];
  const tinggiAir = [120, 125, 128, 130, 140];

  // Fungsi untuk menentukan warna berdasarkan nilai
  function getColor(value) {
    if (value <= 120) return "rgba(40, 167, 69, 0.8)";   // hijau
    if (value <= 135) return "rgba(255, 193, 7, 0.8)";   // kuning
    return "rgba(220, 53, 69, 0.8)";                     // merah
  }

  const warnaBar = tinggiAir.map(v => getColor(v));

  // Chart
  new Chart(document.getElementById("chartAir"), {
    type: "bar",
    data: {
      labels: waktu,
      datasets: [{
        label: "Ketinggian Air (cm)",
        data: tinggiAir,
        backgroundColor: warnaBar,
        borderRadius: 6
      }]
    },
    options: { 
      responsive: true,
      plugins: { legend: { display: false } },
      scales: { y: { beginAtZero: true } }
    }
  });

  // Update ringkasan status
  const latest = tinggiAir[tinggiAir.length-1];
  const statusEl = document.getElementById("status");
  const aktualEl = document.getElementById("aktual");
  aktualEl.textContent = latest + " cm";

  if (latest < 130) {
    statusEl.textContent = "Normal";
    statusEl.className = "highlight status-normal";
  } else if (latest >= 130 && latest < 150) {
    statusEl.textContent = "Waspada";
    statusEl.className = "highlight status-warning";
  } else {
    statusEl.textContent = "Bahaya";
    statusEl.className = "highlight status-danger";
  }
</script>

</body>
</html>
