<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta property="og:title" content="John Bivens: Comicbook Illustrator">
  <meta property="og:image" content="link_to_image">
  <meta property="og:description" content="John Bivens is an award-winning Comicbook Illustrator. His work 
  spans the genres of crime, horror, science fiction, fantasy, romance, and education. Check out his work here!">
  <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- styles -->
 <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css">
 <link href='http://fonts.googleapis.com/css?family=Londrina+Solid%7CAlegreya+Sans%7CLondrina+Shadow' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <?php wp_head(); ?>

</head>

<body>

  <nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <div class="navbar-collapse collapse" id="top-navbar">
          <?php /* Primary navigation */
          wp_nav_menu( array(
            'menu' => 'top_menu',
            'depth' => 2,
            'container' => false,
            'menu_class' => 'nav nav-justified',
            //Process nav menu using our custom nav walker
            'walker' => new wp_bootstrap_navwalker())
          );
          ?>
      </div><!--/.nav-collapse -->
    </div><!--/container -->
  </nav><!-- end navigation -->

  <div class="container">
    <header>
      <div class="row">
        <h1 id="bivens-title">John Bivens</h1>
        <h2 id="art-of">The art of</h2>
        <img src="<?php echo bloginfo('url'); ?>/wp-content/themes/bivens/images/john.svg" class="img-responsive logo" alt="John Bivens logo for artist John Bivens">  
      </div>

    </header>
  </div>
  <div class="container-fluid">