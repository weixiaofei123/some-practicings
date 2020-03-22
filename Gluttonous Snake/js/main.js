$(function(){
	map_canvas(".container","canvas")
	var snake = new Snake(5,{"x":150,"y":100},"right",".container");
	//click start
	$(".start").click(function(){
		snake.move_snake();
	})
	//click pause
	$("#pause").click(function(){
		snake.pause_snake();
		$("#pause").toggleClass("pause");
	})
	//map with canvas
	function map_canvas(container,canvas){
		var width_container=parseInt($(container).css("width"))
		var height_container=parseInt($(container).css("height"))
		var c=document.getElementById(canvas);
		c.width=width_container;
		c.height=height_container;
		var ctx=c.getContext("2d");
		for (var i = 0; i < 70; i++) {
			ctx.moveTo(i*10,0);
			ctx.lineTo(i*10,500)
			ctx.strokeStyle="#bdb7b7";
			ctx.stroke()
		}
		for (var i = 0; i < 50; i++) {
			ctx.moveTo(0,i*10);
			ctx.lineTo(700,i*10)
			ctx.strokeStyle="#bdb7b7";
			ctx.stroke()
		}

	}
})
	
	

	
