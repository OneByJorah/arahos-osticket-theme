<?php
/*********************************************************************
    index.php  — Arahos Help Desk landing page (restructured)
    Hero search on top, intro content center, status widget in the
    left sidebar (below buttons), Front Page FAQ accordion in the
    right sidebar. osTicket 1.18.x
**********************************************************************/
require('client.inc.php');

require_once INCLUDE_DIR . 'class.page.php';
require_once INCLUDE_DIR . 'class.category.php';
require_once INCLUDE_DIR . 'class.faq.php';

$section = 'home';
require(CLIENTINC_DIR.'header.inc.php');
?>

<!-- ============================================================
     HERO — search front and center
     ============================================================ -->
<div class="vide-hero">
  <div class="vide-hero-inner">
    <h1 class="vide-hero-title"><?php echo __('How can we help you today?'); ?></h1>
    <p class="vide-hero-sub"><strong>Welcome to the Arahos Support Center.</strong><br><?php echo __('Search the knowledge base for answers, or open a ticket and our team will get back to you.'); ?></p>
    <?php if ($cfg && $cfg->isKnowledgebaseEnabled()) { ?>
    <form method="get" action="kb/faq.php" class="vide-hero-search">
      <input type="hidden" name="a" value="search"/>
      <input type="text" name="q" class="vide-hero-input" placeholder="<?php echo __('Search for help… e.g. password, wifi, email'); ?>" aria-label="<?php echo __('Search our knowledge base'); ?>"/>
      <button type="submit" class="vide-hero-btn"><?php echo __('Search'); ?></button>
    </form>
    <?php } ?>
    <div class="vide-hero-actions">
      <a href="<?php echo ROOT_PATH; ?>open.php" class="vide-cta vide-cta-gold"><?php echo __('Open a New Ticket'); ?></a>
      <a href="<?php echo ROOT_PATH; ?>login.php" class="vide-cta vide-cta-outline"><?php echo __('Check Ticket Status'); ?></a>
    </div>
  </div>
</div>

<div id="landing_page" class="vide-landing">
<div class="vide-layout">

  <!-- LEFT SIDEBAR: buttons + system status -->
  <aside class="vide-col-left">
    <div class="vide-left-buttons">
      <a href="<?php echo ROOT_PATH; ?>open.php" class="vide-side-btn vide-side-btn-gold"><?php echo __('Open a New Ticket'); ?></a>
      <a href="<?php echo ROOT_PATH; ?>view.php" class="vide-side-btn vide-side-btn-gold2"><?php echo __('Check Ticket Status'); ?></a>
    </div>
    <!-- Arahos Service Status Widget -->
<div id="vide-stw" style="background:#fff;border:1px solid #e5e7eb;border-radius:10px;padding:16px;margin-bottom:20px;box-shadow:0 1px 4px rgba(0,0,0,.05);max-width:100%;overflow:hidden">
  <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:10px">
    <strong style="font-size:.88rem;color:#0a1f44">System Status</strong>
    <span style="font-size:.78rem;font-weight:600" id="vide-stw-ov"><span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:#9ca3af;margin-right:6px;vertical-align:middle"></span>Checking...</span>
  </div>
  <div id="vide-stw-list" style="display:flex;flex-direction:column;gap:4px"></div>
  <div id="vide-stw-metrics" style="display:flex;gap:10px;flex-wrap:wrap;margin-top:8px;padding-top:8px;border-top:1px solid #f3f4f6"></div>
  <div id="vide-stw-time" style="font-size:.68rem;color:#9ca3af;text-align:center;margin-top:6px"></div>
</div>
<script>
function videLoadStatus(){
  fetch('status.php').then(function(r){return r.json();}).then(function(d){
    var ov=document.getElementById('vide-stw-ov');
    var color=d.overall==='up'?'#1e8e5a':d.overall==='partial'?'#d69400':'#d64545';
    var label=d.overall==='up'?'All Systems Operational':d.overall==='partial'?'Some Services Degraded':'All Systems Down';
    ov.innerHTML='<span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:'+color+';margin-right:6px;vertical-align:middle"></span>'+label;
    ov.style.color=color;
    var icons={ticket:'\uD83C\uDFAB',mail:'\u2709\uFE0F',key:'\uD83D\uDD11',network:'\uD83C\uDF10',users:'\uD83D\uDC65'};
    var list=document.getElementById('vide-stw-list');list.innerHTML='';
    d.services.forEach(function(s){
      var row=document.createElement('div');row.style.cssText='display:flex;align-items:center;justify-content:space-between;padding:4px 0;border-bottom:1px solid #f3f4f6';
      var dot=s.status==='up'?'#1e8e5a':'#d64545';
      var nm=document.createElement('span');nm.style.cssText='font-size:.8rem;color:#374151';nm.innerHTML='<span style="display:inline-block;width:8px;height:8px;border-radius:50%;background:'+dot+';margin-right:6px"></span>'+(icons[s.icon]||'\u25CF')+' '+s.name;
      var st=document.createElement('span');st.style.cssText='font-size:.72rem;font-weight:700;text-transform:uppercase;color:'+dot;
      var lt=s.latency!==null&&s.latency>0?' <span style="font-size:.64rem;font-weight:400;color:#9ca3af">'+s.latency+'ms</span>':'';
      st.innerHTML=s.status==='up'?'Operational'+lt:'Down'+lt;
      row.appendChild(nm);row.appendChild(st);list.appendChild(row);
    });
    if(d.server){
      var m=document.getElementById('vide-stw-metrics');m.innerHTML='';
      var ms=[
        {l:'CPU',v:d.server.cpu_pct+'%',good:d.server.cpu_pct<80},
        {l:'Disk',v:d.server.disk_pct+'%',good:d.server.disk_pct<85},
        {l:'Memory',v:(d.server.memory?d.server.memory.used_pct+'%':'\u2014'),good:(!d.server.memory||d.server.memory.used_pct<85)},
        {l:'Uptime',v:d.server.uptime||'\u2014',good:true}
      ];
      ms.forEach(function(x){
        var div=document.createElement('div');div.style.cssText='flex:1;min-width:55px;text-align:center';
        var l=document.createElement('div');l.style.cssText='font-size:.6rem;color:#9ca3af;text-transform:uppercase';l.textContent=x.l;
        var v=document.createElement('div');v.style.cssText='font-size:.76rem;font-weight:700;color:'+(x.good?'#374151':'#d64545');v.textContent=x.v;
        div.appendChild(l);div.appendChild(v);m.appendChild(div);
      });
    }
    var t=new Date(d.last_checked);
    document.getElementById('vide-stw-time').textContent='Last checked: '+t.toLocaleTimeString();
  }).catch(function(e){document.getElementById('vide-stw-time').textContent='Unable to load status';});
}
videLoadStatus();setInterval(videLoadStatus,60000);
</script>
<!-- END Arahos Status Widget -->
  </aside>

  <!-- CENTER: intro content -->
  <main class="vide-col-main">
    <div class="thread-body vide-intro">
    <?php
        if($cfg && ($page = $cfg->getLandingPage()))
            echo $page->getBodyWithImages();
        else
            echo  '<h2>'.__('Welcome to the Support Center').'</h2>';
        ?>
    </div>
  </main>

  <!-- RIGHT SIDEBAR: Front Page FAQ accordion -->
  <aside class="vide-col-right">
  <?php
  if ($cfg && $cfg->isKnowledgebaseEnabled()) {
      $fpCats = Category::objects()->filter(array('name' => 'Front Page'));
      if ($fpCats && $fpCats->exists(true)) {
          $fpCat = $fpCats->first();
          $faqs = $fpCat->getTopArticles();
          if ($faqs && count($faqs)) { ?>
    <div class="vide-frontpage vide-frontpage-side">
      <div class="vide-frontpage-head">
        <h2><?php echo __('Important Information'); ?></h2>
        <p><?php echo __('Quick answers from the OIT team.'); ?></p>
      </div>
      <div class="vide-accordion">
      <?php foreach ($faqs as $F) { ?>
        <div class="vide-acc-item">
          <button type="button" class="vide-acc-toggle" aria-expanded="false">
            <span class="vide-acc-q"><?php echo Format::htmlchars($F->getQuestion()); ?></span>
            <span class="vide-acc-chevron" aria-hidden="true">&#9662;</span>
          </button>
          <div class="vide-acc-body" hidden>
            <div class="vide-acc-answer"><?php echo $F->getAnswerWithImages(); ?></div>
            <a class="vide-acc-link" href="<?php echo ROOT_PATH; ?>kb/faq.php?id=<?php echo $F->getId(); ?>"><?php echo __('Read the full article &rarr;'); ?></a>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  <?php   }
      }
  }
  ?>
  </aside>

</div>
<div class="clear"></div>
</div>

<?php require(CLIENTINC_DIR.'footer.inc.php'); ?>
