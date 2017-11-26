$(function(){
//standard värden för väder variabler om användaren inte anger dem
var currentMeasure = "metric";
var lati= "59.33";
var longi= "18.06";
//om användaren anger position så ta och använd den
function getLocation() {
    if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        console.log("Browser does not support geolocation"); 
    }
}
//uppdatera lang och lati variabler med användarens
function showPosition(position) {
   lati= position.coords.latitude.toFixed(2);
   longi = position.coords.longitude.toFixed(2);
   weatherForecast();
} 
// anropa openweathermap för väder
function weatherForecast(){
    // variabler för olika mätningar, ikoner etc
    var metricsURL = "http://api.openweathermap.org/data/2.5/weather?lat="+lati+"&lon="+longi+"&appid=1284ced96e6d855321d02f9a127a0b3b&units=metric";
    var imperialURL = "http://api.openweathermap.org/data/2.5/weather?lat="+lati+"&lon="+longi+"&appid=1284ced96e6d855321d02f9a127a0b3b&units=imperial";
    var celc = "&#8451";
    var faren = "&#8457";
    var symbol ="";
    var url = "";
    // om användaren klickat på Celcius eller farenheit uppdateras currentMeasure med den och använder detta för att ta fram datan
    if(currentMeasure === "imperial"){
        symbol = faren;
        url = imperialURL;
    }else {
        symbol = celc;
        url = metricsURL;
    }
    //använder ajax get för att ta fram och ange datan i sidan
    $.ajax({
    	type:'GET',
    	url: url,
    	dataType:"jsonp",
    	success:function(data){    
        $(".location").text(data.name);
        $(".temp").html(Math.round(data.main.temp)+symbol);
        $(".description").text(data.weather[0].description);
        $(".image").html('<img src="http://openweathermap.org/img/w/'+data.weather[0].icon+'.png" alt="" />');
    	},
        //om det inte lyckas göm hela väder div
        error: function() { 
            $('#weather').css('display', 'none');
        }
    });
};
  
  

// lyssnar efter klick på antingen celcius eller farenheit
$("#weather .measure").click(function(){
    currentMeasure = $(this).attr("data-type");
    weatherForecast();
});
$('#click-weather').click(function(){
    //om användaren anger sin position används dens position för att ta fram väder
    getLocation();
});

// kör ta fram väder
weatherForecast();


//BLUR header bild när man scrollar
$(window).on('scroll', function () {
    var currentPx = $(document).scrollTop()
    var blurAmount = 100;
    var currentPx2 = 0;
    currentPx = currentPx / blurAmount;
    //console.log(currentPx);
    $("#front-page-hero").css({"-webkit-filter": "blur("+currentPx+"px)","filter": "blur("+currentPx+"px)" });     
});

// slow scrolla till toppen när man trycker på #toTop
$("#toTop").click(function() {
    $('html, body').animate({
        scrollTop: $("#top").offset().top
    }, 500);
});
});