/**
 * App
 * @author Axel Baron
 * @created 19/04/2017
 */

(function ($) {
    var app = {

            sticky: function (el, initSize) {
                if ($(window).scrollTop() > initSize) {
                    el.addClass('is-sticky');
                    $('body').addClass('sticky-margin-top');
                } else {
                    el.removeClass('is-sticky');
                    $('body').removeClass('sticky-margin-top');
                }
            },

            trigger: function (e, el) {
                e.stopPropagation();
                el.toggleClass('is-open');
            },

            readingWay: function (e, el) {
                e.stopPropagation();
                el.toggleClass('invert');

                var lang = $('.lang__trigger').data('currentlang');
                var limit = $('#limit').val();
                var repeat = $('#repeat').val();
                var readingWay = $('#readingWay').val();


                $.getJSON("/data/comics.json", function (json) {
                    var htmlComics = '';
                    var comics = json;

                    if (readingWay == "invert") {
                        readingWay = "normal";
                        repeat = 0;
                        limit = 1;
                        for (var i = repeat; i <= limit; i++) {
                            htmlComics += '<article class="comics"><h2>' + comics[lang][i].id + ' : ' + comics[lang][i].name + '</h2> <a href="/' + lang + '/' + comics[lang][i].id + '-' + comics[lang][i].link + '"><img oncontextmenu="return false" src="' + comics[lang][i].img + '" alt="' + comics[lang][i].name + '"/></a></div>';
                        }
                        repeat = limit + 1;
                        limit = limit + 2;

                    } else {
                        readingWay = "invert";
                        repeat = comics[lang].length;
                        limit = repeat - 2;
                        for (var j = repeat - 1; j >= limit; j--) {
                            htmlComics += '<article class="comics"><h2>' + comics[lang][j].id + ' : ' + comics[lang][j].name + '</h2> <a href="/' + lang + '/' + comics[lang][j].id + '-' + comics[lang][j].link + '"><img oncontextmenu="return false" src="' + comics[lang][j].img + '" alt="' + comics[lang][j].name + '"/></a></div>';
                        }
                    }

                    $.getJSON("/data/translations.json", function (json) {
                        var translations = json;
                        if (readingWay == "invert") {
                            $('.btn--show-comics').text(translations[lang].nav.btnShowComicsInvert);
                        } else {
                            $('.btn--show-comics').text(translations[lang].nav.btnShowComics);
                        }
                    });

                    $('.section.container').html(htmlComics);
                    $('#repeat').val(repeat);
                    $('#limit').val(limit);
                    $('#readingWay').val(readingWay);
                    app.getComics();
                });

            },

            getComics: function () {
                // Get vars
                var lang = $('.lang__trigger').data('currentlang');
                var limit = $('#limit').val();
                var repeat = $('#repeat').val();
                var readingWay = $('#readingWay').val();
                var htmlComics = '';

                // Test if limit

                $.getJSON("/data/comics.json", function (json) {
                    var comics = json;
                    var nbComics = comics[lang].length;


                    if (readingWay == "invert") {
                        repeat = limit;
                        limit = limit - 2;

                        if (nbComics % 2 === 1 && limit <= -1) {
                            htmlComics += '<article class="comics hidden"><h2>' + comics[lang][0].id + ' : ' + comics[lang][0].name + '</h2> <a href="/' + lang + '/' + comics[lang][0].id + '-' + comics[lang][0].link + '"><img oncontextmenu="return false" src="' + comics[lang][0].img + '" alt="' + comics[lang][0].name + '"/></a></article>';
                        } else {
                            for (var k = repeat - 1; k >= limit; k--) {
                                htmlComics += '<article class="comics hidden"><h2>' + comics[lang][k].id + ' : ' + comics[lang][k].name + '</h2> <a href="/' + lang + '/' + comics[lang][k].id + '-' + comics[lang][k].link + '"><img oncontextmenu="return false" src="' + comics[lang][k].img + '" alt="' + comics[lang][k].name + '"/></a></article>';
                            }
                        }
                    } else {
                        if (nbComics % 2 === 1 && limit >= nbComics) {
                            htmlComics += '<article class="comics hidden"><h2>' + comics[lang][nbComics - 1].id + ' : ' + comics[lang][nbComics - 1].name + '</h2> <a href="/' + lang + '/' + comics[lang][nbComics - 1].id + '-' + comics[lang][nbComics - 1].link + '"><img oncontextmenu="return false" src="' + comics[lang][nbComics - 1].img + '" alt="' + comics[lang][nbComics - 1].name + '"/></a></article>';
                        } else {
                            for (var l = repeat; l <= limit; l++) {
                                htmlComics += '<article class="comics hidden"><h2>' + comics[lang][l].id + ' : ' + comics[lang][l].name + '</h2> <a href="/' + lang + '/' + comics[lang][l].id + '-' + comics[lang][l].link + '"><img oncontextmenu="return false" src="' + comics[lang][l].img + '" alt="' + comics[lang][l].name + '"/></a></article>';
                            }
                        }
                        repeat = parseInt(limit) + 1;
                        limit = parseInt(limit) + 2;
                    }
                    $('.section.container').append(htmlComics);
                    $('#limit').val(limit);
                    $('#repeat').val(repeat);
                });
            },

            changeUrl: function (url) {
                document.location.href = url;
            },

            select: function () {
                $("[name='select-comics']").each(function () {
                    $(this).wrap('<div class="select-comics"></div>');
                    var select = $(this).parent();

                    // get trigger text
                    var triggerText = select.find('option').eq(0).text();
                    select.append('<div class="select-comics__trigger">Select comic <span class="icon icon-arrow"></span></div>');
                    select.append('<div class="select-comics__container"></div>');

                    // get options
                    var containerOpt = select.find('.select-comics__container');
                    var options;
                    select.find('option:not(.placeholder)').each(function () {
                        var text = $(this).text();
                        var tmp = text.split(':');
                        var id = tmp[0];
                        var name = tmp[1];
                        containerOpt.append('<a class="select-comics__opt" href="' + $(this).val() + '"><span class="select-comics__opt__container"><i class="select-comics__id">' + id + ' : </i>' + name + '</span></a>');
                    });
                });
            },

            up: function (upBtn) {
                $(upBtn).click(function () {
                    $('html, body').animate({
                        scrollTop: 0
                    }, 500);
                });


                $(window).scroll(function () {
                        //Sets the current scroll position
                        var st = $(this).scrollTop();
                        //If scroll up
                        if ($(window).scrollTop() > 100) {
                            if (st < lastScroll) {
                                $(upBtn).addClass('is-visible');
                            } else {
                                $(upBtn).removeClass('is-visible');
                            }
                        }
                        //Updates scroll position
                        lastScroll = st;
                    }
                );
            }
        }
    ;

    /*
     * init*
     * */

    console.info("%c Axel Baron %c http://axelbaron.fr/", ' font-weight: bold; color: white; background: black;', 'font-weight: normal; font-style: italic; color: gray;');

    // Init Sticky menu system
    var initSize = $('.header').height();
    $(window).resize(function () {
        if ($(window).width() < 750) {
            initSize = 305.5; // header size mobile
        }

        if ($(window).width() > 750) {
            initSize = 358; // header size tablet
        }
    });

    $(window).scroll(function () {
        app.sticky($('.header'), initSize);
    });

    // Innit trigger menu system
    $(document).on('click', '.lang__trigger, .header__nav__trigger, .select-comics__trigger', function (e) {
        e.preventDefault();
        app.trigger(e, $(this).parent());
    });

    // Automatically close all accordions on click outside of them.
    $(document).on('click', function () {
        $(this).find('.is-open').removeClass('is-open');
    });

    // Init reading way btn
    $(document).on('click', '.reading-tools__invert-reading-way', function (e) {
        e.preventDefault();
        app.readingWay(e, $(this));
    });

    // Call to other comics
    app.getComics();

    // Show other comics
    $(document).on('click', '.btn--show-comics', function (e) {
        e.preventDefault();
        $('.comics').removeClass('hidden');
        var limit = $('#limit').val();
        var lang = $('.lang__trigger').data('currentlang');
        var nbComics = $('#nbComics').val();
        nbComics = parseInt(nbComics);

        var testingVar;
        if (nbComics % 2 === 1 && limit <= -1) {
            testingVar = nbComics;
        } else {
            testingVar = nbComics + 1;
        }

        if (limit > 0 && limit < testingVar) {
            app.getComics();
        } else if (limit <= 0) {
            $.getJSON("/data/translations.json", function (json) {
                $('.btn--show-comics').text(json[lang].nav.btnShowBeginning);
            });
        } else if (limit >= testingVar) {
            $.getJSON("/data/translations.json", function (json) {
                $('.btn--show-comics').text(json[lang].nav.btnShowEnd);
            });
        }
    });


    // On change normal select
    $(document).on('change', '[name="select-comics"]', function (e) {
        e.preventDefault();
        var url = $(this).val();
        app.changeUrl(url);
    });

    // Call to custom select.
    app.select();
    if ($(window).width() > 750) {
        $("[name='select-comics']").addClass('is-hidden');
        $(".select-comics__trigger").removeClass('is-hidden');
    } else {
        $("[name='select-comics']").removeClass('is-hidden');
        $(".select-comics__trigger").addClass('is-hidden');
    }
    $(window).resize(function () {
        if ($(window).width() > 750) {
            $("[name='select-comics']").addClass('is-hidden');
            $(".select-comics__trigger").removeClass('is-hidden');
        } else {
            $("[name='select-comics']").removeClass('is-hidden');
            $(".select-comics__trigger").addClass('is-hidden');
        }
    });

    var upBtn = $('#up');
    var lastScroll = 0;
    app.up(upBtn);

    $('#contactForm').submit(function (e) {
        e.preventDefault();
        var id = $('.input-identity').val();
        var email = $('.input-email').val();
        var object = $('.input-object').val();
        var message = $('.input-message').text();

        console.log(id,email,object,message);

        $.ajax({
            url: '/fn/sendEmail.php',
            type: 'POST',
            dataType: "json",
            data: {id: id, email: email,object: object, message: message},
            success: function (data) {
                console.log('sucess ajax formSubmit');
            },
            error: function () {
                console.log('erreur ajax formSubmit');
            }
        });
    });
})
(jQuery);
