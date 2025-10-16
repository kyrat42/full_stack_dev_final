<!-- teams.php -->
<?php $currentPage = 'teams'; ?>

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

<script>
document.addEventListener('DOMContentLoaded', () => {
  const search = document.getElementById('team-search');
  const filter = document.getElementById('team-filter');
  const grid   = document.getElementById('team-grid');
  if (!grid) return;

  const cards = Array.from(grid.querySelectorAll('.team-card'));

  function applyFilters() {
    const q = (search?.value || '').trim().toLowerCase();
    const color = (filter?.value || '').toLowerCase();

    cards.forEach(card => {
      const name = card.querySelector('.team-name')?.textContent.toLowerCase() || '';
      const about = card.querySelector('.team-about')?.textContent.toLowerCase() || '';
      const colors = (card.getAttribute('data-colors') || '').toLowerCase();

      const matchesText = !q || name.includes(q) || about.includes(q);
      const matchesColor = !color || colors.split(/\s+/).includes(color);

      card.style.display = (matchesText && matchesColor) ? '' : 'none';
    });
  }

  search?.addEventListener('input', applyFilters);
  filter?.addEventListener('change', applyFilters);
  applyFilters(); // initial
});
</script>


<body>
<?php include 'sidebar.php'; ?>

<!--Main div-->
	<div id="main">
  <!-- Hero -->
  <section class="teams-hero">
    <h1>Meet the Teams</h1>
    <p>Explore rosters, colors, and quick facts. Search or filter to find your squad.</p>

    <div class="teams-controls">
      <input id="team-search" type="search" placeholder="Search teams…" aria-label="Search teams">
      <select id="team-filter" aria-label="Filter by color">
        <option value="">All colors</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="black">Black</option>
        <option value="silver">Silver</option>
      </select>
    </div>
  </section>

  <?php
    // Simple data source (scale this up later from DB if you like)
    $teams = [
      [
        'name' => 'A Team',
        'slug' => 'a-team',
        'img'  => 'graphics/ateam.jpg',
        'founded' => 1998,
        'colors'  => ['red','black'],
        'tagline' => 'Relentless attack. Rock-solid defense.',
        'about'   => 'A Team is a powerhouse known for a fast-paced, tactical approach and unbreakable spirit.',
      ],
      [
        'name' => 'Blue Devils',
        'slug' => 'blue-devils',
        'img'  => 'graphics/bluedevils.jpg',
        'founded' => 2002,
        'colors'  => ['blue','silver'],
        'tagline' => 'Disciplined defense. Strategic playmaking.',
        'about'   => 'Blue Devils thrive under pressure, turning matches into tactical masterclasses.',
      ],
    ];
  ?>

  <!-- Grid -->
  <section class="team-grid" id="team-grid">
    <?php foreach ($teams as $t): 
      $colorData = implode(' ', $t['colors']); ?>
      <article class="team-card" data-colors="<?= htmlspecialchars($colorData) ?>">
        <div class="team-media">
          <img src="<?= htmlspecialchars($t['img']) ?>" alt="<?= htmlspecialchars($t['name']) ?> team photo" loading="lazy">
          <div class="team-badge"><?= htmlspecialchars($t['founded']) ?></div>
        </div>
        <div class="team-body">
          <h2 class="team-name"><?= htmlspecialchars($t['name']) ?></h2>
          <p class="team-tagline"><?= htmlspecialchars($t['tagline']) ?></p>
          <p class="team-about"><?= htmlspecialchars($t['about']) ?></p>
          <div class="team-meta">
            <span class="pill">Colors: <?= htmlspecialchars(ucfirst($t['colors'][0])) ?><?= isset($t['colors'][1]) ? ' & ' . htmlspecialchars(ucfirst($t['colors'][1])) : '' ?></span>
            <span class="pill">Founded: <?= (int)$t['founded'] ?></span>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </section>
</div>

</body>

</html>