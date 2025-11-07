<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h2>Upcoming Tour Dates</h2>
<div id="tour-list">
  <?php
    $sql = "SELECT * FROM tour_dates ORDER BY date ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<div class='tour-card'>";
        echo "<h3>" . $row['city'] . " – " . $row['venue'] . "</h3>";
        echo "<p>Date: " . $row['date'] . " | Time: " . $row['time'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        echo "<a href='" . $row['tickets_url'] . "' target='_blank'>Buy Tickets</a>";
        echo "</div>";
      }
    } else {
      echo "<p>No upcoming shows.</p>";
    }
  ?>
</div>

<?php include 'includes/footer.php'; ?>
