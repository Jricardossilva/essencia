/* ===================== Essência — JS do site ===================== */
const WHATS = window.ESSENCIA?.whatsapp || "5583988874271";
const CSRF  = document.querySelector('meta[name="csrf-token"]')?.content || "";
function waLink(m){ return "https://wa.me/"+WHATS+"?text="+encodeURIComponent(m); }

document.addEventListener('click', e=>{
  const el = e.target.closest('[data-wa]');
  if(el){ e.preventDefault(); window.open(waLink(el.getAttribute('data-wa')),'_blank'); }
});

/* menu mobile */
document.getElementById('burger')?.addEventListener('click',()=>document.getElementById('menu').classList.toggle('open'));

/* WhatsApp flutuante */
document.getElementById('waToggle')?.addEventListener('click',()=>document.getElementById('waPanel').classList.toggle('open'));
document.querySelectorAll('.wq').forEach(b=>b.addEventListener('click',()=>{
  window.open(waLink(b.dataset.wa),'_blank'); document.getElementById('waPanel').classList.remove('open');
}));

/* ===================== Carrossel do hero ===================== */
(function(){
  const slides=document.querySelectorAll('.hero .slide'); if(!slides.length)return;
  const dots=document.querySelectorAll('.hero-dots button'); let i=0,timer;
  function go(n){i=(n+slides.length)%slides.length;
    slides.forEach((s,k)=>s.classList.toggle('active',k===i));
    dots.forEach((d,k)=>d.classList.toggle('on',k===i));}
  function start(){clearInterval(timer);timer=setInterval(()=>go(i+1),6000);}
  window.heroGo=n=>{go(n);start();};
  window.heroMove=d=>{go(i+d);start();};
  start();
})();

/* ===================== Carrossel de depoimentos ===================== */
(function(){
  const sl=document.querySelectorAll('#testi .tslide'); if(!sl.length)return;
  const dots=document.querySelectorAll('.tdots button'); let i=0,timer;
  function go(n){i=(n+sl.length)%sl.length;
    sl.forEach((s,k)=>s.classList.toggle('active',k===i));
    dots.forEach((d,k)=>d.classList.toggle('on',k===i));}
  window.testiGo=n=>{go(n);clearInterval(timer);timer=setInterval(()=>go(i+1),5000);};
  timer=setInterval(()=>go(i+1),5000);
})();

/* ===================== Avaliação (modal em etapas) ===================== */
const CALC={
  queda:{nome:"Risco de Queda",sub:"Para idosos e familiares. 4 perguntas rápidas.",
    scale:[["Sim",1],["Não",0]],
    perguntas:["Já caiu no último ano?","Usa medicamentos de uso contínuo?","Sente tonturas?","Tem dificuldade para caminhar?"]},
  ciclo:{nome:"Impacto do Ciclo Menstrual",sub:"Autoavaliação da saúde pélvica. 10 perguntas (Nunca → Sempre).",
    scale:[["Nunca",0],["Raramente",1],["Às vezes",2],["Frequentemente",3],["Sempre",4]],
    perguntas:["Você sente cólicas menstruais fortes que atrapalham suas atividades?","Você já precisou faltar a compromissos por causa da menstruação?","Durante a menstruação, sente cansaço excessivo ou falta de energia?","Sente dores na região pélvica mesmo fora do período menstrual?","Sente dor durante as relações sexuais?","Apresenta dor para evacuar ou urinar durante a menstruação?","Seu fluxo é muito intenso, exigindo trocas frequentes?","Percebe alterações emocionais intensas relacionadas ao ciclo?","Sente inchaço/dores que limitam suas atividades diárias?","Acredita que seu ciclo interfere na sua qualidade de vida?"]}
};
const modal=document.getElementById('modal');
let av={key:null,step:0,ans:[]};

function openAval(){
  setHead("Avaliações online","Escolha a avaliação que deseja realizar.");
  body().innerHTML=`
    <button class="optbtn" onclick="startAval('queda')"><span class="rd"></span><span><b>Risco de queda</b><br><small class="muted">Para idosos e familiares</small></span></button>
    <button class="optbtn" onclick="startAval('ciclo')"><span class="rd"></span><span><b>Impacto do ciclo menstrual</b><br><small class="muted">Saúde pélvica da mulher</small></span></button>
    <p class="disc">Finalidade educativa. Não substitui avaliação profissional. Cada e-mail realiza uma avaliação.</p>`;
  modal.classList.add('show');
}
function startAval(key){av={key,step:0,ans:Array(CALC[key].perguntas.length).fill(null)};renderStep();}
function renderStep(){
  const c=CALC[av.key],n=c.perguntas.length; setHead(c.nome,c.sub);
  if(av.step<n){
    const opts=c.scale.map(([lab,val])=>`<button class="optbtn ${av.ans[av.step]===val?'sel':''}" onclick="pick(${val})"><span class="rd"></span>${lab}</button>`).join('');
    body().innerHTML=`<div class="prog"><i style="width:${(av.step/n)*100}%"></i></div>
      <div class="prog-label">Pergunta ${av.step+1} de ${n}</div>
      <div class="qcard"><h4>${c.perguntas[av.step]}</h4>${opts}</div>
      <div class="modal-nav"><button class="link-btn" onclick="prevStep()" ${av.step===0?'style="visibility:hidden"':''}>← Voltar</button></div>`;
  } else renderGate();
}
function pick(v){av.ans[av.step]=v;setTimeout(()=>{av.step++;renderStep();},170);}
function prevStep(){if(av.step>0){av.step--;renderStep();}}
function renderGate(){
  setHead(CALC[av.key].nome,"Último passo — receba seu resultado");
  body().innerHTML=`<div class="prog"><i style="width:100%"></i></div>
    <div class="prog-label">Seus dados</div>
    <div class="qcard">
      <div class="field"><label>Nome</label><input id="avName" placeholder="Seu nome"></div>
      <div class="field"><label>E-mail</label><input id="avEmail" type="email" placeholder="seu@email.com"></div>
      <div class="field"><label>WhatsApp</label><input id="avPhone" type="tel" placeholder="(00) 00000-0000"></div>
      <p class="errline" id="avErr"></p>
      <div class="modal-nav"><button class="link-btn" onclick="prevStep()">← Voltar</button>
        <button class="btn btn-grad" id="avSubmit" onclick="submitAval()">Ver meu resultado</button></div>
      <p class="disc">🔒 Cada e-mail realiza a avaliação uma vez. Seus dados são tratados com sigilo.</p>
    </div>`;
}
async function submitAval(){
  const nome=avName.value.trim(),email=avEmail.value.trim(),phone=avPhone.value.trim(),err=document.getElementById('avErr');
  if(!nome){err.textContent='Informe seu nome.';return;}
  if(!/^[^@\s]+@[^@\s]+\.[^@\s]+$/.test(email)){err.textContent='Informe um e-mail válido.';return;}
  document.getElementById('avSubmit').disabled=true;
  try{
    const res=await fetch('/avaliacao',{method:'POST',headers:{'Content-Type':'application/json','X-CSRF-TOKEN':CSRF,'Accept':'application/json'},
      body:JSON.stringify({calculadora:av.key,nome,email,telefone:phone,respostas:av.ans})});
    const data=await res.json();
    if(res.status===409){err.innerHTML='Este e-mail já realizou esta avaliação. <a target="_blank" style="color:var(--verde);font-weight:600" href="'+waLink('Olá! Já fiz a avaliação e quero uma avaliação completa.')+'">Falar no WhatsApp →</a>';document.getElementById('avSubmit').disabled=false;return;}
    if(!res.ok){err.textContent='Não foi possível enviar. Tente novamente.';document.getElementById('avSubmit').disabled=false;return;}
    renderResult(data);
  }catch(e){err.textContent='Erro de conexão. Tente novamente.';document.getElementById('avSubmit').disabled=false;}
}
function renderResult(d){
  const cls=d.cls==='baixo'?'r-baixo':(d.cls==='mod'?'r-mod':'r-alto');
  const score=d.max?` <span style="font-weight:400;font-size:.9rem">(${d.pontuacao}/${d.max})</span>`:'';
  const alerta=d.alerta?`<div class="alertbox">⚠️ Alguns sintomas relatados merecem avaliação profissional, pois podem estar associados a condições que impactam a saúde da mulher.</div>`:'';
  body().innerHTML=`<div class="result-box ${cls}"><h4>${d.classificacao}${score}</h4><p style="margin:0">${d.texto}</p>${alerta}</div>
    <a class="btn btn-grad" style="width:100%;justify-content:center;margin-top:16px" data-wa="Olá! Fiz a avaliação online (${CALC[av.key].nome}) e gostaria de agendar uma avaliação completa.">🌸 Agendar avaliação acolhedora</a>
    <p class="disc">Esta avaliação tem finalidade educativa e não substitui consulta profissional.</p>`;
}
function setHead(t,s){document.getElementById('mTitle').textContent=t;document.getElementById('mSub').textContent=s;}
function body(){return document.getElementById('mBody');}
document.getElementById('modalX')?.addEventListener('click',()=>modal.classList.remove('show'));
modal?.addEventListener('click',e=>{if(e.target===modal)modal.classList.remove('show');});
document.querySelectorAll('[data-open-aval]').forEach(b=>b.addEventListener('click',openAval));

/* ===================== Carrossel de serviços ===================== */
(function(){
  const track=document.getElementById('svcTrack'); if(!track)return;
  const slides=track.children, dots=document.querySelectorAll('#svcDots button');
  const n=slides.length; let i=0,timer;
  function go(k){i=(k+n)%n;track.style.transform='translateX(-'+(i*100)+'%)';
    dots.forEach((d,j)=>d.classList.toggle('on',j===i));}
  function start(){clearInterval(timer);timer=setInterval(()=>go(i+1),6500);}
  window.svcGo=k=>{go(k);start();};
  window.svcMove=d=>{go(i+d);start();};
  // arrastar (touch)
  let x0=null;
  const car=document.getElementById('svcCarousel');
  car.addEventListener('touchstart',e=>x0=e.touches[0].clientX,{passive:true});
  car.addEventListener('touchend',e=>{if(x0===null)return;const dx=e.changedTouches[0].clientX-x0;
    if(Math.abs(dx)>45)svcMove(dx<0?1:-1);x0=null;});
  start();
})();
