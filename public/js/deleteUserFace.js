window.onload = function () {

    menuOnOff();

    document.getElementById("deleteEmoji").onmouseover = function() {hoverInUserDelete()};
    
    document.getElementById("deleteEmoji").onmouseout = function() {hoverOutUserDelete()};
    
    function hoverInUserDelete(){
        deleteEmoji.setAttribute('src', '../../images/Sadface.png');
    }
    
    function hoverOutUserDelete(){
        deleteEmoji.setAttribute('src', '../../images/Cryface.png');
    }

}
