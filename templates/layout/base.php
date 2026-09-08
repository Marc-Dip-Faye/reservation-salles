<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>UniSpace — Accueil</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{
  --bg:#f3ede3; --surface:#fffdf9; --surface-2:#faf6ee;
  --ink:#221a13; --ink-2:#57493c; --muted:#93867a;
  --line:#e2d7c5; --line-2:#efe8db;
  --accent:#a34e26; --accent-2:#8a3f1d; --accent-soft:#f5e2d4; --accent-ring:rgba(163,78,38,.25);
  --green:#2e7b4f; --green-soft:#e2f1e6;
  --amber:#96660f; --amber-soft:#f6ead0;
  --red:#b23c2a;  --red-soft:#f8e3de;
  --shadow-sm:0 1px 2px rgba(34,26,19,.05),0 2px 8px rgba(34,26,19,.05);
  --shadow-md:0 2px 4px rgba(34,26,19,.06),0 16px 34px -16px rgba(34,26,19,.22);
  --font-ui:'Inter',system-ui,sans-serif;
  --font-display:'Fraunces',Georgia,serif;
}
*,*::before,*::after{margin:0;padding:0;box-sizing:border-box}
html{scroll-behavior:smooth}
body{
  font:400 14px/1.55 var(--font-ui);color:var(--ink);min-height:100vh;display:flex;flex-direction:column;
  background:radial-gradient(1100px 500px at 90% -10%,#fbf7ef 0%,transparent 60%),var(--bg);
  -webkit-font-smoothing:antialiased;
}
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
.btn--sm{padding:7px 12px;font-size:12px;border-radius:10px}

.panel{background:var(--surface);border:1px solid var(--line-2);border-radius:18px;box-shadow:var(--shadow-sm);overflow:hidden;animation:rise .55s .08s cubic-bezier(.22,.8,.36,1) both}
.panel__head{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;padding:18px 22px;border-bottom:1px solid var(--line-2)}
.panel__head h2{font:600 18px var(--font-display);letter-spacing:-.2px}
.panel__head p{font-size:12.5px;color:var(--muted);margin-top:2px}
.table-wrap{overflow-x:auto}
table{width:100%;border-collapse:collapse;min-width:760px}
thead th{text-align:left;font-size:10.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);background:var(--surface-2);padding:12px 22px;border-bottom:1px solid var(--line-2)}
tbody td{padding:14px 22px;border-bottom:1px solid var(--line-2);font-size:13.5px;color:var(--ink-2);vertical-align:middle}
tbody tr:last-child td{border-bottom:0}
tbody tr{transition:background .15s}
tbody tr:hover{background:#fbf7ef}
.th-right{text-align:right}
.cell-strong{font-weight:700;color:var(--ink)}
.cell-clamp{max-width:260px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.row-actions{display:flex;gap:8px;justify-content:flex-end;flex-wrap:wrap}
.tag{display:inline-block;font-size:11px;font-weight:600;color:var(--ink-2);background:var(--surface-2);border:1px solid var(--line-2);padding:4px 10px;border-radius:8px}
.badge{display:inline-flex;align-items:center;gap:6px;font-size:11px;font-weight:700;padding:5px 11px;border-radius:999px;white-space:nowrap}
.badge::before{content:"";width:6px;height:6px;border-radius:50%;background:currentColor}
.badge--ok{background:var(--green-soft);color:var(--green)}
.badge--warn{background:var(--amber-soft);color:var(--amber)}
.badge--danger{background:var(--red-soft);color:var(--red)}
.badge--neutral{background:#ece7dd;color:#6f6252}
.empty{display:flex;flex-direction:column;align-items:center;gap:14px;padding:52px 24px;text-align:center;color:var(--muted);font-size:13.5px}

.detail{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:16px;padding:22px}
.detail__item{background:var(--surface-2);border:1px solid var(--line-2);border-radius:14px;padding:14px 16px}
.detail__label{font-size:10.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted)}
.detail__value{margin-top:6px;font-size:15px;font-weight:600;color:var(--ink);display:flex;align-items:center;gap:8px;flex-wrap:wrap;overflow-wrap:anywhere}

.alert{display:flex;align-items:center;gap:10px;border-radius:14px;padding:13px 16px;font-size:13px;font-weight:600}
.alert--danger{background:var(--red-soft);color:var(--red);border:1px solid #ecc9c0}
.form-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;padding:22px}
.field{display:flex;flex-direction:column;gap:7px}
.field--full{grid-column:1/-1}
.field label{font-size:12.5px;font-weight:600;color:var(--ink-2)}
.req{color:var(--red)}
.field input,.field select,.field textarea{width:100%;font:400 14px var(--font-ui);color:var(--ink);background:#fff;border:1px solid var(--line);border-radius:12px;padding:10px 14px;transition:border-color .18s,box-shadow .18s}
.field textarea{min-height:110px;resize:vertical}
.field input:focus,.field select:focus,.field textarea:focus{outline:none;border-color:var(--accent);box-shadow:0 0 0 3px var(--accent-ring)}
.field.has-error input,.field.has-error select,.field.has-error textarea{border-color:var(--red);box-shadow:0 0 0 3px rgba(178,60,42,.15)}
.field-error{font-size:12px;font-weight:600;color:var(--red)}
.check{display:flex;align-items:center;gap:10px;cursor:pointer;font-size:13.5px;font-weight:600;color:var(--ink-2)}
.check input{width:18px;height:18px;accent-color:var(--accent);cursor:pointer}
.form-actions{display:flex;gap:12px;flex-wrap:wrap;padding:18px 22px;border-top:1px solid var(--line-2);background:var(--surface-2)}

.error-hero{max-width:620px;margin:5vh auto;text-align:center;display:flex;flex-direction:column;align-items:center;gap:14px;animation:rise .55s cubic-bezier(.22,.8,.36,1) both}
.error-hero__code{font:700 92px/1 var(--font-display);letter-spacing:-3px;color:var(--accent)}
.error-hero h1{font:600 26px var(--font-display)}
.error-hero p{color:var(--muted);font-size:14px;max-width:46ch}

.stats{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:18px}
.stat{position:relative;overflow:hidden;background:var(--surface);border:1px solid var(--line-2);border-radius:18px;padding:20px;box-shadow:var(--shadow-sm);transition:transform .2s,box-shadow .2s}
.stat:hover{transform:translateY(-2px);box-shadow:var(--shadow-md)}
.stat__label{font-size:12px;font-weight:600;color:var(--ink-2)}
.stat__value{font:600 34px/1 var(--font-display);letter-spacing:-.5px;margin:10px 0 6px}
.stat__value span{font:500 12px var(--font-ui);color:var(--muted);margin-left:5px}
.stat__foot{font-size:11.5px;color:var(--muted)}

@keyframes rise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@media (max-width:860px){
  .form-grid{grid-template-columns:1fr}
  .detail{grid-template-columns:1fr}
  .page-head{align-items:flex-start;flex-direction:column}
  .nav{margin-left:0;width:100%}
  .row-actions{justify-content:flex-start}
  .stats{grid-template-columns:1fr 1fr}
}
</style>
</head>
<body>

<header class="topbar">
  <div class="topbar__in">
    <a class="brand" href="/">
      <span class="brand__logo">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m12 4 10 5-10 5L2 9z"/><path d="M6 11.5V16c0 1.6 2.7 3 6 3s6-1.4 6-3v-4.5"/></svg>
      </span>
      <span class="brand__txt"><strong>UniSpace</strong><span>Salles &amp; réservations</span></span>
    </a>
    <nav class="nav" aria-label="Navigation principale">
      <a class="nav__link is-active" href="/">Accueil</a>
      <a class="nav__link" href="/salles">Salles</a>
      <a class="nav__link" href="/reservations">Réservations</a>
    </nav>
  </div>
</header>

<main class="main">
  <div class="container">

    <div class="page-head">
      <div>
        <p class="page-head__eyebrow">Tableau de bord</p>
        <h1>Bienvenue sur UniSpace</h1>
        <p class="page-head__sub">Gérez vos salles et vos réservations en un coup d'œil.</p>
      </div>
    </div>

    <section class="stats">
      <div class="stat">
        <p class="stat__label">Salles</p>
        <p class="stat__value">12 <span>au total</span></p>
        <p class="stat__foot">9 actives</p>
      </div>
      <div class="stat">
        <p class="stat__label">Réservations</p>
        <p class="stat__value">24 <span>cette semaine</span></p>
        <p class="stat__foot">3 en attente</p>
      </div>
      <div class="stat">
        <p class="stat__label">Taux d'occupation</p>
        <p class="stat__value">78<span>%</span></p>
        <p class="stat__foot">+5% vs semaine dernière</p>
      </div>
      <div class="stat">
        <p class="stat__label">Bâtiments</p>
        <p class="stat__value">4</p>
        <p class="stat__foot">A, B, C, D</p>
      </div>
    </section>

    <section class="panel">
      <div class="panel__head">
        <div>
          <h2>Actions rapides</h2>
          <p>Accédez aux fonctionnalités principales</p>
        </div>
      </div>
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:16px;padding:22px">
        <a class="btn btn--primary" href="/salles">📋 Voir les salles</a>
        <a class="btn btn--ghost" href="/salles/create">➕ Ajouter une salle</a>
        <a class="btn btn--ghost" href="/reservations">📅 Voir les réservations</a>
        <a class="btn btn--ghost" href="/reservations/create"> Créer une réservation</a>
      </div>
    </section>

  </div>
</main>

<footer class="footer">
  <p>© 2025 UniSpace — Application de gestion des salles &amp; réservations</p>
  <p>Semestre Printemps 2025</p>
</footer>

</body>
</html>