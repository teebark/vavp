<?php
/* Modified version of Divi index.php for vavp news-updates-cat blog page */
get_header(); 
echo do_shortcode('[et_pb_section global_module="189"][/et_pb_section]'); 
?>
<div id="news-updates">
<?php
get_template_part('blog-archive-template');
?>