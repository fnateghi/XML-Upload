<?php INCLUDE_ONCE("tpl/header.php") ?>
<body>
    <?php INCLUDE_ONCE("tpl/nav.php") ?>
    <div class="container center">
        <div class="row">
            <div class="col-md-12">
                <h1 class="white">Datenbank erstellen</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-3 center">
                <div class="btn-container">
                    <br>
                    <p id="namefile">Beim Klicken auf dem Button, wird die Datenbank angelegt</p>
                    <br>
                    <button class="btn btn-primary"><a href="db/db.php" target="_blank"
                            style="color:white;">erstellen</a></button>
                </div>
            </div>
        </div>
        <!-- upload Formulare -->
        <div class="container center">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="white">Datei hochladen</h1>
                </div>
            </div>
            <form method="post" action="./upload.php" enctype="multipart/form-data" accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 center">
                        <div class="btn-container">
                            <br>
                            <p id="namefile">Nur XML Datei ist erluabt (.xml)</p>
                            <br>
                            <!--this is the actual file input, is set with opacity=0 beacause we wanna see our custom one-->
                            <input type="file" name="fileToUpload" id="fileToUpload">
                        </div>
                    </div>
                </div>
                <!--additional fields-->
                <div class="row">
                    <div class="col-md-12">
                        <!--the defauld disabled btn and the actual one shown only if the three fields are valid-->
                        <input type="submit" value="Upload File" name="file" class="btn btn-primary" id="submitbtn">
                    </div>
                </div>
            </form>
        </div>
        <?php INCLUDE_ONCE("tpl/footer.php") ?>
</body>
</html>