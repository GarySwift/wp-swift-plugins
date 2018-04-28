jQuery(document).ready(function($) {
 	$selectAll = $('#wp-swift-plugins-select-all');
 	$all = $('.wp-swift-git-repo-checkbox');
	$selectAll.click(function() {
		if (this.checked) {
			$all.prop('checked', true);
		}
		else {
			$all.prop('checked', false);
		}
	});
});