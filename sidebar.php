<!-- sidebar.php -->

<!--Icon library-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- Script for mobile menu toggle -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const toggle = document.getElementById('menu-toggle');

    toggle.addEventListener('click', () => {
      sidebar.classList.toggle('open');
    });
  });
</script>

<!-- Mobile menu toggle icon -->
<div id="menu-toggle">
<i class="fas fa-bars"></i>
</div>

<div id="sidebar">
  <div id="logo">
    <img src="graphics/smLogo.gif" alt="AVSL Logo"/>
  </div>
  <ul>
    <li class="nav">
	  <a href="index.php" class="<?= $currentPage == 'index' ? 'active' : '' ?>">
		<i class="fas fa-home"></i> Home
	  </a>
	</li>
	<li class="nav">
	  <a href="contact.php" class="<?= $currentPage == 'contact' ? 'active' : '' ?>">
		<i class="fas fa-envelope"></i> Contact
	  </a>
	</li>
	<li class="nav">
	  <a href="photos.php" class="<?= $currentPage == 'photos' ? 'active' : '' ?>">
		<i class="fas fa-camera"></i> Photos
	  </a>
	</li>
	<li class="nav">
	  <a href="teams.php" class="<?= $currentPage == 'teams' ? 'active' : '' ?>">
		<i class="fas fa-users"></i> Teams
	  </a>
	</li>
  </ul>
</div>
