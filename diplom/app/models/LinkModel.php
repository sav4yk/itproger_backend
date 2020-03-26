<?php
require_once 'DB.php';

class LinkModel {
    private $userId;
    private $fullLink;
    private $shortLink;

    private $_db = null;

    public function __construct()
    {
        $this->_db = DB::getInstense();
    }

    public function setData($userId, $fullLink, $shortLink) {
        $this->userId = $userId;
        $this->fullLink = filter_var($fullLink, FILTER_VALIDATE_URL);
        $prm = preg_replace("/^[a-zа-яё\d]{1}[a-zа-яё\d\s]*[a-zа-яё\d]{1}$/i", "", $prm);
        $this->shortLink = filter_var($shortLink, FILTER_SANITIZE_STRING);

    }

    public function validLink() {

        if(strlen($this->fullLink) == 0)
            return "Длинная ссылка пуста или имеет ошибки";
        else if(strlen($this->shortLink) < 3)
            return "Короткая ссылка не менее 3 символов";
        else if($this->checkShortLink($this->shortLink))
            return "Такая короткая ссылка уже занята. Укажи другую";
        else if(!$this->checkShortLinkSymbol())
                return "В короткой ссылке можно использовать только символ A-Z, a-z, 0-9";
        else
            return "Верно";
    }

    public function checkShortLink($link) {
        $link=filter_var($link, FILTER_SANITIZE_STRING);
        $result = $this->_db->query("SELECT * FROM `links` WHERE  `short_link` = '$link' LIMIT 1");
        if ($result->fetch())
           return true;
        else return false;
    }

    private function checkShortLinkSymbol() {
        $options = array(
         'flags'=>"",
         "options"=>array(
             'regexp'=>'/^[A-Za-z0-9]*$/'
            ),
        );
         if(filter_var($this->shortLink,FILTER_VALIDATE_REGEXP,$options))
            return true;
         else
          return false;

    }

    public function getLinks($user_id) {
        $query = $this->_db->prepare("SELECT * FROM `links` WHERE  `user_id` = '$user_id' ORDER BY id DESC");
        $query->execute([$category]);
        return $query->FetchAll(PDO::FETCH_ASSOC);
    }

    public function saveShortLink() {

        $sql = 'INSERT INTO links(user_id, full_link, short_link) VALUES(:user_id, :full_link, :short_link)';
        $query = $this->_db->prepare($sql);
        $query->execute(['user_id'=>$this->userId, 'full_link'=>$this->fullLink, 'short_link'=>$this->shortLink]);

    }

    public function getFullLink($short) {
        $query = $this->_db->prepare("SELECT * FROM `links` WHERE  `short_link` = '$short' LIMIT 1");
        $query->execute([$category]);
        $result =  $query->Fetch(PDO::FETCH_ASSOC);
        return $result['full_link'];

    }

    public function delLink($user_id, $id) {
        $result= $this->_db->exec("DELETE FROM `links` WHERE  `id` = '$id' AND `user_id` = '$user_id' LIMIT 1");
    }
}
