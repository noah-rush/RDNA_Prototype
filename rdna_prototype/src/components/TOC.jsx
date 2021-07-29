import React, {Component} from 'react';
import Slider from "react-slick";

var TOC = (props) => {
	const settings = {
		      dots: true,
		      infinite: true,
		      speed: 500,
		      slidesToShow: 1,
		      slidesToScroll: 1,
		      arrows:true
		    };
	return (
		
		<Slider {...settings} className="videos">
			{props.videos.map((item, index) =>(
			<iframe key ={index} src={"http://player.vimeo.com/video/"+ item} width="640" height="400" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen/>
				
			))}			
		</Slider>
	);
}

export default Videos;
