<?php
  require_once('admin/config.php');
  
  
  $page = isset($_GET['page']) ? $_GET['page'] : 1;                    
  $query = mysqli_query($connection, "SELECT * FROM pages WHERE pageid = '$page'");
  $information = mysqli_fetch_assoc($query);                    

?>
<!DOCTYPE HTML>
<html>

<head>
  <title>colour_green</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" title="style" />
</head>

<body>
  <div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <!-- class="logo_colour", allows you to change the colour of the text -->
          <h1><a href="index.html">colour<span class="logo_colour">green</span></a></h1>
          <h2>Simple. Contemporary. Website Template.</h2>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
          <?php

            $query = mysqli_query($connection, "SELECT * FROM pages ORDER BY id ASC");

              while($row = mysqli_fetch_assoc($query)) : ?>
                <li><a href="<?php echo $row['url']; ?>"><?php echo $row['pagetitle']; ?></a></li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>
    <div id="site_content">
        <!-- insert the page content here -->
        <h1><?php echo $information['pagetitle']; ?></h1>
        <p><?php echo $information['pagecontent']; ?></p>
        <ul>
          <li>Internet Explorer 8</li>
          <li>Internet Explorer 7</li>
          <li>FireFox 3.5</li>
          <li>Google Chrome 6</li>
          <li>Safari 4</li>
        </ul>
    </div>
    
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; colour_green | <a href="http://validator.w3.org/check?uri=referer">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a> | <a href="http://www.html5webtemplates.co.uk">Website templates</a>
    </div>
  </div>
</body>
</html>
