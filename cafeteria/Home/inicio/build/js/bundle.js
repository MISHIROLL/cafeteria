const video = document.getElementById("video-slider");
function videoUrl(videoName){
    video.src = `inicio/video/${videoName}`;
    video.classList.remove("none");
}
video.addEventListener("ended", function(){

})


