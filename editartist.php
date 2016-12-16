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

    <?php

    //Grabs id from URL
    $id = $_GET["id"];

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'testdb';

    $dbConnection = new mysqli($host, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        printf("Could not connect to the mySQL database: %s\n", mysqli_connect_error());
        exit();
    }

    // Basic Select Statement to check if the table exists
    $query = "SELECT * FROM artists WHERE id = $id";
    $result = mysqli_query($dbConnection, $query);

    $num = $result->num_rows;
    $i = 0;

    function mysqli_result($result, $row, $field = 0)
    {
        // Adjust the result pointer to that specific row
        $result->data_seek($row);
        // Fetch result array
        $data = $result->fetch_array();

        return $data[$field];
    }

    while ($i < $num) {

        $id = mysqli_result($result, $i, "id");
        $picture = mysqli_result($result, $i, "Picture");
        $artist = mysqli_result($result, $i, "Artist");
        $website = mysqli_result($result, $i, "Website");

        $i++;
    }

    mysqli_close($dbConnection);
    ?>

    <div style="background-image: url(http://i.imgur.com/vI6ITHC.jpg); height: 880px; background-size: cover;">

        <div class="container" style="top: 150px;">

            <form method="post" action="editartistdb.php">
                <div class="row">
                    <div class="seven columns">

                        <label for="Artist">
                            <h4 style="font-weight: bold;">Artist</h4>
                        </label>
                        <input class="u-full-width" type="text" placeholder="Name or Username" id="Artist" name="Artist" value="<?php echo $artist?>">

                    </div>
                </div>

                <div class="row">
                    <div class="u-full-width">

                        <label for="Picture">
                            <h4 style="font-weight: bold;">Profile Picture</h4>
                        </label>
                        <input class="u-full-width" type="url" placeholder="Link to picture" id="Picture" name="Picture" value="<?php echo $picture?>">

                    </div>

                </div>

                <div class="row">

                    <div class="u-full-width">

                        <label for="Website">
                            <h4 style="font-weight: bold;">Website</h4>
                        </label>
                        <input class="u-full-width" type="text" placeholder="Link to their website" id="Website"
                               name="Website" value="<?php echo $website?>">

                    </div>


                </div>

                <div>
                    <input type="hidden" id= "id" name="id" value="<?php echo $id ?>"
                </div>


                <input class="button-primary" type="submit" value="Submit">

            </form>
        </div>
    </div>

</head>
</html>