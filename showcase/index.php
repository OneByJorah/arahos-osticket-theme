<?php
// Sample-branded landing page (showcase version, self-contained).
// Renders the same theme as the live install by linking the same CSS/JS files
// from the web root. No DB, no live data, no VIDE references.
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Arahos Help Desk</title>
<meta name="description" content="Sample help desk for demonstration.">
<meta name="theme-color" content="#0a1f44">
<link rel="manifest" href="/manifest.webmanifest">
<link rel="apple-touch-icon" href="/images/arahos/pwa/apple-touch-icon.png">
<link rel="icon" type="image/png" href="/images/arahos/pwa/icon-192.png">
<link rel="stylesheet" href="/css/vide/vide-tokens.css?v=3">
<link rel="stylesheet" href="/css/vide/vide-client-portal.css?v=34">
</head>
<body<?php if (basename($_SERVER['SCRIPT_NAME']) === 'index.php') echo ' class="vide-front"'; ?>>
<header id="header" class="vide-header">
  <div class="vide-header-inner">
    <a class="vide-header-logo" href="/showcase/index.php" title="Arahos Help Desk">
      <img src="/showcase/images/arahos/arahos-banner-logo.png" alt="Arahos Help Desk" class="vide-header-logo-img">
    </a>
    <button class="vide-mobile-toggle" aria-label="Toggle navigation menu" type="button">&#9776;</button>
    <nav class="vide-header-nav">
      <ul>
        <li class="active"><a href="/showcase/index.php">Support Center Home</a></li>
        <li><a href="/kb/index.php">Knowledgebase</a></li>
        <li><a href="/open.php">Open a New Ticket</a></li>
        <li><a href="/view.php">Check Ticket Status</a></li>
      </ul>
    </nav>
    <div class="vide-header-user">
      <span>Guest User</span><span class="sep">|</span>
      <a href="/scp/login.php">Sign In</a>
      <button class="vide-theme-toggle" aria-label="Toggle dark mode" type="button">&#127769;</button>
    </div>
  </div>
</header>

<main id="content" class="vide-content">
  <section class="vide-hero" id="landing_page">
    <div class="vide-hero-inner">
      <h1>How can we help you today?</h1>
      <p class="vide-hero-sub"><strong>Welcome to the Arahos Help Desk.</strong><br>Search the knowledge base for answers, or open a ticket and our team will get back to you.</p>
      <form class="vide-hero-search" method="get" action="/kb/index.php">
        <input type="text" name="q" placeholder="Search our knowledge base" aria-label="Search our knowledge base">
        <button type="submit">Search</button>
      </form>
      <div class="vide-hero-cta">
        <a class="vide-cta-primary" href="/open.php">Open a New Ticket</a>
        <a class="vide-cta-outline" href="/view.php">Check Ticket Status</a>
      </div>
    </div>
  </section>

  <div class="vide-content-grid">
    <aside class="vide-col-left">
      <a class="vide-cta-primary vide-cta-block" href="/open.php">Open a New Ticket</a>
      <a class="vide-cta-outline vide-cta-block" href="/view.php">Check Ticket Status</a>
      <div class="vide-status">
        <div class="vide-status-head">
          <div class="vide-status-icon">&#9989;</div>
          <div>
            <div class="vide-status-title">All systems operational</div>
            <div class="vide-status-sub">Arahos help desk status &amp; contact channels.</div>
          </div>
        </div>
        <div class="vide-status-grid">
          <div class="vide-status-card"><div class="vide-status-num">3</div><div class="vide-status-lbl">Open Tickets</div></div>
          <div class="vide-status-card"><div class="vide-status-num">7</div><div class="vide-status-lbl">Active Users</div></div>
          <div class="vide-status-card"><div class="vide-status-num">1</div><div class="vide-status-lbl">Open Tasks</div></div>
          <div class="vide-status-card"><div class="vide-status-num">100%</div><div class="vide-status-lbl">Uptime</div></div>
        </div>
        <div class="vide-status-tiles">
          <a class="vide-status-tile" href="/kb/index.php">&#128218; Knowledgebase</a>
          <a class="vide-status-tile" href="/open.php">&#9998; New Ticket</a>
          <a class="vide-status-tile" href="/view.php">&#128269; Check Status</a>
        </div>
        <div class="vide-status-foot">Last checked: <?php echo date('g:i:s A'); ?></div>
      </div>
    </aside>
    <main class="vide-col-main vide-intro">
      <h2>Welcome to the Arahos Help Desk</h2>
      <p>This is a sample help desk for demonstration. Submit a support ticket and our team will get back to you.</p>
      <h3>How it works</h3>
      <p><strong>1. Open a ticket</strong> &mdash; Describe your issue and we will assign a technician. You will get a confirmation email with your ticket number.</p>
      <p><strong>2. Track progress</strong> &mdash; Use your ticket number to check status, read updates, and reply to your technician online.</p>
      <p><strong>3. Get it resolved</strong> &mdash; We provide complete archives of all your support requests for your reference.</p>
      <h3>Before you submit</h3>
      <p>A valid account is required to submit a ticket. For more information, visit <a href="https://example.com">example.com</a>.</p>
      <h3>Need help right away?</h3>
      <p>Call us for urgent issues:<br><strong>Main</strong> 555-0100 ext. 100<br><strong>Field</strong> 555-0200 ext. 200</p>
    </main>
    <aside class="vide-col-right">
      <div class="vide-frontpage">
        <h2>Important Information</h2>
        <button class="vide-accordion" aria-expanded="false" type="button"><span class="vide-accordion-q">How to request a new email account</span><span class="vide-accordion-c">+</span></button>
        <div class="vide-accordion-a"><p>Submit a ticket and IT will provision your account within one business day.</p></div>
        <button class="vide-accordion" aria-expanded="false" type="button"><span class="vide-accordion-q">Reporting a classroom technology outage</span><span class="vide-accordion-c">+</span></button>
        <div class="vide-accordion-a"><p>Open a "Report a Problem" ticket with the room number and equipment ID.</p></div>
        <button class="vide-accordion" aria-expanded="false" type="button"><span class="vide-accordion-q">Connecting to the office Wi-Fi</span><span class="vide-accordion-c">+</span></button>
        <div class="vide-accordion-a"><p>Select the SSID, enter your network credentials, and accept the certificate.</p></div>
        <button class="vide-accordion" aria-expanded="false" type="button"><span class="vide-accordion-q">Password reset help</span><span class="vide-accordion-c">+</span></button>
        <div class="vide-accordion-a"><p>Use the self-service reset link on the sign-in page or call the help desk.</p></div>
        <button class="vide-accordion" aria-expanded="false" type="button"><span class="vide-accordion-q">Getting software installed on your computer</span><span class="vide-accordion-c">+</span></button>
        <div class="vide-accordion-a"><p>Open a ticket with the software name and license info; we will deploy it remotely.</p></div>
      </div>
    </aside>
  </div>
</main>

<footer id="footer" class="vide-footer">
  <div class="vide-footer-inner">
    <div>Copyright &copy; <?php echo date('Y'); ?> Arahos Help Desk &mdash; All rights reserved.</div>
  </div>
</footer>

<script src="/js/vide/vide-client-portal.js"></script>
<script src="/js/vide/vide-landing.js"></script>
<script src="/js/vide/vide-pwa-install.js"></script>
</body>
</html>