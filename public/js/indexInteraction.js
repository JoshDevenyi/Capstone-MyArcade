
window.onload = function () {

    menuOnOff();

    ////Emoji Interaction////

    document.getElementById("indexEmoji").onmouseover = function() {hoverInIndex()};
    document.getElementById("indexEmoji").onmouseout = function() {hoverOutIndex()};
    
    function hoverInIndex(){
        indexEmoji.setAttribute('src', '../../images/Happyface.png');
    }
    
    function hoverOutIndex(){
        indexEmoji.setAttribute('src', '../../images/Smileface.png');
    }

    
    ////Popular Game Browsing////
    var arrowRight = document.getElementById("arrowRight");
    var arrowLeft= document.getElementById("arrowLeft");


    //Game Data
    gameData = document.getElementsByClassName("popGamesData");
    var gameList = [];

    //Formating imported data into JSON
    for (let i=0; i < gameData.length; i++){
        gameList[i] =  JSON.parse(gameData[i].textContent);
1    }

    var popGameOne = document.getElementById("popGameOne");
    var popLinkOne = document.getElementById("popLinkOne");

    var popGameTwo = document.getElementById("popGameTwo");
    var popLinkTwo = document.getElementById("popLinkTwo");

    var popGameThree = document.getElementById("popGameThree");
    var popLinkThree = document.getElementById("popLinkThree");


    var counter = 0;
    var counterTwo = 1;
    var counterThree = 2;

    //Games Forward Click
    arrowRight.onclick = function clickRight(){

        counter = counter + 1;
        counterTwo = counterTwo + 1;
        counterThree = counterThree + 1;

        if(counter === 6) {counter = 0};
        if(counterTwo === 6) {counterTwo = 0};
        if(counterThree === 6) {counterThree = 0};

        popGameOne.setAttribute('src',gameList[counter].cover);
        popGameOne.setAttribute('alt',gameList[counter].name+" name");
        popLinkOne.setAttribute('href',"/games/game/"+ gameList[counter].id);

        popGameTwo.setAttribute('src',gameList[counterTwo].cover);
        popGameTwo.setAttribute('alt',gameList[counterTwo].name+" name");
        popLinkTwo.setAttribute('href',"/games/game/"+ gameList[counterTwo].id);

        popGameThree.setAttribute('src',gameList[counterThree].cover);
        popGameThree.setAttribute('alt',gameList[counterThree].name+" name");
        popLinkThree.setAttribute('href',"/games/game/"+ gameList[counterThree].id);

    }

    //Games Backwards Click
    arrowLeft.onclick = function clickLeft(){

        counter = counter - 1;
        counterTwo = counterTwo - 1;
        counterThree = counterThree - 1;

        if(counter === -1) {counter = 5};
        if(counterTwo === -1) {counterTwo = 5};
        if(counterThree === -1) {counterThree = 5};

        popGameOne.setAttribute('src',gameList[counter].cover);
        popGameOne.setAttribute('alt',gameList[counter].name+" name");
        popLinkOne.setAttribute('href',"/games/game/"+ gameList[counter].id);

        popGameTwo.setAttribute('src',gameList[counterTwo].cover);
        popGameTwo.setAttribute('alt',gameList[counterTwo].name+" name");
        popLinkTwo.setAttribute('href',"/games/game/"+ gameList[counterTwo].id);

        popGameThree.setAttribute('src',gameList[counterThree].cover);
        popGameThree.setAttribute('alt',gameList[counterThree].name+" name");
        popLinkThree.setAttribute('href',"/games/game/"+ gameList[counterThree].id);

    }
    

    


}