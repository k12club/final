<?php 
$path = "../../".substr($site_setting[logo], 3);
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


$path1 = '../../assets/images/coin/128/'.$coin_flag.".png";
$type1 = pathinfo($path1, PATHINFO_EXTENSION);
$data1 = file_get_contents($path1);
$base64_images_1 = 'data:image/' . $type1 . ';base64,' . base64_encode($data1);


$path2 = "../../assets/images/coin/32/bitcoin.png";
$type2 = pathinfo($path2, PATHINFO_EXTENSION);
$data2 = file_get_contents($path2);
$base64_img_1 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);


$path3 = "../../assets/images/coin/32/ethereum.png";
$type3 = pathinfo($path3, PATHINFO_EXTENSION);
$data3 = file_get_contents($path3);
$base64_img_2 = 'data:image/' . $type3 . ';base64,' . base64_encode($data3);


$path4 = "../../assets/images/coin/32/ripple.png";
$type4 = pathinfo($path4, PATHINFO_EXTENSION);
$data4 = file_get_contents($path4);
$base64_img_3 = 'data:image/' . $type4 . ';base64,' . base64_encode($data4);


$path5 = "../../assets/images/coin/32/litecoin.png";
$type5 = pathinfo($path5, PATHINFO_EXTENSION);
$data5 = file_get_contents($path5);
$base64_img_4 = 'data:image/' . $type5 . ';base64,' . base64_encode($data5);


$path6 = "../../assets/images/coin/32/iota.png";
$type6 = pathinfo($path6, PATHINFO_EXTENSION);
$data6 = file_get_contents($path6);
$base64_img_5 = 'data:image/' . $type6 . ';base64,' . base64_encode($data6);

$link_1=$site_url."/currencies/bitcoin";
$link_2=$site_url."/currencies/ethereum";
$link_3=$site_url."/currencies/ripple";
$link_4=$site_url."/currencies/litecoin";
$link_5=$site_url."/currencies/iota";

$link_i_1=$site_url;
$link_i_2=$site_url."/converter-calculator";
$link_i_3=$site_url."/qr-code-generator";
$link_i_4=$site_url."/coin-price-alert";



$mail->msgHTML('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width"><style type="text/css">.wrapper{width:100%}#outlook a,body{padding:0}body{width:100%!important;min-width:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;margin:0;Margin:0;box-sizing:border-box}.ExternalClass{width:100%}.ExternalClass,.ExternalClass div,.ExternalClass font,.ExternalClass p,.ExternalClass span,.ExternalClass td{line-height:100%}#backgroundTable{margin:0;Margin:0;padding:0;width:100%!important;line-height:100%!important}img{outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;width:auto;max-width:100%;clear:both;display:block}center{width:100%;min-width:580px}a img{border:none}p{margin:0 0 0 10px;Margin:0 0 0 10px}table{border-spacing:0;border-collapse:collapse}td{word-wrap:break-word;-webkit-hyphens:auto;hyphens:auto;border-collapse:collapse!important}table,td,tr{padding:0;vertical-align:top;text-align:left}@media only screen{html{min-height:100%;background:#f3f3f3}}table.body{background:#f3f3f3;height:100%;width:100%}table.container{background:#fefefe;width:580px;margin:0 auto;Margin:0 auto;text-align:inherit}table.row{padding:0;position:relative}table.row,table.spacer{width:100%}table.spacer td{mso-line-height-rule:exactly}table.container table.row{display:table}td.column,td.columns,th.column,th.columns{margin:0 auto;Margin:0 auto;padding-left:16px;padding-bottom:16px}td.column .column,td.column .columns,td.columns .column,td.columns .columns,th.column .column,th.column .columns,th.columns .column,th.columns .columns{padding-left:0!important;padding-right:0!important}td.column .column center,td.column .columns center,td.columns .column center,td.columns .columns center,th.column .column center,th.column .columns center,th.columns .column center,th.columns .columns center{min-width:none!important}td.column.last,td.columns.last,th.column.last,th.columns.last{padding-right:16px}td.columns table:not(.button),td.column table:not(.button),th.columns table:not(.button),th.column table:not(.button){width:100%}td.large-1,th.large-1{width:32.33333px;padding-left:8px;padding-right:8px}td.large-1.first,th.large-1.first{padding-left:16px}td.large-1.last,th.large-1.last{padding-right:16px}.collapse>tbody>tr>td.large-1,.collapse>tbody>tr>th.large-1{padding-right:0;padding-left:0;width:48.33333px}.collapse td.large-1.first,.collapse td.large-1.last,.collapse th.large-1.first,.collapse th.large-1.last{width:56.33333px}td.large-1 center,th.large-1 center{min-width:.33333px}.body .columns td.large-1,.body .columns th.large-1,.body .column td.large-1,.body .column th.large-1{width:8.33333%}td.large-2,th.large-2{width:80.66667px;padding-left:8px;padding-right:8px}td.large-2.first,th.large-2.first{padding-left:16px}td.large-2.last,th.large-2.last{padding-right:16px}.collapse>tbody>tr>td.large-2,.collapse>tbody>tr>th.large-2{padding-right:0;padding-left:0;width:96.66667px}.collapse td.large-2.first,.collapse td.large-2.last,.collapse th.large-2.first,.collapse th.large-2.last{width:104.66667px}td.large-2 center,th.large-2 center{min-width:48.66667px}.body .columns td.large-2,.body .columns th.large-2,.body .column td.large-2,.body .column th.large-2{width:16.66667%}td.large-3,th.large-3{width:129px;padding-left:8px;padding-right:8px}td.large-3.first,th.large-3.first{padding-left:16px}td.large-3.last,th.large-3.last{padding-right:16px}.collapse>tbody>tr>td.large-3,.collapse>tbody>tr>th.large-3{padding-right:0;padding-left:0;width:145px}.collapse td.large-3.first,.collapse td.large-3.last,.collapse th.large-3.first,.collapse th.large-3.last{width:153px}td.large-3 center,th.large-3 center{min-width:97px}.body .columns td.large-3,.body .columns th.large-3,.body .column td.large-3,.body .column th.large-3{width:25%}td.large-4,th.large-4{width:177.33333px;padding-left:8px;padding-right:8px}td.large-4.first,th.large-4.first{padding-left:16px}td.large-4.last,th.large-4.last{padding-right:16px}.collapse>tbody>tr>td.large-4,.collapse>tbody>tr>th.large-4{padding-right:0;padding-left:0;width:193.33333px}.collapse td.large-4.first,.collapse td.large-4.last,.collapse th.large-4.first,.collapse th.large-4.last{width:201.33333px}td.large-4 center,th.large-4 center{min-width:145.33333px}.body .columns td.large-4,.body .columns th.large-4,.body .column td.large-4,.body .column th.large-4{width:33.33333%}td.large-5,th.large-5{width:225.66667px;padding-left:8px;padding-right:8px}td.large-5.first,th.large-5.first{padding-left:16px}td.large-5.last,th.large-5.last{padding-right:16px}.collapse>tbody>tr>td.large-5,.collapse>tbody>tr>th.large-5{padding-right:0;padding-left:0;width:241.66667px}.collapse td.large-5.first,.collapse td.large-5.last,.collapse th.large-5.first,.collapse th.large-5.last{width:249.66667px}td.large-5 center,th.large-5 center{min-width:193.66667px}.body .columns td.large-5,.body .columns th.large-5,.body .column td.large-5,.body .column th.large-5{width:41.66667%}td.large-6,th.large-6{width:274px;padding-left:8px;padding-right:8px}td.large-6.first,th.large-6.first{padding-left:16px}td.large-6.last,th.large-6.last{padding-right:16px}.collapse>tbody>tr>td.large-6,.collapse>tbody>tr>th.large-6{padding-right:0;padding-left:0;width:290px}.collapse td.large-6.first,.collapse td.large-6.last,.collapse th.large-6.first,.collapse th.large-6.last{width:298px}td.large-6 center,th.large-6 center{min-width:242px}.body .columns td.large-6,.body .columns th.large-6,.body .column td.large-6,.body .column th.large-6{width:50%}td.large-7,th.large-7{width:322.33333px;padding-left:8px;padding-right:8px}td.large-7.first,th.large-7.first{padding-left:16px}td.large-7.last,th.large-7.last{padding-right:16px}.collapse>tbody>tr>td.large-7,.collapse>tbody>tr>th.large-7{padding-right:0;padding-left:0;width:338.33333px}.collapse td.large-7.first,.collapse td.large-7.last,.collapse th.large-7.first,.collapse th.large-7.last{width:346.33333px}td.large-7 center,th.large-7 center{min-width:290.33333px}.body .columns td.large-7,.body .columns th.large-7,.body .column td.large-7,.body .column th.large-7{width:58.33333%}td.large-8,th.large-8{width:370.66667px;padding-left:8px;padding-right:8px}td.large-8.first,th.large-8.first{padding-left:16px}td.large-8.last,th.large-8.last{padding-right:16px}.collapse>tbody>tr>td.large-8,.collapse>tbody>tr>th.large-8{padding-right:0;padding-left:0;width:386.66667px}.collapse td.large-8.first,.collapse td.large-8.last,.collapse th.large-8.first,.collapse th.large-8.last{width:394.66667px}td.large-8 center,th.large-8 center{min-width:338.66667px}.body .columns td.large-8,.body .columns th.large-8,.body .column td.large-8,.body .column th.large-8{width:66.66667%}td.large-9,th.large-9{width:419px;padding-left:8px;padding-right:8px}td.large-9.first,th.large-9.first{padding-left:16px}td.large-9.last,th.large-9.last{padding-right:16px}.collapse>tbody>tr>td.large-9,.collapse>tbody>tr>th.large-9{padding-right:0;padding-left:0;width:435px}.collapse td.large-9.first,.collapse td.large-9.last,.collapse th.large-9.first,.collapse th.large-9.last{width:443px}td.large-9 center,th.large-9 center{min-width:387px}.body .columns td.large-9,.body .columns th.large-9,.body .column td.large-9,.body .column th.large-9{width:75%}td.large-10,th.large-10{width:467.33333px;padding-left:8px;padding-right:8px}td.large-10.first,th.large-10.first{padding-left:16px}td.large-10.last,th.large-10.last{padding-right:16px}.collapse>tbody>tr>td.large-10,.collapse>tbody>tr>th.large-10{padding-right:0;padding-left:0;width:483.33333px}.collapse td.large-10.first,.collapse td.large-10.last,.collapse th.large-10.first,.collapse th.large-10.last{width:491.33333px}td.large-10 center,th.large-10 center{min-width:435.33333px}.body .columns td.large-10,.body .columns th.large-10,.body .column td.large-10,.body .column th.large-10{width:83.33333%}td.large-11,th.large-11{width:515.66667px;padding-left:8px;padding-right:8px}td.large-11.first,th.large-11.first{padding-left:16px}td.large-11.last,th.large-11.last{padding-right:16px}.collapse>tbody>tr>td.large-11,.collapse>tbody>tr>th.large-11{padding-right:0;padding-left:0;width:531.66667px}.collapse td.large-11.first,.collapse td.large-11.last,.collapse th.large-11.first,.collapse th.large-11.last{width:539.66667px}td.large-11 center,th.large-11 center{min-width:483.66667px}.body .columns td.large-11,.body .columns th.large-11,.body .column td.large-11,.body .column th.large-11{width:91.66667%}td.large-12,th.large-12{width:564px;padding-left:8px;padding-right:8px}td.large-12.first,th.large-12.first{padding-left:16px}td.large-12.last,th.large-12.last{padding-right:16px}.collapse>tbody>tr>td.large-12,.collapse>tbody>tr>th.large-12{padding-right:0;padding-left:0;width:580px}.collapse td.large-12.first,.collapse td.large-12.last,.collapse th.large-12.first,.collapse th.large-12.last{width:588px}td.large-12 center,th.large-12 center{min-width:532px}.body .columns td.large-12,.body .columns th.large-12,.body .column td.large-12,.body .column th.large-12{width:100%}td.large-offset-1,td.large-offset-1.first,td.large-offset-1.last,th.large-offset-1,th.large-offset-1.first,th.large-offset-1.last{padding-left:64.33333px}td.large-offset-2,td.large-offset-2.first,td.large-offset-2.last,th.large-offset-2,th.large-offset-2.first,th.large-offset-2.last{padding-left:112.66667px}td.large-offset-3,td.large-offset-3.first,td.large-offset-3.last,th.large-offset-3,th.large-offset-3.first,th.large-offset-3.last{padding-left:161px}td.large-offset-4,td.large-offset-4.first,td.large-offset-4.last,th.large-offset-4,th.large-offset-4.first,th.large-offset-4.last{padding-left:209.33333px}td.large-offset-5,td.large-offset-5.first,td.large-offset-5.last,th.large-offset-5,th.large-offset-5.first,th.large-offset-5.last{padding-left:257.66667px}td.large-offset-6,td.large-offset-6.first,td.large-offset-6.last,th.large-offset-6,th.large-offset-6.first,th.large-offset-6.last{padding-left:306px}td.large-offset-7,td.large-offset-7.first,td.large-offset-7.last,th.large-offset-7,th.large-offset-7.first,th.large-offset-7.last{padding-left:354.33333px}td.large-offset-8,td.large-offset-8.first,td.large-offset-8.last,th.large-offset-8,th.large-offset-8.first,th.large-offset-8.last{padding-left:402.66667px}td.large-offset-9,td.large-offset-9.first,td.large-offset-9.last,th.large-offset-9,th.large-offset-9.first,th.large-offset-9.last{padding-left:451px}td.large-offset-10,td.large-offset-10.first,td.large-offset-10.last,th.large-offset-10,th.large-offset-10.first,th.large-offset-10.last{padding-left:499.33333px}td.large-offset-11,td.large-offset-11.first,td.large-offset-11.last,th.large-offset-11,th.large-offset-11.first,th.large-offset-11.last{padding-left:547.66667px}td.expander,th.expander{visibility:hidden;width:0;padding:0!important}table.container.radius{border-radius:0;border-collapse:separate}.block-grid{width:100%;max-width:580px}.block-grid td{display:inline-block;padding:8px}.up-2 td{width:274px!important}.up-3 td{width:177px!important}.up-4 td{width:129px!important}.up-5 td{width:100px!important}.up-6 td{width:80px!important}.up-7 td{width:66px!important}.up-8 td{width:56px!important}h1.text-center,h2.text-center,h3.text-center,h4.text-center,h5.text-center,h6.text-center,p.text-center,span.text-center,table.text-center,td.text-center,th.text-center{text-align:center}h1.text-left,h2.text-left,h3.text-left,h4.text-left,h5.text-left,h6.text-left,p.text-left,span.text-left,table.text-left,td.text-left,th.text-left{text-align:left}h1.text-right,h2.text-right,h3.text-right,h4.text-right,h5.text-right,h6.text-right,p.text-right,span.text-right,table.text-right,td.text-right,th.text-right{text-align:right}span.text-center{display:block;width:100%;text-align:center}@media only screen and (max-width:596px){.small-float-center{margin:0 auto!important;float:none!important}.small-float-center,.small-text-center{text-align:center!important}.small-text-left{text-align:left!important}.small-text-right{text-align:right!important}}img.float-left{float:left;text-align:left}img.float-right{float:right;text-align:right}img.float-center,img.text-center,table.float-center,td.float-center,th.float-center{margin:0 auto;Margin:0 auto;float:none;text-align:center}.hide-for-large{display:none!important;mso-hide:all;overflow:hidden;max-height:0;font-size:0;width:0;line-height:0}@media only screen and (max-width:596px){.hide-for-large{display:block!important;width:auto!important;overflow:visible!important;max-height:none!important;font-size:inherit!important;line-height:inherit!important}}table.body table.container .hide-for-large *{mso-hide:all}@media only screen and (max-width:596px){table.body table.container .hide-for-large,table.body table.container .row.hide-for-large{display:table!important;width:100%!important}}@media only screen and (max-width:596px){table.body table.container .callout-inner.hide-for-large{display:table-cell!important;width:100%!important}}@media only screen and (max-width:596px){table.body table.container .show-for-large{display:none!important;width:0;mso-hide:all;overflow:hidden}}a,body,h1,h2,h3,h4,h5,h6,p,table.body,td,th{color:#0a0a0a;font-family:Helvetica,Arial,sans-serif;font-weight:400;padding:0;margin:0;Margin:0;text-align:left;line-height:1.3}h1,h2,h3,h4,h5,h6{color:inherit;word-wrap:normal;font-family:Helvetica,Arial,sans-serif;font-weight:400;margin-bottom:10px;Margin-bottom:10px}h1{font-size:34px}h2{font-size:30px}h3{font-size:28px}h4{font-size:24px}h5{font-size:20px}h6{font-size:18px}body,p,table.body,td,th{font-size:16px;line-height:1.3}p{margin-bottom:10px;Margin-bottom:10px}p.lead{font-size:20px;line-height:1.6}p.subheader{margin-top:4px;margin-bottom:8px;Margin-top:4px;Margin-bottom:8px;font-weight:400;line-height:1.4;color:#8a8a8a}small{font-size:80%;color:#cacaca}a{color:#2199e8;text-decoration:none}a:active,a:hover{color:#147dc2}a:visited,h1 a,h1 a:visited,h2 a,h2 a:visited,h3 a,h3 a:visited,h4 a,h4 a:visited,h5 a,h5 a:visited,h6 a,h6 a:visited{color:#2199e8}pre{background:#f3f3f3;margin:30px 0;Margin:30px 0}pre code{color:#cacaca}pre code span.callout{color:#8a8a8a;font-weight:700}pre code span.callout-strong{color:#ff6908;font-weight:700}table.hr{width:100%}table.hr th{height:0;max-width:580px;border-top:0;border-right:0;border-bottom:1px solid #0a0a0a;border-left:0;margin:20px auto;Margin:20px auto;clear:both}.stat{font-size:40px;line-height:1}p+.stat{margin-top:-16px;Margin-top:-16px}span.preheader{display:none!important;visibility:hidden;mso-hide:all!important;font-size:1px;color:#f3f3f3;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden}table.button{width:auto;margin:0 0 16px;Margin:0 0 16px 0}table.button table td{text-align:left;color:#fefefe;background:#2199e8;border:2px solid #2199e8}table.button table td a{font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:700;color:#fefefe;text-decoration:none;display:inline-block;padding:8px 16px;border:0 solid #2199e8;border-radius:3px}table.button.radius table td{border-radius:3px;border:none}table.button.rounded table td{border-radius:500px;border:none}table.button.large:active table tr td a,table.button.large:hover table tr td a,table.button.large table tr td a:visited,table.button.small:active table tr td a,table.button.small:hover table tr td a,table.button.small table tr td a:visited,table.button.tiny:active table tr td a,table.button.tiny:hover table tr td a,table.button.tiny table tr td a:visited,table.button:active table tr td a,table.button:hover table tr td a,table.button table tr td a:visited{color:#fefefe}table.button.tiny table a,table.button.tiny table td{padding:4px 8px}table.button.tiny table a{font-size:10px;font-weight:400}table.button.small table a,table.button.small table td{padding:5px 10px;font-size:12px}table.button.large table a{padding:10px 20px;font-size:20px}table.button.expand,table.button.expanded{width:100%!important}table.button.expanded table,table.button.expand table{width:100%}table.button.expanded table a,table.button.expand table a{text-align:center;width:100%;padding-left:0;padding-right:0}table.button.expand center,table.button.expanded center{min-width:0}table.button:active table td,table.button:hover table td,table.button:visited table td{background:#147dc2;color:#fefefe}table.button:active table a,table.button:hover table a,table.button:visited table a{border:0 solid #147dc2}table.button.secondary table td{background:#777}table.button.secondary table a,table.button.secondary table td{color:#fefefe;border:0 solid #777}table.button.secondary:hover table td{background:#919191;color:#fefefe}table.button.secondary:hover table a{border:0 solid #919191}table.button.secondary:active table td a,table.button.secondary:hover table td a,table.button.secondary table td a:visited{color:#fefefe}table.button.success table td{background:#3adb76;border:0 solid #3adb76}table.button.success table a{border:0 solid #3adb76}table.button.success:hover table td{background:#23bf5d}table.button.success:hover table a{border:0 solid #23bf5d}table.button.alert table td{background:#ec5840;border:0 solid #ec5840}table.button.alert table a{border:0 solid #ec5840}table.button.alert:hover table td{background:#e23317}table.button.alert:hover table a{border:0 solid #e23317}table.button.warning table td{background:#ffae00;border:0 solid #ffae00}table.button.warning table a{border:0 solid #ffae00}table.button.warning:hover table td{background:#cc8b00}table.button.warning:hover table a{border:0 solid #cc8b00}table.callout{margin-bottom:16px;Margin-bottom:16px}th.callout-inner{width:100%;border:1px solid #cbcbcb;padding:10px;background:#fefefe}th.callout-inner.primary{background:#def0fc;border:1px solid #444;color:#0a0a0a}th.callout-inner.secondary{background:#ebebeb;border:1px solid #444;color:#0a0a0a}th.callout-inner.success{background:#e1faea;border:1px solid #1b9448;color:#fefefe}th.callout-inner.warning{background:#fff3d9;border:1px solid #996800;color:#fefefe}th.callout-inner.alert{background:#fce6e2;border:1px solid #b42912;color:#fefefe}.thumbnail{border:4px solid #fefefe;box-shadow:0 0 0 1px hsla(0,0%,4%,.2);display:inline-block;line-height:0;max-width:100%;transition:box-shadow .2s ease-out;border-radius:3px;margin-bottom:16px}.thumbnail:focus,.thumbnail:hover{box-shadow:0 0 6px 1px rgba(33,153,232,.5)}table.menu{width:580px}table.menu td.menu-item,table.menu th.menu-item{padding:10px;padding-right:10px}table.menu td.menu-item a,table.menu th.menu-item a{color:#2199e8}table.menu.vertical td.menu-item,table.menu.vertical th.menu-item{padding:10px;padding-right:0;display:block}table.menu.vertical td.menu-item a,table.menu.vertical th.menu-item a{width:100%}table.menu.vertical td.menu-item table.menu.vertical td.menu-item,table.menu.vertical td.menu-item table.menu.vertical th.menu-item,table.menu.vertical th.menu-item table.menu.vertical td.menu-item,table.menu.vertical th.menu-item table.menu.vertical th.menu-item{padding-left:10px}table.menu.text-center a{text-align:center}.menu[align=center]{width:auto!important}body.outlook p{display:inline!important}@media only screen and (max-width:596px){table.body img{width:auto;height:auto}table.body center{min-width:0!important}table.body .container{width:95%!important}table.body .column,table.body .columns{height:auto!important;box-sizing:border-box;padding-left:16px!important;padding-right:16px!important}table.body .collapse .column,table.body .collapse .columns,table.body .column .column,table.body .column .columns,table.body .columns .column,table.body .columns .columns{padding-left:0!important;padding-right:0!important}td.small-1,th.small-1{display:inline-block!important;width:8.33333%!important}td.small-2,th.small-2{display:inline-block!important;width:16.66667%!important}td.small-3,th.small-3{display:inline-block!important;width:25%!important}td.small-4,th.small-4{display:inline-block!important;width:33.33333%!important}td.small-5,th.small-5{display:inline-block!important;width:41.66667%!important}td.small-6,th.small-6{display:inline-block!important;width:50%!important}td.small-7,th.small-7{display:inline-block!important;width:58.33333%!important}td.small-8,th.small-8{display:inline-block!important;width:66.66667%!important}td.small-9,th.small-9{display:inline-block!important;width:75%!important}td.small-10,th.small-10{display:inline-block!important;width:83.33333%!important}td.small-11,th.small-11{display:inline-block!important;width:91.66667%!important}td.small-12,th.small-12{display:inline-block!important;width:100%!important}.columns td.small-12,.columns th.small-12,.column td.small-12,.column th.small-12{display:block!important;width:100%!important}table.body td.small-offset-1,table.body th.small-offset-1{margin-left:8.33333%!important;Margin-left:8.33333%!important}table.body td.small-offset-2,table.body th.small-offset-2{margin-left:16.66667%!important;Margin-left:16.66667%!important}table.body td.small-offset-3,table.body th.small-offset-3{margin-left:25%!important;Margin-left:25%!important}table.body td.small-offset-4,table.body th.small-offset-4{margin-left:33.33333%!important;Margin-left:33.33333%!important}table.body td.small-offset-5,table.body th.small-offset-5{margin-left:41.66667%!important;Margin-left:41.66667%!important}table.body td.small-offset-6,table.body th.small-offset-6{margin-left:50%!important;Margin-left:50%!important}table.body td.small-offset-7,table.body th.small-offset-7{margin-left:58.33333%!important;Margin-left:58.33333%!important}table.body td.small-offset-8,table.body th.small-offset-8{margin-left:66.66667%!important;Margin-left:66.66667%!important}table.body td.small-offset-9,table.body th.small-offset-9{margin-left:75%!important;Margin-left:75%!important}table.body td.small-offset-10,table.body th.small-offset-10{margin-left:83.33333%!important;Margin-left:83.33333%!important}table.body td.small-offset-11,table.body th.small-offset-11{margin-left:91.66667%!important;Margin-left:91.66667%!important}table.body table.columns td.expander,table.body table.columns th.expander{display:none!important}table.body .right-text-pad,table.body .text-pad-right{padding-left:10px!important}table.body .left-text-pad,table.body .text-pad-left{padding-right:10px!important}table.menu{width:100%!important}table.menu td,table.menu th{width:auto!important;display:inline-block!important}table.menu.small-vertical td,table.menu.small-vertical th,table.menu.vertical td,table.menu.vertical th{display:block!important}table.menu[align=center]{width:auto!important}table.button.small-expand,table.button.small-expanded{width:100%!important}table.button.small-expanded table,table.button.small-expand table{width:100%}table.button.small-expanded table a,table.button.small-expand table a{text-align:center!important;width:100%!important;padding-left:0!important;padding-right:0!important}table.button.small-expand center,table.button.small-expanded center{min-width:0}}</style></head><body><span class="preheader"></span><table class="body"><tbody><tr><td align="center" class="center" valign="top"><center data-parsed=""><style class="float-center" type="text/css">body,html,.body {background: #f3f3f3 !important; }.container.header { background: #f3f3f3;}.body-drip {border-top: 8px solid #663399;}</style><table class="spacer float-center"><tbody><tr><td height="32px" style="font-size:32px;line-height:32px;">&nbsp;</td></tr></tbody></table><table align="center" class="container header float-center"><tbody><tr><td><table class="row collapse"><tbody><tr><th class="small-12 large-12 columns first last"><table><tbody><tr><th><img src="'.$base64.'"></th><th class="expander"></th></tr></tbody></table></th></tr></tbody></table></td></tr></tbody></table><table align="center" class="container body-drip float-center"><tbody><tr><td><table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td></tr></tbody></table><center data-parsed=""><img align="center" class="float-center" src="'.$base64_images_1.'"></center><table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td></tr></tbody></table><table class="row"><tbody><tr><th class="small-12 large-12 columns first last"><table><tbody><tr><th><h4 class="text-center">'.$new_name.'</h4><p class="text-center"><strong>New Price: </strong><sup>$</sup>'.$new_price.'</p></th><th class="expander"></th></tr></tbody></table></th></tr></tbody></table><hr><table class="row"><tbody><tr><th class="small-12 large-12 columns first last"><table><tbody><tr><th><center data-parsed=""><table class="button success float-center"><tbody><tr><td><table><tbody><tr><td><a href="'.$link_i_4.'">Create a New Alert</a></td></tr></tbody></table></td></tr></tbody></table></center></th><th class="expander"></th></tr></tbody></table></th></tr></tbody></table><table class="row collapsed footer"><tbody><tr><th class="small-12 large-12 columns first last"><table><tbody><tr><th><table class="spacer"><tbody><tr><td height="16px" style="font-size:16px;line-height:16px;">&nbsp;</td></tr></tbody></table><a href="'.$link_i_1.'">Cryptocurrency Market Cap.</a> | <a href="'.$link_i_2.'">Convert Calculator</a> | <a href="'.$link_i_3.'">QR Code Generator</a></p><center data-parsed=""><table align="center" class="menu float-center"><tbody><tr><td><table><tbody><tr><th class="menu-item float-center"><a href="'.$link_1.'"><img src="'.$base64_img_1.'"></a></th><th class="menu-item float-center"><a href="'.$link_2.'"><img src="'.$base64_img_2.'"></a></th><th class="menu-item float-center"><a href="'.$link_3.'"><img src="'.$base64_img_3.'"></a></th><th class="menu-item float-center"><a href="'.$link_4.'"><img src="'.$base64_img_4.'"></a></th><th class="menu-item float-center"><a href="'.$link_5.'"><img src="'.$base64_img_5.'"></a></th></tr></tbody></table></td></tr></tbody></table></center></th><th class="expander"></th></tr></tbody></table></th></tr></tbody></table></td></tr></tbody></table></center></td></tr></tbody></table><div style="display:none; white-space:nowrap; font:15px courier; line-height:0;"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; </div></body></html>'); ?>