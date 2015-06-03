  <head>
    <meta charset="utf-8">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- styles -->
   <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" type="text/css">
   <link href='http://fonts.googleapis.com/css?family=Londrina+Solid%7CAlegreya+Sans%7CLondrina+Shadow' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <?php wp_enqueue_script("jquery"); ?>
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
          <ul class="nav nav-justified">
            <?php wp_list_pages('include=11,13,15,17,19,101,21&title_li' ); ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div><!--/container -->
    </nav><!-- end navigation -->

    <div class="container">