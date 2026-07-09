<section class="dispatch-hero">

  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hazard-rule" aria-hidden="true"></div>

  <div class="container position-relative" style="z-index:2;">
    <div class="row align-items-center gy-5">

      <!-- LEFT: copy -->
      <div class="col-lg-7">

        <span class="eyebrow mb-4"><img src="{{ url('assets/img/icons/cargo-truck.png') }}" alt=""> Transport &amp; Logistics Training</span>

        <h1 class="headline">Trained here.<br>Dispatched anywhere.</h1>

        <p class="lede">
          Practical training, recognised certification and placement support
          that moves you from classroom to cab — into jobs across India and abroad.
        </p>

        <div class="manifest-list mb-4">

          <div class="d-flex align-items-start gap-3 manifest-line">
          
            <i class="fas fa-truck-moving"></i>
            <div>
              <h4>Truck Dispatch</h4>
              <p>Freight coordination, load planning, customer handling and dispatch operations.</p>
            </div>
          </div>

          <div class="d-flex align-items-start gap-3 manifest-line">
           
            <i class="fas fa-truck"></i>
            <div>
              <h4>HTV Trailer Training</h4>
              <p>Professional heavy-vehicle driving with hands-on road training and industry guidance.</p>
            </div>
          </div>

        </div>

        <div class="d-flex flex-wrap gap-2 mb-4">
          <span class="badge stamp-badge"><i class="fas fa-check me-1"></i>Practical Training</span>
          <span class="badge stamp-badge"><i class="fas fa-check me-1"></i>Placement Support</span>
          <span class="badge stamp-badge"><i class="fas fa-check me-1"></i>Industry Certification</span>
          <span class="badge stamp-badge"><i class="fas fa-check me-1"></i>Overseas Opportunities</span>
        </div>

      

        <div class="d-flex flex-wrap gap-4">
          <span class="career-badge"><i class="fas fa-university"></i> Government Jobs</span>
          <span class="career-badge"><i class="fas fa-globe"></i> Overseas Careers</span>
        </div>

      </div>

      <!-- RIGHT: signature dispatch board -->
      <div class="col-lg-5">
        <div class="dispatch-board">

          <div class="verified-stamp">VERIFIED<br><span>Industry Certified</span></div>

          <div class="d-flex align-items-center justify-content-between board-header">
            <span class="d-flex align-items-center gap-2">
              <span class="live-dot"></span> LIVE DISPATCH BOARD
            </span>
            <span class="board-clock" id="boardClock">--:--:--</span>
          </div>

          <div class="ticker-wrap mb-3">
            <i class="fas fa-satellite-dish me-2"></i>
            <span class="ticker-text" id="tickerText">Batch #24 &rarr; Departing for Germany</span>
          </div>

          <div class="route-track">
            <div class="track-line"></div>
            <div class="track-line-fill"></div>
            <div class="track-truck"><i class="fas fa-truck"></i></div>

            <div class="stop stop--1">
              <span class="stop-dot"></span>
              <span class="stop-label">Enroll</span>
            </div>
            <div class="stop stop--2">
              <span class="stop-dot"></span>
              <span class="stop-label">Train</span>
            </div>
            <div class="stop stop--3">
              <span class="stop-dot"></span>
              <span class="stop-label">Certify</span>
            </div>
            <div class="stop stop--4">
              <span class="stop-dot"></span>
              <span class="stop-label">Dispatch</span>
            </div>
            <div class="stop stop--5 stop--overseas">
              <span class="stop-dot"></span>
              <span class="stop-label">Overseas</span>
            </div>
          </div>

          <div class="d-flex board-stats">
            <div>
              <span class="stat-num">500+</span>
              <span class="stat-label">Trainees Placed</span>
            </div>
            <div>
              <span class="stat-num">12+</span>
              <span class="stat-label">Countries Hiring</span>
            </div>
            <div>
              <span class="stat-num" id="liveCount">03</span>
              <span class="stat-label">In Transit Now</span>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>

</section>

<style>
.dispatch-hero{
  --bg-asphalt:#1B1D22;
  --bg-panel:#242933;
  --bg-panel-edge:#323947;
  --amber:#FFB020;
  --steel:#6FA8DC;
  --text-hi:#F3F4F6;
  --text-mu:#9AA1AF;


  position:relative;
  overflow:hidden;
  background:var(--bg-asphalt);
  padding:110px 0 90px;
  font-family:var(--font-body);
}

.dispatch-hero .hero-bg{
  position:absolute; inset:0;
  background:url('assets/img/bg/trailer-bg.png') center/cover no-repeat;
  opacity:.35;
  transform:scale(1.06);
}

.dispatch-hero .hero-overlay{
  position:absolute; inset:0;
  background:linear-gradient(100deg, rgba(27,29,34,.97) 30%, rgba(27,29,34,.75) 65%, rgba(27,29,34,.55));
}

.hazard-rule{
  position:absolute; top:0; left:0; right:0; height:6px;
  background:repeating-linear-gradient(135deg, var(--amber) 0 18px, #1B1D22 18px 36px);
  opacity:.9;
}

/* ---------- copy ---------- */
.eyebrow{
  display:inline-flex; align-items:center; gap:8px;
  font-family:var(--font-mono);
  font-size:12.5px; letter-spacing:.14em; text-transform:uppercase;
  color:var(--amber);
  border:1px solid rgba(255,176,32,.35);
  background:rgba(255,176,32,.08);
  padding:7px 14px; border-radius:3px;
}

.headline{
  font-family:var(--font-display);
  font-weight:700;
  font-size:56px;
  line-height:1.08;
  color:var(--text-hi);
  margin:22px 0;
  text-transform:uppercase;
}

.lede{
  color:var(--text-mu);
  font-size:17px;
  line-height:1.75;
  max-width:520px;
  margin-bottom:36px;
}

.manifest-list{ border-top:1px solid rgba(255,255,255,.1); }

.manifest-line{
  padding:20px 4px;
  border-bottom:1px solid rgba(255,255,255,.1);
}

.route-code{
  font-family:var(--font-mono);
  font-size:12px;
  color:var(--amber);
  min-width:38px;
  padding-top:3px;
}

.manifest-line > i{ color:var(--steel); font-size:19px; padding-top:2px; }

.manifest-line h4{
  font-family:var(--font-display);
  color:var(--text-hi);
  font-size:18px;
  letter-spacing:.02em;
  text-transform:uppercase;
  margin:0 0 6px;
}

.manifest-line p{ color:var(--text-mu); font-size:14px; line-height:1.6; margin:0; }

.stamp-badge{
  font-size:13px; font-weight:500;
  color:var(--text-hi);
  background:transparent;
  border:1px solid rgba(255,255,255,.18);
  border-radius:20px;
  padding:8px 14px;
}
.stamp-badge i{ color:var(--amber); font-size:11px; }

.btn-amber{
  background:var(--amber);
  color:#1B1D22;
  border:none;
  font-weight:600;
  border-radius:3px;
}
.btn-amber:hover{ background:#ffc659; color:#1B1D22; }

.btn-outline-light{ border-radius:3px; font-weight:600; }
.btn-outline-light:hover{ border-color:var(--amber); color:var(--amber); background:transparent; }

.career-badge{ font-size:13px; color:var(--text-mu); display:flex; align-items:center; gap:8px; }
.career-badge i{ color:var(--steel); }

/* ---------- dispatch board (signature, enhanced) ---------- */
.dispatch-board{
  position:relative;
  background:
    radial-gradient(circle at 100% 0%, rgba(111,168,220,.08), transparent 45%),
    var(--bg-panel);
  border:1px solid var(--bg-panel-edge);
  border-radius:8px;
  padding:28px 26px 24px;
  box-shadow:0 0 0 1px rgba(255,176,32,.05), 0 30px 60px -25px rgba(0,0,0,.6);
}

.dispatch-board::before,
.dispatch-board::after{
  content:'';
  position:absolute;
  width:16px; height:16px;
  border:2px solid rgba(255,176,32,.35);
}
.dispatch-board::before{ top:-1px; left:-1px; border-right:none; border-bottom:none; }
.dispatch-board::after{ bottom:-1px; right:-1px; border-left:none; border-top:none; }

.board-header{
  font-family:var(--font-mono);
  font-size:12px;
  letter-spacing:.12em;
  color:var(--text-mu);
  padding-bottom:16px;
  margin-bottom:14px;
  border-bottom:1px dashed rgba(255,255,255,.15);
}

.board-clock{
  font-variant-numeric:tabular-nums;
  color:var(--steel);
}

.live-dot{
  width:8px; height:8px; border-radius:50%;
  background:var(--amber);
  display:inline-block;
  box-shadow:0 0 0 0 rgba(255,176,32,.6);
  animation:pulse 2.2s infinite;
}

@keyframes pulse{
  0%{ box-shadow:0 0 0 0 rgba(255,176,32,.55); }
  70%{ box-shadow:0 0 0 8px rgba(255,176,32,0); }
  100%{ box-shadow:0 0 0 0 rgba(255,176,32,0); }
}

.ticker-wrap{
  font-family:var(--font-mono);
  font-size:12px;
  color:var(--text-mu);
  background:rgba(0,0,0,.25);
  border:1px solid rgba(255,255,255,.08);
  border-radius:4px;
  padding:9px 12px;
  overflow:hidden;
  white-space:nowrap;
}
.ticker-wrap i{ color:var(--steel); }

.ticker-text{
  display:inline-block;
  animation:tickerFade 4s ease-in-out infinite;
}
@keyframes tickerFade{
  0%{ opacity:0; transform:translateY(4px); }
  10%{ opacity:1; transform:translateY(0); }
  85%{ opacity:1; }
  100%{ opacity:0; transform:translateY(-4px); }
}

.route-track{ position:relative; height:150px; margin-bottom:22px; }

.track-line{
  position:absolute; top:50%; left:0; right:0; height:2px;
  background:repeating-linear-gradient(90deg, rgba(255,255,255,.22) 0 8px, transparent 8px 16px);
  transform:translateY(-50%);
}

.track-line-fill{
  position:absolute; top:50%; left:0; height:2px;
  background:linear-gradient(90deg, var(--steel), var(--amber));
  transform:translateY(-50%);
  width:2%;
  animation:fillTravel 9s ease-in-out infinite;
  filter:drop-shadow(0 0 4px rgba(255,176,32,.5));
}
@keyframes fillTravel{
  0%{ width:2%; }
  45%{ width:78%; }
  55%{ width:78%; }
  100%{ width:2%; }
}

.track-truck{
  position:absolute; top:50%; left:0;
  transform:translate(-50%,-60%);
  color:var(--amber);
  font-size:20px;
  animation:travel 9s ease-in-out infinite;
  filter:drop-shadow(0 2px 4px rgba(255,176,32,.4));
}
@keyframes travel{
  0%{ left:2%; transform:translate(-50%,-60%) rotate(0deg); }
  3%{ transform:translate(-50%,-64%) rotate(-4deg); }
  6%{ transform:translate(-50%,-60%) rotate(0deg); }
  45%{ left:78%; }
  55%{ left:78%; }
  100%{ left:2%; }
}

.stop{ position:absolute; top:50%; transform:translate(-50%,-50%); display:flex; flex-direction:column; align-items:center; gap:9px; }

.stop-dot{
  width:11px; height:11px; border-radius:50%;
  background:var(--bg-panel);
  border:2px solid var(--steel);
  animation:lightUp 9s ease-in-out infinite;
}
.stop--1 .stop-dot{ animation-delay:0s; }
.stop--2 .stop-dot{ animation-delay:1.6s; }
.stop--3 .stop-dot{ animation-delay:3.2s; }
.stop--4 .stop-dot{ animation-delay:4.5s; }
.stop--5 .stop-dot{ animation-delay:5.8s; }

@keyframes lightUp{
  0%,3%{ background:var(--bg-panel); box-shadow:none; }
  6%,90%{ background:var(--amber); border-color:var(--amber); box-shadow:0 0 10px 2px rgba(255,176,32,.55); }
  96%,100%{ background:var(--bg-panel); border-color:var(--steel); box-shadow:none; }
}

.stop--overseas .stop-dot{ border-color:var(--amber); }
.stop--overseas .stop-dot::after{
  content:'';
  position:absolute;
  inset:-6px;
  border-radius:50%;
  border:1px solid rgba(255,176,32,.4);
  animation:ring 2.4s ease-out infinite;
}
@keyframes ring{
  0%{ transform:scale(.6); opacity:.9; }
  100%{ transform:scale(1.8); opacity:0; }
}

.stop-label{ font-size:11.5px; letter-spacing:.06em; text-transform:uppercase; color:var(--text-mu); white-space:nowrap; }
.stop--overseas .stop-label{ color:var(--amber); }

.stop--1{ left:2%; top:15%; }
.stop--2{ left:26%; top:85%; }
.stop--3{ left:50%; top:15%; }
.stop--4{ left:74%; top:85%; }
.stop--5{ left:97%; top:15%; }

.board-stats{ gap:26px; padding-top:20px; border-top:1px dashed rgba(255,255,255,.15); }
.stat-num{ display:block; font-family:var(--font-mono); font-size:24px; font-weight:600; color:var(--text-hi); }
#liveCount{ color:var(--amber); }
.stat-label{ font-size:11.5px; color:var(--text-mu); }

.verified-stamp{
  position:absolute; top:22px; right:22px;
  border:2px solid var(--amber);
  color:var(--amber);
  border-radius:50%;
  width:72px; height:72px;
  display:flex; flex-direction:column; align-items:center; justify-content:center;
  font-family:var(--font-mono);
  font-size:10.5px; font-weight:600; letter-spacing:.05em;
  transform:rotate(12deg);
  line-height:1.3; text-align:center;
  z-index:3;
}
.verified-stamp span{ font-size:6.5px; color:var(--text-mu); font-weight:500; text-transform:none; }

/* ---------- responsive ---------- */
@media(max-width:991px){
  .headline{ font-size:42px; }
}
@media(max-width:576px){
  .dispatch-hero{ padding:80px 0 60px; }
  .headline{ font-size:32px; }
  .route-track{ height:190px; }
  .stop-label{ font-size:10px; }
  .verified-stamp{ width:60px; height:60px; font-size:9px; top:16px; right:16px; }
}

@media(prefers-reduced-motion:reduce){
  .track-truck, .track-line-fill, .live-dot, .stop-dot, .stop--overseas .stop-dot::after, .ticker-text{ animation:none; }
  .track-truck{ left:40%; }
  .track-line-fill{ width:40%; }
}
</style>

<script>
(function(){
  // live clock
  var clockEl = document.getElementById('boardClock');
  function tick(){
    if(!clockEl) return;
    var d = new Date();
    var hh = String(d.getHours()).padStart(2,'0');
    var mm = String(d.getMinutes()).padStart(2,'0');
    var ss = String(d.getSeconds()).padStart(2,'0');
    clockEl.textContent = hh+':'+mm+':'+ss;
  }
  tick();
  setInterval(tick, 1000);

  // rotating ticker
  var messages = [
    'Batch #24 &rarr; Departing for Germany',
    'Batch #19 &rarr; Certified, awaiting dispatch',
    'Batch #27 &rarr; Enrolled this week: 14 trainees',
    'Batch #22 &rarr; Placed in Poland'
  ];
  var tickerEl = document.getElementById('tickerText');
  var i = 0;
  if(tickerEl){
    setInterval(function(){
      i = (i+1) % messages.length;
      tickerEl.style.animation = 'none';
      tickerEl.offsetHeight; /* reflow to restart animation */
      tickerEl.innerHTML = messages[i];
      tickerEl.style.animation = '';
    }, 4000);
  }

  // subtle live "in transit" counter flicker
  var liveCountEl = document.getElementById('liveCount');
  var counts = ['03','04','03','05','03'];
  var c = 0;
  if(liveCountEl){
    setInterval(function(){
      c = (c+1) % counts.length;
      liveCountEl.textContent = counts[c];
    }, 3600);
  }
})();
</script>