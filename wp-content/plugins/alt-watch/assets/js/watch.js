/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function print_clock()
{

    var background = $("<div id='background'></div>");
    var hours = $("<div id='hours'></div>");
    var minutes = $("<div id='minutes'></div>");
    var seconds = $("<div id='seconds'></div>");
    var dot = $("<div id='dot'></div>");
    
	if(!opt['diameter']){ opt['diameter']=110;}
	
    $('#alt_watch').append(background);
    $background = $("#background");
    $background.css({
        "height": parseInt((opt['diameter'])) + "px",
        "width": parseInt(opt['diameter']) + "px",
        "background-color": opt['dial_color']
    });
    if (opt['url'] !== '')
    {
        $background.css({
            "background-image": "url('wp-content/plugins/alt-watch/assets/img/clock.png'), url("+opt['url']+")",
            "background-size": 'cover, cover'
            
            
        });
    }
    $background.append(hours, minutes, seconds, dot);

    $hours = $("#hours");
    $hours.css({
        'width': parseInt(opt['diameter'] / 3) + "px",
        'background-color': opt['h_color']
    });
    $("#minutes").css({
        'width': parseInt(opt['diameter'] / 2.5) + "px",
        'background-color': opt['h_color']
    });
    
    $("#seconds").css({
        'width': parseInt(opt['diameter'] / 2.3) + "px",
    });

}
function clock() {
    var today = new Date();
    var h = 0;
    var x = today.getHours();

    if (x !== 12) {
        h = x % 12;
    } else {
        h = x;
    }

    var m = today.getMinutes();
    var s = today.getSeconds();


    $('#hours').css("transform", "rotate(" + (h * 30 - 90 + m / 2) + "deg)");
    $('#minutes').css("transform", "rotate(" + (m * 6 - 90) + "deg)");
    $('#seconds').css("transform", "rotate(" + (s * 6 - 90) + "deg)");

    setTimeout(clock, 500);
}

print_clock();
clock();