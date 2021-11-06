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

        height: 150px;
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
    .form-d .data-list
    {
      /* position: relative; */
      left: -4%;
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
.log
{
  width: 120px;
  cursor: pointer;
  font-size: 0.8rem;
  border-radius: 5px;
  margin: 10px;
  border: 1px solid rgb(199, 199, 199);
  background-color: rgb(0, 255, 85);
}
.log:nth-child(2)
{
  background-color: rgb(255, 60, 0);

}
.login-page{
  margin: 0;
  display: none;
  padding: 0;
  width: 95vw;
  background-color: rgba(0, 0, 0, 0.609);
  position: absolute;
  height: 95vh;
  
}
.forms
{
  position: absolute;
  top: 50%;
  left: 50%;
  transform:translate(-50%,-50%);
  background-color: rgb(255, 255, 255);
  display: flex;
  flex-direction: column;
  height: 400px;
  width: 500px;
  justify-content: space-around;
  align-items: center;
}
.caps
{
  font-size: 1.05rem;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;  
  text-transform: capitalize;
  margin: 4px;
}
.cross
{
  width: 40px;
  height: 40px;
  position: absolute;
  left: 97%;
  cursor: pointer;
}
.forms .data-list input
{
  width: 300px;
  font-size: 1.14rem;
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
    <div class="login-page" id="windo-for-logout">
      <img src="images/redcross.png" id="close-for-logout"  class="cross">
      <div class="forms">
        <div class="data-list">
          <label for="emp_name_3" class="caps"> Select Employee</label>
          <input list="emp_name_list" required="" name="emp_name" id="emp_name_3">
          
          <datalist id="emp_name_list">
          </datalist>
    
        </div>
        
        <div class="take-time">
          <label class="caps" for="logout-time">Logout time:</label>  <input id="logout-time" type="time">
        </div>
        <div class="take-time">
          <label class="caps" for="logout-time">Logout Date:</label>  <input id="logout-date" type="date">
        </div>
        <button class="submit" id="update_logout" onclick="update_logout()">UPDATE LOGOUT</button>
      </div>
    </div>




<div class="login-page" id="windo-for-login">
  <img src="images/redcross.png" id="close-for-login"  class="cross">
  <div class="forms">
    <div class="data-list">
      <label for="emp_name" class="caps"> Select Employee</label>
      <input list="emp_name_list" required="" name="emp_name" id="emp_name">
      
      <datalist id="emp_name_list">
      </datalist>

    </div>
    <div class="emp_attandance">
      <label for="attan" class="caps">Select Attandance</label>
      <div class="rad_att">
        <label for="p" class="caps">PRESENT</label><input type="radio" id="p" value="1" name="att">
        <label for="a" class="caps">ABSENT</label><input type="radio" id="a" value="0" name="att">
      </div>
      
    </div>
    <div class="take-time">
      <label class="caps" for="login-time">Login time:</label>  <input id="login-time" type="time">
    </div>
    <div class="take-time">
      <label class="caps" for="login-time">Login Date:</label>  <input id="login-date" type="date">
    </div>
    <button class="submit" id="update_login" onclick="update_login()">UPDATE LOGIN</button>
  </div>
</div>
  </header>
  <main>
      <left>
          <div class="form-d">
              <div class="data-list">
                <label for="emp_name">Select Employee</label>
                <input list="emp_name_list" required="" name="emp_name_2" id="emp_name_2">
                
                <datalist id="emp_name_list">
                </datalist>

              </div>
              <div class="dates">
                  <label for="start_date">Start date</label>
                  <input type="date" name="start_date" required="" id="start_date">
                  <br>
                  <label for="end_date">End date</label>
                  <input type="date" name="end_date" required="" id="end_date">
                  <br>
                  <label for="perf">Expected Time</label>
                  <input id = "perf" type="time" required="" name="exp">
              </div>
              <div class="sub">
                  <button class="submit" id="submit" onclick="submit()">Submit</button>
              </div>
              <div class="update">
                <button class="login-update log submit" id="but-login" >Login Update</button>
                <button class="login-update log submit" id="but-logout">Logout Update</button>
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
          var emp_name = document.getElementById("emp_name_2").value;
          console.log(start_date);
          console.log(end_date);
          var sending={};
          console.log(emp_name);
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
      function update_login()
      {
        // alert('hello'); login-date
          var emp_name = document.getElementById("emp_name").value;
          var email = emp_name.split("-----")[0].trim();
          var login_date = document.getElementById("login-date").value;
          var login_time = document.getElementById("login-time").value;
          var p = document.getElementById("p").checked;
          var a = document.getElementById("a").checked;
          var datas = {}
          var flag = 0;
          if(p)
          {
            flag = 1;
            datas = {
              'email':email,
              'time':login_time,
              'date':login_date,
              'status':1
            }
          }
          else if(a)
          {
            flag = 1;
            datas = {
              'email':email,
              'time':'00:00:00',
              'date':login_date,
              'status':0
            }
          }
          else
          {
            datas={}
            alert('Select peresent or absesnt!!');
          }
          if(flag == 1)
          {
            $.ajax({
              method:'post',
              url:'updatelogin.php',
              data:datas,
              
              success:function(dat){
                if(dat == 200)
                {
                  alert('Update successfully....!!!');
                  $('#windo-for-login').css('display','none');
                }
                else
                 if (dat==404)
                 {
                   alert('Updation fail...');
                 }
              },error:function(err)
              {
                alert(err);
              }
            })
          }

      }
      function update_logout()
      {
        var emp_name = document.getElementById("emp_name_3").value;
          var email = emp_name.split("-----")[0].trim();
          var logout_date = document.getElementById("logout-date").value;
          var logout_time = document.getElementById("logout-time").value;
          datas={
            'email':email,
            'date':logout_date,
            'time':logout_time
          };
          $.ajax({
              method:'post',
              url:'logoutupdate.php',
              data:datas,
              
              success:function(dat){
                if(dat == 200)
                {
                  alert('Update successfully....!!!');
                  $('#windo-for-logout').css('display','none');
                }
                else
                 if (dat==404)
                 {
                   alert('Updation fail...');
                 }
              },error:function(err)
              {
                alert(err);
              }
            })
      }
      var closeing = document.getElementById('close-for-login');
      // closeing.addEventListener('click',close());
      //but-logout
      $('#but-logout').click(()=>{
        $('#windo-for-logout').css('display','block');
       
      })
      //close-for-logout
      $('#close-for-logout').click(()=>{
        $('#windo-for-logout').css('display','none');
      })
      $('#close-for-login').click(()=>{
        $('#windo-for-login').css('display','none');
      })
      $('#but-login').click(()=>{
        $('#windo-for-login').css('display','block');
       
      })
      </script>
  <script>
    
  </script>
</body>
</html>
