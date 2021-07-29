import React, {Component} from 'react';

var Typewriter = (props) => {

	return (
		<span className ="typewriter">
		{props.parts.map((line, index) =>(
			index == 0 ?
			<span style = {{animation: "typing " +(.03 *line.length) + "s steps("+ line.length + ", end) 0s 1 normal forwards"}}>
			{line}
			</span>
			:<span style = {{animation: "typing " +(.04 *line.length) + "s steps("+ line.length + ", end) " + (.03 *props.parts[index-1].length) + "s 1 normal forwards"}}>
			{line}
			</span>

		))}
		</span>
	);
}

export default Typewriter;
