<div id="slider" class="outerWrapper">                
    <div class="sliderCaption"><h1></h1><h2></h2></div>    
    <div class="sliderOffer">                    
        <div class="sliderOfferBuy">
            <div class="sliderOfferTag"></div>
            <h1>Plaćaš samo!</h1>
            <h2></h2>
            <img src="images/basketRemove.png" alt="U košaric" onclick="removeOfferToBasket(data[0]);"/>
        </div>
        <div class="sliderOfferDiscount">
            <div><h1>Vrijedi</h1><h2 class="v"></h2></div>
            <div><h1>Popust</h1><h2 class="p"></h2></div>
            <div><h1>Ušteda</h1><h2 class="u"></h2></div>
        </div>
        <div class="sliderOfferFriend">
            <a><img src="images/gift.png" alt="Gift" /><h1>Pokloni<br>prijatelju</h1></a>
            <a><img src="images/info.png" alt="Detalji" /><h1>Više<br>detalja</h1></a>
        </div>
        <div class="sliderOfferBought"><h1></h1><meter value="0" min="0" max="0">0</meter><h2></h2></div>
        <div class="sliderOfferTime"><h1>Preostalo vremena: </h1><h2></h2></div>
    </div>
    <div class="sliderImg"><img src="images/empty.png" alt="Slika ponude" /></div>
    <div class="sliderImgNum"><a onclick="sliderPlay()" id="sliderPlay">&#9734;</a></div>
    <div class="sliderImgNum"><a id="sid3" onclick="sliderChange(3)" >4</a></div>
    <div class="sliderImgNum"><a id="sid2" onclick="sliderChange(2)" >3</a></div>
    <div class="sliderImgNum"><a id="sid1" onclick="sliderChange(1)" >2</a></div>
    <div class="sliderImgNum"><a id="sid0" onclick="sliderChange(0)" class="current">1</a></div>
    <div id="imageGallery">
        <div class="shortDesc"></div>
        <div class="imgGallery"></div>
    </div>
    <div class="clear"></div>
</div>