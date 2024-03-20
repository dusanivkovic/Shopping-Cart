<?php
    use app\lib\{Db, Session};
    use app\models\Model;
    $currentUser = unserialize(Session::get('user'));
    $currentUserMail = $currentUser->fm->data['email'] ?? '';
    $model = new Model();
    $db = $model->setDataBase(new Db);
    $query = "SELECT * FROM cart WHERE mail = '{$currentUserMail}'";
    $result = $db->selectRecords($query);
    // echo '<pre>' . print_r($currentUser->getMail()) . '<br>' .'</pre>';

?>
    <div class="fixed-bottom"><?php echo $result->num_rows?? '0' ?><i class="bi bi-cart"></i></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>