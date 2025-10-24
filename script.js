/* script.js - lógica das páginas
   - registra usuário (salva em localStorage 'memoriUser')
   - faz login lendo 'memoriUser'
   - exibe nome no inicial.html
   - salva chamados em 'memoriCalls' array no localStorage
*/

/* Helpers */
function getUser(){ try { return JSON.parse(localStorage.getItem('memoriUser')); } catch(e){ return null; } }
function setUser(user){ localStorage.setItem('memoriUser', JSON.stringify(user)); }
function getCalls(){ try { return JSON.parse(localStorage.getItem('memoriCalls')||'[]'); } catch(e){ return []; } }
function setCalls(arr){ localStorage.setItem('memoriCalls', JSON.stringify(arr)); }

/* ---------- Register (enter.html) ---------- */
const registerForm = document.getElementById('registerForm');
if(registerForm){
  registerForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value;
    const confirm = document.getElementById('confirm').value;
    const func = document.getElementById('function').value.trim();

    if(password !== confirm){
      alert('Passwords do not match!');
      return;
    }
    if(!email || !name || !password){
      alert('Preencha nome, email e senha.');
      return;
    }

    const user = { name, email, phone, password, function: func };
    setUser(user);
    alert('Conta criada com sucesso!');
    // redireciona para login
    window.location.href = 'acess.html';
  });
}

/* ---------- Login (acess.html) ---------- */
const loginForm = document.getElementById('loginForm');
if(loginForm){
  loginForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    const email = document.getElementById('loginEmail').value.trim();
    const password = document.getElementById('loginPassword').value;
    const saved = getUser();
    if(!saved){
      alert('Nenhuma conta registrada. Crie uma primeiro.');
      return;
    }

    if(saved.email === email && saved.password === password){
      // marca status "logado" simples
      localStorage.setItem('memoriLogged', JSON.stringify({email: saved.email, name: saved.name}));
      alert(`Bem-vindo(a), ${saved.name}!`);
      window.location.href = 'inicial.html';
    } else {
      alert('Email ou senha incorretos.');
    }
  });
}

/* ---------- Inicial: mostra nome do usuário (inicial.html e formulario.html) ---------- */
function showUserBadge(elemId){
  const badge = document.getElementById(elemId);
  const logged = JSON.parse(localStorage.getItem('memoriLogged') || 'null');
  if(badge){
    if(logged && logged.name) badge.textContent = logged.name;
    else badge.textContent = 'User';
  }
}
showUserBadge('userBadge');
showUserBadge('userBadgeForm');

/* ---------- Formulario (formulario.html) ---------- */
const callForm = document.getElementById('callForm');
if(callForm){
  callForm.addEventListener('submit', (e)=>{
    e.preventDefault();
    const type = document.getElementById('callType').value.trim();
    const category = document.getElementById('callCategory').value.trim();
    const urgency = document.getElementById('callUrgency').value.trim();
    const title = document.getElementById('callTitle').value.trim();
    const description = document.getElementById('callDescription').value.trim();

    if(!type || !category || !urgency || !title || !description){
      alert('Preencha todos os campos do chamado.');
      return;
    }

    const calls = getCalls();
    const newCall = {
      id: Date.now(),
      type, category, urgency, title, description,
      createdAt: new Date().toISOString()
    };
    calls.unshift(newCall);
    setCalls(calls);

    alert('Chamado enviado com sucesso!');
    // redireciona para inicial e limpa form
    callForm.reset();
    window.location.href = 'inicial.html';
  });
}

/* ---------- small helper to protect pages if not logged in ---------- */
(function protectPages(){
  const logged = JSON.parse(localStorage.getItem('memoriLogged') || 'null');
  const path = window.location.pathname.split('/').pop().toLowerCase();
  const protectedPages = ['inicial.html','formulario.html'];
  if(protectedPages.includes(path) && !logged){
    // se usuário não logado, avisa e manda para acess.html
    alert('Você precisa entrar para acessar essa página.');
    window.location.href = 'acess.html';
  }
})();
