<!DOCTYPE HTML>
<html>
<head>
    <title>Songs</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JQUERY -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <!-- STYLESHEETS -->
    <link rel='stylesheet' type='text/css' href='/public/css/style.css' />

    <!-- SCRIPTS -->
    <script src='/public/js/songs.js'></script>
</head>
<body>
    <p>Add a new song:</p>
    <form class='song-form'>
        <label>Name:</label>
        <input type='text' name='title' required/>

        <label>Artist:</label>
        <input type='text' name='artist' required/>

        <label>Genre:</label>
        <input type='text' name='genre' required/>

        <button type='submit'>SUBMIT</button>
    </form>
    <p class='response-message'></p>

    <p>Here are the songs within my database:</p>

    <ul class='song-list'>
        <?php
        foreach($songs as $song) {
            print '<li>' . $song->title . ' ' . $song->artist . ' ' . $song->genre . '</li>';
        }
        ?>
    </ul>
</body>
</html>
