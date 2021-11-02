<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sreesubh | Admin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');
    *{
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }
    body{
      display: flex;
      flex-direction: column;
    }
    header{
      padding: 10px 20px;
      display: flex;
      align-items: baseline;
      justify-content: space-between;
    }
    header nav{
      display: flex;
      justify-content: space-between;
      width: 50%;
    }
    header nav a{
      text-decoration: none;
      font-size: 1.2rem;
      font-family: 'Noto Sans', sans-serif;
      text-transform: capitalize;
      font-weight: 500;
      color: rgb(16, 24, 16);
    }
    .active{
        color: red;
    }
    ::-webkit-scrollbar
    {
      width: 5px;
    }
    ::-webkit-scrollbar-track
    {
      background-color: aqua;
    }
    ::-webkit-scrollbar-thumb
    {
      background-color: rgb(105, 105, 105);
    }
    main
    {
        background-color: rgb(241, 241, 241);
        width: 98.5vw;
        height: 100vh;
        margin: auto;
        display: flex;
        flex-direction: column;
    }
    left
    {
      background-color: white;
        width: 100%;
        margin: 10px auto;
        padding: 20px 30px;

        height: 100px;
    }
    right
    {
        background-color: rgb(241, 241, 241);
        width: 100%;
        display: flex;
        flex-direction: column;
        /* background-color: blue; */
    }
    form{
      height: 100%;
    }
    
    table th,td
    {
        margin: auto;
        background-color: white;
        padding: 4px 10px;
        border: 2px solid rgb(255, 255, 255);
    }
    table tr th,td{
     
        font-family: 'Noto Sans', sans-serif;
      text-transform: capitalize;
    }
    .form-d
    {
      display: flex;
      width: 100%;
      height: 100%;
      justify-content: space-around;
      align-items: center;
    }
    .form-d .data-list label ,.dates label
    {
        font-size: 1.2rem;
      font-family: 'Noto Sans', sans-serif;
        font-weight: 600;
    }
    .form-d .data-list input, .dates input
    {
      outline: none;
      font-family: 'Noto Sans', sans-serif;
      width: 150px;
      height: 35px;
      margin-left: 10px;
      border-radius: 5rem;
      padding: 3px 5px;
      font-size: 0.9rem;
      background-color: rgb(241, 241, 241);
    }
    .form-d .data-list input{
      width: 450px;
    }

    .submit{
      padding: 5px 10px;
      width: 200px;
      height: 35px;
        font-size: 1.2rem;
      font-family: 'Noto Sans', sans-serif;
        font-weight: 600;
        display: flex;
        text-align: center;
        justify-content: center;
        align-items: center;


    }
    canvas{

width:100% !important;
height:600px !important;

}
.printing
{
    width: 30%;
    padding: 5px 10px;
    margin: 10px auto;
    font-size: 1.4rem;
    border-radius: 10px;
    background-color: rgb(119, 192, 255);
    height: auto;
    border: none;
    border: 1px solid black;
}
.printing:hover
{
    background-color: aqua;
}
  </style>
</head>
<body>
  <header>
    <img src="./images/logo.png">
    <nav>
      <div class="menu"><a href="#">Employee Admin</a></div>
      <div class="menu"><a href="attandance.html" >Attandance</a></div>
      <div class="menu"><a href="#" class="active">fuel consumption</a></div>
      <div class="menu"><a href="#">Leave Notice</a></div>
    </nav>

  </header>
  <main>
      <left>
          <div class="form-d">
              <div class="data-list">
                <label for="emp_name">Select Employee</label>
                <input list="emp_name_list" required="" name="emp_name" id="emp_name">
                
                <datalist id="emp_name_list">
                </datalist>

              </div>
              <div class="dates">
                  <label for="start_date">Start date</label>
                  <input type="date" name="start_date" required="" id="start_date">
                  <label for="end_date">End date</label>
                  <input type="date" name="end_date" required="" id="end_date">
                  <br>
                  <br>
                  <label for="milage">Milage</label>
                  <input type="number" name="milage" required="" id="milage">
                  <label for="fule">Fule Price</label>
                  <input type="number" name="fule" required="" id="fule">
                  
              </div>
              <div class="sub">
                  <button class="submit" id="submit" onclick="submit()">Submit</button>
              </div>
          </div>
      </left>
      <right>
          <table id="att_tab">
            <tr><th>Date / Time</th><th>Address</th><th>Kilometers</th></tr>
          
        </table>
      </right>
      <button class="printing" id="print" onclick="window.print()">PRINT</button>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.0/dist/chart.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://momentjs.com/downloads/moment.js"></script>
  <script>
     
    window.addEventListener("load",function(){
      $.ajax({
        type:"get",
        url:"employe.php",
        success:function(data)
        {
          var obj = JSON.parse(data);
          var i;
          var str="";
          for(i=0;i<obj.length;i++)
          {
            str+="<option value = \" "+obj[i].Email+"-----"+obj[i].Name+"-----"+obj[i].Phone+" \" >";
          }
          var emp_name_list = document.getElementById('emp_name_list');
          emp_name_list.innerHTML = str;
        },
        async:false
      });
    });
      function submit()
      {
       
          var start_date = document.getElementById("start_date").value;
          var end_date = document.getElementById("end_date").value;
          var emp_name = document.getElementById("emp_name").value;
          console.log(start_date);
          console.log(end_date);
          var sending={};
          
          var emp =  emp_name+"";
          var email = emp.split("-----")[0].trim();
          sending = {
              'username':email,
                's_date':start_date,
                'e_date':end_date
            };
          console.log(sending);
          $.ajax({
              method:"POST",
              url:"fulecompdb.php",
              data:sending,
              success:function(data)
              {
                  console.log(data);
                var str="<tr><th>Date / Time</th><th>Address</th><th>Kilometers</th>";
                var obj = JSON.parse(data);
                var i;
                console.log(obj);
                var sum = 0;
                console.log(str);
                for(i=0;i<obj.length;i++)
                {
                 str+="<tr><td>"+obj[i].time+"</td><td>"+obj[i].address.substring(0,60)+"....</td>"+"<td>"+Number(obj[i].km_wrt_p)/1000+" KM</td></tr>";            
                    sum+= Number(obj[i].km_wrt_p);
                }  
                var fule = document.getElementById('fule').value;
                var milage = document.getElementById('milage').value;
                if(milage=='')
                {
                str+="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>";
                str+="<tr><td><b>Total: </b></td><td>......</td>"+"<td>"+sum/1000+" KM</td></tr>";  
                }
                else
                {
                    
                str+="<tr><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td></tr>";
                str+="<tr><td><b>Total: </b></td><td>......</td>"+"<td>"+sum/1000+" KM</td></tr>";
                str+="<tr><td><b>Total Price(With Milage): </b></td><td>......</td>"+"<td>"+sum*fule/(1000*Number(milage))+" Rs.</td></tr>";  
                }
                         
                 
             var data = document.getElementById("att_tab");
             data.innerHTML=str;
            
              },
              headers:{
                "Access-Control-Allow-Origin":"*",
                "Access-Control-Allow-Origin":"Origin, X-Requested-With, Content-Type, Accept"
              }
              
          }
          );          
      }
  </script>
  <script>
    
  </script>
</body>
</html>