<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no">
  <meta property='og:type' content='website'>
  <meta property='og:title' content='サイトタイトル'>
  <meta property='og:url' content='URL入れる'>
  <meta property='og:description' content='サイト説明'>
  <meta property="og:image" content="ogイメージのパス入れる">
  <meta name="description" content="サイト説明" />
  <title><?php esd_title(); ?> <?php echo " | "; ?><?php bloginfo('name'); ?></title>
  <link href="<?php echo get_template_directory_uri(); ?>/css/vendors/slick.css" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo get_template_directory_uri(); ?>/css/destyle.css?<?php echo date('Ymd-Hi'); ?>" media="all" rel="stylesheet" type="text/css" />
  <link href="<?php echo get_template_directory_uri(); ?>/css/style.css?<?php echo date('Ymd-Hi'); ?>" media="all" rel="stylesheet" type="text/css" />
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
  <script src="https://kit.fontawesome.com/cd70ed3316.js" crossorigin="anonymous"></script>
</head>

<body>
  <div class="l-wrap">

    <header id="top-header" class="l-header">
      <div class="l-header__inner">
        <div class="mobile__menu">
          <p class="l-header__logo"> <a href="<?php echo esc_url(home_url()); ?>" class="header__logoLink">
              アフターコロナ応援グルメサイト<br><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="<?php bloginfo('name'); ?>">
            </a></p>
          <div class="mobile__toggle">
            <div>
              <span></span>
              <span></span>
              <span></span>
            </div>
          </div>
        </div>
        <nav class="l-header__nav">
          <ul class="l-header__nav-list">
            <li class="l-header__nav-item"><a href="#"><i class="fas fa-mobile-alt"></i> ご利用ガイド</a></a></li>
            <li class="l-header__nav-item"><a href="shop-list.html"><i class="fas fa-list-ul"></i> 飲食店一覧</a></li>
            <li class="l-header__nav-item"><a href="form-1.html"><i class="fas fa-edit"></i> 飲食店の皆様へ</a></li>
            <li class="l-header__nav-item"><a href="form-2.html"><i class="far fa-envelope"></i> お問い合わせ</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <main class="main-container">