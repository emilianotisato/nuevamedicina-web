<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Language" content="es" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="MobileOptimized" content="width" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <title>@yield('meta_title')| Nueva Medicina</title>
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139872434-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-139872434-1');
    </script>

    <!-- Bootstrap -->
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- styles -->
    <link rel="stylesheet" href="/js/slick/slick.css">
    <link rel="stylesheet" href="/js/fancybox/jquery.fancybox.css">
    <link rel="stylesheet" href="/scss/bee-ui.css" />
    <link rel="stylesheet" href="/scss/style.css" />

    <!-- favicon -->
    <link rel="shortcut icon" href="/images/logos/favicon.png" />
    @include('feed::links')


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @yield('extra_tags')

</head>

<body class="init">
    <!-- Preloader -->
    <div id="preload"></div>
    <!-- /Preloader -->

    <!-- Header -->
    <header id="head">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 top-header">
                    <div class="col-sm-4 search-box">
                        <form id="search-form" action="/buscar" method="get">
                            <div class="search-container">
                                <input type="hidden" name="email">
                                <input type="text" name="query" class="search-input" placeholder="BÚSQUEDA">
                                <span class="search-submit"><i class="fa fa-search"></i></span>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4">
                        <div id="logo">
                            <a href="/">
                                <img src="/images/logos/logo.png" alt="Nueva Medicina" />
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4 social-top">
                        <div id="social">
                            <a href="https://www.facebook.com/Nueva-Medicina-Online-447710709315953" target="_blank"><i
                                    class="fa fa-facebook-square"></i> </a>
                            <a href="#" target="_blank"><i class="fa fa-twitter-square"></i> </a>
                            <a href="#" target="_blank"><i class="fa fa-instagram"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                    <!-- Mobile Toggle Menu -->
                    <a href="#nav1" class="tgl-menu">menu</a>
                    <!-- /Mobile Toggle Menu -->
                    <!-- Main Nav -->
                    <nav id="nav1" class="menu">
                        <ul class="main_nav">
                            @foreach(\App\ArticleCategory::all() as $category)
                            <li>
                                <a
                                    href="{{route('articleCategory', ['category' => $category->slug])}}">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                    <!-- /Main Nav -->

                </div>
            </div>
        </div>
    </header>
    <!-- /Header -->
    @yield('content')
    <hr style="border: solid #e6e6e6 1px;max-width: 1180px;margin: 4rem auto;">
    <div class="divider"></div>
    <!-- Footer -->
    <footer id="foot">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-sm-8">

                    <div class="links" style="border: 0">
                        <a href="/politica-de-privacidad">Política de Privacidad</a>&nbsp;|
                        <a href="/quienes-somos">Quiénes Somos</a>&nbsp;|
                        <a href="/contacto">Contáctanos</a>
                    </div>

                    <div class="credits">
                        Copyright © 2012 - {{ date('Y') }} | Nueva Medicina Online
                    </div>

                </div>
                <div class="col-md-4 col-sm-4">

                    <div class="newsletter">
                        <h3>Newsletter</h3>
                        <form action="#" method="post">
                            <input type="email" class="frm-text" name="EMAIL" placeholder="email" />
                            <input type="submit" class="frm-submit" value="ENVIAR" />
                        </form>
                    </div>

                    <div class="social">
                        Síguenos:
                        <a href="https://www.facebook.com/Nueva-Medicina-Online-447710709315953" target="_blank"><i
                                class="fa fa-facebook-square"></i> facebook</a>
                        <a href="#" target="_blank"><i class="fa fa-twitter-square"></i> twitter</a>
                    </div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer -->


    <!--[if lt IE 9]>
<script src="/js/jquery/jquery-1.12.1.min.js"></script>
<![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="/js/jquery/jquery-2.2.1.min.js"></script>
    <!--<![endif]-->
    <script src="/js/jquery/jquery-1.12.1.js"></script>

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bootstrap/js/bootstrap.min.js"></script>

    <!-- Scripts files -->
    <script src="/js/fancybox/jquery.fancybox.js"></script>
    <script src="/js/jquery.waitforimages.js"></script>
    <script src="/js/slick/slick.min.js"></script>
    <script src="/js/masonry.pkgd.js"></script>

    <!-- General JS Scripts Manager -->
    <script src="/js/jquery.cookie.js"></script>
    <script src="/js/general.js"></script>
    @stack('scripts')

    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "url": "https://www.nuevamedicina.online/",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "https://www.nuevamedicina.online/buscar?query={query}",
    "query-input": "required name=query"
  }
}
</script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "WebSite",
  "name": "Nueva Medicina",
  "alternateName": "Nueva Medicina del Futuro",
  "url": "https://www.nuevamedicina.online"
}
</script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Nueva Medicina",
  "url": "https://www.nuevamedicina.online",
  "sameAs": [
    "https://www.facebook.com/Nueva-Medicina-Online-447710709315953",
  ]
}
</script>

</body>

</html>