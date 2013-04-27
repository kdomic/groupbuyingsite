<div class="content outerWrapper" id="layout_comments">
    <div id="newCommentArea">
        <div class="caption">Postavi svoj komentar</div>
            Ocjeni proizvod: 
            <select id="commentOCJENA">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>

            </select>
            <input id="commentPONUDA" type="hidden" value=""/>
            <textarea id="commentKOMANTAR" class="commentTextarea" placeholder="Vaš komentar možete upisati ovdje..."></textarea>
            <button class="commentSubmit" onclick="saveNewComment();">Objavi</button>
    </div>

    <div class="caption">Komentari korisnika</div>
    <div id="commentBox">
        
    </div>
</div>