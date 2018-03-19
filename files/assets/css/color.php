<?php
header("Content-type: text/css; charset: UTF-8");
include("../../system/functions.php");
$sitcolor_data = $db->get_row("SELECT setting_value FROM settings WHERE setting_name = 'setting_color' ");
$sitecolor = json_decode($sitcolor_data->setting_value,JSON_UNESCAPED_UNICODE);
?>
a,
p a,
p a:hover,
a:hover,
a:focus,
a:active,
.cX-stars span:after,
.cX-categories .item:hover h3,
.cX-categories .center .item h3,
.cX-postmetadata li a:hover,
.cX-titleshortcode h2 span,
.cX-statistics li h3,
.cX-statisticicon i,
.cX-widgetcontent ul li a:hover,
.cX-contentbox h2,
.cX-readmessage .cX-description time:before,
.cX-pkgexpirycounter ul li .cX-holder h3,
.cX-404message h3 span,
.cX-comingsooncounter ul li .cX-holder h3,
.cX-profilephotogallery ul li figure i { color: <?=$sitecolor[site_color]?>; }
.cX-dropdowarrow,
.navbar-toggle,
.cX-prev:hover,
.cX-next:hover,
.cX-btnphone:hover,
.cX-testimonial figure:after,
.cX-footerbar,
.cX-homebannervtwo .cX-formbannersearch .cX-btn,
.cX-pagination ul li.cX-nextpage a:hover,
.cX-pagination ul li.cX-prevpage a:hover,
.cX-pagination ul li.cX-active a,
.cX-pagination ul li a:hover,
.cX-views ul li.cX-active a,
.cX-views ul li a:hover,
.ui-slider-horizontal .ui-slider-range,
.cX-pricebox,
.cX-sellercontact .cX-btnphone,
.cX-formreportthisad .cX-btns .cX-btn:hover,
.cX-formsearch button,
.cX-btnedit i,
.cX-dashboardscrollbar .mCSB_scrollTools .mCSB_dragger .mCSB_dragger_bar,
.mCSB_scrollTools.mCSB_scrollTools_horizontal .mCSB_dragger .mCSB_dragger_bar,
.cX-adstatusactive,
.cX-dashboardtable tbody tr:hover .cX-btnactionview,
.cX-404message h2:before,
.cX-videobox figure .cX-btnplayvideo i,
.cX-close,
.cX-btn:before,
.cX-btnreply:hover,
.cX-btnreply:focus,
.cX-btnreply:active,
.cX-lastupdate:before,
.cX-iconseprator i{ background:<?=$sitecolor[site_color]?>; }
.cX-color { background:<?=$sitecolor[site_color]?> !important; }
input:focus,
.select select:focus,
.form-control:focus,
.cX-themerangeslider .ui-slider-handle,
.cX-pricebox:before,
.cX-formreportthisad .cX-btns .cX-btn:hover,
.cX-navdashboard ul li.cX-active > a,
.cX-navdashboard ul li a:focus,
.cX-navdashboard ul li a:hover { border-color: <?=$sitecolor[site_color]?>; }
.cX-btnedit{ border-color: rgba(0, 204,103,0.50); }
.cX-viewchart .ct-bar:hover {stroke: <?=$sitecolor[site_color]?>;}
.cX-btndropdown,
.cX-comingsooncounter ul li .cX-holder h4 { color: <?=$sitecolor[header_color]?>; }
.cX-topbar,
.cX-prev,
.cX-next,
.cX-post figure,
.cX-footer,
.cX-formnewsletter fieldset button,
.cX-adstatussold,
.cX-dashboardtable tbody tr:hover .cX-btnactionedit,
.cX-tagsold,
.cX-404message:before,
.cX-404message h2,
.cX-logobox:before { background:<?=$sitecolor[header_color]?>; }
.cX-videobox figure .cX-btnplayvideo{background: rgba(54,59,77,0.10);}
.cX-btndropdown .cX-userdp img,
.cX-comingsooncounter ul li .cX-holder { border-color: <?=$sitecolor[header_color]?>; }
.dataTable tr.even {
  background-color: #dfe7f2;
  color: #000;
}
.cX-featureicon{color: <?=$sitecolor[site_color]?>;}
.cX-featureicon:hover{color: <?=$sitecolor[header_color]?>;}