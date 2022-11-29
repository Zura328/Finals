<?php
      $servername = 'sql110.epizy.com';
      $username = 'epiz_33088872';
      $db = 'epiz_33088872_finals';
      $password = 'Wq7560zlnC';
  $table="Students";

  // Create connection
  $conn = new mysqli($servername, $username, $password);
  

  // Create database
  $sql = "CREATE DATABASE IF NOT EXISTS $db";
  $conn->query($sql);
  $conn = new mysqli($servername, $username, $password,$db);

  $sql ="CREATE TABLE IF NOT EXISTS Teachers (
    teach_id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    mname VARCHAR(30),
    lname VARCHAR(30) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    bday DATE NOT NULL,
    email VARCHAR(50) NOT NULL,
    telphone VARCHAR(20),
    cellphone VARCHAR(20) NOT NULL,
    t_address VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";
  $conn->query($sql);
  $sql="ALTER TABLE Teachers AUTO_INCREMENT = 1000";
      $conn->query($sql);
  
  $sql = "CREATE TABLE IF NOT EXISTS Students (
      School_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      fname VARCHAR(30) NOT NULL,
      mname VARCHAR(30),
      lname VARCHAR(30) NOT NULL,
      pass VARCHAR(30) NOT NULL,
      bday DATE NOT NULL,
      email VARCHAR(50) NOT NULL,
      telphone VARCHAR(20),
      cellphone VARCHAR(20) NOT NULL,
      s_address VARCHAR(100) NOT NULL,
      teach_id INT (6) UNSIGNED NOT NULL,
      reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      FOREIGN KEY (teach_id) REFERENCES Teachers(teach_id)
      )";
      $conn->query($sql);
      $sql="ALTER TABLE $table AUTO_INCREMENT = 10000";
      $conn->query($sql);

  $sql = "CREATE TABLE IF NOT EXISTS Courses (
    cor_id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cor_name VARCHAR(30) NOT NULL UNIQUE,
    cor_units INT (3) NOT NULL ,
    cor_code VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

      $conn->query($sql);
    
      $cor_array = array(
        
array("Filipino",3,"FIL"),
        
array("Science",3,"SCI"),
        
array("Mathematics",3,"MAT"),
        
array("English",3,"ENG"),
        
array("Araling Panlipunan",3,"AP"),
        
array("Edukasyon sa Pagpapakatao",3,"ESP"),
        
array("MAPEH",3,"MAPEH"),
        
array("Astronomy",3,"AST")
      );
      for ($row = 0; $row < count($cor_array); $row++) {
            $corse_name=$cor_array[$row][0];
            $corse_units=$cor_array[$row][1];
            $corse_code=$cor_array[$row][2];
            $query = mysqli_query($conn,"SELECT * FROM Courses WHERE cor_name='$corse_name'");
            if(mysqli_num_rows($query)==0){
                $sql = "INSERT INTO Courses (cor_name,cor_units,cor_code) VALUES('$corse_name','$corse_units','$corse_code')";
            mysqli_query($conn,$sql);
            }
            $sql = "CREATE TABLE IF NOT EXISTS $corse_code (
                rec_id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                School_id INT(6) UNSIGNED NOT NULL,
                grade FLOAT NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                FOREIGN KEY (School_id) REFERENCES Students(School_id)
              )";
              mysqli_query($conn,$sql);
      }
      //initial data
    $prof= array(
        
array("John","Dimagiba","Bato","abc1234","2002-04-20","dimagiba@dito.com","","09458412269","Bahay na Bato","Best Sculptor"),
        
array("Edward","Matsuda","Jacinto","1234abc","2000-04-20","jacinto@dito.com","","09923562289","Malvar Batangas","Best Analytics"),

array("Ace","Mark","Aquino","56565656","1995-04-01","aquino@dito.com","","09953568215","Tondo Manila","Best Dancer"),

array("Niel","Anthony","Dioquino","123456789","1998-02-02","dioquino@dito.com","","09568745623","Nasugbu Batangas","Best Artist"),

array("Aira","Syn","Dayen","987654321","1999-01-01","dayen@dito.com","743-669","912346579810","Palawan","Best Singer")
    );
    for ($row = 0; $row < count($prof); $row++) {
        $t_fname = $prof[$row][0];
        $t_mname = $prof[$row][1];
        $t_lname = $prof[$row][2];
        $t_pass = $prof[$row][3];
        $t_bday = $prof[$row][4];
        $t_email = $prof[$row][5];
        $t_telphone = $prof[$row][6];
        $t_cellphone = $prof[$row][7];
        $t_address = $prof[$row][8];
        $t_title = $prof[$row][9];
        $query = mysqli_query($conn,"SELECT * FROM Teachers WHERE fname='$t_fname' AND mname='$t_mname' AND lname='$t_lname'");
            if(mysqli_num_rows($query)==0){
            $sql = "INSERT INTO Teachers (fname,mname,lname,pass,bday,email,telphone,cellphone,t_address,title) VALUES('$t_fname','$t_mname','$t_lname','$t_pass','$t_bday','$t_email','$t_telphone','$t_cellphone','$t_address','$t_title')";
            mysqli_query($conn,$sql);}
        
  }
  $student = array( 
array("Abasola","Knurl Von ","B","knurl@gmail.com","user1knurl","39398","","+63 9835552172","Batangas",1000),
array("Acuin","Ella Francisca","M","ella@gmail.com","user1ella","39356","","+63 9325551387","Manila",1000),
array("Alberto","Alexi","S","aalexii@gmail.com","user1alexi","39382","","+63 9285559172","Manila",1000),
array("Aliposa","Lemy Anne ","F","lemyyy@gmail.com","user1lemy","39349","","+63 9325554807","Batangas",1000),
array("Alonto","Raynisah","A","nisahhh@gmail.com","user1rayray","39427","","+63 9285553455","Manila",1000),
array("Anderson","Andrei Miguel ","C","miggy@gmail.com","user1anddand","39392","","+63 9285559627","Cavite",1000),
array("Apin","Craig Martin James","T","jamesssmarl@gmail.com","user1craig","39231","","+63 9325556494","Batangas",1000),
array("Aquino","Jericho Miguel ","F","miguellll@gmail.com","user1jem","39177","","+63 9075559710","Manila",1000),
array("Bundang","Jem Mark","P","jemm@gmail.com","user1jer","39209","","+63 9835551605","Manila",1000),
array("Bustamante","Linus Aldrich ","C","linusss@gmail.com","user1linus","39231","","+63 9835555429","Batangas",1000),
array("Camacho","Anshley","M","ashhhleyyy@gmail.com","user1anshley","39130","","+63 9105552391","Manila",1001),
array("Chudian","Lance Joseph ","D","lanceeejojo@gmail.com","user1lance","39143","","+63 9085559558","Manila",1001),
array("Cortey","Nathan Efrayim ","M","natnat@gmail.com","user1nathan","39143","","+63 9805556366","Manila",1001),
array("Cruz","Adrian Ramon ","S","ramram@gmail.com","user1ramon","39427","","+63 9225557009","Batangas",1001),
array("Dator","Mikael Judielle ","U","mikaelell@gmail.com","user1mikmik","39181","","+63 9335551803","Manila",1001),
array("Dela Cruz","Andrea Gale ","E","galeandreaa@gmail.com","user1andrea","39116","","+63 9225557391","Manila",1001),
array("Dela Cruz","Juan Paolo","O","ppaopao@gmail.com","user1juanjuan","39437","","+63 9285558031","Manila",1001),
array("Dellomas","Karl Patrick","L","karlkar@gmail.com","user1karl","39096","","+63 9335559766","Batangas",1001),
array("Delos Reyes","Patricia","A","patpat@gmail.com","user1patpat","39378","","+63 9195555960","Manila",1001),
array("Dino","Angeline Grace ","A","angeeee@gmail.com","user1angeline","39388","","+63 9195559404","Manila",1001),
array("Domingo ","Jose Inigo ","G","josejose@gmail.com","user1josee","39239","","+63 9225553248","Manila",1002),
array("German","Johanne Kenneth Andrei","I","kenken@gmail.com","user1jojo","39413","","+63 9225550208","Batangas",1002),
array("German","Julian Kristian Allen","I","lennlenn@gmail.com","user1julian","39332","","+63 9075553441","Manila",1002),
array("Geronga","Allana Mae","C","allna@gmail.com","user1allama","39441","","+63 9835559514","Manila",1002),
array("Gonzales","Louise Katrina","J","loulou@gmail.com","user1louulouu","39440","","+63 9295557256","Manila",1002),
array("Guevara","Manuel Lorenzon","H","lorrorrr@gmail.com","user1mannmann","39278","","+63 9805559162","Batangas",1002),
array("Guibone","Niccolo Juan","M","niccnicc@gmail.com","user1nicco","39220","","+63 9325556892","Bulacan",1002),
array("Khafaji","Hafsa","A","haffsaa@gmail.com","user1hhassdd","39446","","+63 9225553116","Cavite",1002),
array("Lee","Cyril Vince ","Z","cycyy@gmail.com","user1kcycyy","39100","","+63 9235555029","Cavite",1002),
array("Llovit","Val","A","vallu@gmail.com","user1valval","39173","","+63 9075559383","Batangas",1002),
array("Mena","Niel Patrick","R","nielnul@gmail.com","user1nie","39212","","+63 9335550067","Batangas",1003),
array("Mendoza","Clainee","S","clainne@gmail.com","user1cainne","39308","","+63 9215554144","Batangas",1003),
array("Milla","Ashley Beatrice","S","beabea@gmail.com","user1ash","39103","","+63 9285553189","Bulacan",1003),
array("Morcilla","Lauren Jeri","B","jerjer@gmail.com","user1krenren","39122","","+63 9805555043","Bulacan",1003),
array("Mutya","Shena Marie","B","sheeshe@gmail.com","user1shesh","39300","","+63 9195559306","Manila",1003),
array("Ordonio","Jeremy Eins","B","jemrerme@gmail.com","user1jemr","39167","","+63 9835552272","Bulacan",1003),
array("Orje","Judea Wilch","T","jujudea@gmail.com","user1jude","39212","","+63 9285550097","Batangas",1003),
array("Peregrino","Marcus Elijah","F","mamarcuss@gmail.com","user1marrmar","39215","","+63 9295558866","Cavite",1003),
array("Porta","Adriana Beatriz","P","addaddrri@gmail.com","user1addrian","39084","","+63 9075555707","Manila",1003),
array("Ragandac","Elijah Raphael ","D","elieli@gmail.com","user1eli","39189","","+63 9105551363","Batangas",1003),
array("Reyes","Robyn Jersey ","M","robrob@gmail.com","user1robbrob","39122","","+63 9805553421","Bulacan",1004),
array("Rosellosa","Giovenni II","B","giovennnn@gmail.com","user1giogio","39187","","+63 9225559252","Bulacan",1004),
array("Sabio","Kenji Matthew ","V","kenkenii@gmail.com","user1kenji","39280","","+63 9805554511","Manila",1004),
array("Suarez","Francis Roland","S","landro@gmail.com","user1franciss","39181","","+63 9805559093","Batangas",1004),
array("Suboc","Justin Troy ","B","trotroy@gmail.com","user1justin","39299","","+63 9325558463","Cavite",1004),
array("Tandas","Vince Ryniel ","P","ryryr@gmail.com","user1vin","39412","","+63 9215553165","Cavite",1004),
array("Tiad","Akteo Keith","T","keitkeit@gmail.com","user1aktero","39368","","+63 9835553802","Cavite",1004),
array("Tienzo ","Kurt Stephen ","R","kurtkurt@gmail.com","user1kurt","39341","","+63 9325551418","Batangas",1004),
array("Tria","Lorenzo Diego","Z","lorrentc@gmail.com","user1lorenzo","39287","","+63 9195550017","Batangas",1004),
array("Vargas","Katerina ","M","kakttkat@gmail.com","user1katerrto","39209","","+63 9225551157","Cavite",1004));
for ($row = 0; $row < count($student); $row++) {
    $s_lname = $student[$row][0];
    $s_fname = $student[$row][1];
    $s_mname = $student[$row][2];
    $s_pass = $student[$row][3];
    $s_bday = $student[$row][4];
    $s_email = $student[$row][5];
    $s_telphone = $student[$row][6];
    $s_cellphone = $student[$row][7];
    $s_address = $student[$row][8];
    $s_teach = $student[$row][9];
    $query = mysqli_query($conn,"SELECT * FROM Students WHERE fname='$s_fname' AND mname='$s_mname' AND lname='$s_lname'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO Students (fname,mname,lname,pass,bday,email,telphone,cellphone,s_address,teach_id) VALUES('$s_fname','$s_mname','$s_lname','$s_pass','$s_bday','$s_email','$s_telphone','$s_cellphone','$s_address','$s_teach')";
        mysqli_query($conn,$sql);}
}
$studgrade = array(
  array (10000,90,84,93,82,97,81,95,85),
  array (10001,98,97,90,80,100,99,95,87),
  array (10002,94,80,98,93,94,95,81,84),
  array (10003,97,93,98,84,91,94,91,95),
  array (10004,93,80,98,86,94,93,88,92),
  array (10005,93,88,85,98,100,80,95,98),
  array (10006,96,98,95,88,96,82,100,84),
  array (10007,97,90,91,83,93,82,94,89),
  array (10008,98,93,83,99,94,80,88,81),
  array (10009,91,94,86,82,94,97,94,88),
  array (10010,84,96,80,100,83,83,89,90),
  array (10011,94,80,83,96,90,83,98,83),
  array (10012,94,88,85,80,91,89,83,92),
  array (10013,88,80,88,83,94,80,94,87),
  array (10014,87,99,89,97,94,100,100,86),
  array (10015,91,98,85,88,93,97,95,80),
  array (10016,100,89,90,82,97,85,92,80),
  array (10017,100,93,80,96,91,95,95,98),
  array (10018,82,90,100,88,95,99,83,96),
  array (10019,97,91,94,90,97,90,97,94),
  array (10020,89,88,80,92,96,95,97,83),
  array (10021,93,98,97,80,80,82,95,95),
  array (10022,98,94,99,82,91,93,99,91),
  array (10023,89,84,92,97,87,91,87,83),
  array (10024,97,99,99,80,99,93,83,84),
  array (10025,81,97,86,88,87,88,85,83),
  array (10026,88,88,81,84,100,84,94,88),
  array (10027,100,81,89,92,86,99,89,88),
  array (10028,87,95,82,91,86,81,86,91),
  array (10029,82,86,97,86,95,99,81,95),
  array (10030,93,92,89,85,92,82,89,99),
  array (10031,86,94,100,83,81,89,87,81),
  array (10032,96,85,83,96,91,92,88,83),
  array (10033,91,94,86,88,82,83,91,90),
  array (10034,97,91,94,80,84,83,97,92),
  array (10035,81,95,91,85,83,82,87,99),
  array (10036,80,82,84,80,89,97,86,90),
  array (10037,97,90,92,92,91,85,95,96),
  array (10038,88,100,94,86,94,87,89,89),
  array (10039,86,80,80,82,81,85,80,94),
  array (10040,87,99,92,92,97,89,95,81),
  array (10041,92,94,98,96,97,99,82,87),
  array (10042,87,100,96,88,93,80,87,86),
  array (10043,81,90,84,89,90,80,84,90),
  array (10044,83,81,85,84,92,96,92,93),
  array (10045,95,83,90,94,97,92,96,100),
  array (10046,95,80,100,99,83,85,89,85),
  array (10047,83,95,83,82,88,83,94,80),
  array (10048,98,88,85,87,98,100,88,92),
  array (10049,99,98,88,80,86,93,83,83));

  for ($row = 0; $row < count($studgrade); $row++) {
    
    $StudNum =$studgrade[$row][0];
    $ap = $studgrade[$row][1];
    $ast = $studgrade[$row][2];
    $eng = $studgrade[$row][3];
    $esp = $studgrade[$row][4];
    $fil = $studgrade[$row][5];
    $mapeh = $studgrade[$row][6];
    $mat = $studgrade[$row][7];
    $sci = $studgrade[$row][8];
    
    $query = mysqli_query($conn,"SELECT * FROM ap WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO ap (School_id,grade) VALUES('$StudNum','$ap')";
        mysqli_query($conn,$sql);}
    $query = mysqli_query($conn,"SELECT * FROM ast WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO ast (School_id,grade) VALUES('$StudNum','$ast')";
        mysqli_query($conn,$sql);}
    $query = mysqli_query($conn,"SELECT * FROM eng WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO eng (School_id,grade) VALUES('$StudNum','$eng')";
        mysqli_query($conn,$sql);}
      $query = mysqli_query($conn,"SELECT * FROM esp WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO esp (School_id,grade) VALUES('$StudNum','$esp')";
        mysqli_query($conn,$sql);}
    $query = mysqli_query($conn,"SELECT * FROM fil WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO fil (School_id,grade) VALUES('$StudNum','$fil')";
        mysqli_query($conn,$sql);}
    $query = mysqli_query($conn,"SELECT * FROM mapeh WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO mapeh (School_id,grade) VALUES('$StudNum','$mapeh')";
        mysqli_query($conn,$sql);}
      $query = mysqli_query($conn,"SELECT * FROM mat WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO mat (School_id,grade) VALUES('$StudNum','$mat')";
        mysqli_query($conn,$sql);}
    $query = mysqli_query($conn,"SELECT * FROM sci WHERE School_id='$StudNum'");
        if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO sci (School_id,grade) VALUES('$StudNum','$sci')";
        mysqli_query($conn,$sql);}

}

?>