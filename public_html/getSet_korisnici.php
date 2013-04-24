<?php require_once('includes/initialize.php'); ?>
<?php                
    /*
    Protocol legend
        [1]             - getAll()
        [2,'ID']        - get()
        [3, '-1', ...]  - set() new
        [4, 'ID', ...]  - set() update
        [5, 'email']    - getByEmail()
        [6]             - getAll(razina)
        [7]             - getAll(razina)
    */
    
    $data = json_decode(stripslashes($_POST['data']));
    switch((int)$data[0]){
        case 1: Korisnici::getAll(); break;
        case 2: Korisnici::get($data[1]); break;
        case 3: Korisnici::set($data); break;       
        case 4: Korisnici::set($data); break;
        case 5: Korisnici::getByEmail($data[1]); break;
        case 6: Korisnici::getAll(2); break;
        case 7: Korisnici::getAll(3); break;
    }
    

?>