<!-- navegador con usuario iniciado -->
<nav class="container">
    <input type="checkbox" name="" id="nav__checkbox" class="nav__checkbox" />
   <label for="nav__checkbox" class="nav__toggle">
     <!-- Menu -->
     <svg class="menu" viewBox="0 0 448 512" width="100" title="bars">
       <path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" />
     </svg>
 
     <!-- Close -->
     <svg class="close" viewBox="0 0 384 512" width="100" title="times">
       <path d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z" />
     </svg>
   </label>
 
   <ul class="nav__menu">
     <li class="menu__logo">
      <a href="../index.html">
     <img src="../Recursos/iso.png" alt="icon logo" id="logo"/>
     <img class="nd" src="../Recursos/logo_title.png" alt="Narrativas digitales"/>
      </a>
       </li>
       <li><a class="enlace" href="#">CREAR</a></li>
       <li><a class="enlace" href="#">MIS HISTORIETAS</a></li>
       <li><a class="enlace" href="#">LEER</a></li>
       <li class="dropdown">
         <img src="../Recursos/user.png" alt="iconuser"/>
         <a class="user_u"href="./login.php">INGRESAR /</a>
         <a class="user_u" href="./registrate.php">REGISTRARSE</a>
       </li>
     </ul>
   </nav>