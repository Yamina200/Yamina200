<?php
class Comment {
    public $id;
    public $user_id;
    public $post_id;
    public $commentaire;
    public $date_commentaire;

    public function __construct($id, $user_id, $post_id, $commentaire, $date_commentaire) {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->post_id = $post_id;
        $this->commentaire = $commentaire;
        $this->date_commentaire = $date_commentaire;
    }
}
?>
