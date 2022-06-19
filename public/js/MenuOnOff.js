    ////Burger Menu////

    function menuOnOff() {
        var headerButton = document.getElementById("headerIcon");
        var headerMenu = document.getElementById("siteMenuBelowHeader")
    
        headerMenu.style.display="none";
    
        headerButton.onclick = function menuOnOff(){
    
            if(headerMenu.style.display==="block"){
                headerMenu.style.display="none";
                headerButton.style.color="white";
            } else {
                headerMenu.style.display="block";
                headerButton.style.color="#fad400";
            }
        }
    
        window.addEventListener('resize', function() {
            if (window.innerWidth > 800){
                headerMenu.style.display="none";
                headerButton.style.color="white";
            }
    
          });
    }


