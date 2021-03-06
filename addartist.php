<html>
<head>

    <!-- FONT
    ----------------------------------------------------->
    <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

    <!-- CSS
    ----------------------------------------------------->
    <link rel="stylesheet" href="dist/css/normalize.css">
    <link rel="stylesheet" href="dist/css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- SCRIPTS
    ----------------------------------------------------->
    <script type="text/javascript" async src="http://www.google-analytics.com/ga.js"></script>
    <script id="twitter-wjs" src="http://platform.twitter.com/widgets.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style type="text/css"></style>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="css/github-prettify-theme.css">
    <script src="js/site.js"></script>

    <div class="container" style="position:relative;">
        <nav class="navbar">
            <div class="container">
                <ul class="navbar-list" style="">

                    <li class="navbar-item">
                        <a class="navbar-link" href="index.php">Home</a>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link">|</a>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link" href="#" data-popover="#artNavPopover">My Art</a>
                        <div id="artNavPopover" class="popover">
                            <ul class="popover-list">

                                <li class="popover-item">
                                    <a class="popover-link" href="galleryartonly.php">Artwork</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="gallery.php">Manage Art /// View Info</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="addart.php">Submit Art</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link">|</a>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link" data-popover="#followNavPopover">Artists</a>
                        <div id="followNavPopover" class="popover">

                            <ul class="popover-list">

                                <li class="popover-item">
                                    <a class="popover-link" href="artists.php">Artists Followed</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="artistlist.php">Manage Artists</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="addartist.php">Add Artist</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link">|</a>
                    </li>

                    <li class="navbar-item">
                        <a class="navbar-link" data-popover="#favNavPopover">Favorited</a>
                        <div id="favNavPopover" class="popover">
                            <ul class="popover-list">

                                <li class="popover-item">
                                    <a class="popover-link" href="favoritegalleryartonly.php">Favorited Art</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="favoritegallery.php">Manage Favorites /// View Info</a>
                                </li>

                                <li class="popover-item">
                                    <a class="popover-link" href="addfavoriteart.php">Add To Favorites</a>
                                </li>

                            </ul>
                        </div>
                    </li>

                </ul>
            </div>
        </nav>
    </div>

    <div style="background-image: url(http://i.imgur.com/vI6ITHC.jpg); height: 880px; background-size: cover;">

        <div class="container" style="top: 150px;">

            <form method="post" action="addartistdb.php">
                <div class="row">
                <div class="seven columns">

                    <label for="Artist">
                        <h4 style="font-weight: bold;">Artist</h4>
                    </label>
                    <input class="u-full-width" type="text" placeholder="Name or Username" id="Artist" name="Artist" required>

                </div>
                </div>

                <div class="row">
                    <div class="u-full-width">

                        <label for="Picture">
                            <h4 style="font-weight: bold;">Profile Picture</h4>
                        </label>
                        <input class="u-full-width" type="url" placeholder="Link to picture" id="Picture" name="Picture">

                    </div>

                </div>

                <div class="row">

                    <div class="u-full-width">

                        <label for="Website">
                            <h4 style="font-weight: bold;">Website</h4>
                        </label>
                        <input class="u-full-width" type="text" placeholder="Link to their website" id="Website"
                               name="Website">

                    </div>


                </div>

                <input class="button-primary" type="submit" value="Submit">

            </form>
        </div>
    </div>

</head>
</html>