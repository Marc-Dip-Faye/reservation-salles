<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Détail réservation — UniSpace</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#f3ede3;--surface:#fffdf9;--surface-2:#faf6ee;--ink:#221a13;--ink-2:#57493c;--muted:#93867a;--line:#e2d7c5;--line-2:#efe8db;--accent:#a34e26;--accent-2:#8a3f1d;--accent-soft:#f5e2d4;--accent-ring:rgba(163,78,38,.25);--green:#2e7b4f;--green-soft:#e2f1e6;--red:#b23c2a;--shadow-sm:0 1px 2px rgba(34,26,19,.05),0 2px 8px rgba(34,26,19,.05);--shadow-md:0 2px 4px rgba(34,26,19,.06),0 16px 34px -16px rgba(34,26,19,.22);--font-ui:'Inter',system-ui,sans-serif;--font-display:'Fraunces',Georgia,serif}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{font:400 14px/1.55 var(--font-ui);color:var(--ink);min-height:100vh;display:flex;flex-direction:column;background:radial-gradient(1100px 500px at 90% -10%,#fbf7ef 0%,transparent 60%),var(--bg);-webkit-font-smoothing:antialiased}
button{font:inherit;color:inherit}
a{color:inherit;text-decoration:none}
::selection{background:var(--accent-soft);color:var(--accent-2)}
:focus-visible{outline:2px solid var(--accent);outline-offset:2px;border-radius:6px}
.topbar{position:sticky;top:0;z-index:40;background:rgba(250,246,238,.85);-webkit-backdrop-filter:blur(12px);backdrop-filter:blur(12px);border-bottom:1px solid var(--line-2)}
.topbar__in{display:flex;align-items:center;gap:18px;flex-wrap:wrap;padding:12px clamp(20px,4vw,44px)}
.brand{display:flex;align-items:center;gap:11px}
.brand__logo{width:40px;height:40px;border-radius:12px;display:grid;place-items:center;color:#fff;background:linear-gradient(140deg,#c06a35,#8a3f1d);box-shadow:inset 0 1px 0 rgba(255,255,255,.25),0 6px 14px -6px rgba(192,106,53,.55)}
.brand__logo svg{width:21px;height:21px}
.brand__txt{display:flex;flex-direction:column;line-height:1.2}
.brand__txt strong{font:600 16px var(--font-display);letter-spacing:.2px}
.brand__txt span{font-size:10.5px;letter-spacing:.12em;text-transform:uppercase;color:var(--muted)}
.nav{display:flex;gap:6px;margin-left:auto;flex-wrap:wrap}
.nav__link{padding:9px 15px;border-radius:999px;font-size:13.5px;font-weight:600;color:var(--ink-2);transition:.18s}
.nav__link:hover{background:var(--surface);color:var(--ink);box-shadow:var(--shadow-sm)}
.nav__link.is-active{background:linear-gradient(180deg,#b25a2c,#93431d);color:#fff;box-shadow:0 6px 14px -6px var(--accent-ring)}
.main{flex:1;width:100%;padding:30px clamp(20px,4vw,44px) 48px}
.container{display:flex;flex-direction:column;gap:22px;width:100%}
.footer{display:flex;justify-content:space-between;gap:12px;flex-wrap:wrap;padding:16px clamp(20px,4vw,44px);border-top:1px solid var(--line-2);background:var(--surface);color:var(--muted);font-size:12.5px}
.page-head{display:flex;align-items:flex-end;justify-content:space-between;gap:18px;flex-wrap:wrap;animation:rise .5s cubic-bezier(.22,.8,.36,1) both}
.page-head__eyebrow{font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent-2)}
.page-head h1{font:600 32px/1.15 var(--font-display);letter-spacing:-.4px;margin:5px 0 3px}
.page-head__sub{color:var(--muted);font-size:13px}
.page-head__actions{display:flex;gap:10px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:8px;cursor:pointer;font:600 13.5px var(--font-ui);padding:10px 17px;border-radius:12px;border:1px solid transparent;transition:transform .18s,box-shadow .18s,border-color .18s}
.btn:hover{transform:translateY(-1px)}
.btn--primary{background:linear-gradient(180deg,#b25a2c,#93431d);color:#fff;box-shadow:0 8px 18px -8px var(--accent-ring),inset 0 1px 0 rgba(255,255,255,.2)}
.btn--ghost{background:var(--surface);border-color:var(--line);color:var(--ink-2);box-shadow:var(--shadow-sm)}
.btn--ghost:hover{border-color:#d3c5ae;color:var(--ink)}
.btn--danger{background:linear-gradient(180deg,#c4492f,#a33520);color:#fff;box-shadow:0 8px 18px -8px rgba(178,60,42,.4)}
.panel{background:var(--surface);border:1px solid var(--line-2);border-radius:18px;box-shadow:var(--shadow-sm);overflow:hidden;animation:rise .55s .08s cubic-bezier(.22,.8,.36,1) both}
.panel__head{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;padding:18px 22px;border-bottom:1px solid var(--line-2)}
.panel__head h2{font:600 18px var(--font-display);letter-spacing:-.2px}
.panel__head p{font-size:12.5px;color:var(--muted);margin-top:2px}
.detail{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;padding:22px}
.detail__item{background:var(--surface-2);border:1px solid var(--line-2);border-radius:14px;padding:14px 16px}
.detail__label{font-size:10.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.detail__value{margin-top:6px;font-size:15px;font-weight:600;color:var(--ink);display:flex;align-items:center;gap:8px;flex-wrap:wrap;overflow-wrap:anywhere}
.badge{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:700;padding:5px 11px;border-radius:999px;white-space:nowrap}
.badge::before{content:"";width:6px;height:6px;border-radius:50%;background:currentColor}
.badge--ok{background:var(--green-soft);color:var(--green)}
.form-actions{display:flex;gap:12px;flex-wrap:wrap;padding:18px 22px;border-top:1px solid var(--line-2);background:var(--surface-2)}
@keyframes rise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@media (max-width:860px){.page-head{align-items:flex-start;flex-direction:column}.nav{margin-left:0;width:100%}.detail{grid-template-columns:1fr}}
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
      <a class="nav__link is-active" href="/reservations">Réservations</a>
    </nav>
  </div>
</header>

<main class="main">
  <div class="container">

    <div class="page-head">
      <div>
        <p class="page-head__eyebrow">Fiche réservation</p>
        <h1>Réservation #1</h1>
        <p class="page-head__sub">Amphi Turing</p>
      </div>
      <div class="page-head__actions">
        <a class="btn btn--ghost" href="/reservations">Retour à la liste</a>
      </div>
    </div>

    <section class="panel">
      <div class="panel__head">
        <div>
          <h2>Informations de la réservation</h2>
          <p>Détails du créneau et du demandeur</p>
        </div>
        <span class="badge badge--ok">Confirmée</span>
      </div>

      <div class="detail">
        <div class="detail__item">
          <p class="detail__label">Salle</p>
          <p class="detail__value">Amphi Turing</p>
        </div>
        <div class="detail__item">
          <p class="detail__label">Responsable</p>
          <p class="detail__value">Prof. Marc Vasseur</p>
        </div>
        <div class="detail__item">
          <p class="detail__label">Email</p>
          <p class="detail__value"><a href="mailto:m.vasseur@universite.fr" style="color:var(--accent-2);text-decoration:underline">m.vasseur@universite.fr</a></p>
        </div>
        <div class="detail__item">
          <p class="detail__label">Date de début</p>
          <p class="detail__value">27/03/2025 14:00</p>
        </div>
        <div class="detail__item">
          <p class="detail__label">Date de fin</p>
          <p class="detail__value">27/03/2025 18:00</p>
        </div>
        <div class="detail__item" style="grid-column:1/-1">
          <p class="detail__label">Motif</p>
          <p class="detail__value" style="font-weight:500">Cours de littérature comparée L3</p>
        </div>
      </div>

      <form class="form-actions" method="post" action="/reservations/1/cancel" onsubmit="return confirm('Confirmer l\'annulation de cette réservation ?');">
        <button type="submit" class="btn btn--danger">Annuler la réservation</button>
      </form>
    </section>

  </div>
</main>

<footer class="footer">
  <p>© 2025 UniSpace — Application de gestion des salles &amp; réservations</p>
  <p>Semestre Printemps 2025</p>
</footer>

</body>
</html>