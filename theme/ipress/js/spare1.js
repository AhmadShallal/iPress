jQuery(document).ready(function() {

    var caroDiv = jQuery('#myCarousel');
    var postsLoad = jQuery('.posts-area');
    var catDiv;
    var arr1;
    var arr2;
    var firstpart;
    var secondpart;

    /** custom clickToggle function */

    jQuery.fn.clickToggle = function(a, b) {
        function cb() {
            [b, a][this._tog ^= 1].call(this);
        }
        return this.on("click", cb);
    };

    /**
     *  Adjusting date format
     */

    function relative_time(date_str) {
        if (!date_str) { return; }
        date_str = jQuery.trim(date_str);
        date_str = date_str.replace(/\.\d\d\d+/, ""); // remove the milliseconds
        date_str = date_str.replace(/-/, "/").replace(/-/, "/"); //substitute - with /
        date_str = date_str.replace(/T/, " ").replace(/Z/, " UTC"); //remove T and substitute Z with UTC
        date_str = date_str.replace(/([\+\-]\d\d)\:?(\d\d)/, " $1$2"); // +08:00 -> +0800
        var parsed_date = new Date(date_str);
        var relative_to = (arguments.length > 1) ? arguments[1] : new Date(); //defines relative to what ..default is now
        var delta = parseInt((relative_to.getTime() - parsed_date) / 1000);
        delta = (delta < 2) ? 2 : delta;
        var r = '';
        if (delta < 60) {
            r = delta + ' seconds ago';
        } else if (delta < 120) {
            r = 'a minute ago';
        } else if (delta < (45 * 60)) {
            r = (parseInt(delta / 60, 10)).toString() + ' minutes ago';
        } else if (delta < (2 * 60 * 60)) {
            r = 'an hour ago';
        } else if (delta < (24 * 60 * 60)) {
            r = '' + (parseInt(delta / 3600, 10)).toString() + ' hours ago';
        } else if (delta < (48 * 60 * 60)) {
            r = 'a day ago';
        } else {
            r = (parseInt(delta / 86400, 10)).toString() + ' days ago';
        }
        return ' ' + r;
    };

    jQuery(window).on('load', function() {

        if (caroDiv) {
            var ourRequest = new XMLHttpRequest();
            ourRequest.open('GET', 'http://localhost/ipress/wp-json/wp/v2/posts?per_page=5&order=asc&_embed');
            ourRequest.onload = function() {
                if (ourRequest.status >= 200 && ourRequest.status < 400) {
                    var data = JSON.parse(ourRequest.responseText);
                    createSlider(data);
                    //console.log(data);
                } else {
                    console.log("We connected to the server, but it returned an error.");
                }
            };

            ourRequest.onerror = function() {
                console.log("Connection error");
            };

            ourRequest.send();
        }
    });

    function createSlider(caroData) {
        var caroHtml = '';
        var Html1 = '';
        var Html2 = '';
        var cat = '';
        var img = "";
        jQuery.each(caroData, function(i) {

            //console.log(this);

            if (this.better_featured_image != null) {
                img = this.better_featured_image.source_url;
            } else {
                img = 'http://placehold.it/300x300/';
            }

            if (this._embedded["wp:term"][0][0]) {
                cat = this._embedded["wp:term"][0][0].slug;
            } else {
                cat = 'category';
            }

            Html1 += '<div class="carousel-item ">' +
                '<a href="' + this.link + '">' +

                '<img src = " ' + img + ' ">' +
                '</a>' +
                '<div class = "carousel-caption" >' +
                ' ' + cat + '' +
                '</div>' +
                '</div>';

            Html2 += '<li data-target="#myCarousel" data-slide-to="' + i + '" class="list-group-item ">' +
                '<h5>' + this["title"]["rendered"] + '</h5>' +
                '<p>' + this.excerpt["rendered"] + '</p>' +
                '</li>';

        });
        caroHtml += '<div class="carousel-inner">';
        caroHtml += Html1;
        caroHtml += '</div>';
        caroHtml += '<ul class="list-group col-sm-4">';
        caroHtml += Html2;
        caroHtml += '</ul>'
        caroHtml += '<div class="carousel-controls">' +
            '<a class="left carousel-control" href="#myCarousel" data-slide="prev">' +
            '<span class="glyphicon glyphicon-chevron-left"></span>' +
            '</a>' +
            '<a class="right carousel-control" href="#myCarousel" data-slide="next">' +
            '<span class="glyphicon glyphicon-chevron-right"></span>' +
            '</a>' +
            '</div>';
        caroDiv.append(caroHtml);
        jQuery('.carousel .carousel-item').first().addClass('active');
        jQuery('.carousel .list-group-item').first().addClass('active');

    }


    //////////////////////////////////////////////
    /// Main Carousel
    /////////////////////////////////////////////

    var clickEvent = false;
    jQuery('#myCarousel')
        .on('click', '.list-group li', function() {
            clickEvent = true;
            jQuery('.list-group li').removeClass('active');
            jQuery(this).addClass('active');
        }).on('slid.bs.carousel', function(e) {
            if (clickEvent == false) {
                var count = jQuery('.list-group').children().length - 1;
                var current = jQuery('.list-group li.active');
                current.removeClass('active').next().addClass('active');
                var id = parseInt(current.data('slide-to'));
                if (count == id) {
                    jQuery('.list-group li').first().addClass('active');
                }
            }
            clickEvent = false;
        });

    if (postsLoad) {
        jQuery
            .getJSON("http://localhost/ipress/wp-json/wp/v2/posts?per_page=1&order=desc&_embed", function(data) {
                if (data[0].better_featured_image != null) {
                    img = data[0].better_featured_image.source_url;
                } else {
                    img = 'http://placehold.it/300x300/';
                }


                //console.log(data[0]);
                var output =
                    '<div class="post daily-post px-3 py-2">' +
                    '<div class="post-title py-1 px-2 mb-3">' +
                    '<h5 class="d-inline ml-2">Post of The Day</h5>' +
                    '</div>' +
                    '<div class="post-content  clear-fix">' +
                    '<div class="post-img float-left mw-50">' +
                    '<img src="' + img + '" alt="" class="">' +
                    '</div>' +

                    '<div class="post-text d-block w-50  float-right">' +
                    '<h4 class="text-capitalize"><a href="' + data[0].link + '">' + data[0].title.rendered + '</a></h4>' +
                    '<p class="post-time ml-1">' +
                    '<span class="time-link mr-1"><a href="' + data[0].link + '">' + relative_time(data[0].modified) + ' </a> </span> /' +
                    '<span class="comments-link ml-1"><a href="' + data[0].link + '"> 0 comments</a></span>' +
                    '</p>' +
                    '<p class="post-preview d-inline-block  h-50">' +
                    data[0].excerpt.rendered +
                    '</p>' +
                    '</div>' +
                    '</div>' +

                    '</div>';
                postsLoad.prepend(output);
            })

        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });

        jQuery
            .getJSON("http://localhost/ipress/wp-json/wp/v2/posts?categories=5&per_page=10&_embed")

        .done(function(data) {
            var splitter = Math.ceil(data.length / 2);
            var firstpart = data.slice(0, splitter);
            var secondpart = data.slice(splitter);
            console.log(firstpart);
            console.log(secondpart);
            buildCatDiv1(firstpart, 1);
            buildCatDiv1(secondpart, 0);


        })

        .fail(function(jqxhr, textStatus, error) {
            var err = textStatus + ", " + error;
            console.log("Request Failed: " + err);
        });
    }

    catDx = '<div class="post lifestyle-post  category-post px-3 py-2">' +
        '<div class="post-title py-1 px-2 mb-3">' +
        '<h5 class="d-inline ml-2">Lifestyle</h5>' +
        '<div class="float-right mr-2">' +
        '<ul class="mr-2">' +
        '<li class="active"></li>' +
        '<li></li>' +
        '</ul>' +
        '<i class="fa fa-rss" aria-hidden="true"></i>' +
        '</div>' +
        '</div>';

    function buildCatDiv1(dx1, active) {
        console.log(dx1);

        var img;

        var catDiv;



        jQuery.each(dx1, function(i) {
            if (this.better_featured_image != null) {
                img = this.better_featured_image.source_url;
            } else {
                img = 'http://placehold.it/300x300/';
            }

            if (active == 1) {
                cat_class = 'active';
            } else {
                cat_class = '';
            }

            if (i == 0) {

                catDiv += '<div class="post-content ' + cat_class + ' clear-fix">' +
                    '<div class="category-featured my-1 ' + cat_class + ' float-lg-left">' +
                    '<div class="post-img mb-3 mw--50">' +
                    '<img src=" ' + img + ' " alt="" class="">' +
                    '</div>' +
                    '<div class="post-text mw-50 d-block">' +
                    '<h4 class="text-capitalize">' + this["title"]["rendered"] + '</h4>' +
                    '   <p class="post-time ml-1">' +
                    '<span class="time-link mr-1"><a href="#">' + relative_time(this.modified) + '</a> </span> /' +
                    '<span class="comments-link ml-1"><a href="#"> 0 comments</a></span>' +
                    '</p>' +
                    '<div class="post-preview text-center">' + this.excerpt["rendered"] + '</div>' +

                    '</div>' +
                    '</div>' +
                    '<div class="category-list my-lg-1 ' + cat_class + ' float-lg-right  flex-column">';


            } else {

                catDiv += '<div class="category-item mh-25 mw-100 mx-1 mb-4 clear-fix">' +
                    '<div class="list-img float-left">' +
                    '<img src="' + img + '" alt="">' +
                    '</div>' +
                    '<div class="list-post w-75 float-right pl-2">' +
                    '<span class="title d-block text-truncate text-capitalize mb-3">' + this["title"]["rendered"] + '</span>' +
                    '<span class="time-link mr-1"><a href="#">' + relative_time(this.modified) + ' </a> </span> /' +
                    '<span class="comments-link ml-1"><a href="#"> 0 comments</a></span>' +
                    '</div>' +
                    //'</div>' +
                    '</div>';


            }
        });

        catDiv += // '</div>' +
            //'</div>' +
            '</div>';



        jQuery('.lifestyle-post').append(catDiv);

    };

    jQuery('.lifestyle-post .post-title ul li').on('click', function() {
        jQuery(this).addClass('active').siblings().removeClass('active');
        jQuery('.lifestyle-post .post-content').toggleClass('active');
        jQuery('.lifestyle-post .category-featured').toggleClass('active');
        jQuery('.lifestyle-post .category-list').toggleClass('active');
    });


});

//jQuery('.lifestyle-post').append(arr1);