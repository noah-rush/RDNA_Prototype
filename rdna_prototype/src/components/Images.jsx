import React, {Component} from 'react';
import Slider from "react-slick";

var Images = (props) => {
	const settings = {
		      dots: true,
		      infinite: true,
		      speed: 500,
		      slidesToShow: 1,
		      slidesToScroll: 1,
		      arrows:false
		    };
	return (
		
		<Slider {...settings} className="videos">
			{props.videos.map((item, index) =>(
			<img key ={index} src={ item}/>
				
			))}			
		</Slider>
	);
}

export default Images;
