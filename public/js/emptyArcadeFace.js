window.onload = function () {

    menuOnOff();

    document.getElementById("sadEmoji").onmouseover = function() {hoverInUserDelete()};
    
    document.getElementById("sadEmoji").onmouseout = function() {hoverOutUserDelete()};
    
    function hoverInUserDelete(){
        sadEmoji.setAttribute('src', '../../images/Heartface.png');
    }
    
    function hoverOutUserDelete(){
        sadEmoji.setAttribute('src', '../../images/Sadface.png');
    }

}
