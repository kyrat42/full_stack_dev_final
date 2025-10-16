<!-- contact.php -->
<?php $currentPage = 'photos'; ?>

<!DOCTYPE html>
<html>

<head>
	<title>Ashland Valley Soccer League</title>
	<link rel="stylesheet" href="styles.css">
	
	<!-- Sets viewport abilities -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Nice Google font-->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
	<style>
	  body { font-family: 'Inter', sans-serif; }
	</style>

</head>

<body>
	<?php include 'sidebar.php'; ?>

	<div id="main">
  <section class="photos-hero">
    <h1>League Photos</h1>
    <p>Highlights from matches, practices, and community moments.</p>
  </section>

  <!-- Auto-generate a gallery from /graphics -->
    <?php
	// Configure which folders to scan (relative to this file)
	$folders = [
	  __DIR__ . '/graphics/photos',
	  __DIR__ . '/graphics',
	];

	// Allowed extensions
	$allowed = ['jpg','jpeg','png','webp','gif'];

	$images = [];

	// Collect images from configured folders (ignore missing folders)
	foreach ($folders as $absDir) {
	  if (!is_dir($absDir)) continue;
	  $dh = opendir($absDir);
	  if (!$dh) continue;
	  while (($file = readdir($dh)) !== false) {
		if ($file === '.' || $file === '..') continue;
		$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
		if (!in_array($ext, $allowed)) continue;

		// Build a **web path** using forward slashes
		// Convert absolute path (C:\xampp\htdocs\ashland\graphics\…) to relative web path (graphics/…)
		$webPath = str_replace('\\', '/', str_replace(__DIR__ . '/', '', rtrim($absDir, '/\\'))) . '/' . $file;
		$images[] = $webPath;
	  }
	  closedir($dh);
	}

	// Natural sort so 1,2,10 order feels right
	natsort($images);
	$images = array_values($images);

	// Simple guard if no images found
	if (empty($images)) {
	  echo '<p style="padding:12px;background:#fff3cd;border:1px solid #ffe69c;border-radius:8px;color:#7a5b00;">No photos found in <code>/graphics</code> or <code>/graphics/photos</code>. Drop some .jpg/.png files in those folders and refresh.</p>';
	}
	?>

	<div class="ig-grid">
	  <?php foreach ($images as $idx => $rel): 
			$alt = 'AVSL Photo ' . ($idx + 1); ?>
		<a class="ig-item" href="<?= htmlspecialchars($rel) ?>" data-index="<?= $idx ?>">
		  <img src="<?= htmlspecialchars($rel) ?>" alt="<?= htmlspecialchars($alt) ?>" loading="lazy">
		  <div class="ig-overlay">
			<i class="fas fa-heart"></i>
			<span>View</span>
		  </div>
		</a>
	  <?php endforeach; ?>
	</div>

  <!-- Lightbox -->
  <div id="ig-lightbox" aria-hidden="true">
    <button class="ig-close" aria-label="Close">&times;</button>
    <button class="ig-prev" aria-label="Previous">&#10094;</button>
    <img id="ig-lightbox-img" alt="">
    <button class="ig-next" aria-label="Next">&#10095;</button>
  </div>
</div>


</body>

</html>

<script>
  (function () {
    const grid = document.querySelector('.ig-grid');
    const lb = document.getElementById('ig-lightbox');
    const img = document.getElementById('ig-lightbox-img');
    const btnClose = lb.querySelector('.ig-close'); // bug
    const btnPrev = lb.querySelector('.ig-prev');
    const btnNext = lb.querySelector('.ig-next');

    if (!grid) return;

    // Build an array of image URLs in source order
    const items = Array.from(grid.querySelectorAll('.ig-item'));
    const urls = items.map(a => a.getAttribute('href'));
    let current = -1;

    function openAt(index) {
      current = index;
      img.src = urls[current];
      lb.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }
    function closeLB() {
      lb.setAttribute('aria-hidden', 'true');
      img.src = '';
      document.body.style.overflow = '';
    }
    function prev() { openAt( (current - 1 + urls.length) % urls.length ); }
    function next() { openAt( (current + 1) % urls.length ); }

    // Click thumbnails
    grid.addEventListener('click', (e) => {
      const a = e.target.closest('.ig-item');
      if (!a) return;
      e.preventDefault();
      const idx = items.indexOf(a);
      openAt(idx);
    });

    // Controls
    btnClose.addEventListener('click', closeLB);
    btnPrev.addEventListener('click', prev);
    btnNext.addEventListener('click', next);

    // Close on backdrop click
    lb.addEventListener('click', (e) => {
      if (e.target === lb) closeLB();
    });

    // Keyboard nav
    document.addEventListener('keydown', (e) => {
      if (lb.getAttribute('aria-hidden') === 'true') return;
      if (e.key === 'Escape') closeLB();
      if (e.key === 'ArrowLeft') prev();
      if (e.key === 'ArrowRight') next();
    });
  })();
</script>