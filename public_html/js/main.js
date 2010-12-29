function main(){
    
    main.prototype.search_init = function(){
    // key pressed in search input
        $('#main_search_input').keyup(function(e){
            
            query_string = $('#main_search_input').val();
            query_string = $.trim(query_string);
            if(!query_string){
        		main.prototype.clear_results();
        		return false;
        	} 
        	// dont do anything when enter clicked
        	var code = (e.keyCode ? e.keyCode : e.which);
			
            if(code == 13) { //Enter keycode
                //изменяет строку при нажатии клавиши ввода
                $.address.value(query_string);
				return;
			}
            main.prototype.search_by_query(query_string, true);
        });
    }
    main.prototype.clear_results = function(){
    	$('#search_suggest').html('').hide();
    	$('#search_results_holder').html('').hide();
    }   
    
    // calls server with a query string
    main.prototype.search_by_query = function(query_string, use_suggest){
        $.ajax({
            url : '/ajax/search_suggest',
            dataType : 'json',
            data : { 'query_string' : query_string},
            type : 'post',
            success : function(response)
            {                
                if(!response.status)
                {
                    $('#search_results_holder').html('Error');
                    return;
                }
				$('#search_suggest').html('');
                
                if(use_suggest)
                {
                    $('#search_suggest').html(response.items);
					// if results = 0 hide the suggest box
					if(response.items.length) $('#search_suggest').show();
					else $('#search_suggest').hide();
				}
                
                return;
            }            
        });
    }
    main.prototype.products_show_init = function(){}
}