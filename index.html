<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dragon داشبورد آمار</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;}
        body{font-family:'Vazirmatn',sans-serif;background:linear-gradient(135deg,#0c0c1a 0%,#1a1a2e 50%,#16213e 100%);color:#e8e8f0;min-height:100vh;padding:20px;}
        .container{max-width:1400px;margin:0 auto;}
        .header{text-align:center;background:rgba(255,255,255,0.05);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.1);border-radius:24px;padding:40px;margin-bottom:40px;}
        .header h1{font-size:2.5rem;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
        .user-section{background:rgba(255,255,255,0.03);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,0.08);border-radius:20px;padding:30px;margin-bottom:40px;text-align:center;}
        .btn{background:linear-gradient(135deg,#667eea,#764ba2);border:none;padding:16px 32px;border-radius:16px;color:white;font-size:1.1rem;cursor:pointer;margin:0 10px;transition:all .3s;box-shadow:0 8px 25px rgba(102,126,234,.3);}
        .btn:hover{transform:translateY(-4px);box-shadow:0 16px 40px rgba(102,126,234,.5);}
        .btn-danger{background:linear-gradient(135deg,#ff4757,#ff6b9d);box-shadow:0 8px 25px rgba(255,71,87,.3);}
        .stats-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:24px;margin-bottom:40px;}
        .stat-card{background:rgba(255,255,255,.06);backdrop-filter:blur(25px);border:1px solid rgba(255,255,255,.12);border-radius:20px;padding:32px 24px;text-align:center;transition:all .4s;box-shadow:0 8px 32px rgba(0,0,0,.2);}
        .stat-card:hover{transform:translateY(-12px);box-shadow:0 20px 60px rgba(102,126,234,.3);}
        .stat-icon{font-size:3rem;margin-bottom:16px;background:linear-gradient(135deg,#667eea,#764ba2);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
        .stat-number{font-size:2.8rem;font-weight:700;margin-bottom:8px;background:linear-gradient(135deg,#fff,#f0f0ff);-webkit-background-clip:text;-webkit-text-fill-color:transparent;}
        .chart-card{background:rgba(255,255,255,.04);backdrop-filter:blur(25px);border:1px solid rgba(255,255,255,.1);border-radius:24px;padding:32px;margin:40px 0;}
        .charts-section{display:grid;grid-template-columns:1fr 1fr;gap:32px;}
        .modal{display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,.8);backdrop-filter:blur(10px);z-index:10000;}
        .modal-content{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);background:rgba(255,255,255,.1);backdrop-filter:blur(30px);border:1px solid rgba(255,255,255,.2);border-radius:24px;padding:40px;width:90%;max-width:450px;text-align:center;}
        .modal input{width:100%;padding:20px;border:none;border-radius:16px;background:rgba(255,255,255,.1);color:#fff;font-size:1.1rem;margin-bottom:24px;}
        .no-user{text-align:center;padding:80px;background:rgba(255,255,255,.02);backdrop-filter:blur(20px);border:1px solid rgba(255,255,255,.08);border-radius:24px;margin:40px 0;}
        @media(max-width:768px){.charts-section{grid-template-columns:1fr;}.stats-grid{grid-template-columns:1fr;}}
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1><i class="fas fa-chart-line"></i> داشبورد آمار</h1>
        <p>DRAGON</p>
    </div>

    <div class="user-section">
        <button class="btn" onclick="openCreate()">
            <i class="fas fa-plus"></i> ساخت کاربر
        </button>
        <button class="btn" onclick="openSelect()">
            <i class="fas fa-search"></i> انتخاب کاربر
        </button>
        <button class="btn btn-danger" onclick="clearStats()" id="clearBtn" style="display:none;">
            <i class="fas fa-times"></i> پاک کردن
        </button>
        <div id="status" style="margin-top:20px;font-size:1.1rem;color:#4ade80;"></div>
    </div>

    <div id="noStats" class="no-user">
        <i class="fas fa-user-slash" style="font-size:5rem;color:rgba(255,255,255,.3);margin-bottom:20px;"></i>
        <h2>کاربر انتخاب نشده</h2>
        <p>ابتدا کاربر بسازید یا انتخاب کنید</p>
    </div>

    <div id="statsArea" style="display:none;">
        <div class="stats-grid" id="statCards"></div>
        <div class="charts-section">
            <div class="chart-card">
                <h3 style="text-align:center;margin-bottom:20px;">📈 نمودار روزانه</h3>
                <canvas id="chart1" height="250"></canvas>
            </div>
            <div class="chart-card">
                <h3 style="text-align:center;margin-bottom:20px;">📊 نمودار هفتگی</h3>
                <canvas id="chart2" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Modal ها -->
<div id="createModal" class="modal" onclick="this.style.display='none'">
    <div class="modal-content" onclick="event.stopPropagation()">
        <h2><i class="fas fa-user-plus"></i> ساخت کاربر جدید</h2>
        <input type="text" id="newUser" placeholder="نام کاربری (مثال: test123)" maxlength="20">
        <br><button class="btn" onclick="createUser()">✅ ساختن</button>
        <button class="btn btn-danger" onclick="closeModal('createModal')">❌ بستن</button>
    </div>
</div>

<div id="selectModal" class="modal" onclick="this.style.display='none'">
    <div class="modal-content" onclick="event.stopPropagation()">
        <h2><i class="fas fa-search"></i> انتخاب کاربر</h2>
        <input type="text" id="selectUser" placeholder="نام کاربری را بنویسید" maxlength="20">
        <br><button class="btn" onclick="loadStats()"> بارگذاری</button>
        <button class="btn btn-danger" onclick="closeModal('selectModal')">❌ بستن</button>
    </div>
</div>

<script>
let currentUser=null;let chart1=null;let chart2=null;

function openCreate(){document.getElementById('createModal').style.display='block';document.getElementById('newUser').focus();}
function openSelect(){document.getElementById('selectModal').style.display='block';document.getElementById('selectUser').focus();}
function closeModal(id){document.getElementById(id).style.display='none';}

async function createUser(){
    const username=document.getElementById('newUser').value.trim();
    if(!username||!/^[a-zA-Z0-9_-]+$/.test(username)){
        alert('❌ نام نامعتبر! فقط حروف، اعداد، _ و -');return;
    }
    document.getElementById('status').innerHTML='در حال ساخت...';
    try{
        const res=await fetch('create_user.php',{method:'POST',headers:{'Content-Type':'application/x-www-form-urlencoded'},body:`username=${username}`});
        const result=await res.json();
        if(result.success){
            document.getElementById('status').innerHTML='✅ '+result.message;
            document.getElementById('newUser').value='';
            setTimeout(()=>document.getElementById('status').innerHTML='',2000);
        }else{
            alert('❌ '+result.message);
        }
    }catch(e){
        alert('❌ خطای سرور! '+e.message);
    }
}

async function loadStats(){
    const username=document.getElementById('selectUser').value.trim();
    if(!username){alert('❌ نام کاربری بنویسید!');return;}
    document.getElementById('status').innerHTML='در حال بارگذاری...';
    try{
        const res=await fetch(`data/${username}/stats.json`);
        if(!res.ok){throw new Error('کاربر یافت نشد');}
        const stats=await res.json();
        currentUser=username;
        showStats(stats);
        document.getElementById('clearBtn').style.display='inline-flex';
        document.getElementById('status').innerHTML='✅ آمار '+username+' بارگذاری شد';
    }catch(e){
        alert('❌ '+e.message);
    }
}

function showStats(stats){
    document.getElementById('noStats').style.display='none';
    document.getElementById('statsArea').style.display='block';
    
    document.getElementById('statCards').innerHTML=`
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-globe"></i></div>
            <div class="stat-number">${(stats.total||0).toLocaleString()}</div>
            <div>کل بازدید</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-sun"></i></div>
            <div class="stat-number">${stats.today||0}</div>
            <div>امروز</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-calendar-week"></i></div>
            <div class="stat-number">${stats.thisWeek||0}</div>
            <div>این هفته</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon"><i class="fas fa-fingerprint"></i></div>
            <div class="stat-number">${stats.uniqueIPs||0}</div>
            <div>IP های مختلف</div>
        </div>
    `;
    
    updateCharts(stats);
}

function updateCharts(stats){
    if(chart1)chart1.destroy();
    if(chart2)chart2.destroy();
    
    const ctx1=document.getElementById('chart1').getContext('2d');
    chart1=new Chart(ctx1,{
        type:'line',
        data:{
            labels:stats.dailyLabels||[],
            datasets:[{label:'بازدید',data:stats.dailyData||[],borderColor:'#667eea',backgroundColor:'rgba(102,126,234,0.2)',tension:.4,fill:true}]
        },
        options:{responsive:true,scales:{y:{beginAtZero:true}}}
    });
    
    const ctx2=document.getElementById('chart2').getContext('2d');
    chart2=new Chart(ctx2,{
        type:'bar',
        data:{
            labels:stats.weeklyLabels||[],
            datasets:[{label:'هفته',data:stats.weeklyData||[],backgroundColor:'#764ba2',borderRadius:8}]
        },
        options:{responsive:true,scales:{y:{beginAtZero:true}}}
    });
}

function clearStats(){
    currentUser=null;
    document.getElementById('noStats').style.display='block';
    document.getElementById('statsArea').style.display='none';
    document.getElementById('clearBtn').style.display='none';
    document.getElementById('selectUser').value='';
}
</script>
</body>
  </html>
