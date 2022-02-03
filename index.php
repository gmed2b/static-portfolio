<?php
  // take from the url the value of the variable "lang"
  if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
  }else{
    $lang = 'en';
  }
  $path = "./assets/lang/{$lang}.json";
  $lang_data = json_decode(file_get_contents($path), true);
?>
<!DOCTYPE html>
<html lang="<?php echo $lang ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Check my personal portfolio ;)">
  <title>Mehdi's Portfolio</title>

  <link rel="shortcut icon" href="./assets/img/logo500.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link rel="stylesheet" href="./assets/css/style.css">

  <script defer src="./main.js"></script>
</head>

<body>
  <div id="splash-screen" class="splash-screen">
    <div class="shape loading-hex"></div>
  </div>

  <div class="shape blob-right-corner"></div>
  <div class="shape blob-left-side"></div>
  <div id="video-game-hex" class="shape video-game-hex"></div>
  <div class="shape code-hex"></div>

  <nav class="navbar">
    <div class="navbar-logo">
      <div class="shape logo-hex"></div>
      <a href="index.html">
        M<span class="custom-color">Ǝ</span>D
      </a>
    </div>
    <div class="navbar-links">
      <a href="#" id="navbar-menu" class="navbar-menu">
        <i class="material-icons-round">menu</i>
      </a>
      <ul id="navbar-list-item" class="list-item">
        <li class="item">
          <a href="#projects">
            &lt;<span class="custom-color">01</span>
            <?php echo $lang_data['navbar']['1'] ?>&gt;
          </a>
        </li>
        <li class="item">
          <a href="#about-me">
            &lt;<span class="custom-color">02</span>
            <?php echo $lang_data['navbar']['2'] ?>&gt;
          </a>
        </li>
        <li class="item">
          <a href="#contact-me">
            &lt;<span class="custom-color">03</span>
            <?php echo $lang_data['navbar']['3'] ?>&gt;
          </a>
        </li>
      </ul>
    </div>
  </nav>

  <header>
    <div class="hero-container">
      <h2 class="subtitle custom-color"><?php echo $lang_data['hero_subtitle'] ?></h2>
      <h1 class="title">Mehdi Ghoulam</h1>
      <p class="catchphrase">
      <?php echo $lang_data['hero_catchphrase'] ?> <span class="custom-color">Corte</span>
      </p>
    </div>

    <div class="cta-container">
      <a href="#projects" class="cta-button">
        <span class="material-icons-round">
          keyboard_double_arrow_down
        </span>
      </a>
    </div>

    <div class="go-top-container">
      <button id="go-top-button" class="go-top-button">
        <span class="material-icons-round">
          keyboard_arrow_up
        </span>
      </button>
    </div>
  </header>

  <div class="spacer header-separation"></div>
  <div class="spacer header-separation-2"></div>

  <main>
    <section id="projects" class="featured-project">
      <div class="project-text-container">
        <div class="project-hero hero">
          <h3 class="headline"><?php echo $lang_data['projet_headline'] ?></h3>
          <div class="title">
            <h2>Webgestion</h2>
            <p><?php echo $lang_data['projet_title_p'] ?></p>
          </div>
        </div>
        <div class="project-desc desc text-font">
          <p>
            Webgestion, un logiciel Hybride pour la maintenance et la facturation.
            Webgestion est un logiciel hybride en ligne. C'est une GMAO couplée à une gestion commerciale. Les deux
            logiciels réunies travaillent en concert.
          </p>
        </div>
      </div>
      <div class="project-image">
        <img id="unigest-small-image" src="./assets/img/unigest-fr-small.jpg" alt="Unigest website small image">
        <img id="unigest-full-image" class="no-display" src="./assets/img/unigest-fr.png"
          alt="Unigest website full image">
      </div>
      <div class="blue-bg"></div>
    </section>

    <section class="projects text-font">
      <h2 class="title">
      <?php echo $lang_data['projets_title'] ?>
      </h2>
      <div class="project-list">
        <div class="card">
          <div class="card-body">
            <div class="card-icon">
              <span class="material-icons-round">badge</span>
            </div>
            <h3 class="card-title">Amser</h3>
            <p class="card-desc">
              Amser est un logiciel permettant de gérer les flux des entrées et sorties dans un site à l'aide de son
              système de badge RFID. AMSER, la sécurité active sur votre site!
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="card-icon">
              <span class="material-icons-round">qr_code_scanner</span>
            </div>
            <h3 class="card-title">Toucheat</h3>
            <p class="card-desc">
              Touch Eat! La carte de votre restaurant favoris entre vos main. Toucheat permet d'acceder à la carte de
              votre restaurant en scannant le Qr-code placé sur la table.
            </p>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="card-icon">
              <span class="material-icons-round">today</span>
            </div>
            <h3 class="card-title">Agenda</h3>
            <p class="card-desc">
              Unigest Agenda, la future application d'Unigest Solution. Elle servira de point de réservation pour les
              personnes voulant faire une activité.
            </p>
          </div>
        </div>
      </div>
    </section>

    <div class="spacer peaks"></div>

    <section id="about-me" class="about-me">
      <div class="about-text-container">
        <div class="about-desc desc">
          <p class="text-font">
            Passionné par les nouvelles technologies et le dévloppement web, j'ai intégré le BUT MMI afin d'améliorer
            mes compétences et d'en développer de nouvelles.
            Ayant intégrer la filiere STI2D, j'ai pu découvrir les métiers du web, et les mettre en application lors de
            projets scolaires et professionnels.
            Ces derniers mon conforté dans le choix de rejoindre la filière MMI.
          </p>
        </div>
        <div class="about-hero hero">
          <h3 class="headline"><?php echo $lang_data['about_headline'] ?></h3>
          <div class="title">
            <h2><?php echo $lang_data['about_title'] ?></h2>
          </div>
        </div>
      </div>

      <div class="skills">
        <h2 class="title"><?php echo $lang_data['skill_title'] ?></h2>
        <div class="skill-container">
          <div class="skill">
            <div class="skill-title">
              <h3>HTML/CSS</h3>
            </div>
            <div class="skill-bar">
              <div class="skill-bar-fill" style="width: 80%;"></div>
            </div>
          </div>
          <div class="skill">
            <div class="skill-title">
              <h3>JavaScript</h3>
            </div>
            <div class="skill-bar">
              <div class="skill-bar-fill" style="width: 60%;"></div>
            </div>
          </div>
          <div class="skill">
            <div class="skill-title">
              <h3>PHP</h3>
            </div>
            <div class="skill-bar">
              <div class="skill-bar-fill" style="width: 65%;"></div>
            </div>
          </div>
          <div class="skill">
            <div class="skill-title">
              <h3>Python</h3>
            </div>
            <div class="skill-bar">
              <div class="skill-bar-fill" style="width: 70%;"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="contact-me" class="contact">
      <div class="contact-container">
        <form method="POST" id="contact-form" class="contact-form" autocomplete="off">
          <h3 class="title"><?php echo $lang_data['contact_title'] ?></h3>
          <div class="form-control">
            <label for="contact-name"><?php echo $lang_data['contact_name'] ?></label>
            <input type="text" name="contact-name" id="contact-name" class="input-control" placeholder="<?php echo $lang_data['contact_name_placeholder'] ?>"
              autocomplete="off" />
          </div>
          <div class="form-control">
            <label for="contact-email">Email</label>
            <input type="email" name="contact-email" id="contact-email" class="input-control"
              placeholder="<?php echo $lang_data['contact_email_placeholder'] ?>" autocomplete="off" />
          </div>
          <div class="form-control">
            <label for="contact-message">Message</label>
            <textarea name="contact-message" id="contact-message" class="input-control" cols="30" rows="5"
              maxlength="300" placeholder="<?php echo $lang_data['contact_message_placeholder'] ?>" autocomplete="off"></textarea>
          </div>
          <div class="form-inline">
            <p id="status-message" class="status-message pending-color"></p>
            <button type="submit" name="submit" class="submit-button"><?php echo $lang_data['contact_submit'] ?></button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <footer class="spacer peaks-footer">
    <div class="social-container">
      <ul class="list-item">
        <li class="item">
          <a href="https://github.com/gmed2b">
            <img class="icon" src="./assets/img/social_icons/github.svg" alt="Github's icon">
          </a>
        </li>
        <li class="item">
          <a href="https://twitter.com/med_2b">
            <img class="icon" src="./assets/img/social_icons/twitter.svg" alt="Twitter's icon">
          </a>
        </li>
        <li class="item">
          <a href="https://www.instagram.com/med_2b">
            <img class="icon" src="./assets/img/social_icons/instagram.svg" alt="Instagram's icon">
          </a>
        </li>
        <li class="item color-container">
          <input type="color" name="color-selector" id="color-selector">
        </li>
        <li class="item lang-container">
          <img class="lang-flag" id="lang-button" src="./assets/img/svg/flags/<?php echo $lang == "en" ? "fr" : "en" ?>.svg" alt="<?php echo $lang == "en" ? "fr" : "en" ?>">
        </li>
      </ul>
    </div>
    <h4 class="author"><?php echo $lang_data['footer_copyright'] ?></h4>
  </footer>

</body>

</html>