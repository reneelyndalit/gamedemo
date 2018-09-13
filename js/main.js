//jQuery to collapse the navbar on scroll
var header_height  = $('.navbar').height(),
    intro_height    = $('.intro-section').height(),
    offset_val = intro_height + header_height;
$(window).scroll(function() {
  var scroll_top = $(window).scrollTop();
    if (scroll_top >= offset_val) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
            $(".navbar-fixed-top").removeClass("navbar-transparent");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
      $(".navbar-fixed-top").addClass("navbar-transparent");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
    $('#up').fadeOut("fast");
    $('nav').fadeOut("fast");
});


$(window).scroll(function() {
    if ($(this).scrollTop() >= 500) {    // If page is scrolled more than 50px
        $('#up').fadeIn("fast");       // Fade in the arrow
        $('nav').fadeIn("fast");

    } else {
        $('#up').fadeOut("fast");      // Else fade out the arrow
        $('nav').fadeOut("fast");
    }
});

var tag = document.createElement('script');
        tag.src = 'https://www.youtube.com/player_api';
var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var tv,
        playerDefaults = {autoplay: 0, autohide: 1, modestbranding: 0, rel: 0, showinfo: 0, controls: 0, disablekb: 1, enablejsapi: 0, iv_load_policy: 3};
var vid = [
            {'videoId': '_TVhY_bxzsU', 'startSeconds': 4, 'endSeconds': 732, 'suggestedQuality': 'highres'}
        ],
        randomVid = Math.floor(Math.random() * vid.length),
    currVid = randomVid;


function onYouTubePlayerAPIReady(){
  tv = new YT.Player('tv', {events: {'onReady': onPlayerReady, 'onStateChange': onPlayerStateChange}, playerVars: playerDefaults});
}

function onPlayerReady(){
  tv.loadVideoById(vid[currVid]);
  tv.mute();
}

function onPlayerStateChange(e) {
  if (e.data === 1){
    $('#tv').addClass('active');

  } else if (e.data === 2){
    $('#tv').removeClass('active');
    if(currVid === vid.length - 1){
      currVid = 0;
    } else {
      currVid++;  
    }
    tv.loadVideoById(vid[currVid]);
    tv.seekTo(vid[currVid].startSeconds);
  }
}

function vidRescale(){

  var w = $(window).width()+2,
    h = $(window).height();

  if (w/h > 16/9){
    tv.setSize(w, w/16*9);
    $('.tv .screen').css({'left': '0px'});
  } else {
    tv.setSize(h/9*16, h);
    $('.tv .screen').css({'left': -($('.tv .screen').outerWidth()-w)/2});
  }
}

$(window).on('load resize', function(){
  vidRescale();
});

function mute(){
    $('#tv').toggleClass('mute');

    if($('#tv').hasClass('mute')){
    $('#left-icon span').addClass('fa-volume-off');
    $('#left-icon span').removeClass('fa-volume-up');
    tv.mute();
    } else {
    tv.unMute();
    $('#left-icon span').removeClass('fa-volume-off');
    $('#left-icon span').addClass('fa-volume-up');
    }
}

// $('#left-icon span').on('click', function(){
//   $('.hi em:nth-of-type(2)').html('~');
//   tv.pauseVideo();
// });

//    Login js















