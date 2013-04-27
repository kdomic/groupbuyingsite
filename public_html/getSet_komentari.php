<?php require_once('includes/initialize.php'); ?>
<?php                
    /*
    Protocol legend
        [1]                                 - getAll()
        [2,'ID']                            - get()
        [3, '-1', ...]                      - set() new
        [4, 'ID', ...]                      - set() update
        [5, 'id_korisnika','id_ponude']     - getByEmail()
        [6, 'id_ponude']
    */    
    $data = json_decode(stripslashes($_POST['data']));
    switch((int)$data[0]){
        //case 1: Komantari::getAll(); break;
        //case 2: Komantari::get($data[1]); break;
        case 3: Komantari::set($data); break;       
        //case 4: Komantari::set($data); break;
        case 5: Komantari::canIpost($data[1],$data[2]); break; //0-ne, 1-da, 2-već jesi
        case 6: Komantari::getCommentForOffer($data[1]); break;
    }
    

?>