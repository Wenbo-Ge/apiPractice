


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Weather</title>
  </head>
  <body>
    
    <h2 style="width: 30rem;">Type city name below to see weather report <span class="badge badge-danger">Try it!!!</span></h2>

<div class="form-group">
    <label for="city" class="font-weight-bold">City:</label>
    <input type="text"  id="city"  placeholder="Enter City" style="width: 20rem">
    <br>
    <button type="submit" class="btn btn-primary" onclick="searchWeather()">Current Weather</button>
    <button type="submit" class="btn btn-success" onclick="forecastWeather()">Forecast</button>
 </div>

<!-- render weather info here -->
 <div id="info_current">
 	
 </div>


<div id="info_forecast" style="overflow: scroll; height: 30vh;width: 30rem">
    
 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	function searchWeather(){

    		var search=$('#city').val();
    		var apiKey='8df25373e2ca625f7ba9376f5a885f4d';
    		console.log(search);
            if (!search) {

                alert('Please enter a city!');
            } else {
            
    		  // 前端 restful api 就是ajax
    		  // api：用ajax 和rest的方式  按照标准把后端数据返回前端
        		$.get(
        			'http://api.openweathermap.org/data/2.5/weather?q=' +search  +'&appid='+apiKey,
        			// 接callback function
        			function(data,statusTxt,xhr){
        				// data 返回的是json，用json formatter看格式
                       
                       //?????????????
        				$('#info_current').html('<h3 class="text-primary">Current temperature: '+data.main.temp+'</h3>'+'<h3 class="text-primary">Current weather: '+data.weather[0].main+'</h3>');
                        //????????????
                        // if (statusTxt=='fail') {
                        //     alert(statusTxt+' Please enter a city!');
                        // }
                        
        			});
            }
    	}


        function forecastWeather(){
            var forecast=$('#city').val();
            var apiKey='8df25373e2ca625f7ba9376f5a885f4d';
            console.log(forecast);
            if (!search) {

                alert('Please enter a city!');
            }else{
            $.get(
                'http://api.openweathermap.org/data/2.5/forecast?q='+forecast+'&appid='+apiKey, function(data){
//???????????????????
    // alert(statusTxt+'：Forecast is loading!');

     var div='';
    for (var i = 0; i < data.list.length; i++) {$('#info_forecast').html(div+='<h3 class="text-success">Date and time: '+data.list[i].dt_txt+'</h3>'+'<h3 class="text-success">Temperature: '+data.list[i].main.temp+'</h3>'+'<h3 class="text-success">Weather: '+data.list[i].weather[0].main+'</h3>')}  
                });
        }
    }


       

      




        // function forecastWeather(){
        //     var forecast=$('#city').val();
        //     var apiKey='8df25373e2ca625f7ba9376f5a885f4d';
        //     console.log(forecast);
        //     $.get(
        //         'http://api.openweathermap.org/data/2.5/forecast?q='+forecast+'&appid='+apiKey, function(data){
        //             $('#info_forecast').html('Tomorrow temperature and weather: '+'<h3 class="text-primary">Date and time: '+data.list[0].dt_txt+'</h3>'+'<h3 class="text-primary">Temperature: '+data.list[0].main.temp+'</h3>'+'<h3 class="text-primary">Weather: '+data.list[0].weather[0].main+'</h3>'+'<h3 class="text-primary">Date: '+data.list[1].dt_txt+'</h3>'+'<h3 class="text-primary">Temperature: '+data.list[1].main.temp+'</h3>'+'<h3 class="text-primary">Weather: '+data.list[1].weather[0].main+'</h3>'+'<h3 class="text-primary">Date: '+data.list[2].dt_txt+'</h3>'+'<h3 class="text-primary">Temperature: '+data.list[2].main.temp+'</h3>'+'<h3 class="text-primary">Weather: '+data.list[2].weather[0].main+'</h3>')
        //         });
        // }
    </script>
  </body>
</html>