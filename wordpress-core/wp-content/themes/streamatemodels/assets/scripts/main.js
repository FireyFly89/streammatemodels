(function ($) {

    function renderImgToSvg() {
        $('.svg').each(function () {
            var $img = $(this);
            var imgURL = $img.attr('src');
            var attributes = $img.prop('attributes');

            $.get(
                imgURL,
                function (data) {
                    // Get the SVG tag, ignore the rest
                    var $svg = $(data).find('svg');

                    // Remove any invalid XML tags
                    $svg = $svg.removeAttr('xmlns:a');

                    // Loop through IMG attributes and apply on SVG
                    $.each(attributes, function () {
                        $svg.attr(this.name, this.value);
                    });

                    // Replace IMG with SVG
                    $img.replaceWith($svg);
                },
                'xml'
            );
        });
    }

    renderImgToSvg();

    // Mobile navigation
    function handleMobileNav() {
        var navBtn = $('.site__header__button');
        var nav = $('#site__navigation');

        navBtn.on('click', function () {
            $(this).toggleClass('active');
            nav.toggleClass('opened');
        });
    }

    handleMobileNav();

    // Slide content fade on scroll
    function handleFadeOnScroll() {
        var fadeElem = $('.fade-on-scroll');

        $(window).scroll(function () {
            var scrollTop = $(window).scrollTop();

            if (scrollTop > 0 && !fadeElem.hasClass('active')) {
                fadeElem.addClass('active');
            }
        });
    }

    handleFadeOnScroll();

    // Show more & Show less
    function showMoreAndLess() {
        var showMoreBtn = $('button.show-more');
        var showLessBtn = $('button.show-less');
        var contentHeight = $('.better-than-others__wrap').outerHeight() - $('.better-than-others__content__more').outerHeight() - 35;
        $('.better-than-others__wrap').css('max-height', contentHeight + 'px');

        showMoreBtn.on('click', function (e) {
            e.preventDefault();

            if (!$(this).parent().next().hasClass('opened')) {
                $(this).parents('.better-than-others__wrap').addClass('opened');
                $(this).parent().next().addClass('opened');
                $(this).hide();
                contentHeight = $('.better-than-others__wrap').outerHeight() + $('.better-than-others__content__more').outerHeight() + 60;
                $('.better-than-others__wrap').css('max-height', contentHeight + 'px');
            }
        });

        showLessBtn.on('click', function (e) {
            e.preventDefault();

            if ($(this).parent().hasClass('opened')) {
                $(this).parents('.better-than-others__wrap').removeClass('opened');
                $(this).parent().removeClass('opened');
                showMoreBtn.show();
                contentHeight = $('.better-than-others__wrap').outerHeight() - $('.better-than-others__content__more').outerHeight() - 35;
                $('.better-than-others__wrap').css('max-height', contentHeight + 'px');
            }
        });
    }

    showMoreAndLess();

    // FAQ
    function faqToggle() {
        var faqTitle = $('.faq__item__title');

        faqTitle.on('click', function () {
            $(this).next().slideToggle(300);
        });
    }

    faqToggle();

    function contactFormCheckboxes() {
        $('body').on('click', '.wpcf7-list-item-label', function () {
            var $checkbox = $(this).prevAll("input[type='checkbox']");

            if ($checkbox.is(':checked')) {
                $(this).prevAll("input[type='checkbox']").prop('checked', false);
            } else {
                $(this).prevAll("input[type='checkbox']").prop('checked', true);
            }
        });
    }

    contactFormCheckboxes();

    function scrollOnHash() {
        var parser = document.createElement('a');
        parser.href = window.location;

        if (parser.hash.length > 0) {
            var anchorElem = $(parser.hash);

            if (anchorElem.length > 0) {
                scrollToElement(anchorElem, -500);
            }
        }
    }

    $('body').on('click', 'a', function (e) {
        var $elem = $(this);
        var is_root = location.pathname == "/";

        if ($elem.prop("hash").length > 0) {
            e.preventDefault();
            if(is_root) {
                scrollToElement($($elem.prop("hash")), -100);
            }else {
                window.location.replace(window.location.origin + $elem.prop("hash"));
            }
        }
    });

    // Scrolls to the given element. (vertical modifier is extra offset, can be positive or negative)
    function scrollToElement(element, vertical_modifier) {
        if (!element) {
            return;
        }

        vertical_modifier = typeof vertical_modifier !== 'undefined' ? vertical_modifier : 0;

        var deferred = $.Deferred(),
            elemPos = element.offset().top,
            finalOffset = elemPos + vertical_modifier,
            scrollTop = $(window).scrollTop(),
            animTiming = 400;

        if (scrollTop < finalOffset) {
            animTiming = Math.floor((animTiming + ((finalOffset - scrollTop) / 10)));
        } else {
            animTiming = Math.floor((animTiming + ((scrollTop - finalOffset) / 10)));
        }

        if (elemPos > scrollTop || (elemPos + element.outerHeight()) < scrollTop) {
            $("html, body").stop().animate({scrollTop: (finalOffset < 0 ? 0 : finalOffset)}, animTiming, function () {
                deferred.resolve();
            });
        } else {
            deferred.resolve();
        }

        return deferred;
    }

    // Steps SlickJS Slider
    function stepsSlider() {
        var slideShow = $('#steps__slider');

        $(window).on('load resize orientationchange', function () {
            var win = $(this);

            if (win.width() < 992) {
                if (!slideShow.hasClass('slick-initialized')) {
                    slideShow.slick({
                        arrows: false,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        mobileFirst: true
                    });
                }
            } else {
                if (slideShow.hasClass('slick-initialized')) {
                    slideShow.slick('unslick');
                }
            }
        });
    }

    if ($('#steps__slider').length > 0) {
        stepsSlider();
    }

    function handleHeaderOnScroll() {
        $(window).on('scroll', function () {
            var $header = $('.site__header');

            if ($('body').hasClass('home')) {
                var $slide2 = $('#work_with_us');
                var slide2_top_pos = $slide2.offset().top;
                var $calculator = $('#calculator');
                var calculator_top_pos = $calculator.offset().top - $header.outerHeight();
                var $hero = $('#hero');
                var header_bottom_pos = $header.offset().top + $header.outerHeight();
                var hero_bottom_pos = $header.offset().top + $hero.outerHeight();

                if (slide2_top_pos <= header_bottom_pos) {
                    $header.addClass('solid');
                } else {
                    $header.removeClass('solid');
                }

                if (calculator_top_pos < hero_bottom_pos && !$calculator.hasClass('solid')) {
                    $calculator.addClass('solid');
                }
            } else {
                if ($(window).scrollTop() > $(window).height() / 2) {
                    $header.addClass('solid');
                } else {
                    $header.removeClass('solid');
                }
            }
        });


    }

    handleHeaderOnScroll();

    $('.wpcf7').on('wpcf7submit', function (e) {
        var form_number = $(this).closest('.wpcf7').attr('id');
        form_number = form_number.slice(form_number.length - 1);
        var event_category = 'apply_form';
        var event_label = "form_";
        var submit_status = '';
        var $submit_btn = $(this).closest('.wpcf7').find('input[type="submit"]');

        if (form_number >= 2) {
            event_category = 'contact_form';
        }

        if (e.detail.status !== 'mail_sent') {
            submit_status = 'error_';
        }

        event_label = "form_" + submit_status + form_number;
        temporarily_disable_element($submit_btn, 2000);

        if (typeof dataLayer !== 'undefined') {
            dataLayer.push({
                'event_action': 'submit',
                'event_category': event_category,
                'event_label': event_label
            });
        } else {
            gtag('event', 'submit', {
                'event_category': event_category,
                'event_label': event_label
            });
        }
    });

    //Popup cookie and popup closing
    var cookieOffer = $.cookie('offer-cookie');

    if (typeof cookieOffer === 'undefined') {
        $('.popup__wrapper').addClass('show-popup');
    }

    function closePopup() {
        $('body').on('click', '.popup__contact__button, .popup__close__button', function () {
            $('.popup__wrapper').removeClass('show-popup');
            $('.fade-on-scroll').addClass('active');
            $.cookie('offer-cookie', 'true', {expires: 365, path: '/'});
        });
    }

    closePopup();

    function fill_utm_fields_for_cf7() {
        var the_url = new URL(window.location.href);
        var url_params = ['campaign', 'source', 'medium', 'name', 'term', 'content'];

        $.each(url_params, function (key, val) {
            var current_param = the_url.searchParams.get('utm_' + val);

            if (current_param) {
                var $utm_fields = $('.wpcf7-hidden[name="utm' + val + '"]');

                if ($utm_fields.length > 0) {
                    $utm_fields.val(current_param);
                }
            }
        });
    }

    fill_utm_fields_for_cf7();

    // GET AN ESTIMATION OF YOUR EARNINGS
    $('body').on('click', '.calculator__form button', function (e) {
        e.preventDefault();
        var age = $('.calculator__form input[name="age"]').val();
        var gender = $('.calculator__form select[name="gender"]').val();
        var workingHours = $('.calculator__form input[name="working_hours"]').val();
        var result = $('.calculator .calculator__result');
        getEstimationOfEarnings(age, gender, workingHours, result);
    });

    function getEstimationOfEarnings(age, gender, workingHours, result) {
        var salaryPerDay = 50;
        var salaryPerMonth;

        if (age > 35) {
            salaryPerDay = salaryPerDay - (age - 35);
            salaryPerMonth = (workingHours * 4) * salaryPerDay;
        } else {
            salaryPerMonth = (workingHours * 4) * salaryPerDay;
        }

        if (gender === 'Homme') {
            salaryPerMonth = salaryPerMonth - (salaryPerMonth * 0.2);
        }


        if (salaryPerMonth > 0 && age >= 18) {
            if (!result.hasClass('opened')) {
                result.addClass('opened').slideToggle(300);
            }
            result.find('span').text('€' + salaryPerMonth);
        } else if (result.hasClass('opened')) {
            result.removeClass('opened').slideToggle(300);
        }
    }

    function addInputListener(section) {
        $('body').on('input', '.' + section + ' .earning input', function () {
            var age = $('.' + section + ' .earning input[name="age"]').val();
            var workingHours = $('.' + section + ' .earning input[name="working_hours"]').val();
            var gender = $('.' + section + ' .earning select[name="gender"]').val();
            var result = $('.' + section + ' .calculator__result');
            getEstimationOfEarnings(age, gender, workingHours, result);
        });

        $('body').on('change', '.' + section + ' .earning select', function () {
            var age = $('.' + section + ' .earning input[name="age"]').val();
            var workingHours = $('.' + section + ' .earning input[name="working_hours"]').val();
            var gender = $('.' + section + ' .earning select[name="gender"]').val();
            var result = $('.' + section + ' .calculator__result');
            getEstimationOfEarnings(age, gender, workingHours, result);
        });
    }

    addInputListener('join-us');
    addInputListener('hero');

    $('body').on('click', 'input[value="Envoyer"]', function () {
        var connection_id = $('input[name="connection_id"]');
        connection_id.val(makeId());
    });


    function testimonialSlides() {
        if ($('.testimonial-section__content__wrapper').length > 0) {
            $('.testimonial-section__content__wrapper').slick({
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 6000,
                pauseOnHover: false,
                mobileFirst: true
            });
        }
    }

    testimonialSlides();

    // handleTrainingsBlock();

    function subscribeEvent() {
        var $date_time_list = $('#dateTimeList');

        if ($date_time_list.length <= 0) {
            return;
        }

        $date_time_list.select2({
            templateSelection: function (item) {
                var $option = $(item.element);
                var $option_group = $option.closest('optgroup').attr('label');
                return $option_group + ' - ' + item.text;
            }
        });

        $('body').on('click', '#saveEvent', function (e) {
            e.preventDefault();

            var $date = $date_time_list.val();
            var $email = $('#email_trainings').val();

            temporarily_disable_element($(this), 2000);

            $.ajax({
                url: main_vars.ajax_url,
                type: "post",
                dataType: "json",
                data: {
                    action: 'subscribe_event',
                    event_id: $date,
                    email: $email,
                    security_nonce: main_vars.security_nonce,
                },
            }).done(function (data) {
                if (data !== true) {
                    var message = $('<div class="form-error">' + data + '</div>');
                    message.hide();
                    message.insertAfter('#saveEvent');
                    message.fadeIn(300);
                } else {
                    alert("L'horaire choisi a été programmé");
                }
            });
        });
    }

    subscribeEvent();

    // Hide error message in form, if any of the input fields have been modified for that particular form
    $('body').on('change keyup paste', 'form input, form select, form textarea', function () {
        $form = $(this).closest('form');
        $error_fields = $form.find('.form-error');

        if ($error_fields.length > 0) {
            $error_fields.fadeOut(150);
        }
    });

    // Only works on elements with css supported "disabled" attribute
    function temporarily_disable_element($elem, time) {
        $elem.prop('disabled', true);

        setTimeout(function () {
            $elem.prop('disabled', false);
        }, time);
    }

    //Open trainings block on hash
    function openTrainingsOnHash() {
        var parser = document.createElement('a');
        parser.href = window.location;

        if (parser.hash == "#trainings") {
            $('.trainings__wrapper').show();
        }
    }

    $('body').on('click', '.trainings__tab', function (e) {
        e.preventDefault();
        $('.trainings__wrapper').slideToggle(300);
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".trainings,.trainings__tab").length) {
            $("body").find(".trainings__wrapper").hide();
        }
    });

    $(window).load(function () {
        scrollOnHash();
        openTrainingsOnHash();
    });

    function makeId() {
        return new Date().getTime().toString() + window.crypto.getRandomValues(new Uint32Array(1))[0];
    }
})(jQuery);
