$(function(){
	
	window.Food=function(selector_container){
		//create food on the map
		var me=this;
		this.container=selector_container;
		this.width=parseInt($(this.container).css("width"))/70-2;
		this.get_food=function(){
		$(".food").remove();
		var oDiv=document.createElement("div");
		$(me.container).append(oDiv);
		$(oDiv).addClass("food");
		var x_food=parseInt(Math.random()*(parseFloat($(me.container).css("width"))/(me.width+2)))*(me.width+2);
		var y_food=parseInt(Math.random()*(parseFloat($(me.container).css("height"))/(me.width+2)))*(me.width+2);
		$(oDiv).css({"left":x_food+"px","top":y_food+"px","width":me.width+"px","height":me.width+"px"});
		this.x_food=x_food;
		this.y_food=y_food;
		}
		this.get_food()
	}
})