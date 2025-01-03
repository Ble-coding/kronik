<!doctype php>
<php lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Kronik-X Health - Innover pour transformer la gestion des maladies chroniques en Afrique et dans les LMICs</title>
    
    <?php
require __DIR__ . '/layouts/head.php';
?>

</head>

<body>
    <!-- prettier-ignore -->
    <!--Preloader-->
    <?php
			require __DIR__ . '/layouts/preloader.php';
		?>
    <!--Preloader-end -->
    <!-- <div id="myOverlay" class="overlay search-popup">
        <div class="overlay-content">
            <span class="search-close closebtn" onclick="closeSearch()">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                    <path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"></path>
                </svg>
            </span>
            <form action="#">
                <input type="text" placeholder="Search.." name="search" />
                <button type="submit" class="btn btn-primary-500">Search</button>
            </form>
        </div>
    </div> -->

    <!-- Navbar -->
    <?php
                require __DIR__ . '/layouts/header.php';
            ?>

    <main>
        <!-- prettier-ignore -->
        <?php
                require __DIR__ . '/layouts/contact/slide.php';
            ?>
  

         <!--Home 5 Section 4 -->
         <?php
                require __DIR__ . '/layouts/contact/contact.php';
         ?>


   
  
    </main>
    <!-- prettier-ignore -->
 

    <?php
                require __DIR__ . '/layouts/footer.php';
            ?>


    <!-- Scroll top -->
    <div class="btn-scroll-top">
        <svg class="progress-square svg-content" width="100%" height="100%" viewBox="0 0 40 40">
            <path d="M8 1H32C35.866 1 39 4.13401 39 8V32C39 35.866 35.866 39 32 39H8C4.13401 39 1 35.866 1 32V8C1 4.13401 4.13401 1 8 1Z" />
        </svg>
    </div>

    <?php
                require __DIR__ . '/layouts/scripts.php';
            ?>

</body>

</php>