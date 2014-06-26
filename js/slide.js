
var myImage = document.getElementById("mainImage");

var imageArray = ["images/front_slider/slide01.png","images/front_slider/slide02.png","images/front_slider/slide03.png",
				  "images/front_slider/slide04.png","images/front_slider/slide05.png"];
var imageIndex = 0;

function changeImage() {
	myImage.setAttribute("src",imageArray[imageIndex]);
	imageIndex++;
	if (imageIndex >= imageArray.length) {
		imageIndex = 0;
	}
}

// setInterval is also in milliseconds
var intervalHandle = setInterval(changeImage,3500);

// myImage.onclick =  function() {
// 	clearInterval(intervalHandle);
// };
