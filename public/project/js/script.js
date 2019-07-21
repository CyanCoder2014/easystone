$(document).ready(function () {
    $('#easyStone').bind('slide.bs.carousel', function (e) {
        /* console.log($('.carousel-item').index($(this).find('.carousel-item.active'))-1)*/
        var activePre = $('.carousel-item').index($(this).find('.carousel-item.active')) + 1
        $('#easyStone .carousel-item').removeClass('zIndexPre')
        $('#easyStone .carousel-item:nth-child(' + activePre + ')').addClass('zIndexPre')
    });
    $('.windowHeight').height($(window).height());


    var musaicNumCol = Math.round($(window).width() / 50);
    var musaicNumRow = Math.round($(window).height() / 50);

    for (var i = 0; i < musaicNumRow; i++) {
        for (var j = 0; j < musaicNumCol; j++) {
            $('.musaicPlace').append('<span class="musaic"></span>')
        }
    }
    var start = [];
    var b = 0;
    for (var c = 0; c < musaicNumRow; c++) {
        start[c] = b;
        b += musaicNumCol
        b -= 1
    }

    function opacity() {
        for (var z = 0; z <= start.length - 1; z++) {
            $('.musaic:nth-child(' + start[z] + ')').addClass('tileAnimation')
        }
    }

    var interval = setInterval(function () {
        opacity()
        for (var z = 0; z <= start.length - 1; z++) {
            start[z]++
        }
        if ($('.musaic').css('z-index') === '2') {
            setTimeout(
                function () {
                    $('.musaicPlace').css('display', 'none');
                    clearInterval(interval)
                }, 4000);

        }
    }, 100);

    window.onmousemove = function (e) {
        x = e.pageX;
        y = e.pageY;

        $('.textStoneLeft').css('right', (x * 0.007) -24 + 'rem');
        $('.textStoneRight').css('left', -(x * 0.007) - 14.5 + 'rem');
        $('.textStoneTop').css('top', (y * 0.008) + 35 + '%');

        $('.part1').css('left', (x * 0.004) + 5 + '%');
        $('.part1').css('bottom', (y * 0.005) - 30 + '%');
        $('.part1 div').css('backgroundPositionX', (x * 0.003)- 3 + 'rem');
        $('.part1 div').css('backgroundPositionY', (y * 0.003) - 35 + 'rem');

        $('.part2').css('left', (x * 0.008) - 30 + '%');
        $('.part2').css('bottom', (y * 0.009) + '%');
        $('.part2 div').css('backgroundPositionX', (x * 0.005) + '%');
        $('.part2 div').css('backgroundPositionY', (y * 0.005) + 100 + '%');

        $('.part3').css('left', (x * 0.005) + 10 + '%');
        $('.part3').css('top', (y * 0.006) - 40 + '%');
        $('.part3 div').css('backgroundPositionX', (x * 0.02) + 15 + '%');
        $('.part3 div').css('backgroundPositionY', (y * 0.02)-60 + '%');

        $('.part4').css('right', (x * 0.007) + 10 + '%');
        $('.part4').css('top', (y * 0.006) - 50 + '%');
        $('.part4 div').css('backgroundPositionX', (x * 0.02)+40 + '%');
        $('.part4 div').css('backgroundPositionY', (y * 0.02)-80 + '%');

        $('.part5').css('right', (x * 0.008) + 15 + '%');
        $('.part5').css('bottom', (y * 0.009) - 40 + '%');
        $('.part5 div').css('backgroundPositionX', (x * 0.02) + 50 + '%');
        $('.part5 div').css('backgroundPositionY', (y * 0.02) + 140+'%');

    };
});


