<?php
// Generate standalone product mini-sites: public/sites/<slug>/index.html + login.html
// Self-contained (inline CSS/JS, local cover image) so each folder can become a subdomain docroot.

$base = dirname(__DIR__);
$data = json_decode(file_get_contents($base . '/resources/data/products.json'), true, 512, JSON_THROW_ON_ERROR);

$loginLabels = [
    'vahaai' => ['Student Login', 'Student ID'],
    'ka-crm' => ['Sales Team Login', 'User ID'],
    'pipeforge' => ['Developer Login', 'User ID'],
    'shopnest' => ['Store Owner Login', 'Store ID'],
    'kartpos' => ['Counter Login', 'Counter ID'],
    'peoplecore' => ['Employee Login', 'Employee ID'],
    'insightiq' => ['Analyst Login', 'User ID'],
    'convodesk' => ['Agent Login', 'Agent ID'],
    'visionkit' => ['Operator Login', 'Operator ID'],
    'documind' => ['User Login', 'User ID'],
    'voxa-ai' => ['User Login', 'User ID'],
    'agentforge' => ['User Login', 'User ID'],
];

// Usage gallery: 3 photos per product (paths relative to public/) + captions
$galleries = [
    'vahaai' => [
        ['images/cards/vahaai.jpg', 'A student learning with VAHA AI'],
        ['images/cards/ind-education.jpg', 'Classrooms powered by adaptive learning'],
        ['images/office/team-collaboration.jpg', 'Study groups working with the AI tutor'],
    ],
    'ka-crm' => [
        ['images/cards/ka-crm.jpg', 'Sales pipeline dashboard in daily use'],
        ['images/cards/ai-analytics.jpg', 'Revenue forecasting with AI scoring'],
        ['images/office/team-meeting.jpg', 'Sales teams reviewing the pipeline together'],
    ],
    'pipeforge' => [
        ['images/cards/pipeforge.jpg', 'Pipelines defined right beside the code'],
        ['images/tech/code-screen.jpg', 'Every commit builds and tests automatically'],
        ['images/tech/data-center.jpg', 'Deploying to production infrastructure'],
    ],
    'shopnest' => [
        ['images/cards/shopnest.jpg', 'Shoppers on a ShopNest storefront'],
        ['images/cards/ind-retail.jpg', 'Browsing and buying on mobile'],
        ['images/cards/svc-ecommerce.jpg', 'Secure UPI and card checkout'],
    ],
    'kartpos' => [
        ['images/cards/kartpos.jpg', 'Fast billing at the counter'],
        ['images/cards/ind-retail.jpg', 'Retail floors running on KartPOS'],
        ['images/cards/ind-logistics.jpg', 'Stock and inventory always in sync'],
    ],
    'peoplecore' => [
        ['images/cards/peoplecore.jpg', 'Onboarding a new hire in minutes'],
        ['images/cards/svc-hrms.jpg', 'HR teams reviewing dashboards together'],
        ['images/office/team-laptops.jpg', 'Employees using the self-service app'],
    ],
    'insightiq' => [
        ['images/cards/insightiq.jpg', 'Live dashboards for the whole team'],
        ['images/cards/ai-analytics.jpg', 'Ask in English, get a chart'],
        ['images/tech/analyst-screens.jpg', 'Analysts monitoring metrics in real time'],
    ],
    'convodesk' => [
        ['images/cards/convodesk.jpg', 'Customers chatting with the AI assistant'],
        ['images/cards/ai-chatbot.jpg', 'One inbox for WhatsApp, web and Instagram'],
        ['images/office/developer-desk.jpg', 'Agents supervising smart handovers'],
    ],
    'visionkit' => [
        ['images/cards/visionkit.jpg', 'Vision AI watching the production line'],
        ['images/cards/ind-manufacturing.jpg', 'Defect detection on the factory floor'],
        ['images/tech/vr-headset.jpg', 'Every camera becomes an inspector'],
    ],
    'documind' => [
        ['images/cards/documind.jpg', 'Invoices extracted without typing'],
        ['images/cards/ind-finance.jpg', 'Finance teams closing books faster'],
        ['images/office/whiteboard-planning.jpg', 'Review only the flagged exceptions'],
    ],
    'voxa-ai' => [
        ['images/cards/voxa-ai.jpg', 'Voxa answering every business call'],
        ['images/cards/ai-chatbot.jpg', 'Appointments booked automatically'],
        ['images/office/office-meeting.jpg', 'Teams reviewing call transcripts'],
    ],
    'agentforge' => [
        ['images/cards/agentforge.jpg', 'Designing an AI agent visually'],
        ['images/tech/ai-robot-hand.jpg', 'Agents completing real work'],
        ['images/tech/circuit-board.jpg', 'Connected to your whole tool stack'],
    ],
];

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

function sharedCss($gradient) {
    return <<<CSS
:root{--blue:#2563eb;--violet:#7c3aed;--pink:#db2777;--ink:#0b1220;--body:#33415c;--muted:#526079;--soft:#64748b;--bg:#f6f8fc;--grad:linear-gradient(135deg,#2563eb 0%,#7c3aed 55%,#db2777 100%);--pgrad:{$gradient};--radius:1rem;--radius-xl:1.5rem;}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth;scroll-padding-top:84px}
body{font-family:'Poppins','Inter','Segoe UI',system-ui,sans-serif;color:var(--body);background:var(--bg);line-height:1.65;-webkit-font-smoothing:antialiased}
h1,h2,h3,h4{color:var(--ink);line-height:1.2}
a{text-decoration:none;color:inherit;transition:.3s}
img{max-width:100%}
.container{max-width:1180px;margin:0 auto;padding:0 1.5rem}
.grad-text{background:var(--grad);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text}
.btn{display:inline-flex;align-items:center;justify-content:center;gap:.5rem;padding:.8rem 1.6rem;border-radius:1rem;font-weight:600;font-size:.95rem;border:none;cursor:pointer;transition:.3s;font-family:inherit}
.btn-primary{background:var(--pgrad);color:#fff;box-shadow:0 8px 20px rgba(37,99,235,.3)}
.btn-primary:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(37,99,235,.4)}
.btn-outline{background:rgba(255,255,255,.7);color:var(--ink);border:2px solid rgba(37,99,235,.3)}
.btn-outline:hover{background:rgba(37,99,235,.08)}
header{position:fixed;top:0;left:0;right:0;z-index:100;background:rgba(255,255,255,.8);backdrop-filter:blur(16px) saturate(160%);border-bottom:1px solid rgba(15,23,42,.06)}
.nav{display:flex;align-items:center;justify-content:space-between;padding:.9rem 1.5rem;max-width:1180px;margin:0 auto}
.brand{display:flex;align-items:center;gap:.65rem;font-weight:800;font-size:1.25rem;color:var(--ink)}
.brand-mark{width:40px;height:40px;display:flex;align-items:center;justify-content:center;background:var(--pgrad);border-radius:.8rem;color:#fff;font-weight:800;font-size:1.1rem}
.nav ul{display:flex;gap:1.75rem;list-style:none;align-items:center}
.nav ul a{font-size:.92rem;font-weight:500;color:var(--muted)}
.nav ul a:hover{color:var(--ink)}
.menu-btn{display:none;background:none;border:none;cursor:pointer;font-size:1.4rem;color:var(--ink)}
section{padding:5.5rem 0}
.sec-badge{display:inline-block;padding:.45rem 1.1rem;background:rgba(37,99,235,.08);border:1px solid rgba(37,99,235,.25);border-radius:999px;font-size:.82rem;font-weight:600;color:var(--blue);margin-bottom:1rem}
.sec-title{font-size:clamp(1.8rem,4vw,2.6rem);margin-bottom:.9rem}
.sec-desc{color:var(--muted);max-width:640px}
.center{text-align:center}.center .sec-desc{margin:0 auto}
.hero{padding:9.5rem 0 5rem;background:var(--pgrad);color:#fff;position:relative;overflow:hidden}
.hero::after{content:'';position:absolute;width:480px;height:480px;border-radius:50%;background:rgba(255,255,255,.12);filter:blur(90px);top:-160px;right:-120px}
.hero-grid{display:grid;grid-template-columns:1.15fr .85fr;gap:3.5rem;align-items:center;position:relative;z-index:1}
.hero h1{color:#fff;font-size:clamp(2.2rem,4.5vw,3.4rem);margin:.5rem 0 1rem}
.hero .tag{font-size:.85rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;opacity:.9}
.hero p.lead{color:rgba(255,255,255,.9);font-size:1.1rem;margin-bottom:1.9rem;max-width:540px}
.hero-cta{display:flex;gap:1rem;flex-wrap:wrap;margin-bottom:2.6rem}
.btn-white{background:#fff;color:var(--ink)}
.btn-white:hover{transform:translateY(-2px)}
.btn-ghost{background:transparent;color:#fff;border:2px solid rgba(255,255,255,.55)}
.btn-ghost:hover{background:rgba(255,255,255,.15)}
.hero-stats{display:flex;gap:2.6rem;flex-wrap:wrap}
.hero-stats b{display:block;font-size:1.7rem}
.hero-stats span{font-size:.8rem;text-transform:uppercase;letter-spacing:.05em;opacity:.85}
.hero-photo{border-radius:var(--radius-xl);overflow:hidden;border:1px solid rgba(255,255,255,.35);box-shadow:0 24px 50px rgba(11,18,32,.35);transform:rotate(2deg)}
.hero-photo img{display:block;width:100%}
.cards{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem;margin-top:2.6rem}
.card{background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:var(--radius-xl);padding:1.7rem;box-shadow:0 1px 3px rgba(15,23,42,.08);transition:.3s}
.card:hover{transform:translateY(-6px);border-color:rgba(37,99,235,.3);box-shadow:0 18px 40px rgba(37,99,235,.18)}
.card h3{font-size:1.05rem;margin-bottom:.5rem}
.card p{color:var(--muted);font-size:.92rem}
.dot{width:44px;height:44px;border-radius:.9rem;background:var(--pgrad);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;margin-bottom:1rem}
.checklist{display:grid;grid-template-columns:1fr 1fr;gap:.9rem;margin-top:2.2rem}
.checklist li{list-style:none;display:flex;gap:.7rem;background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:1rem;padding:.95rem 1.15rem;font-size:.93rem}
.checklist li::before{content:'✓';color:var(--blue);font-weight:800}
.steps{margin-top:2.4rem;display:flex;flex-direction:column}
.step{display:flex;gap:1.2rem;padding-bottom:1.7rem;position:relative}
.step::before{content:'';position:absolute;left:21px;top:46px;bottom:0;width:2px;background:rgba(37,99,235,.2)}
.step:last-child::before{display:none}
.step-n{width:44px;height:44px;flex-shrink:0;border-radius:50%;background:var(--pgrad);color:#fff;display:flex;align-items:center;justify-content:center;font-weight:800;position:relative;z-index:1}
.step h3{font-size:1.02rem;padding-top:.5rem}
.step p{color:var(--muted);font-size:.92rem}
.chips{display:flex;flex-wrap:wrap;gap:.7rem;margin-top:2rem}
.chip{padding:.55rem 1.1rem;background:rgba(255,255,255,.85);border:1px solid rgba(37,99,235,.22);border-radius:999px;font-size:.88rem;font-weight:600}
.quote{margin-top:2.4rem;padding:2rem;background:linear-gradient(135deg,rgba(37,99,235,.05),rgba(124,58,237,.05));border:1px solid rgba(37,99,235,.15);border-radius:var(--radius-xl)}
.quote blockquote{font-style:italic;color:#1e293b;font-size:1.05rem;margin-bottom:1.2rem}
.quote .who b{display:block;color:var(--ink);font-size:.93rem}
.quote .who span{color:var(--soft);font-size:.82rem}
details{background:rgba(255,255,255,.85);border:1px solid rgba(15,23,42,.07);border-radius:1rem;margin-bottom:.7rem;overflow:hidden}
details[open]{border-color:rgba(37,99,235,.3)}
summary{padding:1.05rem 1.4rem;cursor:pointer;font-weight:600;color:#14203a;list-style:none;display:flex;justify-content:space-between;gap:1rem}
summary::-webkit-details-marker{display:none}
summary::after{content:'▾';color:var(--blue);transition:.3s}
details[open] summary::after{transform:rotate(180deg)}
details p{padding:0 1.4rem 1.15rem;color:var(--muted);font-size:.93rem}
.tech{display:flex;flex-wrap:wrap;gap:.55rem;margin-top:1.6rem}
.tech span{padding:.4rem .85rem;background:rgba(37,99,235,.08);border:1px solid rgba(37,99,235,.2);border-radius:999px;font-size:.8rem;color:#1d4ed8;font-weight:600}
.cta-band{background:var(--grad);border-radius:var(--radius-xl);padding:3rem 2rem;text-align:center;color:#fff}
.cta-band h2{color:#fff;font-size:clamp(1.5rem,3vw,2.1rem);margin-bottom:.6rem}
.cta-band p{color:rgba(255,255,255,.85);margin-bottom:1.6rem}
footer{padding:2.5rem 0;background:linear-gradient(180deg,#eaf2ff,#dce8fb);border-top:1px solid rgba(37,99,235,.15);text-align:center;font-size:.88rem;color:var(--soft)}
footer a{color:var(--blue);font-weight:600}
.shots{display:grid;grid-template-columns:repeat(3,1fr);gap:1.4rem;margin-top:2.4rem;text-align:left}
.shot{margin:0;border-radius:var(--radius-xl);overflow:hidden;border:1px solid rgba(15,23,42,.07);box-shadow:0 10px 25px rgba(15,23,42,.08);position:relative}
.shot img{display:block;width:100%;height:230px;object-fit:cover;transition:transform .7s cubic-bezier(.22,1,.36,1)}
.shot:hover img{transform:scale(1.07)}
.shot figcaption{position:absolute;left:0;right:0;bottom:0;padding:1.6rem 1.1rem .85rem;background:linear-gradient(180deg,transparent,rgba(11,18,32,.78));color:#fff;font-size:.85rem;font-weight:600}
.reveal{opacity:0;transform:translateY(26px);transition:opacity .7s cubic-bezier(.22,1,.36,1),transform .7s cubic-bezier(.22,1,.36,1)}
.reveal.in{opacity:1;transform:none}
@media(max-width:900px){
 .hero-grid{grid-template-columns:1fr}
 .hero-photo{display:none}
 .cards{grid-template-columns:1fr}
 .shots{grid-template-columns:1fr}
 .checklist{grid-template-columns:1fr}
 .nav ul{position:fixed;top:64px;right:-100%;width:78%;max-width:300px;height:100vh;background:rgba(255,255,255,.97);flex-direction:column;align-items:flex-start;padding:2rem;gap:1.2rem;transition:.3s;box-shadow:-10px 0 30px rgba(15,23,42,.1)}
 .nav ul.open{right:0}
 .menu-btn{display:block}
}
CSS;
}

function siteJs() {
    return <<<JS
document.querySelector('.menu-btn').addEventListener('click',function(){document.querySelector('.nav ul').classList.toggle('open')});
document.querySelectorAll('.nav ul a').forEach(function(a){a.addEventListener('click',function(){document.querySelector('.nav ul').classList.remove('open')})});
var obs=new IntersectionObserver(function(es){es.forEach(function(e){if(e.isIntersecting){e.target.classList.add('in');obs.unobserve(e.target)}})},{threshold:.12});
document.querySelectorAll('.reveal').forEach(function(el){obs.observe(el)});
JS;
}

foreach ($data['products'] as $p) {
    $slug = $p['slug'];
    $dir = "$base/public/sites/$slug";
    @mkdir($dir, 0777, true);

    // copy cover image
    $cover = "$base/public/images/cards/$slug.jpg";
    if (file_exists($cover)) { copy($cover, "$dir/cover.jpg"); }

    // copy gallery images + build gallery HTML
    $galleryHtml = '';
    foreach (($galleries[$slug] ?? []) as $gi => $g) {
        $src = "$base/public/" . $g[0];
        $shot = 'shot' . ($gi + 1) . '.jpg';
        if (file_exists($src)) { copy($src, "$dir/$shot"); }
        $galleryHtml .= '<figure class="shot reveal"><img src="' . $shot . '" alt="' . e($g[1]) . '" loading="lazy"><figcaption>' . e($g[1]) . '</figcaption></figure>';
    }

    [$loginTitle, $idLabel] = $loginLabels[$slug] ?? ['User Login', 'User ID'];
    $name = e($p['name']);
    $tag = e($p['tagline']);
    $initial = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $p['name']), 0, 1));
    $css = sharedCss($p['gradient']);
    $js = siteJs();

    // hero stats
    $stats = '';
    foreach ($p['stats'] as $s) {
        $stats .= '<div><b>' . e($s['number']) . '</b><span>' . e($s['label']) . '</span></div>';
    }
    // benefits cards
    $benefits = '';
    foreach (array_slice($p['benefits'] ?? [], 0, 6) as $i => $b) {
        $benefits .= '<div class="card reveal"><div class="dot">' . ($i + 1) . '</div><h3>' . e($b['title']) . '</h3><p>' . e($b['text']) . '</p></div>';
    }
    // features checklist
    $features = '';
    foreach ($p['features'] as $f) { $features .= '<li>' . e($f) . '</li>'; }
    // steps
    $steps = '';
    foreach ($p['how_it_works'] ?? [] as $i => $s) {
        $steps .= '<div class="step reveal"><div class="step-n">' . ($i + 1) . '</div><div><h3>' . e($s['title']) . '</h3><p>' . e($s['text']) . '</p></div></div>';
    }
    // use cases
    $chips = '';
    foreach ($p['use_cases'] ?? [] as $u) { $chips .= '<span class="chip">' . e($u) . '</span>'; }
    // testimonial
    $quote = '';
    if (!empty($p['testimonial'])) {
        $t = $p['testimonial'];
        $quote = '<div class="quote reveal"><blockquote>“' . e($t['quote']) . '”</blockquote><div class="who"><b>' . e($t['author']) . '</b><span>' . e($t['role']) . ', ' . e($t['company']) . '</span></div></div>';
    }
    // faq
    $faq = '';
    foreach ($p['faq'] ?? [] as $q) {
        $faq .= '<details class="reveal"><summary>' . e($q['q']) . '</summary><p>' . e($q['a']) . '</p></details>';
    }
    // tech
    $tech = '';
    foreach ($p['tech'] as $t) { $tech .= '<span>' . e($t) . '</span>'; }

    $desc = e($p['description']);
    $long = e($p['long_description']);
    $category = e($p['category']);

    $index = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$name} — {$tag}</title>
<meta name="description" content="{$desc}">
<style>{$css}</style>
</head>
<body>
<header>
  <nav class="nav">
    <a href="#home" class="brand"><span class="brand-mark">{$initial}</span> {$name}</a>
    <ul id="menu">
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#features">Features</a></li>
      <li><a href="#how">How It Works</a></li>
      <li><a href="#gallery">Gallery</a></li>
      <li><a href="#faq">FAQ</a></li>
      <li><a href="#contact">Contact</a></li>
      <li><a href="login.html" class="btn btn-primary" style="padding:.55rem 1.2rem">{$loginTitle}</a></li>
    </ul>
    <button class="menu-btn" aria-label="Menu">☰</button>
  </nav>
</header>

<section class="hero" id="home">
  <div class="container hero-grid">
    <div>
      <div class="tag">{$category}</div>
      <h1>{$name}</h1>
      <p class="lead">{$tag}. {$desc}</p>
      <div class="hero-cta">
        <a href="login.html" class="btn btn-white">{$loginTitle}</a>
        <a href="#about" class="btn btn-ghost">Explore {$name}</a>
      </div>
      <div class="hero-stats">{$stats}</div>
    </div>
    <div class="hero-photo"><img src="cover.jpg" alt="{$name}"></div>
  </div>
</section>

<section id="about">
  <div class="container">
    <span class="sec-badge">About</span>
    <h2 class="sec-title">What is <span class="grad-text">{$name}</span>?</h2>
    <p class="sec-desc">{$long}</p>
    <div class="tech">{$tech}</div>
  </div>
</section>

<section id="why" style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container center">
    <span class="sec-badge">Why {$name}</span>
    <h2 class="sec-title">Built to Make a Difference</h2>
    <div class="cards" style="text-align:left">{$benefits}</div>
  </div>
</section>

<section id="features">
  <div class="container">
    <span class="sec-badge">Features</span>
    <h2 class="sec-title">Everything Included</h2>
    <ul class="checklist">{$features}</ul>
  </div>
</section>

<section id="how" style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">How It Works</span>
    <h2 class="sec-title">From Zero to Running</h2>
    <div class="steps">{$steps}</div>
  </div>
</section>

<section id="gallery">
  <div class="container center">
    <span class="sec-badge">In Action</span>
    <h2 class="sec-title">{$name} in the Real World</h2>
    <div class="shots">{$galleryHtml}</div>
  </div>
</section>

<section id="usecases" style="background:linear-gradient(180deg,#f6f8fc,#eef4ff)">
  <div class="container">
    <span class="sec-badge">Who It's For</span>
    <h2 class="sec-title">Perfect For</h2>
    <div class="chips">{$chips}</div>
    {$quote}
  </div>
</section>

<section id="faq" style="background:linear-gradient(180deg,#eef4ff,#f6f8fc)">
  <div class="container">
    <span class="sec-badge">FAQ</span>
    <h2 class="sec-title">Common Questions</h2>
    <div style="max-width:780px;margin-top:2rem">{$faq}</div>
  </div>
</section>

<section id="contact">
  <div class="container">
    <div class="cta-band reveal">
      <h2>Ready to get started with {$name}?</h2>
      <p>Call +91 80566 53499 · Email info@kasoftware.in — demo within 48 hours.</p>
      <a href="https://kasoftware.in/#contact" class="btn btn-white">Request a Demo</a>
    </div>
  </div>
</section>

<footer>
  <div class="container">
    © <span id="yr"></span> {$name} · A product of <a href="https://kasoftware.in/">KA Software</a>, Chennai, India
  </div>
</footer>

<script>
document.getElementById('yr').textContent = new Date().getFullYear();
{$js}
</script>
</body>
</html>
HTML;

    $login = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{$loginTitle} — {$name}</title>
<style>{$css}
.login-wrap{min-height:100vh;display:flex;align-items:center;justify-content:center;background:var(--pgrad);padding:1.5rem;position:relative;overflow:hidden}
.login-wrap::before,.login-wrap::after{content:'';position:absolute;border-radius:50%;background:rgba(255,255,255,.12);filter:blur(80px)}
.login-wrap::before{width:420px;height:420px;top:-140px;right:-100px}
.login-wrap::after{width:340px;height:340px;bottom:-120px;left:-80px}
.login-card{position:relative;z-index:1;width:100%;max-width:410px;background:rgba(255,255,255,.95);backdrop-filter:blur(16px);border-radius:1.5rem;padding:2.6rem 2.2rem;box-shadow:0 24px 60px rgba(11,18,32,.35);animation:up .7s cubic-bezier(.22,1,.36,1) both}
@keyframes up{from{opacity:0;transform:translateY(28px)}to{opacity:1;transform:none}}
.login-card .brand{justify-content:center;margin-bottom:.4rem}
.login-card h1{font-size:1.35rem;text-align:center;margin-bottom:.35rem}
.login-card .sub{text-align:center;color:var(--soft);font-size:.88rem;margin-bottom:1.8rem}
.field{margin-bottom:1.1rem}
.field label{display:block;font-size:.85rem;font-weight:600;color:#14203a;margin-bottom:.4rem}
.field input{width:100%;padding:.85rem 1rem;border:1px solid rgba(15,23,42,.14);border-radius:.9rem;font-size:.95rem;font-family:inherit;background:#f8fafc}
.field input:focus{outline:none;border-color:var(--blue);box-shadow:0 0 0 3px rgba(37,99,235,.12);background:#fff}
.err{display:none;background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;font-size:.86rem;padding:.7rem 1rem;border-radius:.8rem;margin-bottom:1.1rem}
.err.show{display:block;animation:shake .4s}
@keyframes shake{0%,100%{transform:translateX(0)}25%{transform:translateX(-7px)}75%{transform:translateX(7px)}}
.login-card .btn{width:100%}
.back{display:block;text-align:center;margin-top:1.4rem;font-size:.85rem;color:var(--soft)}
.back:hover{color:var(--blue)}
</style>
</head>
<body>
<div class="login-wrap">
  <div class="login-card">
    <a href="index.html" class="brand"><span class="brand-mark">{$initial}</span> {$name}</a>
    <h1>{$loginTitle}</h1>
    <p class="sub">Sign in to continue to {$name}</p>
    <div class="err" id="err">Invalid {$idLabel} or password. Please check your credentials and try again.</div>
    <form id="loginForm" autocomplete="off">
      <div class="field">
        <label for="uid">{$idLabel}</label>
        <input type="text" id="uid" placeholder="Enter your {$idLabel}" required>
      </div>
      <div class="field">
        <label for="pwd">Password</label>
        <input type="password" id="pwd" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
    <a class="back" href="index.html">← Back to {$name}</a>
  </div>
</div>
<script>
document.getElementById('loginForm').addEventListener('submit', function (e) {
    e.preventDefault();
    var btn = this.querySelector('button');
    var err = document.getElementById('err');
    err.classList.remove('show');
    btn.disabled = true;
    btn.textContent = 'Signing in...';
    setTimeout(function () {
        btn.disabled = false;
        btn.textContent = 'Sign In';
        err.classList.remove('show');
        void err.offsetWidth;
        err.classList.add('show');
        document.getElementById('pwd').value = '';
    }, 900);
});
</script>
</body>
</html>
HTML;

    file_put_contents("$dir/index.html", $index);
    file_put_contents("$dir/login.html", $login);
    echo $slug, " generated\n";
}
echo "All product sites generated.\n";
