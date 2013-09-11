</section>
<footer class="row">
</footer>
</div><!--end #container -->
<?php wp_footer(); ?>
<?php // echo stripslashes(get_option('oc_footer_code')); ?>
<script>
(function($) {
$(document).foundation();

$(document).ready(function() {
<?php /*
//for prettyPhoto html5 code to be compliant, add this:
	$('a[data-rel]').each(function() {
		$(this).attr('rel', $(this).data('rel'));
	});
	$("a[rel^='prettyPhoto']").prettyPhoto({theme: 'facebook'});
*/?>
});

$(window).load(function() {

<?php // For when you need to do something AFTER everything loads (images and other things) ?>

});


})(jQuery);
</script>

</body>
</html>