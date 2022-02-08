<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 10px;
            width: 60%;
            background-color: aliceblue;
        }

        #table_div {
            display: flex;
            justify-content: center;
            align-content: center;
            margin-top: 20px;
        }

        #date {
            text-align: center;
            background-color: blue;
            height: 15vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: aliceblue;
            position: sticky;
        }

        .btnEdit2,.btnEdit1,.btnEditA {
            margin-right: 10px;
            padding: 8px;
        }
        #Add,
        #Delete
        {
            width: 29%;
            margin-right: 1%;
            height: 40px;
            margin-top: 20px;
            position: relative;
            left: 20%;
        }
        #Delete {
            margin-right: 0;
            margin-left: 1%;
        }
        #add_div,#del_div{
            width: 60%;
            margin: auto;
            margin-top: 10px;
            display:none;
        }
        #name,#division,#sap{
            width: 30%;
            height: 30px;
        }
    </style>
</head>

<body style="background-color: aquamarine;">
    <h1 id="date"></h1>
    <script>
        n = new Date();
        y = n.getFullYear();
        m = n.getMonth() + 1;
        d = n.getDate();
        document.getElementById("date").innerHTML = "Date    -  " + d + "/" + m + "/" + y;
    </script>
    <button id="Add" onclick="open_adddiv()">Add student</button>
    <button id="Delete" onclick="open_deldiv()">Delete student</button>
    <div id="add_div">
        <form id="add_edit" action="" method="POST">
            <input type="text" name="Name" id="name" placeholder="Enter name" required>
            <select type="text" name="division" id="division" placeholder="Enter Division">
                <option value="A">A</option>
                <option value="B">B</option>
            </select>
            <input type="submit" name="add_stud" value="Add student" id="add" style="width: 15%;height:30px;" onclick="return mess1()"><br>
    </div>
    <div id="del_div">
        <form id="del_edit" action="" method="POST">
            <input type="number" name="sap" id="sap" placeholder="Enter Sap">
            <input type="submit" name="del_stud" value="Delete student" id="del" style="width: 15%;height:30px;" onclick="return mess2()"><br> 
    </div>
    </form>
    
    <div id="table_div">

        <table id="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Sap</th>
                    <th scope="col">Attendence (hours)</th>
                </tr>
            </thead>
            <tbody>
                <?php
            include 'php_connection.php';
            $fetch = "select Sap,Name from students where Division ='A' ORDER BY Sap DESC";
            $select_con=mysqli_query($conn,$fetch);
            while($name=mysqli_fetch_assoc($select_con)){
                    $sapy=strval($name['Sap']);     
                    $namy=strval($name['Name']);
            ?>
                <script>
                    var table = document.getElementById("table");
                    var row = table.insertRow(1);
                    var cell1 = row.insertCell(0);
                    var cell2 = row.insertCell(1);
                    var cell3 = row.insertCell(2);

                    cell2.innerHTML = "<?php echo $sapy ?>";
                    cell1.innerHTML = "<?php echo $namy ?>";
                    cell3.innerHTML = "<button class='btnEdit2' id=2"+"<?php echo $sapy ?>"+">2</button><button class='btnEdit1' id=1"+"<?php echo $sapy ?>"+">1</button><button class='btnEditA' id=a"+"<?php echo $sapy ?>"+">Absent</button>";
                    cell3.style.display = "flex";
                    cell3.style.width = "auto";

                </script>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
    <script>
        var i=1;
        var j=1;
        function open_adddiv(){
            if (i==1){
                document.getElementById("add_div").style.display = "block";
                i=0
            }
            else{
                i=1
                document.getElementById("add_div").style.display = "none";
            }
        }
        function open_deldiv() {
                if (j == 1) {
                    document.getElementById("del_div").style.display = "block";
                    j = 0
                }
                else {
                    j = 1
                    document.getElementById("del_div").style.display = "none";
                }
            }
    </script>
    <?php
        include 'php_connection.php';
        if (isset($_POST['add_stud'])){
            $name =$_POST['Name'];
            $division=$_POST['division'];
            $add="Insert into students (Name, Division) values ('$name','$division')";
            $nu=mysqli_query($conn,$add);
            ?>
            <script>   
                location.replace("attendece_page.php");
            </script>   
            <?php
             
        }
        if (isset($_POST['del_stud'])){
            $sap = $_POST['sap'];
            $del = "delete from students where Sap=$sap";
            $nu=mysqli_query($conn,$del);
            ?>
            <script>   
                location.replace("attendece_page.php");
            </script>   
            <?php
        }
    ?>
    <script>
        function mess1(){
            alert("Record saved successfully");
        }
        function mess2(){
            alert("Record deleted successfully");
        }
        document.querySelectorAll('.btnEdit2').forEach(item => {
                item.addEventListener('click', event => {
                    item.style.backgroundColor="Green"
                    let twoid = item.id.toString();
                    <?
                })
            })
        document.querySelectorAll('.btnEdit1').forEach(item => {
                item.addEventListener('click', event => {
                    item.style.backgroundColor="Green";
                    let oneid = item.id.toString();
                })
            })
        document.querySelectorAll('.btnEditA').forEach(item => {
                item.addEventListener('click', event => {
                    item.style.backgroundColor="Red"
                    let absentid = item.id.toString();
                })
            })
    </script>

</body>

</html>