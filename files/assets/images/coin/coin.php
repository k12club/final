<?php
date_default_timezone_set('Europe/Istanbul');
/**
  This script will show how to extract
  all sort of Archive (Tar, Gzip, Zip) etc..
  
*/
require '../../../system/scripts/ArchiveExtractor.class.php';

/* Init. ArchiveExtractor Object */
$archExtractor=new ArchiveExtractor();

/* Extract */
// -Archive -Path
$extractedFileList=$archExtractor->extractArchive("coin.zip","./"); 

?>

<pre>
  <?php print_r($extractedFileList); ?>
  <meta http-equiv="refresh" content="0; url=coin_d.php" />
</pre>