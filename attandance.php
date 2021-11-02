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


  </style>
</head>
<body>
  <header>
    <img src="./images/logo.png">
    <nav>
      <div class="menu"><a href="index.php">Employee Admin</a></div>
      <div class="menu"><a href="#" class="active">Attandance</a></div>
      <div class="menu"><a href="fule.php">fuel consumption</a></div>
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
                  <label for="perf">Expected Time</label>
                  <input id = "perf" type="time" required="" name="exp">
              </div>
              <div class="sub">
                  <button class="submit" id="submit" onclick="submit()">Submit</button>
              </div>
          </div>
      </left>
      <right>
          <table id="att_tab">
            <tr><th>Date</th><th>Attandance</th><th>Login Time</th><th>Login Location</th><th>Logout Time</th><th>Logout Location</th></tr>
          
        </table>
        <canvas id="myChart"></canvas>
      </right>
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
        var graph;
      function submit()
      {
        var expeted = document.getElementById('perf').value;
        
        if(graph)
               {
                 graph.destroy();
               }

          var start_date = document.getElementById("start_date").value;
          var end_date = document.getElementById("end_date").value;
          var emp_name = document.getElementById("emp_name").value;
          console.log(start_date);
          console.log(end_date);
          var sending={};
          
          var emp =  emp_name+"";
          var email = emp.split("-----")[0].trim();
          if(expeted=='')
          {
            sending = {
              'username':email,
                's_date':start_date,
                'e_date':end_date
            }
          }
          else
          {
            sending = {
              'username':email,
                's_date':start_date,
                'e_date':end_date,
                'exp':expeted
            }
          }
          console.log(sending);
          $.ajax({
              method:"POST",
              url:"attandancedb.php",
              data:sending,
              success:function(data)
              {
                var str="<tr><th>Date</th><th>Attandance</th><th>Login Time</th><th>Login Location</th><th>Logout Time</th><th>Logout Location</th></tr>";
                var obj = JSON.parse(data);
                var i;
                console.log(obj);
                alert(obj.length);
                var lab = [];
                var tim = [];
                console.log(str);
                for(i=0;i<obj.length;i++)
                {
                  lab[i] = obj[i].Date;
                  tim[i] = obj[i].work_hr;
                  if(obj[i].Login_location!=null && obj[i].Logout_location!=null)
                 str+="<tr><td>"+obj[i].Date+"</td><td>"+obj[i].Status+"</td><td>"+obj[i].Login_Time+"</td><td>"+obj[i].Login_location.substring(0,40)+"....</td><td>"+obj[i].Logout_TIme+"</td><td>"+obj[i].Logout_location.substring(0,40)+"...</td></tr>";            
                 if(obj[i].Login_location==null && obj[i].Logout_location!=null)
                 str+="<tr><td>"+obj[i].Date+"</td><td>"+obj[i].Status+"</td><td>"+obj[i].Login_Time+"</td><td>"+obj[i].Login_location+"....</td><td>"+obj[i].Logout_TIme+"</td><td>"+obj[i].Logout_location.substring(0,40)+"...</td></tr>";            
                 if(obj[i].Login_location!=null && obj[i].Logout_location==null)
                 str+="<tr><td>"+obj[i].Date+"</td><td>"+obj[i].Status+"</td><td>"+obj[i].Login_Time+"</td><td>"+obj[i].Login_location.substring(0,40)+"....</td><td>"+obj[i].Logout_TIme+"</td><td>"+obj[i].Logout_location+"...</td></tr>";            
                
                }  
                var chartdata={
                        labels: lab,
                        datasets: [{
                          type: 'line',
                            label: 'Working Time',
                            data: tim,
                            fill:false,
                            borderWidth: 1,
                            tension: 0.2,
                            backgroundColor: [
                                    'rgba(5, 2, 209, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(55, 2, 209, 1)',
                                ],
                                pointRadius: 0,
                        },
                        {
                          type: 'bar',
                            data: tim,
                            fill:false,
                            borderWidth: 1,
                            tension: 0.2,
                            backgroundColor: [
                                    'rgba(5, 2, 209, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(55, 2, 209, 1)',
                                ],
                                pointRadius: 0,
                        }
                        ]
                        ,
                    options: {
                      
                        responsive: true,
                       maintainAspectRatio: false
            
                }
               };
               
                const ctx = document.getElementById('myChart').getContext('2d');
     graph = new Chart(ctx, {
        data: chartdata,
        options:{
          scales: {
            y: {
                  min: 0
                }
                    }
        }
        
    });
    
                console.log(lab);    
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