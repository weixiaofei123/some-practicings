$(function(){

	window.Snake=function(length,position,direction,container){
		this.container=container;
		this.width=parseInt($(this.container).css("width"))/70-2;
		this.step=this.width+2;
		var snake_arr=[];
		var me=this;
		this.length=length;
		this.position=position;
		this.direction=direction;
		//get snake on the map
		this.get_snake=function(){
			for (var i = 0; i < this.length; i++) {
				var oDiv=document.createElement("div");
				$(".container").append($(oDiv));
				$(oDiv).addClass("snakeBody");
				$(oDiv).css({"width":this.width+"px","height":this.width+"px","left":this.position.x-i*this.width+"px","top":this.position.y+"px"})
				snake_arr.push(oDiv)
			}
				$(".snakeBody:first").addClass("snakeHead");
		}
		
		this.init=function(){
			this.get_snake()
			this.food = new Food(this.container);
			this.snake_arr=snake_arr;
			this.change_direction();
		}

		this.init();
		//snake only move one step
		this.move_one_snake=function(elements,direction){
			var oTem=get_head_tem(elements,direction,this.step)
			for (var i = elements.length-1; i >0; i--) {
				var left_new=$(elements[i-1]).css("left")
				var top_new=$(elements[i-1]).css("top")
				$(elements[i]).css({"left":left_new,"top":top_new})
			}
			$(elements[0]).css({"left":oTem.left_tem,"top":oTem.top_tem})
			this.snake_arr=elements;
			// console.log("onestep")
			return this;
		}
	}

	Snake.prototype={
		//snake move animate
		move_snake:function(direction){
			var _this=this;
			var width_container=parseFloat($(this.container).css("width"));
			var height_container=parseFloat($(this.container).css("height"));
			clearInterval(this.timer)
			this.timer=setInterval(function(){
					_this.move_one_snake(_this.snake_arr,_this.direction).eat_snake();
					var left_head=parseFloat($(_this.snake_arr[0]).css("left"));
					var top_head=parseFloat($(_this.snake_arr[0]).css("top"));
					if (left_head<=0||left_head>=width_container||top_head<=0||top_head>=height_container) {
						clearInterval(_this.timer)
					}
			},200)
		},
		//bind key for change direction
		change_direction:function(){
			var _this=this;
			$(document).keydown(function(e){
				switch(e.keyCode){
					case 37:_this.direction="left";break;
					case 38:_this.direction="up";break;
					case 39:_this.direction="right";break;
					case 40:_this.direction="down";break;
				}
			})
		},
		//when eat food
		eat_snake:function(){
			var x_snake_head=parseInt($(this.snake_arr[0]).css("left"));
			var y_snake_head=parseInt($(this.snake_arr[0]).css("top"));
			var x_food=this.food.x_food;
			var y_food=this.food.y_food;
			if (x_snake_head==x_food&&y_snake_head==y_food) {
				console.log("eat")
				var oHead_snake=$(this.snake_arr[0]).clone();
				$(this.container).append(oHead_snake);
				var oTem=get_head_tem(this.snake_arr,this.direction,this.step);
				$(oHead_snake).css({"left":oTem.left_tem+"px","top":oTem.top_tem+"px"})
				this.snake_arr.unshift(oHead_snake);
				this.food.get_food();
			}
		},
		//snake pause
		pause_snake:function(){
			clearInterval(this.timer)
		}
	}
	//private function
		function get_head_tem(elements,direction,step){
			var left_tem,top_tem;
			switch(direction){
				case "up":left_tem=$(elements[0]).css("left");top_tem=parseFloat($(elements[0]).css("top"))-step+"px";break;
				case "down":left_tem=$(elements[0]).css("left");top_tem=parseFloat($(elements[0]).css("top"))+step+"px";break;
				case "left":top_tem=$(elements[0]).css("top");left_tem=parseFloat($(elements[0]).css("left"))-step+"px";break;
				case "right":top_tem=$(elements[0]).css("top");left_tem=parseFloat($(elements[0]).css("left"))+step+"px";break;
				}
				return {left_tem:left_tem,top_tem:top_tem}
		}

})