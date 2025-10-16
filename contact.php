<!-- contact.php -->
<?php $currentPage = 'contact'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Ashland Valley Soccer League</title>
	<link rel="stylesheet" href="styles.css">
	
	<!-- Sets viewport abilities -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Nice Google font-->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
	<style>
	  body { font-family: 'Inter', sans-serif; }
	</style>

</head>

<body>
	<?php include 'sidebar.php'; ?>
	
	<div id="main">
  <section class="contact-hero">
    <h1>Contact AVSL</h1>
    <p>Questions about teams, schedules, or volunteering? We’d love to hear from you.</p>
  </section>

  <section class="contact-grid">
    <!-- Card: Email -->
    <article class="contact-card">
      <div class="contact-icon"><i class="fas fa-envelope"></i></div>
      <h3>Email</h3>
      <p><a href="mailto:me@sample.com">kyrat4242@gmail.com</a></p>
    </article>

    <!-- Card: Phone -->
    <article class="contact-card">
      <div class="contact-icon"><i class="fas fa-phone"></i></div>
      <h3>Phone</h3>
      <p><a href="tel:+15555555555">(555) 555-5555</a></p>
    </article>

    <!-- Card: Address -->
    <article class="contact-card">
      <div class="contact-icon"><i class="fas fa-location-dot"></i></div>
      <h3>Mailing Address</h3>
      <p>555 Street Ave.<br>Greeley, CO 80631</p>
    </article>
  </section>
</div>

</body>

</html>