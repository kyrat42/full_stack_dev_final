# Ashland Valley Soccer League

My capstone project for the **Full-Stack Web Development certificate at Aims Community College**: a complete, responsive website for a fictional community soccer league, hand-coded without site builders or templates.

**Demo video:** [watch the walkthrough on Loom](https://www.loom.com/share/35df7e0846454e5185cfc3de9a55f70b)
**Case study:** [kyrasdigitalsolutions.com/portfolio.html#ashland-valley-soccer-league](https://kyrasdigitalsolutions.com/portfolio.html#ashland-valley-soccer-league)

![Ashland Valley Soccer League complex map](graphics/complexmap.jpg)

## Pages

| Page | What it includes |
|---|---|
| **Home** (`index.php`) | Hero section and an introduction to the league |
| **Teams** (`teams.php`) | "Meet the Teams" profiles for the league's teams |
| **Fields** (`fields.php`) | A map of the whole complex plus individual field maps |
| **Photos** (`photos.php`) | A photo gallery with a full-screen viewer and previous and next controls |
| **Contact** (`contact.php`) | Email, phone and location cards with interactive hover states |

## Highlights

- **Responsive from the start.** Layouts adapt from desktop to phone, and the sidebar navigation collapses into a menu toggle on small screens.
- **Shared components with PHP.** The sidebar (`sidebar.php`) is written once, included on every page, and highlights the current page automatically.
- **Interactive front end.** Hover effects throughout, and a vanilla JavaScript lightbox with keyboard-friendly previous, next and close controls on the photos page.
- **Hand-written CSS.** No frameworks, just `styles.css` and a small base stylesheet.

## Tech

HTML, CSS, JavaScript and PHP. The version deployed for the course also connected to a MySQL database; that server configuration isn't included in this repository.

## Run it locally

You'll need PHP installed. From the project folder:

```bash
php -S localhost:8000
```

Then open [http://localhost:8000](http://localhost:8000).

---

Built by [Kyra Thomas](https://kyrasdigitalsolutions.com) of Kyra's Digital Solutions.
