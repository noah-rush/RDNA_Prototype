import React, {Component} from 'react';

var Menu = (props) => {
	let menuClass = props.moveToLeft ? "menu move-left" : "menu"
	let pointerClass = props.pointerControl == "menu" ? "pointer" :"pointer-pointer-off"
	return (

		<div className={menuClass}>
		<div className = {pointerClass} style={{top: (props.active%5*20) + "%"}} ></div>
			{props.menuOptions.map((item, index) =>(
				index == props.active %5 ? 
				<a 
				onMouseEnter={() => props.changeHoverMenu(index)}
				onClick= {() =>props.listProjects(index)}
				key = {index}
				className = "menu-item active">{item}</a>
				:
				<a 
				onMouseEnter={() => props.changeHoverMenu(index)}
				key = {index}
				className = "menu-item ">
				{item}
			</a>
			))}
		
			
		</div>
	);
}

export default Menu;