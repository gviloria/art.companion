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
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            border-radius: 5px; /* 5px rounded corners */
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        img {
            border-radius: 5px 5px 0 0;
        }

        .contanah {
            padding: 2px 16px;
        }

        .center-cropped {
            width: 300px;
            height: 300px;
            background-position: center center;
            background-repeat: no-repeat;
        }

    </style>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <link rel="stylesheet" href="css/github-prettify-theme.css">
    <script src="js/site.js"></script>

    <link href="//cdn.rawgit.com/noelboss/featherlight/1.6.1/release/featherlight.min.css" type="text/css" rel="stylesheet" />

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

    <div style="margin-bottom: 110px;"></div>

    <div class="ten columns">
        <tbody>

        <?php

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
        $query = "SELECT * FROM artists";
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

            $picture = mysqli_result($result, $i, "Picture");
            $artist = mysqli_result($result, $i, "Artist");
            $website = mysqli_result($result, $i, "Website");


            echo '<th>
                    <div class="card" style="display: inline-block; margin:25px;">
                    
                        <a target="_tab" href="'. $website .'">
                            <img src="'. $picture .'" class="center-cropped">
                        </a>
                        
                        <div class="contanah">
                            <h2 style="text-align: center; margin-top: 10px;">'. $artist .'</h2>
                        </div>
                        
                    </div>
                  </th>';

            $i++;
        }

        mysqli_close($dbConnection);
        ?>
        </tr>
        </tbody>
        </table>
    </div>

    <script src="//code.jquery.com/jquery-latest.js"></script>
    <script src="//cdn.rawgit.com/noelboss/featherlight/1.6.1/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

</head>
</html>