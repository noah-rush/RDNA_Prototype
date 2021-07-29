(function($) {
    "use strict"; // Start of use strict

    // Changing the defaults
    window.sr = ScrollReveal({ reset: true });

    // Customizing a reveal set
    sr.reveal('h2', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#who-we-are p', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#interactive-map p', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#organizations p', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#topics p', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#popular .intro p', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#organizations img', { origin: 'bottom', distance: '100px', duration: 2000, });

    sr.reveal('canvas', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('.articles', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#who-we-are .sq-image', { origin: 'bottom', distance: '100px', duration: 2000, });
    sr.reveal('#map', { origin: 'bottom', distance: '100px', duration: 2000, });


    console.log("loaded")
    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var markers = []
    var boxes = []
    $('.marker').each(function(idx) {
        // console.log(this)
        var links = $(this).data("link")
        var titles = $(this).data("titles")
        var name = $(this).data("name")
        // console.log(titles)
        // console.log(links)
        var swest = $(this).data("swest")
        var neast = $(this).data("neast")
        neast = neast.split(" ")
        swest = swest.split(" ")
        var corner1 = [parseFloat(neast[0]), parseFloat(neast[1])]
        var corner2 = [parseFloat(neast[0]), parseFloat(swest[1])]
        var corner3 = [parseFloat(swest[0]), parseFloat(swest[1])]
        var corner4 = [parseFloat(swest[0]), parseFloat(neast[1])]
        // console.log(idx)
        var content = "<h4>" + titles.length + " articles about <b>" + name + "</b></h4>"
        for (var i = 0; i < titles.length; i++) {
            content = content + '<a href= "' + links[i] + '">' + titles[i] + '</a>'
        }

        var polygon = L.polygon([
            corner1, corner2, corner3, corner4
        ]).addTo(map);

        var marker = L.marker([$(this).data("lat"), $(this).data("lng")]).addTo(map)
            .bindPopup(content)
            .on('click', function(e) {
                for (var i = 0; i < boxes.length; i++) {
                    map.removeLayer(boxes[i])
                }
                map.addLayer(boxes[idx])
            });
        map.setView([$(this).data("lat"), $(this).data("lng")], 8);

        markers.push(marker)
        boxes.push(polygon)
        map.removeLayer(polygon);
        L.tileLayer.provider('Stamen.Toner').addTo(map);
    })




    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Covid-19', 'Breaking News', 'Local Events', 'Local Businesses', 'Social Justice', 'Sports'],
            datasets: [{
                label: '# of Articles',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#F8C379',
                    '#F49D82',
                    '#A3CAF7',
                    '#5FA4AB',
                    '#eb573e',
                    '#2C3E50'
                ]
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    $('.article-slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 3,
        swipe: false,
        infinite: false,
        speed: 800,
        prevArrow: '<button type="button" class="slick-prev">Prev</button>',
        nextArrow: '<button type="button" class="slick-next">Next</button>',
        responsive: [


            {
                breakpoint: 1000,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '200px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 930,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '150px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 840,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '120px',
                    slidesToShow: 1
                }
            }, {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    })


    $('.article-slider').on("afterChange", function() {
        $('.right-slide').off()
        $('.left-slide').off()
        $('.right-slide').removeClass('right-slide')
        $('.left-slide').removeClass('left-slide')


        $($('.article-slider .slick-current').next()).addClass("right-slide")
        $($('.article-slider .slick-current').prev()).addClass("left-slide")





        $('.left-slide').click(function() {
            $('.slick-prev').trigger("click")
        })

        $('.right-slide').click(function() {
            $('.slick-next').trigger("click")
        })


    })

    // $($('.article-slider .slick-active')[0]).addClass("left-slide")
    $($('.article-slider .slick-current').next()).addClass("right-slide")

    // $('.left-slide').click(function () {
    // $('.slick-prev').trigger("click")
    // })

    $('.right-slide').click(function() {
        $('.slick-next').trigger("click")
    })


   

})(jQuery); // End of use strict