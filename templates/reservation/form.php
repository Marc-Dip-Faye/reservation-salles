<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nouvelle réservation — UniSpace</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
:root{--bg:#f3ede3;--surface:#fffdf9;--surface-2:#faf6ee;--ink:#221a13;--ink-2:#57493c;--muted:#93867a;--line:#e2d7c5;--line-2:#efe8db;--accent:#a34e26;--accent-2:#8a3f1d;--accent-soft:#f5e2d4;--accent-ring:rgba(163,78,38,.25);--red:#b23c2a;--red-soft:#f8e3de;--shadow-sm:0 1px 2px rgba(34,26,19,.05),0 2px 8px rgba(34,26,19,.05);--font-ui:'Inter',system-ui,sans-serif;--font-display:'Fraunces',Georgia,serif}
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
.panel{background:var(--surface);border:1px solid var(--line-2);border-radius:18px;box-shadow:var(--shadow-sm);overflow:hidden;animation:rise .55s .08s cubic-bezier(.22,.8,.36,1) both}
.panel__head{display:flex;align-items:center;justify-content:space-between;gap:14px;flex-wrap:wrap;padding:18px 22px;border-bottom:1px solid var(--line-2)}
.panel__head h2{font:600 18px var(--font-display);letter-spacing:-.2px}
.panel__head p{font-size:12.5px;color:var(--muted);margin-top:2px}
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
.field.has-error input,.field.has-error select{border-color:var(--red);box-shadow:0 0 0 3px rgba(178,60,42,.15)}
.field-error{font-size:12px;font-weight:600;color:var(--red)}
.form-actions{display:flex;gap:12px;flex-wrap:wrap;padding:18px 22px;border-top:1px solid var(--line-2);background:var(--surface-2)}
@keyframes rise{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:none}}
@media (max-width:860px){.form-grid{grid-template-columns:1fr}.page-head{align-items:flex-start;flex-direction:column}.nav{margin-left:0;width:100%}}
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
        <p class="page-head__eyebrow">Planning</p>
        <h1>Créer une réservation</h1>
        <p class="page-head__sub">Les champs marqués d'un <span class="req">*</span> sont obligatoires.</p>
      </div>
      <div class="page-head__actions">
        <a class="btn btn--ghost" href="/reservations">Retour à la liste</a>
      </div>
    </div>

    <!-- Exemple avec erreur (décommenter pour tester) -->
    <!--
    <div class="alert alert--danger" role="alert">
      Le formulaire contient des erreurs. Veuillez corriger les champs signalés ci-dessous.
    </div>
    -->

    <form class="panel" method="post" action="/reservations" novalidate>
      <div class="panel__head">
        <div>
          <h2>Détails de la réservation</h2>
          <p>Salle, créneau et demandeur</p>
        </div>
      </div>

      <div class="form-grid">
        <div class="field">
          <label for="salle_id">Salle <span class="req">*</span></label>
          <select id="salle_id" name="salle_id" required>
            <option value="">— Sélectionner une salle —</option>
            <option value="1" selected>Amphi Turing (Bâtiment A)</option>
            <option value="2">Salle Info Linux (Bâtiment B)</option>
            <option value="3">Laboratoire Bio-Santé (Bâtiment C)</option>
            <option value="4">Salle de Séminaire (Bâtiment A)</option>
            <option value="5">Espace Réunion Décanat (Bâtiment D)</option>
            <option value="6">Ancienne Salle d'Archives (Bâtiment D)</option>
          </select>
        </div>

        <div class="field">
          <label for="responsable">Responsable <span class="req">*</span></label>
          <input id="responsable" name="responsable" type="text" value="Prof. Marc Vasseur" placeholder="Ex. : Prof. Marc Vasseur" required>
        </div>

        <div class="field">
          <label for="email">Email <span class="req">*</span></label>
          <input id="email" name="email" type="email" value="m.vasseur@universite.fr" placeholder="ex. : m.vasseur@universite.fr" required>
        </div>

        <div class="field">
          <label for="motif">Motif <span class="req">*</span></label>
          <input id="motif" name="motif" type="text" value="Cours de littérature L3" placeholder="Ex. : Cours de littérature L3" required>
        </div>

        <div class="field">
          <label for="date_debut">Date de début <span class="req">*</span></label>
          <input id="date_debut" name="date_debut" type="datetime-local" value="2025-03-27T14:00" required>
        </div>

        <div class="field">
          <label for="date_fin">Date de fin <span class="req">*</span></label>
          <input id="date_fin" name="date_fin" type="datetime-local" value="2025-03-27T18:00" required>
        </div>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn--primary">Créer la réservation</button>
        <a class="btn btn--ghost" href="/reservations">Annuler</a>
      </div>
    </form>

  </div>
</main>

<footer class="footer">
  <p>© 2025 UniSpace — Application de gestion des salles &amp; réservations</p>
  <p>Semestre Printemps 2025</p>
</footer>

</body>
</html>