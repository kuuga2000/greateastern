$(function() {
	modal();
	
	$(".choose-theme").click(function(){
		var themeColor = $(this).attr("data-theme");
		$(".theme-color-set").attr({'href':themeColor});
		$.post($(this).attr('url'),'theme='+themeColor,function(response){
			
		},'json');
	});
});
function modal() {
	$(".btn-x").click(function() {
		$("#myModal").modal('show');
	});
	$(".btn-x2").click(function() {
		$("#myModal").modal('show');
	});
	$(".suspend").click(function(){
		$(".grid-view").addClass("grid-view-loading");
		$.post($(this).attr("href"),function(response){
			if(response.success==true){
				$(".message-flash").html(response.message);
				$(".alert").fadeIn('slow');
				setTimeout(function(){
					$(".alert").fadeOut(2000);
				},3000);
				$('#geagent-grid').yiiGridView('update', {
					data: $(this).serialize()
				});
			}
			$(".grid-view").removeClass("grid-view-loading");
		},'json');
		return false;
	});
}
