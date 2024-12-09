const darkModeToggle = document.getElementById('darkModeToggle');

function setAutoTheme() {
  const currentHour = new Date().getHours(); 
  if (currentHour >= 18 || currentHour < 6) {
    document.body.classList.add('dark-mode');
    darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
    document.querySelector('.main-header').classList.add('navbar-dark-mode');
    document.querySelector('.main-header').classList.remove('navbar-light-mode');
    localStorage.setItem('darkMode', 'enabled');
  } else {
    document.body.classList.remove('dark-mode');
    darkModeToggle.querySelector('i').classList.replace('fa-sun', 'fa-moon');
    document.querySelector('.main-header').classList.remove('navbar-dark-mode');
    document.querySelector('.main-header').classList.add('navbar-light-mode');
    localStorage.setItem('darkMode', 'disabled');
  }
}

if (localStorage.getItem('darkMode') === 'enabled') {
  document.body.classList.add('dark-mode');
  darkModeToggle.querySelector('i').classList.replace('fa-moon', 'fa-sun');
  document.querySelector('.main-header').classList.add('navbar-dark-mode');
  document.querySelector('.main-header').classList.remove('navbar-light-mode');
} else {
  setAutoTheme();
}

darkModeToggle.addEventListener('click', async () => {
  const icon = darkModeToggle.querySelector('i');

  document.body.classList.toggle('dark-mode');
  document.querySelector('.main-header').classList.toggle('navbar-dark-mode');
  document.querySelector('.main-header').classList.toggle('navbar-light-mode');

  await sleep(500);

  if (document.body.classList.contains('dark-mode')) {
    icon.classList.replace('fa-moon', 'fa-sun');
    localStorage.setItem('darkMode', 'enabled');
  } else {
    icon.classList.replace('fa-sun', 'fa-moon');
    localStorage.setItem('darkMode', 'disabled');
  }
});

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

document.querySelectorAll('.professor-option').forEach(option => {
  option.addEventListener('click', function() {
    document.querySelectorAll('.professor-option').forEach(opt => opt.classList.remove('selected'));
    this.classList.add('selected');
    const value = this.getAttribute('data-value');
    console.log('Tanlangan professor:', value);
  });
});

document.getElementById('professorForm').addEventListener('submit', async function(event) {
  event.preventDefault();
  Toastify({
    text: "<i class='fas fa-check'></i> Professor muvaffaqiyatli tanlandi!",
    duration: 3000,
    gravity: "top",
    position: "right",
    backgroundColor: "#4CAF50",
    stopOnFocus: true
  }).showToast();
  await sleep(2000);
  window.location.reload();
});

