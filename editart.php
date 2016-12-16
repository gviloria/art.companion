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
$query = "SELECT * FROM my_art WHERE id = $id";
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
    $artwork = mysqli_result($result, $i, "Artwork");
    $title = mysqli_result($result, $i, "Title");
    $medium = mysqli_result($result, $i, "Medium");
    $description = mysqli_result($result, $i, "Description");

    $i++;
}

mysqli_close($dbConnection);
?>
    <div style="background-image: url(http://i.imgur.com/4wBPJmI.jpg); height: 880px; background-size: cover;">

        <div class="container" style="top: 150px;">

            <form method="post" action="editartdb.php">

                <div class="row">
                    <div class="six columns">

                        <label for="Artwork">
                            <h4 style="font-weight: bold;">Artwork</h4>
                        </label>
                        <input class="u-full-width" type="url" placeholder="Link to image" id="Artwork" name="Artwork" value="<?php echo $artwork ?>">

                    </div>

                    <div class="six columns">

                        <label for="Title">
                            <h4 style="font-weight: bold;">Title</h4>
                        </label>
                        <input class="u-full-width" type="text" placeholder="Title" id="Title" name="Title" value="<?php echo $title ?>">

                    </div>
                </div>

                <div class="row">

                    <div class="u-full-width">

                        <label for="Medium">
                            <h4 style="font-weight: bold;">Medium(s) Used</h4>
                        </label>
                        <input class="u-full-width" type="text" placeholder="Types of medium used" id="Medium"
                               name="Medium" value="<?php echo $medium ?>">

                    </div>

                    <label for="Description"><h4 style="font-weight: bold;">Description</h4></label>
                    <textarea class="u-full-width" placeholder="Information about piece" id="Description" name="Description"><?php echo $description ?></textarea>

                </div>

                <div>
                    <input type="hidden" id= "id" name="id" value="<?php echo $id ?>"
                </div>

                <input class="button-primary" type="submit" value="Update">

            </form>
        </div>
    </div>

</head>
</html>