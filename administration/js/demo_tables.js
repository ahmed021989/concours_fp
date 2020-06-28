
    function delete_row(row){
        
        var box = $("#message-box-danger");
        box.addClass("open");
        
        box.find(".mb-control-yes").on("click",function(){
            box.removeClass("open");
			  supprecrut(row,'divlist');
            $("#"+row).hide("slow",function(){
                $(this).remove();
            });
        });
        
    }
