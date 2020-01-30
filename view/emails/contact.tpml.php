<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            Un nouveau message vient d'arriver. merci d'en prendre connaissance.
        </div>
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="card-text" style="width: 450px">
                        Pseudonyme : <?= is_logged_in()
                        ? $username = get_session('username')
                        : $username = $_POST['username'] 
                        ;?><br />

                        Adresse email : <?= is_logged_in()
                        ? $email = get_session('email')
                        : $email = $_POST['email'] 
                        ;?><br />

                        Contenu du message : <?= $_POST['mailcontent'] ;?><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>