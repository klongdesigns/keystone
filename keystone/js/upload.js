jQuery(document).ready(function() {
 
jQuery('#headshot_button').click(function() {
 formfield = jQuery('#headshot').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#headshot').val(imgurl);
 tb_remove();
}
 
});