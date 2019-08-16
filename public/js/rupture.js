
jQuery(function($) {

//Check book logic

    var audio1 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture1.mp3'],
        volume: 0.8,
        autoplay: true,
        loop: true,
      });
      var audio2 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture2.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio3 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture3.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio4 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture35.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio5 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture4.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio6 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture5.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio7 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture6.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio8 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture7.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });
      var audio9 = new Howl({
        src: ['https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture_audio_book.mp3'],
        volume: 0.8,
        //autoplay: true,
        loop: true,
      });


    var book = false;
    //audio1 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture1.wav');
    //audio2 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture2.wav');
    //audio3 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture3.wav');
    //audio4 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture35.wav');
    //audio5 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture4.wav');
    //audio6 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture5.wav');
    //audio7 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture6.wav');
    //audio8 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture7.wav');
    //audio9 = new Audio('https://floridareview.cah.ucf.edu/wp-content/themes/thefloridareview-theme/public/audio/rupture_audio_book.wav');

    
        $('#play').click(function(){
            console.log("Tdest");
            audiobook();
            if($("#pause").is(':hidden')){
                $('#play').hide();
                $('#pause').show();
            }
         });

         $('#pause').click(function(){
            console.log("Test");
            audiobook();
            if($("#play").is(':hidden')){
                $('#pause').hide();
                $('#play').show();
            }
         });

         $('#stop').click(function(){
            console.log("Test");
            audio9.pause();
            audio9.currentTime = 0;
            book = false;
            if($("#play").is(':hidden')){
                $('#pause').hide();
                $('#play').show();
            }
         });



    function inView(elem){
    var docViewTop = $(window).scrollTop();
    var thisViewTop = $(this).scrollTop();
    var docViewBottom = docViewTop + $(window).height();
    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    return (((elemBottom <= docViewBottom) && (elemTop >= docViewTop))||((elemTop<=docViewBottom)&&(elemBottom>=docViewTop)));
}

    function audiobook(){
        audio1.pause();
        audio2.pause();
        audio3.pause();
        audio4.pause();
        audio5.pause();
        audio6.pause();
        audio7.pause();
        audio8.pause();
        if(!audio9.playing()){
            audio9.play();
            book = true;
            console.log("Played");
        }
        else{
            audio9.pause();
            book = false;
            console.log("Pause");
        }
    }


    function playSound(sound){
        var promise = sound.play();
        if(promise !== undefined){
            promise.then(_=>{
            })
            .catch(error=>{
            })
        }
    }

var $window = $(window);
$window.scroll(function() {
    //if(this.audio7.paused)
      //      playSound(this.audio7);
    if(!book){
    if(inView('#story1')){
        if(!audio1.playing()){
            audio1.play();
            console.log("Audio 1 Playing");
        }
    }
    else{
        audio1.pause();
    }
    if(inView('#story2')){
        if(!audio2.playing())
            audio2.play();
    }
    else{
        audio2.pause();
    }
    if(inView('#story3')){
        if(!audio3.playing())
        audio3.play();
    }
    else{
        audio3.pause();
    }
    if(inView('#story4')){
        if(!audio4.playing())
        audio4.play();
    }
    else{
        audio4.pause();
    }
    if(inView('#story5')){
        if(!audio5.playing())
        audio5.play();
    }
    else{
        audio5.pause();
    }
    if(inView('#story6')){
        if(!audio6.playing())
        audio6.play();
    }
    else{
        audio6.pause();
    }
    if(inView('#story7')){
        if(!audio7.playing())
        audio1.play();
    }
    else{
        audio7.pause();
    }
    if(inView('#story8')){
        if(!audio8.playing())
        audio8.play();
    }
    else{
        audio8.pause();
    }
    }

    
});



});


