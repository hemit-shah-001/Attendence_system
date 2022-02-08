<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>

    <style>
        
        #item{
            height: 100vh;
            width: 100%;
            display: flex;
            position: relative;
            justify-content: center;
            align-items: center;
        }
        #classA, #classB{
            width:35%;
            height:40vh;
            background-color: darkcyan;
            margin: 20px;   
            display: flex;
            align-items: center;
            justify-content: center;
            z-index:1000;
            margin-top: -150px;
            }
        img{
            width: 70%;
            height: 50vh;
            position: absolute;
            right: 15%;
            bottom: 0;
        }
        #classA:hover, #classB:hover{
            cursor: pointer;
            box-shadow: 10px 5px 5px gray;
        }
    </style>
  </head>
  <body style="background-color: aquamarine;">
      <h1 style="text-align:center; font-family:Verdana, Geneva, Tahoma, sans-serif; font-size:50px ;margin-top:50px;" > Select the division </h1>
      <div id="item">
          <div id="classA">
              <h1> Division</h1><br>
              <h2 style="font-size: 80px;">A</h2>
          </div>
          <div id="classB">
                <h1> Division </h1>
                <h1 style="font-size: 80px;">B</h2>
          </div>
      </div>  
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>