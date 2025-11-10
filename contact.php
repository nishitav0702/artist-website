<?php include 'includes/header.php'; ?>

<section class="contact">
  <h2>Contact Arijit Singh</h2>
  <form method="POST" action="contact.php">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Message:</label>
    <textarea name="message" rows="5" required></textarea>

    <button type="submit">Send Message</button>
  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'includes/db.php';

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $message = mysqli_real_escape_string($conn, $_POST["message"]);

    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";
    if (mysqli_query($conn, $sql)) {
      echo "<p class='success'>Thanks for reaching out, $name!</p>";
    } else {
      echo "<p class='error'>Something went wrong. Please try again.</p>";
    }
  }
  ?>
</section>

<?php include 'includes/footer.php'; ?>