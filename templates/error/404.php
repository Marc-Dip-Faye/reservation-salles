<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Page introuvable — UniSpace</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#f3ede3;--surface:#fffdf9;--accent:#a34e26;--accent-2:#8a3f1d;--accent-soft:#f5e2d4;--accent-ring:rgba(163,78,38,.25);--muted:#93867a;--font-ui:'Inter',system-ui,sans-serif;--font-display:'Fraunces',Georgia,serif}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font:400 14px/1.55 var(--font-ui);color:#221a13;min-height:100vh;display:flex;flex-direction:column;background:radial-gradient(1100px 500px at 90% -10%,#fbf7ef 0%,transparent 60%),var(--bg);-webkit-font-smoothing:antialiased}
a{color:inherit;text-decoration:none}
:focus-visible{outline:2px solid var(--accent);outline-offset:2px;border-radius:6px}
.topbar{position:sticky;top:0;z-index:40;background:rgba(250,246,238,.85);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);border-bottom:1px solid #efe8db}
.topbar__in{display:flex;align-items:center;gap:18px;flex-wrap:wrap;padding:12px clamp(20px,4vw,44px)}
.brand{display:flex;align-items:center;gap:11px}
.brand__logo{width:40px;height:40px;border-radius:12px;display:grid;place-items:center;color:#fff;background:linear-gradient(140deg,#c06a35,#8a3f1d);box-shadow:inset 0 1px 0 rgba(255,255,255,.25),0 6px 14px -6px rgba(192,106,53,.55)}
.brand__logo svg{width:21px;height:21px}
.brand__txt{display:flex;flex-direction:column;line-height:1.2}
.brand__txt strong{font:600 16px var(--font-display);letter-spacing:.2px}
.brand__txt span{font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.nav{display:flex;gap:6px;margin-left:auto;flex-wrap:wrap}
.nav__link{padding:9px 15px;border-radius:999px;font-size:13.5px;font-weight:600;color:#57493c;transition:.18s}
.nav__link:hover{background:var(--surface);box-shadow:0 1px 2px rgba(34,26,19,.05),0 2px 8px rgba(34,26,19,.05)}
.main{flex:1;width:100%;padding:30px clamp(20px,4vw,44px) 48px}
.container{display:flex;flex-direction:column;gap:22px;width:100%}
.footer{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;padding:16px clamp(20px,4vw,44px);border-top:1px solid #efe8db;background:var(--surface);color:var(--muted);font-size:12.5px}
.error-hero{max-width:620px;margin:5vh auto;text-align:center;display:flex;flex-direction:column;align-items:center;gap:14px;animation:rise .55s cubic-bezier(.22,.8,.36,1) both}
.error-hero__code{font:700 92px/1 var(--font-display);letter-spacing:-3px;color:var(--accent)}
.error-hero h1{font:600 26px var(--font-display)}
.error-hero p{color:var(--muted);font-size:14px;max-width:46ch}
.btn{display:inline-flex;align-items:center;gap:8px;cursor:pointer;font:600 13.5px var(--font-ui);padding:10px 17px;border-radius:12px;border:1px solid transparent;transition:transform .18s,box-shadow .18s}
.btn:hover{transform:translateY(-1px)}
.btn--primary{background:linear-gradient(180deg,#b25a2c,#93431d);color:#fff;box-shadow:0 8px 18px -8px var(--accent-ring),inset 0 1px 0 rgba(255,255,255,.2)}
@keyframes rise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@media (max-width:860px){.nav{margin-left:0;width:100%}}
</style>
</head>
<body>

<header class="topbar">
  <div class="topbar__in">
    <a class="brand" href="/">
      <span class="brand__logo"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 4 10 5-10 5L2 9z"/><path d="M6 11.5V16c0 1.6 2.7 3 6 3s6-1.4 6-3v-4.5"/></svg></span>
      <span class="brand__txt"><strong>UniSpace</strong><span>Salles &amp; réservations</span></span>
    </a>
    <nav class="nav">
      <a class="nav__link" href="/">Accueil</a>
      <a class="nav__link" href="/salles">Salles</a>
      <a class="nav__link" href="/reservations">Réservations</a>
    </nav>
  </div>
</header>

<main class="main">
  <div class="container">
    <section class="error-hero">
      <p class="error-hero__code">404</p>
      <h1>Page introuvable</h1>
      <p>La page que vous recherchez n'existe pas, a été déplacée ou n'est plus disponible.</p>
      <a class="btn btn--primary" href="/">Retour à l'accueil</a>
    </section>
  </div>
</main>

<footer class="footer">
  <p>© 2025 UniSpace — Application de gestion des salles &amp; réservations</p>
  <p>Semestre Printemps 2025</p>
</footer>

</body>
</html>