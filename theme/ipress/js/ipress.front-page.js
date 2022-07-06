(function(yourcode) {


    yourcode(window.jQuery, window, document);

}(function($, window, document) {


    $(function() {

        // The DOM is ready!

        function getCatpost(params) {
            var dynamicData = {};
            dynamicData = params;
            return ASQ(function executor(resolve) {
                //setTimeout(() => {
                //done(
                resolve(
                    jQuery.ajax({
                        url: "http://localhost/ipress/wp-json/wp/v2/posts",
                        type: "get",
                        dataType: "json",
                        data: dynamicData
                    })
                    //)
                    //}, 1000);
                )

            }).toPromise();
        }

        CarouselRequest = getCatpost('?per_page=5&order=asc&_embed'),
            post1 = getCatpost('categories=1&per_page=1&order=desc&_embed'),
            lifestyleCat = getCatpost("categories=1&per_page=5&_embed"),
            musicCat = getCatpost("categories=1&per_page=5&_embed"),
            wNewsCat = getCatpost("categories=1&per_page=5&_embed"),
            otherPosts = getCatpost("per_page=3&order=desc&_embed"),

            lifestyleCat2 = getCatpost("categories=1&page=2&per_page=5&_embed"),
            musicCat2 = getCatpost("categories=1&page=2&per_page=5&_embed"),
            wNewsCat2 = getCatpost("categories=1&page=2&per_page=5&_embed"),
            otherPosts2 = getCatpost("&page=2&per_page=3&order=desc&_embed");


        ASQ().runner(function* main() {


            createSlider(yield CarouselRequest);
            displayLastPost(yield post1);
            displayCategory1(yield lifestyleCat);
            displayCategory2(yield musicCat);
            displayCategory3(yield wNewsCat);
            displayCarouselPosts(yield otherPosts);
            //yieldotherPosts2 = yield otherPosts2;*/


        });

        y(nextprev);

    });

    // The rest of your code goes here!

    // vars

    var CarouselRequest,
        post1,
        lifestyleCat,
        musicCat,
        wNewsCat,
        otherPosts,

        otherPosts2;


    var caroDiv = jQuery('#myCarousel');
    var postsLoad = jQuery('.posts-area');
    /*var catDiv;
    var arr1;
    var arr2;
    var firstpart;
    var secondpart;*/
    var img;

    function imageholder(image, width, height) {
        if (image != null) {
            img = image.source_url;
        } else {
            img = 'http://placehold.it/' + width + 'x' + height + '/';
        }
        //img = 'http://placehold.it/' + width + 'x' + height + '/';
        return img;
    }

    Handlebars.registerHelper("featuredImageHelper", function(better_featured_image) {
        if (better_featured_image != null) {
            img = better_featured_image.source_url;
        } else {
            img = 'http://placehold.it/300x300/';
        }
        return img;
    });





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

    Handlebars.registerHelper("Time", function(datime) {

        return relative_time(datime);

    });

    /**
     * Carousel Div
     */

    //jQuery(window).on('load', function() {

    //if (caroDiv) {

    //CarouselRequest.done(function(data) {

    //createSlider(data);

    //});

    //}
    //});

    function createSlider(caroData) {
        var caroHtml = '';
        var Html1 = '';
        var Html2 = '';
        var cat = '';
        var img = "";
        jQuery.each(caroData, function(i) {

            console.log(this);

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
        caroDiv.append(caroHtml).fadeIn();
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

    /**
     * 
     * Post of the day div
     */
    //if (postsLoad) {
    /* yieldpost1.done(displayLastPost).fail(function(jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Request Failed: " + err);
    });
    */
    function displayLastPost(Ajaxdata) {
        var data = Ajaxdata[0];
        if (data.better_featured_image != null) {
            img = data.better_featured_image.source_url;
        } else {
            img = 'http://placehold.it/300x300/';
        }


        //console.log(data[0]);
        var output =
            '<div class="post daily-post px-3 py-2">' +
            '<div class="post-title py-1 px-2 mb-3">' +
            '<h5 class="ml-2">Post of The Day</h5>' +
            '</div>' +
            '<div class="post-content">' +
            '<div class="post-img ">' +
            '<img src="' + img + '" alt="" class="">' +
            '</div>' +

            '<div class="post-text px-2">' +
            '<h4 class="text-capitalize"><a href="' + data.link + '">' + data.title.rendered + '</a></h4>' +
            '<p class="post-time ml-1">' +
            '<span class="time-link mr-1"><a href="' + data.link + '">' + relative_time(data.modified) + ' </a> </span> /' +
            '<span class="comments-link ml-1"><a href="' + data.link + '"> 0 comments</a></span>' +
            '</p>' +
            '<div class="post-preview">' +
            data.excerpt.rendered +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>';
        postsLoad.prepend(output).fadeIn();
    };



    function displayCategory1(data) {
        var theTemplate = Handlebars.template(categoryTemplateScript);
        var theCompiledHtml = theTemplate(data);
        lifestyle_result.html(theCompiledHtml);

    }

    var lifestyle_list_item = jQuery('.lifestyle-post ul.mr-2 li.select');
    var lifestyle_first_list_item = jQuery('.lifestyle-post ul.mr-2 li#first.select');
    var lifestyle_result = jQuery('.lifestyle-result');


    lifestyle_list_item.first().addClass('active').siblings().removeClass('active');
    lifestyle_list_item.on('click', function() {
        jQuery(this).addClass('active').siblings().removeClass('active');
        if (lifestyle_first_list_item.hasClass('active')) {
            lifestyle_result.html('');

            lifestyleCat.then(function(rex) {
                displayCategory1(rex).fadeIn();
            });
        } else {

            lifestyle_result.html('');
            lifestyleCat2.then(function(rex) {
                displayCategory1(rex).fadeIn();
            });
        }
    });

    //////////////////////////

    function displayCategory2(data) {
        var theTemplate = Handlebars.template(categoryTemplateScript);
        var theCompiledHtml = theTemplate(data);
        music_result.html(theCompiledHtml);

    }

    var music_list_item = jQuery('.music-post ul.mr-2 li.select');
    var music_first_list_item = jQuery('.music-post ul.mr-2 li#first.select');
    var music_result = jQuery('.music-result');


    music_list_item.first().addClass('active').siblings().removeClass('active');
    music_list_item.on('click', function() {
        jQuery(this).addClass('active').siblings().removeClass('active');
        if (music_first_list_item.hasClass('active')) {
            music_result.html('');

            musicCat.then(function(rex) {
                displayCategory2(rex).fadeIn();
            });
        } else {

            music_result.html('');
            musicCat2.then(function(rex) {
                displayCategory2(rex).fadeIn();
            });
        }
    });

    //////////////////////////

    function displayCategory3(data) {
        var theTemplate = Handlebars.template(categoryTemplateScript);
        var theCompiledHtml = theTemplate(data);
        news_result.html(theCompiledHtml);

    }

    var news_list_item = jQuery('.world-news-post ul.mr-2 li.select');
    var news_first_list_item = jQuery('.world-news-post ul.mr-2 li#first.select');
    var news_result = jQuery('.world-news-result');


    news_list_item.first().addClass('active').siblings().removeClass('active');
    news_list_item.on('click', function() {
        jQuery(this).addClass('active').siblings().removeClass('active');
        if (news_first_list_item.hasClass('active')) {
            news_result.html('');

            wNewsCat.then(function(rex) {
                displayCategory3(rex).fadeIn();
            });
        } else {

            news_result.html('');
            wNewsCat2.then(function(rex) {
                displayCategory3(rex).fadeIn();
            });
        }
    });

    //////////////////////////



    function displayCarouselPosts(Carodata) {
        var data = Carodata;
        var output1 = '';
        var postImages = jQuery('.carousel-post .post-images');

        console.log(data);
        postImages.html('');
        jQuery.each(data, function() {
            output1 += ' <div class="p-img">' +
                '<img src=" ' + imageholder(this.better_featured_image, 180, 160) + ' " width="' + 180 + ' " height="' + 160 + ' " data-alt="' +
                +'"' + this.title['rendered'] + '"' + '>' + '</div>';

        });
        postImages.html(output1);


        jQuery('.p-img').on('mouseenter', function() {
            jQuery(this).attr('one', jQuery(this).children('img').data('alt'));
        });
    };



    if (jQuery('.mr-2 li').eq(0).hasClass('active')) {

    }
    jQuery('.mr-2 li').on('click', function() {
        var that = jQuery(this);
        if (that.hasClass('active')) {
            //alert('alredy');
        } else {
            that.addClass('active').siblings('li').removeClass('active');



            if (that.is('#two')) {
                otherPosts2.then(function(result) {
                    displayCarouselPosts(result);
                });
                console.log('second');
            } else {
                otherPosts.then(function(result) {
                    displayCarouselPosts(result);
                });
                console.log('first');
            }
        }
    });



    var tag = jQuery('.widget.popular-tags .tags-content .tagbox a');
    var best = 0;

    jQuery(tag).each(function(i) {
        var count = jQuery(this).data('count');
        console.log(count);
        if (best <= count) {
            best = count;
        }
    });
    jQuery(tag).each(function(i) {
        if (best == jQuery(this).data('count')) {
            jQuery(this).addClass('red');
        }
    });

    var ajaxUrl = ajax_object.ajax_url;
    var pageToGet = jQuery('.whats-hot .side-title li.active').data('pg');
    var nextprev = jQuery('.whats-hot .side-title li');
    var hot = jQuery('.side-section.whats-hot .hot');

    var x = function(item) {
        if (item.hasClass('active')) {
            return jQuery.post(ajaxUrl, {
                action: "more_post_ajax",
                paged: item.data('pg')
            });
        }
    };


    var y = function(nxt) {
        hot.html('');
        if (nxt.hasClass('active')) {
            var oldom = x(nxt);
            oldom.done(function(data) {
                //console.log(data);
                hot.html(data);
            });
        }
    };

    nextprev.on('click', function() {
        var that = jQuery(this);
        that.addClass('active').siblings('li').removeClass('active');
        y(that);
    });

}));