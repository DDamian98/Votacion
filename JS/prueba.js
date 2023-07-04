const menuBtn = document.querySelector("#menu-btn");
const themeToggler = document.querySelector(".theme-toggler");

// Función para cambiar el tema y guardar el estado en localStorage
const toggleTheme = () => {
  document.body.classList.toggle('dark-theme-variables');
  themeToggler.querySelector('span:nth-child(1)').classList.toggle('active');
  themeToggler.querySelector('span:nth-child(2)').classList.toggle('active');

  // Guardar el estado del tema en localStorage
  const isDarkTheme = document.body.classList.contains('dark-theme-variables');
  localStorage.setItem('isDarkTheme', isDarkTheme);
};

// Restaurar el estado del tema al cargar la página
const savedTheme = localStorage.getItem('isDarkTheme');
if (savedTheme && savedTheme === 'true') {
  document.body.classList.add('dark-theme-variables');
  themeToggler.querySelector('span:nth-child(1)').classList.add('active');
  themeToggler.querySelector('span:nth-child(2)').classList.add('active');
}

menuBtn.addEventListener('click', () => {
  const sidebar = document.querySelector("aside");
  sidebar.style.display = 'block';
});

// Cambiar el tema y guardar el estado en localStorage al hacer clic
themeToggler.addEventListener('click', toggleTheme);
