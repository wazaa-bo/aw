document.addEventListener('click', function() {
    var audio=document.getElementById('audio');

    if(audio.paused) {
        audio.play().then(() => {

        }).catch(error => {
            console.log("El navegador no permite el audio:"+error);
        });
    }
}, {once:true});