const sideMenu = document.querySelector("aside");
const menuBtn = document.querySelector("#menu-btn");
const closeBtn = document.querySelector("#close-btn");
const themeToggler = document.querySelector(".theme-toggler");

menuBtn.addEventListener('click', () =>{
    sideMenu.style.display='block';
})

closeBtn.addEventListener('click', () =>{
    sideMenu.style.display='none';
})

// Función para cambiar el tema y guardar el estado en localStorage
const toggleTheme = () => {
    document.body.classList.toggle('dark-theme-variables');
    const themeTogglerSpans = themeToggler.querySelectorAll('span');
    
    if (document.body.classList.contains('dark-theme-variables')) {
      themeTogglerSpans[0].classList.remove('active');
      themeTogglerSpans[1].classList.add('active');
    } else {
      themeTogglerSpans[0].classList.add('active');
      themeTogglerSpans[1].classList.remove('active');
    }
  
    // Guardar el estado del tema en localStorage
    const isDarkTheme = document.body.classList.contains('dark-theme-variables');
    localStorage.setItem('isDarkTheme', isDarkTheme);
  };
  
  // Obtener el estado del tema de localStorage
  const savedTheme = localStorage.getItem('isDarkTheme');
  if (savedTheme && savedTheme === 'true') {
    document.body.classList.add('dark-theme-variables');
    const themeTogglerSpans = themeToggler.querySelectorAll('span');
    themeTogglerSpans[0].classList.remove('active');
    themeTogglerSpans[1].classList.add('active');
  }else{
    const themeTogglerSpans = themeToggler.querySelectorAll('span');

    themeTogglerSpans[0].classList.add('active');
    themeTogglerSpans[1].classList.remove('active');
  }
  
  
  menuBtn.addEventListener('click', () => {
    const sidebar = document.querySelector("aside");
    sidebar.style.display = 'block';
  });
  
  // Cambiar el tema y guardar el estado en localStorage al hacer clic
  themeToggler.addEventListener('click', toggleTheme);


