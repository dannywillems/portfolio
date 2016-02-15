<!DOCTYPE html>
<?php
  $list_lang = array();
  //$list_lang['fr'] = "Français";
  $list_lang['en'] = "English";

  session_start();

  if (isSet($_GET['lang']))
  {
    $save_lang = $_GET['lang'];
    $_SESSION['save_lang'] = $save_lang;
    setcookie('save_lang', $save_lang, time() + (3600 * 24 * 30));
  }
  else if (isSet($_COOKIE['save_lang']))
    $save_lang = $_COOKIE['save_lang'];
  else
    $save_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
  switch ($save_lang)
  {
    /*
    case "fr":
      echo "<html lang='fr'>";
      include_once 'lang_fr.php';
      break;
    */
    default:
      echo "<html lang='en'>";
      include_once 'lang_en.php';
      break;
  }

  function new_card_no_subtitle_no_date($img_src, $css_supp, $category, $card_title, $card_content)
  {
    echo "
      <div class='col-lg-4 col-md-6 col-xs-12 text-center " . $css_supp . "'>
        <article class='card'>
          <div class='card__thumb'>
              <img src='" . $img_src . "' />
          </div>
          <div class='card__body'>
            <div class='card__category'>" . $category . "</div>
            <h2 class='card__title'>" .$card_title . "</h2>
            <p class='card__description'>" . $card_content . "</p>
          </div>
        </article>
      </div>";
  }

  function new_card_subtitle_card($img_src, $css_supp, $bg_img, $date_day, $date_month, $card_title, $card_subtitle, $card_content, $card_blog_link, $card_category)
  {
    echo "<div class='col-lg-4 col-md-6 col-xs-12 text-center " . $css_supp . "'><article class='card'><div class='card__thumb " . $bg_img . "'><img src='" . $img_src . "'/> </div><div class='card__date'> <span class='card__date__day'>" . $date_day . "</span><span class='card__date__month'>" .$date_month . "</span></div><div class='card__body'>";
    if ($card_category != "")
      echo "<div class='card__category'>" . $card_category . "</div>";
    echo "
      <h2 class='card__title'>" . $card_title . "</h2><div class='card__subtitle'>" . $card_subtitle . "</div><p class='card__description'>" . $card_content . "</p></div><hr /> <div class='card-footer'>";
    if ($card_blog_link != "")
      echo "<p><a href='" . $card_blog_link . "'>" . $GLOBALS['lang']['CARD_MORE_DETAILS'] . "</a></p>";
    echo "</div></article></div>";
  }
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $lang['DESCRIPTION'] ?>">
    <meta name="author" content="Benoit Debled">
    <meta name="keywords" content="Benoit Debled developer web software hackathon développeur" />

    <title><?php echo $lang['TITLE'] ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="css/animate.min.css" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/creative.css" type="text/css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <link rel="stylesheet" href="css/benoit.css" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">Benoit Debled</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                      <a class="page-scroll" href="#about"><?php echo $lang['SECTION_ABOUT'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#experience"><?php echo $lang['SECTION_XP'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#projects"><?php echo $lang['SECTION_PROJECTS'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#skills"><?php echo $lang['SECTION_SKILLS'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#education"><?php echo $lang['SECTION_EDUCATION'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#download"><?php echo $lang['SECTION_DOWNLOAD'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="#contact"><?php echo $lang['SECTION_CONTACT'] ?></a>
                    </li>
                    <li>
                      <a class="page-scroll" href="http://blog.debled.com"><?php echo $lang['SECTION_BLOG'] ?></a>
                    </li>
                    <li>
                      <div class="bd-multi-language">
                        <button class="page-scroll btn btn-menu dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <?php echo $list_lang[$save_lang] ?> <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <?php
                            foreach ($list_lang as $key => $value)
                            {
                              if ($key != $save_lang)
                                echo "<li><a href='http://debled.com/?lang=" . $key . "'>" . $value . "</a></li>";
                            }
                          ?>
                        </ul>
                      </div>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>Benoit Debled</h1>
                <hr>
                <p><?php echo $lang['SERVICES_TITLE'] ?></p>
                <p>
                    <img class="bd-img-profile bd-img-rounded" alt="Benoit Debled" src="img/benoit-debled.jpg" />
                </p>
                <a href="#about" class="btn btn-primary btn-xl btn-more-about-me page-scroll"><?php echo $lang['SERVICES_MORE_ABOUT_ME'] ?></a>
                <div>
                    <a class="icon-website btn" href="http://www.linkedin.com/in/benoitdebled">
                        <img src="img/linkedin.png" alt="Benoit Debled Linkedin" />
                    </a>
                    <a class="icon-website btn" href="http://github.com/bendebled">
                        <img src="img/github.png" alt="Benoit Debled Github" />
                    </a>
                    <a class="icon-website btn" href="http://blog.debled.com">
                        <img src="img/blog.png" alt="Benoit Debled's Blog" />
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="bg-primary bd-about" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                  <p class="text-faded bd-description"><?php echo $lang['ABOUT_ME_DESCRIPTION'] ?></p>
                </div>
            </div>
        </div>
    </section>

    <section id="experience" class="bg-second">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading"><?php echo $lang['XP_TITLE'] ?></h2>
                  <hr></hr>
                </div>
            </div>
            <div class="row">
              <?php
                new_card_no_subtitle_no_date("img/CI.jpg", "", $lang['XP_CI_CATEGORY'], $lang['XP_CI_TITLE'], $lang['XP_CI_DESCRIPTION']);
                new_card_no_subtitle_no_date("img/group-ips.jpg", "", $lang['XP_IPS_CATEGORY'], $lang['XP_IPS_TITLE'], $lang['XP_IPS_DESCRIPTION']);
                new_card_no_subtitle_no_date("img/sollix.jpg", "", $lang['XP_SOLLIX_CATEGORY'], $lang['XP_SOLLIX_TITLE'], $lang['XP_SOLLIX_DESCRIPTION']);
              ?>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="projects">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading"><?php echo $lang['PP_TITLE'] ?></h2>
                  <hr></hr>
                </div>
            </div>
            <div class="row">
              <?php
                new_card_subtitle_card("img/snapClassify.jpg", "", "", $lang['PP_SC_DAY'], $lang['PP_SC_MONTH'], $lang['PP_SC_TITLE'], $lang['PP_SC_SUBTITLE'], $lang['PP_SC_DESCRIPTION'], $lang['PP_SC_BLOG_LINK'], "");
                new_card_subtitle_card("img/aquarium.jpg", "", "bd-black", $lang['PP_AQUA_DAY'], $lang['PP_AQUA_MONTH'], $lang['PP_AQUA_TITLE'], $lang['PP_AQUA_SUBTITLE'], $lang['PP_AQUA_DESCRIPTION'], $lang['PP_AQUA_BLOG_LINK'], "");
                new_card_subtitle_card("img/data-logger.jpg", "", "", $lang['PP_PUMP_DAY'], $lang['PP_PUMP_MONTH'], $lang['PP_PUMP_TITLE'], $lang['PP_PUMP_SUBTITLE'], $lang['PP_PUMP_DESCRIPTION'], $lang['PP_PUMP_BLOG_LINK'], "");
                new_card_subtitle_card("img/alarm.jpg", "col-lg-offset-2", "bd-black", $lang['PP_CLOCK_DAY'], $lang['PP_CLOCK_MONTH'], $lang['PP_CLOCK_TITLE'], $lang['PP_CLOCK_SUBTITLE'], $lang['PP_CLOCK_DESCRIPTION'], $lang['PP_CLOCK_BLOG_LINK'], "");
                new_card_subtitle_card("img/quadcopter.jpg", "", "bd-quad", $lang['PP_QUAD_DAY'], $lang['PP_QUAD_MONTH'], $lang['PP_QUAD_TITLE'], $lang['PP_QUAD_SUBTITLE'], $lang['PP_QUAD_DESCRIPTION'], $lang['PP_QUAD_BLOG_LINK'], "");
              ?>
            </div>
        </div>
    </section>

    <section id="skills" class="bg-second">
        <div class="container">
            <div class="row skills">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading"><?php echo $lang['SKILLS_TITLE'] ?></h2>
                  <hr class="primary">
                </div>
            </div>
            <div class="row">
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_PROGRAMMING'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_PROGRAMMING_DESC'] ?></p>
              </div>
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_OS'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_OS_DESC'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_WEB'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_WEB_DESC'] ?></p>
              </div>
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_SERVER'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_SERVER_DESC'] ?></p>
              </div>
            </div>
            <div class="row">
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_DB'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_DB_DESC'] ?></p>
              </div>
              <div class="skills-title col-lg-2 col-md-2 col-xs-4 text-right">
                <p><?php echo $lang['SKILLS_OTHER'] ?></p>
              </div>
              <div class="col-lg-4 col-md-4 col-xs-8 text-left">
                <p><?php echo $lang['SKILLS_OTHER_DESC'] ?></p>
              </div>
            </div>
        </div>
    </section>

    <section class="bg-primary" id="education">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading"><?php echo $lang['EDUCATION_TITLE'] ?></h2>
                  <hr class="primary">
                </div>
            </div>
            <div class="row">
              <?php
                new_card_subtitle_card("img/UMons.jpg", "col-lg-offset-2", "", $lang['EDUCATION_UMONS_DAY'], $lang['EDUCATION_UMONS_MONTH'], $lang['EDUCATION_UMONS_TITLE'], $lang['EDUCATION_UMONS_SUBTITLE'], $lang['EDUCATION_UMONS_DESCRIPTION'], $lang['EDUCATION_UMONS_BLOG_LINK'], $lang['EDUCATION_UMONS_CATEGORY']);
                new_card_subtitle_card("img/McCutcheon.jpg", "", "", $lang['EDUCATION_CUTCHEON_DAY'], $lang['EDUCATION_CUTCHEON_MONTH'], $lang['EDUCATION_CUTCHEON_TITLE'], $lang['EDUCATION_CUTCHEON_SUBTITLE'], $lang['EDUCATION_CUTCHEON_DESCRIPTION'], $lang['EDUCATION_CUTCHEON_BLOG_LINK'], $lang['EDUCATION_CUTCHEON_CATEGORY']);
              ?>
            </div>
        </div>
    </section>

    <aside class="bg-dark" id="download">
        <div class="container text-center">
            <div class="call-to-action">
              <h2><?php echo $lang['RESUME_TITLE'] ?></h2>
              <a href="benoit-debled-resume.pdf" class="btn btn-default btn-xl wow tada"><?php echo $lang['RESUME_TEXT'] ?></a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
              <h2 class="section-heading"><?php echo $lang['CONTACT_TITLE'] ?></h2>
              <hr class="primary">
            </div>
            <div class="row">
              <div class="col-lg-12 text-center">
                  <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                  <p><a href="mailto:benoit@debled.com">benoit@debled.com</a></p>
              </div>
            </div>
          </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.fittext.js"></script>
    <script src="js/wow.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/creative.js"></script>

</body>

</html>
