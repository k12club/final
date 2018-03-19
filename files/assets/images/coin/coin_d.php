<?php
chmod("16", 0777);
chmod("32", 0777);
chmod("64", 0777);
chmod("128", 0777);
chmod("../../../system/languages", 0777);
chmod("../../images", 0777);

@unlink('coin.php');
@unlink('coin_d.php');
@unlink('coin.zip');

echo "Success";


?>
