<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet" />
</head>

	<body>

    <?php
    if($_SERVER["REQUEST_METHOD"]!='POST') { ?>
        <h2>This page only accepts POST requests</h2>
        <h4>ID sent over query string: <?= $_REQUEST['id'] ?> </h4>
    <?php }

//    exercise 4

    if($_REQUEST["name"] == "" || $_REQUEST["section"] == "" || $_REQUEST["card"] == "" || $_REQUEST["creditCard"] == "") { ?>
        <h1>Sorry</h1>
        <p>You didn't fill out the form completely. <a href="buyagrade.html">Try again?</a> </p>

    <?php }
    else { ?>
		<h1>Thanks, sucker!</h1>

		<p>Your information has been recorded.</p>

		<dl>
			<dt>Name</dt>
			<dd>
                <?= $_POST["name"] ?>
            </dd>

			<dt>Section</dt>
			<dd>
                <?= $_POST["section"] ?>
            </dd>

			<dt>Credit Card</dt>
			<dd>
                <?= $_POST["card"] ?> (<?= $_POST["creditCard"] ?>)
            </dd>


<!--    exercise 3-->
            <?php
            $file = 'suckers.txt';
            $current = file_get_contents($file);
            // Append a new person to the file
            $name = $_POST["name"];
            $current .= "$name; ";
            // Write the contents back to the file
            file_put_contents($file, $current);

            $section = $_POST["section"];
            $current = file_get_contents($file);
            $current .= "$section; ";
            file_put_contents($file, $current);

            $card = $_POST["card"];
            $current = file_get_contents($file);
            $current .= "$card; ";
            file_put_contents($file, $current);

            $creditCard = $_POST["creditCard"];
            $current = file_get_contents($file);
            $current .= "$creditCard\n";
            file_put_contents($file, $current);

            ?>
            <dt>Here are all the suckers who have submtted here:</dt>
                <pre>
                    <?php
                      $current = file_get_contents($file);
                      echo $current;
                    ?>
                </pre>
            <?php } ?>

    </dl>
  </body>
</html>